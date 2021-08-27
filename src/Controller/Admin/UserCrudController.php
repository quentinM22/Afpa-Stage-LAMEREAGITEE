<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('Nom'),
            TextField::new('Prenom')->setLabel('Prénom'),
            TelephoneField::new('telephone')->setLabel('Téléphone'),
            UrlField::new('facebook')->setLabel('Url Facebook')->hideOnIndex(),
            UrlField::new('instagram')->setLabel('Url Instagram')->hideOnIndex(),
            EmailField::new('email')->setLabel('Email'),
            TextareaField::new('description')->setLabel('A Propos')->hideOnIndex(),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->disable(Action::DELETE, Action::NEW);
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Paramètre')
        ->setPageTitle('edit', 'Editer les paramètre du profil');
    }
    
}
