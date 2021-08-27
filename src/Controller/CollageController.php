<?php

namespace App\Controller;

use App\Entity\Search;
use App\Entity\Collage;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Form\CollSearchType;
use App\Repository\CollageRepository;
use App\Notification\ContactNotification;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CollageController extends AbstractController
{
    //-----initialisation repository avec autowirring----------
    public function __construct(CollageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/collage", name="collage.index")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(CollSearchType::class, $search);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        }
        //-----recuperation donnée Bdd------
        $collage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            6
        );
        //  dump($collage);

        return $this->render('collage/index.html.twig', [
            'controller_name' => 'CollageController',
            'collages' => $collage,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/collages/{slug}-{id}", name="collage.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Collage $collage, $slug, Request $request, ContactNotification $notification): Response
    {
        $contact = new Contact();
        $contact->setCollage($collage);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $notification->notifyCollage($contact);
            $this->addFlash('success', 'Votre email a bien été envoyé');
            // return $this->redirectToRoute('realisation.show',[
            //     'id' => $collage->getId(),
            //     'slug' => $collage->getSlug()
            // ]);
        }
        //-----redirection url-------
        if ($collage->getSlug()!== $slug) {

            return $this->redirectToRoute('collage.show',[
                'id' => $collage->getId(),
                'slug' => $collage->getSlug()
            ], 301);
        }
        return $this->render('collage/show.html.twig',[
            'controller_name' => 'CollageController',
            'collage' => $collage,
            'form' => $form->createView()
        ]);
    }
}
