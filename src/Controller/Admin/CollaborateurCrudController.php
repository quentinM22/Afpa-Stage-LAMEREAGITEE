<?php

namespace App\Controller\Admin;

use App\Entity\Collaborateur;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\Field\VichImageField;

class CollaborateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Collaborateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        $fields =[
            TextField::new('FirstName')
                ->setLabel('Prénom'),
            TextField::new('LastName')  
                ->setLabel('Nom'),
            TextField::new('job')
                ->setLabel('Métier'),
            UrlField::new('url_fb')
                ->setLabel('Url Facebook')
                ->hideOnIndex(),
            UrlField::new('url_insta')
                ->setLabel('Url Instagram')
                ->hideOnIndex(),
            UrlField::new('url_site')
                ->setLabel('Url Site Internet')
                ->hideOnIndex(),
            TextareaField::new('description')
                ->setLabel('A Propos')
                ->hideOnIndex(),
            // TextField::new('imageFile')
            //     ->setFormType(VichImageType::class)
            //     ->onlyOnIndex(),
            ImageField::new('imageName')
                ->setBasePath('/images/products/')
                ->setUploadDir('public/images/products')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
      
        return $fields;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Collaborateurs')
        ->setPageTitle('new', 'Nouveau Collaborateur')
        ->setPageTitle('edit', 'Editer Collaborateur');
    }
}
