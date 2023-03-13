<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre', TextType::class, ["required" => false])
        ->add('realisation', TextType::class, ["required" => false])
        ->add('casting', TextType::class, ["required" => true])
        ->add('pays', TextType::class, ["required" => false])
        ->add('duree', IntegerType::class, ["required" => false])
        ->add('synopsis', TextType::class, ["required" => false])
        ->add('recompense', TextType::class, ["required" => true])
        ->add('distributeur', TextType::class, ["required" => false])
        ->add('coutLocation', TextType::class, ["required" => true])
        ->add('voFilm', CheckboxType::class, ["label" => "VO", "required" => false])
        ->add('vostFilm', CheckboxType::class, ["label" => "VOST", "required" => false])
        ->add('deuxDFilm', CheckboxType::class, ["label" => "2D", "required" => false])
        ->add('troisDFilm', CheckboxType::class, ["label" => "3D", "required" => false])
        ->add('age', TextType::class, ["required" => true])
        ->add('aPartir', CheckboxType::class, ["label" => " À partir de ... ans", "required" => true])
        ->add('interditAns', CheckboxType::class, ["label" => " Interdit au moins de ... ANS", "required" => true])
        ->add('aPartirMois', CheckboxType::class, ["label" => " À partir de ... MOIS", "required" => true])
        ->add('isActive',  CheckboxType::class, [
            "label" => "Activé", 
            "required" => false, 
            "row_attr" => ["class" => "form-switch"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
