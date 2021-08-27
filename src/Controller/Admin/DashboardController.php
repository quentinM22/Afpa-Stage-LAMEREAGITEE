<?php

namespace App\Controller\Admin;

use App\Entity\Autre;
use App\Entity\AutreOptions;
use App\Entity\Collaborateur;
use App\Entity\Collage;
use App\Entity\CollOption;
use App\Entity\Mobilier;
use App\Entity\MobiOption;
use App\Entity\Presses;
use App\Entity\PressOption;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('La Mère Agitée');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoCrud('Paramètres Utilisateur', 'fa fa-gear', User::class );
        yield MenuItem::linktoCrud('Collaborateurs', 'fa fa-users', Collaborateur::class );
        yield MenuItem::section('Mobiliers et Objets Décoratif', 'fa fa-folder');
        yield MenuItem::linktoCrud('Mobiliers et Objets Décoratif', 'fa fa-palette', Mobilier::class );
        yield MenuItem::linktoCrud(' Catégories', 'fa fa-edit', MobiOption::class );
        yield MenuItem::section('Collages', 'fa fa-folder');
        yield MenuItem::linktoCrud('Collages', 'fa fa-palette', Collage::class );
        yield MenuItem::linktoCrud('Catégories', 'fa fa-edit', CollOption::class );
        yield MenuItem::section('Accessoires et Collaborations', 'fa fa-folder');
        yield MenuItem::linktoCrud('Accessoires et Collaborations', 'fa fa-palette', Autre::class );
        yield MenuItem::linktoCrud('Catégories', 'fa fa-edit', AutreOptions::class );
        yield MenuItem::section('Presse / Evénements / Exposition /...', 'fa fa-folder');
        yield MenuItem::linktoCrud('Presse / Evénements / Exposition /...', 'fa fa-palette', Presses::class );
        yield MenuItem::linktoCrud('Catégories', 'fa fa-edit', PressOption::class );
        

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
