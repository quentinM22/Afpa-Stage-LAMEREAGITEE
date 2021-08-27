<?php

namespace App\Controller\Admin;

use App\Entity\AutreOptions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AutreOptionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AutreOptions::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
          TextField::new('name')->setLabel('Catégorie'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Accessoires et Collaborations Catégories')
        ->setPageTitle('new', 'Nouveau Accessoires et Collaborations Catégories')
        ->setPageTitle('edit', 'Editer Accessoires et Collaborations Catégories');
    }
    
}
