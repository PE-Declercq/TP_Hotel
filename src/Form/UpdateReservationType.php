<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $reservation = $options['reservation'];

        $builder
            //->add('creationDate')
            ->add('startDate')
            ->add('endDate')
            ->add('user')
            ->add('suite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired('reservation');
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
