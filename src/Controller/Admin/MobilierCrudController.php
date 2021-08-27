<?php

namespace App\Controller\Admin;

use App\Entity\Mobilier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MobilierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mobilier::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')
                ->setLabel('Titre'),
            TextareaField::new('description')
                ->setLabel('Description')
                ->hideOnIndex(),
            MoneyField::new('price')
                ->setLabel('Prix')
                ->setCurrency('EUR'),
            BooleanField::new('sold')
                ->setLabel('Vendu?'),
            AssociationField::new('mobiOptions')
                ->setLabel('Catégorie')
                ->hideOnIndex(),
            ImageField::new('imageName')
                ->setBasePath('/images/galeries/')
                ->setUploadDir('public/images/galeries')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setDefaultSort(['created_at' => "DESC"])
        ->setPageTitle('index', 'Mobiliers et Objets décoratif')
        ->setPageTitle('edit', 'Editer Mobiliers et Objets décoratif')
        ->setPageTitle('new', 'Nouveau Mobiliers et Objets décoratif');
    }
    
}
