<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('realisation')
            ->add('casting')
            ->add('pays')
            ->add('duree')
            ->add('synopsis')
            ->add('recompense')
            ->add('distributeur')
            ->add('coutLocation')
            ->add('voFilm')
            ->add('vostFilm')
            ->add('deuxDFilm')
            ->add('troisDFilm')
            ->add('age')
            ->add('aPartir')
            ->add('interditAns')
            ->add('aPartirMois')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
