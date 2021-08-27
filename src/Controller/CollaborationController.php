<?php

namespace App\Controller;

use App\Entity\Collaborateur;
use App\Repository\CollaborateurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollaborationController extends AbstractController
{
    //-----initialisation repository avec autowirring----------
    public function __construct(CollaborateurRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/collaboration", name="collaboration.index")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        //-----recuperation donnée Bdd------
        $collaborateur = $paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('collaboration/index.html.twig', [
            'controller_name' => 'CollaborationController',
            'collaborateurs' => $collaborateur
        ]);
    }
    /**
     * @Route("/collaboration/{slug}-{id}", name="collaboration.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Collaborateur $collaborateur, $slug): Response
    {
        //-----redirection url-------
        if ($collaborateur->getSlug()!== $slug) {

            return $this->redirectToRoute('collaboration.show',[
                'id' => $collaborateur->getId(),
                'slug' => $collaborateur->getSlug()
            ], 301);
        }
        return $this->render('collaboration/show.html.twig',[
            'controller_name' => 'CollaborateurController',
            'collaborateurs' => $collaborateur
        ]);
    }
}
