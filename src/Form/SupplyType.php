<?php

namespace App\Form;

use App\Entity\Supply;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupplyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('SupplyDate')
            ->add('SupplyAmount')
            ->add('SupplyPrice')
            ->add('Product')
            ->add('Vendor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Supply::class,
        ]);
    }
}
