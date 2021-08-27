<?php

namespace App\Controller\Admin;

use App\Entity\PressOption;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PressOptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PressOption::class;
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
        ->setPageTitle('index', 'Presse / Evénements / Exposition /... Catégories')
        ->setPageTitle('edit', 'Editer Presse / Evénements / Exposition /... Catégories')
        ->setPageTitle('new', 'Nouveau Presse / Evénements / Exposition /... Catégories');
    }
}
