<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Form\MailForm;
use App\Repository\PersonneRepository;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
            24
        );

        return $this->render('profil/index.html.twig', [
            'profils' => $profils,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/profil/{id}", name="profil_display")
     */
    public function display($id, PersonneRepository $personneRepository)
    {

        $profil = $personneRepository->find($id);

        return $this->render('profil/profil.html.twig', [
            'profil' => $profil
        ]);
    }
}
