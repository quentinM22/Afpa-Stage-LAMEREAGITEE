<?php

namespace App\Controller;

use App\Entity\Autre;
use App\Entity\Search;
use App\Entity\Contact;
use App\Form\AutreSearchType;
use App\Form\ContactType;
use App\Repository\AutreRepository;
use App\Notification\ContactNotification;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AutreController extends AbstractController
{
//-----initialisation repository avec autowirring----------
public function __construct(AutreRepository $repository)
{
    $this->repository = $repository;
}
/**
 * @Route("/autre", name="autre.index")
 */
public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(AutreSearchType::class, $search);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        }
        //-----recuperation donnée Bdd------
        $autre = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            6
        );
    //  dump($autre);


    return $this->render('autre/index.html.twig', [
        'controller_name' => 'AutreController',
        'autres' => $autre,
        'form' => $form->createView()
    ]);
}
/**
 * @Route("/autres/{slug}-{id}", name="autre.show", requirements={"slug": "[a-z0-9\-]*"})
 * @return Response
 */
public function show(Autre $autre, $slug, Request $request, ContactNotification $notification): Response
{
    $contact = new Contact();
    $contact->setAutre($autre);
    $form = $this->createForm(ContactType::class, $contact);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $notification->notifyAutre($contact);
        $this->addFlash('success', 'Votre email a bien été envoyé');
        // return $this->redirectToRoute('realisation.show',[
        //     'id' => $autre->getId(),
        //     'slug' => $autre->getSlug()
        // ]);
    }
    // //-----redirection url-------
    if ($autre->getSlug()!== $slug) {

        return $this->redirectToRoute('realisation.show',[
            'id' => $autre->getId(),
            'slug' => $autre->getSlug()
        ], 301);
    }
    return $this->render('autre/show.html.twig',[
        'controller_name' => 'AutreController',
        'autre'=> $autre,
        'form' => $form->createView()
    ]);
}
}
