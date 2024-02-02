<?php

namespace App\Form;

use App\Entity\Installations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstallationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('internet')
            ->add('balcon')
            ->add('garage')
            ->add('piscine')
            ->add('gym')
            ->add('Caméra_surveillance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Installations::class,
        ]);
    }
}
