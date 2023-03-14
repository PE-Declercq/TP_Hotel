<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield DateTimeField::new('creation_date')
            ->hideOnForm();
        yield DateTimeField::new('start_date');
        yield DateTimeField::new('end_date');
        yield AssociationField::new('user');
        yield AssociationField::new('suite');
    }
}
