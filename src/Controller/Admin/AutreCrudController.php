<?php

namespace App\Controller\Admin;

use App\Entity\Autre;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AutreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Autre::class;
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
            BooleanField::new('collaborationBool')
                ->setLabel('Collaboration?'),
            AssociationField::new('otherOption')
                ->setLabel('Catégorie')
                ->hideOnIndex(),
            AssociationField::new('collaboration')
                ->setLabel('Collaborateur')
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
        ->setDefaultSort(['created_at' => "ASC"])
        ->setPageTitle('index', 'Accessoires et Collaborations')
        ->setPageTitle('edit', 'Editer Accessoires et Collaborations')
        ->setPageTitle('new', 'Nouveau Accessoires et Collaborations');;
    }
}
