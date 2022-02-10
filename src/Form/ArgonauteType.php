<?php

namespace App\Form;

use App\Entity\Argonaute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArgonauteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom de l\'Argonaute',
                'attr' => [
                    'placeholder' => 'Charalampos'
                ]
            ])
            ->add('skillOne', null, [
                'label' => 'Trait particulier',
                'attr' => [
                    'placeholder' => '(facultatif)'
                ]
            ])
            ->add('skillTwo', null, [
                'label' => 'Trait particulier',
                'attr' => [
                    'placeholder' => '(facultatif)'
                ]
            ])
            ->add('skillThree', null, [
                'label' => 'Trait particulier',
                'attr' => [
                    'placeholder' => '(facultatif)'
                ]
            ])
            //->add('photo', FileType::class,[
          //      'label' => 'Photo',
         //       'mapped' => false,
         //       'required' => false,
         //       'constraints' => [
        //            'maxSize' => '1024k',
        //            'mimeTypes' => [
        //                'application/jpeg',
        //                'application/x-jpg',
        //                ],
        //            'mimeTypesMessage' => 'Please upload a valid JPEG document',
        //    ]
        //  ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut du passager',
                'choices' => [
                    'En vie' => 'En vie',
                    'Décédé' => 'Décédé',
                    'Inconnu' => 'Inconnu'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Argonaute::class,
        ]);
    }
}
