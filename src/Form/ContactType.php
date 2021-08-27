<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', null, [
            'label' => 'Prénom'
        ],TextType::class)
        
        ->add('lastname', null,[
            'label' => 'Nom'
        ], TextType::class)
        
        ->add('phone', null,[
            'label' => 'Téléphone'
        ], TextType::class)
        
        ->add('email', null,[
            'label' => 'Votre e-mail'
        ], EmailType::class)
        
        ->add('message', TextareaType::class)
        
        ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
