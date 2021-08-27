<?php

namespace App\Controller\Admin;

use App\Entity\CollOption;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CollOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CollOption::class;
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
        ->setPageTitle('index', 'Collages Catégories')
        ->setPageTitle('new', 'Nouveau Collages Catégories')
        ->setPageTitle('edit', 'Editer Collages Catégories');
    }
}
