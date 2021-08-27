<?php

namespace App\Controller;

use App\Entity\Search;
use App\Entity\Contact;
use App\Entity\Mobilier;
use App\Form\ContactType;
use App\Form\MobillierSearchType;
use App\Repository\MobilierRepository;
use App\Notification\ContactNotification;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RealisationController extends AbstractController
{
    //-----initialisation repository avec autowirring----------
    public function __construct(MobilierRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/mobilier", name="realisation.index")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        
        //  dump($mobilier);
        $search = new Search();
        $form = $this->createForm(MobillierSearchType::class, $search);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        }
        
        //-----recuperation donnée Bdd------
        $mobilier = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('realisation/index.html.twig', [
            'controller_name' => 'RealisationController',
            'mobiliers' => $mobilier,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/mobilier/{slug}-{id}", name="realisation.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Mobilier $mobilier, $slug, Request $request, ContactNotification $notification): Response
    {
        $contact = new Contact();
        $contact->setMobilier($mobilier);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notifyMobilier($contact);
            $this->addFlash('success', 'Votre email a bien été envoyé');
            // return $this->redirectToRoute('realisation.show',[
            //     'id' => $mobilier->getId(),
            //     'slug' => $mobilier->getSlug()
            // ]);
        }
        // //-----redirection url-------
        if ($mobilier->getSlug()!== $slug) {

            return $this->redirectToRoute('realisation.show',[
                'id' => $mobilier->getId(),
                'slug' => $mobilier->getSlug()
            ], 301);
        }
        return $this->render('realisation/show.html.twig',[
            'controller_name' => 'RealisationController',
            'mobilier'=> $mobilier,
            'form' => $form->createView()

        ]);
    }
}
