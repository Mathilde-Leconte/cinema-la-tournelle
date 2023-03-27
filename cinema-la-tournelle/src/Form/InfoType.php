<?php

namespace App\Form;

use App\Entity\Info;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('telProgrammation')
            ->add('telAdmin')
            ->add('instagram')
            ->add('facebook')
            ->add('site')
            ->add('numero')
            ->add('rue')
            ->add('codePostale')
            ->add('ville')
            ->add('acces')
            ->add('horraire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Info::class,
        ]);
    }
}
