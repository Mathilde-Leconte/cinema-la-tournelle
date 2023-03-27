<?php

namespace App\Form;

use App\Entity\Tarif;
use App\Entity\TypeSeSeance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class TypeSeSeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["required" => false])
            ->add('prive',  CheckboxType::class, [
                "label" => "prive", 
                "required" => false, 
                "row_attr" => ["class" => "form-switch"]])
            ->add('publique',  CheckboxType::class, [
                "label" => "publique", 
                "required" => false, 
                "row_attr" => ["class" => "form-switch"]])
            ->add('description',  TextType::class, ["required" => false])
            ->add('tarifs', EntityType::class, [
                'class'     => Tarif::class,
                'expanded'  => true,
                'multiple'  => true,
                'by_reference' => false,     
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeSeSeance::class,
        ]);
    }
}
