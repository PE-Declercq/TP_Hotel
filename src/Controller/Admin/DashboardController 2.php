<?php

namespace App\Controller\Admin;

use App\Entity\Hotels;
use App\Entity\Reservation;
use App\Entity\Suite;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(HotelsCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Exo Symfo Hotel');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::subMenu('Dashboard', 'fa fa-home')->setSubItems([
            MenuItem::linkToCrud('Hôtels', 'fa fa-building', Hotels::class),
            MenuItem::linkToCrud('Suites', 'fa fa-bed', Suite::class),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),
        ]);
        yield MenuItem::linkToCrud('Réservations', 'fa fa-money-bill', Reservation::class);
    }
}
