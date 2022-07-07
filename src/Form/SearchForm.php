<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Rang;
use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchForm extends AbstractType
{
    //construction de notre formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ]
            ])


            ->add('rangs', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Rang::class,
                'choice_label' => 'libelle'
            ])

            ->add('roles', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Role::class,
                'choice_label' => 'libelle'
            ])

            ->add('ageMin', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'min'
                ]
            ])


            ->add('ageMax', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'max'
                ]
            ]);
    }

    //configurer les options du formulaire
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    //url plus propre
    public function getBlockPrefix()
    {
        return '';
    }
}
