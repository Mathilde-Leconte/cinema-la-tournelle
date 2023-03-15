<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Seance;
use App\Entity\Evenement;
use App\Entity\TypeSeSeance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('film', EntityType::class, [
                'class'        => Film::class,
                // cette fonction ne recupere que les film isActive = true
                'query_builder' => function ($repository) {
                    return $repository->createQueryBuilder('f')
                        ->where('f.isActive = true')
                        ->orderBy('f.titre', 'ASC');
                    },
                    'choice_label' => 'titre',
                    'required'     => true,
                    'placeholder'  => 'Choisir un film'
                    ])
    
            ->add('start', DateTimeType::class, [
                "label" => "Heure de début", 
                "widget" => "single_text", 
                ])
    
            ->add('end', DateTimeType::class, [
                "label" => "Heure de fin", 
                "widget" => "single_text",
                "required" => false,
                ])
    
            ->add('voSeance', CheckboxType::class,[
                "label" => "VO", 
                "required" => false
                ])

            ->add('vostSeance', CheckboxType::class,[
                "label" => "VOST", 
                "required" => false
                ])

            ->add('deuxDseance', CheckboxType::class,[
                "label" => "2D", 
                "required" => false
                ])

            ->add('troisDSeance', CheckboxType::class,[
                "label" => "3D", 
                "required" => false
                ])

            ->add('typeDeSeance', EntityType::class, [
                'class'        => TypeSeSeance::class,
                'expanded'     => true,
                'multiple'     => false, //rend les checkboxs en radio
                'by_reference' => false,
                'mapped'       => false,
                'required'     => false  

            ])            
            ->add('evenement', EntityType::class, [
                'class'        => Evenement::class,
                'label'        => "Évènement", 
                'expanded'     => false,
                'multiple'     => false, //rend les checkboxs en radio
                'by_reference' => false,
                'required'     => false,
                'placeholder'  => 'Choisir un évènement',
                'mapped'     => false     

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
        ]);
    }
}
