<?php

namespace App\Controller\Admin;

use App\Entity\Presses;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PressesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presses::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')
            ->setLabel('Titre'),
            TextareaField::new('description')
            ->setLabel('Description')
            ->hideOnIndex(),
            UrlField::new('url')
            ->setLabel('Url de l\'article'),
            AssociationField::new('pressOptions')
            ->setLabel('Catégorie')
            ->hideOnIndex(),
            ImageField::new('imageName')
                ->setBasePath('/images/presses/')
                ->setUploadDir('public/images/presses')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
            
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        
    return $crud
        ->setDefaultSort(['created_at' => "DESC"])
        ->setPageTitle('index', 'Presse / Evénements / Exposition /...')
        ->setPageTitle('edit', 'Editer Presse / Evénements / Exposition /...')
        ->setPageTitle('new', 'Nouveau Presse / Evénements / Exposition /...');
    }
}
