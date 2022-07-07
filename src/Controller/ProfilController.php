<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Repository\PersonneRepository;
use App\Form\SearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;


class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="app_profil")
     */
    public function index(PersonneRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {

        $data = new SearchData;
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        //dd($data);


        $profils = $repository->findSearch($data);

        $profils = $paginator->paginate(
            $profils,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('profil/index.html.twig', [
            'profils' => $profils,
            'form' => $form->createView()
        ]);
    }
}
