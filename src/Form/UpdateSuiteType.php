<?php

namespace App\Form;

use App\Entity\Hotels;
use App\Entity\Suite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateSuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $suite = $options['suite'];

        $builder
            ->add('name', TextType::class, [
                'data' => $suite->getName()
            ])
            ->add('img', TextType::class, [
                'data' => $suite->getImg()
            ])
            ->add('description', TextType::class, [
                'data' => $suite->getDescription()
            ])
            ->add('price', MoneyType::class, [
                'data' => $suite->getPrice(),
                'currency' => 'EUR'
            ])
            ->add('available', CheckboxType::class, [
                'data' => $suite->isAvailable()
            ])
            ->add('hotel', EntityType::class, [
                'class' => Hotels::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose an option',
                'required' => false,
                'multiple' => false,
                'expanded' => false,
                'data' => $suite->getHotel(),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired('suite');
        $resolver->setDefaults([
            'data_class' => Suite::class,
        ]);
    }
}
