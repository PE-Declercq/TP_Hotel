<?php

namespace App\Form;

use App\Entity\Hotels;
use App\Entity\Suite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('img')
            ->add('description')
            ->add('price', MoneyType::class, [
                'currency' => 'EUR'
            ])
            ->add('available', CheckboxType::class)
            ->add('hotel', EntityType::class, [
                'class' => Hotels::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose an option',
                'required' => false,
                'multiple' => false,
                'expanded' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suite::class,
        ]);
    }
}
