<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ["required" => false])
            ->add('realisation', TextType::class, ["required" => false])
            ->add('casting', TextType::class, ["required" => false])
            ->add('pays', TextType::class, ["required" => true])
            ->add('duree', IntegerType::class, ["required" => false])
            ->add('synopsis', TextareaType::class, ["required" => true])
            ->add('recompense', TextType::class, ["required" => false])
            ->add('distributeur', TextType::class, ["required" => true])
            ->add('coutLocation', TextType::class, ["required" => false])
            ->add('voFilm', CheckboxType::class, ["label" => "VO", "required" => false])
            ->add('vostFilm', CheckboxType::class, ["label" => "VOST", "required" => false])
            ->add('deuxDFilm', CheckboxType::class, ["label" => "2D", "required" => false])
            ->add('troisDFilm', CheckboxType::class, ["label" => "3D", "required" => false])
            ->add('age', TextType::class, ["required" => false])
            ->add('aPartir', CheckboxType::class, ["label" => "À partir de...ans", "required" => false])
            ->add('interditAns', CheckboxType::class, ["label" => "Interdit au moins de...ans", "required" => false])
            ->add('aPartirMois', CheckboxType::class, ["label" => "À partir de...mois", "required" => false])
            ->add('isActive',  CheckboxType::class, [
                "label" => "Activé", 
                "required" => false, 
                "row_attr" => ["class" => "form-switch"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
