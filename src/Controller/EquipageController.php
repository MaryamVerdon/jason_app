<?php

namespace App\Controller;

use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class EquipageController extends AbstractController
{
    /**
     * @Route("/equipage", name="app_equipage")
     */
    public function index(SessionInterface $session, PersonneRepository $personneRepository): Response
    {
        $equipage = $session->get('equipage', []);
        $equipageData = [];

        foreach ($equipage as $id => $q) {
            $equipageData[] = [
                'profil'  => $personneRepository->find($id)
            ];
        }

        //dd($equipageData);
        return $this->render('equipage/index.html.twig', [
            'equipage' => $equipageData
        ]);
    }

    /**
     * @Route("/equipage/add/{id}", name="equipage_add")
     */
    public function add($id, SessionInterface $session)
    {
        $equipage = $session->get('equipage', []);

        $equipage[$id] = 1;
        $session->set('equipage', $equipage);

        dd($session->get('equipage'));
    }
}
