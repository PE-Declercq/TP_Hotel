<?php

namespace App\Controller;

use App\Repository\HotelsRepository;
use App\Repository\ReservationRepository;
use App\Repository\SuiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ManagmentController extends AbstractController
{
    private $security;
    private $authorizationChecker;

    public function __construct(Security $security, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->security = $security;
        $this->authorizationChecker = $authorizationChecker;
    }

    #[Route('/managment', name: 'app_managment')]
    public function index(HotelsRepository $hotelsRepo, SuiteRepository $suiteRepo, ReservationRepository $reservationsRepo): Response
    {
        if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse('/admin');
        }

        $user = $this->security->getUser();
        $hotel = $hotelsRepo->findOneByUser($user);
        $suites = $suiteRepo->getByHotel($hotel);
        $reservations = $reservationsRepo->getBySuites($suites);

        $reservationsData = [];

        foreach ($reservations as $reservation) {
            $reservationsData[] = [
                'suiteName' => $reservation->getSuite()->getName(),
                'creationDate' => $reservation->getCreationDate(),
                'startDate' => $reservation->getStartDate(),
                'endDate' => $reservation->getEndDate(),
                'userEmail' => $reservation->getUser()->getEmail()
            ];
        }

        return $this->render('managment/index.html.twig', [
            'controller_name' => 'ManagmentController',
            'hotel' => $hotel,
            'suites' => $suites,
            'reservationData' => $reservationsData
        ]);
    }

    #[Route('/managment/{id}-reservations', name: 'app_reservation_managment')]
    public function reservationsView(HotelsRepository $hotelsRepo, SuiteRepository $suiteRepo, ReservationRepository $reservationsRepo, int $id): Response
    {
        $suite = $suiteRepo->find($id);
        $user = $this->security->getUser();
        $hotel = $hotelsRepo->findOneByUser($user);
        $suites = $suiteRepo->getByHotel($hotel);
        $reservations = $reservationsRepo->getBySuites($suites);

        $reservationsData = [];

        foreach ($reservations as $reservation) {
            $reservationsData[] = [
                'suiteName' => $reservation->getSuite()->getName(),
                'creationDate' => $reservation->getCreationDate(),
                'startDate' => $reservation->getStartDate(),
                'endDate' => $reservation->getEndDate(),
                'userEmail' => $reservation->getUser()->getEmail()
            ];
        }

        return $this->render('managment/reservation_managment.html.twig', [
            'controller_name' => 'ManagmentController',
            'suite' => $suite,
            'reservationData' => $reservationsData,
        ]);
    }
}
