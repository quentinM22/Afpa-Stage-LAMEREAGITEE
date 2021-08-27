<?php

namespace App\Form;

use App\Entity\PressOption;
use App\Entity\Search;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PressesSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('options', EntityType::class,[
                'required' => false,
                'label'  => false,
                'class' => PressOption::class,
                'choice_label' => 'name',
                'multiple' => true 
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method ' => 'get',
            'csrf_protection' => false
        ]);

    }
    public function getBlockPrefix()
    {
        return '';
    }
}
