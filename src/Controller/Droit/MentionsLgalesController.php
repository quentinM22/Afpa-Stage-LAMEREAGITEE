<?php

namespace App\Controller\Droit;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionsLgalesController extends AbstractController
{

    /**
     * @Route("/mentions_légales", name="mentionslegales")
     */
    public function index(): Response
    {
        return $this->render('droit/mentionslegales.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
