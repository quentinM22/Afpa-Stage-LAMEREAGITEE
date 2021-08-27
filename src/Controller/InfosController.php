<?php

namespace App\Controller;

use App\Entity\Search;
use App\Form\PressesSearchType;
use App\Repository\PressesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfosController extends AbstractController
{   
    public function __construct(PressesRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/infos", name="infos.index")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(PressesSearchType::class, $search);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        }
        
        //-----recuperation donnée Bdd------
        $presse = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            4
        );
        return $this->render('infos/index.html.twig', [
            'controller_name' => 'InfosController',
            'presses' => $presse,
            'form' => $form->createView()
        ]);
    }
}
