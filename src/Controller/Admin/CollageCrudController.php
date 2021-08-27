<?php

namespace App\Controller\Admin;

use App\Entity\Collage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class CollageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Collage::class;
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
            AssociationField::new('collOptions')
                ->setLabel('Catégorie')
                ->hideOnIndex(),
            ImageField::new('imageName')
                ->setBasePath('/images/galeries/')
                ->setUploadDir('public/images/galeries')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setDefaultSort(['created_at' => "DESC"])
        ->setPageTitle('index', 'Collages')
        ->setPageTitle('edit', 'Editer Collages')
        ->setPageTitle('new', 'Nouveau Collages');
    }
}
