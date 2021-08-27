<?php

namespace App\Controller\Admin;

use App\Entity\MobiOption;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MobiOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MobiOption::class;
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
        ->setPageTitle('index', 'Mobiliers et Objets Décoratif Catégories')
        ->setPageTitle('new', 'Nouveau Collages Catégories')
        ->setPageTitle('edit', 'Editer Mobiliers et Objets Décoratif Catégories');
    }
}