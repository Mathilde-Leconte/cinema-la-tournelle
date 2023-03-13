<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Film;
use App\Entity\Seance;
use App\Entity\TypeSeSeance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start', DateTimeType::class, ["label" => "Heure de début", "widget" => "single_text", "required" => false])
            ->add('end', DateTimeType::class, ["label" => "Heure de fin", "widget" => "single_text", "required" => false])

            ->add('film', EntityType::class, [
                'class'        => Film::class,
                // cette fonction ne recupere que les film isActive = true
                'query_builder' => function ($repository) {
                    return $repository->createQueryBuilder('f')
                        ->where('f.isActive = true')
                        ->orderBy('f.titre', 'ASC');
                    },
                    'choice_label' => 'titre',
                    'required'     => false,
                    'placeholder'  => 'Choisir un film'
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
            
            ->add('typeDeSeance', EntityType::class, [
                'class'     => TypeSeSeance::class,
                'expanded'  => true,
                'multiple'  => false, //rend les checkboxs en radio
                'by_reference' => false,
                'mapped'     => false     

            ]);
            if ($options['voFilm']) {
                $builder->add('vo', CheckboxType::class, [
                    'label' => 'Version originale',
                    'required' => false
                ]);
            }
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
            'voFilm'     => false
        ]);
    }
}
