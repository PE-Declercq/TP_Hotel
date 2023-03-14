<?php

namespace App\Controller;

use App\Entity\Suite;
use App\Form\CreateSuiteType;
use App\Form\UpdateReservationType;
use App\Form\UpdateSuiteType;
use App\Repository\HotelsRepository;
use App\Repository\ReservationRepository;
use App\Repository\SuiteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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
                'id' => $reservation->getId(),
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

    #[Route('/managment/{id}-reservation-update', name: 'app_reservation_update_managment')]
    public function renderUpdateReservation(Request $request, ReservationRepository $reservationRepo, ManagerRegistry $doctrine, int $id): Response
    {
        $reservation = $reservationRepo->find($id);

        $form = $this->createForm(UpdateReservationType::class, $reservation, [
            'reservation' => $reservation
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();

            $reservation->setStartDate($form->get('startDate')->getData());
            $reservation->setEndDate($form->get('endDate')->getData());
            $reservation->setUser($form->get('user')->getData());
            $reservation->setSuite($form->get('suite')->getData());

            $entityManager->flush();

            return $this->redirectToRoute('app_managment');
        }

        return $this->render('managment/update_reservation.html.twig', [
            'controller_name' => 'ManagmentController',
            'reservation' => $reservation,
            'form' => $form->createView()
        ]);
    }

    #[Route('/managment/{id}-suite', name: 'app_suite_managment')]
    public function renderSuiteUpdateForm(Request $request, SuiteRepository $suiteRepo, ManagerRegistry $doctrine, int $id): Response
    {
        $suite = $suiteRepo->find($id);

        $form = $this->createForm(UpdateSuiteType::class, $suite, [
            'suite' => $suite
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();

            $suite->setName($form->get('name')->getData());
            $suite->setImg($form->get('img')->getData());
            $suite->setDescription($form->get('description')->getData());
            $suite->setPrice($form->get('price')->getData());
            $suite->setAvailable($form->get('available')->getData());
            $suite->setHotel($form->get('hotel')->getData());

            $entityManager->flush();

            return $this->redirectToRoute('app_managment');
        }

        return $this->render('managment/update_suite.html.twig', [
            'controller_name' => 'ManagmentController',
            'suite' => $suite,
            'form' => $form->createView()
        ]);
    }

    #[Route('/managment/suite/create', name: 'app_create_suite_managment')]
    public function renderSuiteCreateForm(Request $request, ManagerRegistry $doctrine): Response
    {
        $suite = new Suite();

        $form = $this->createForm(CreateSuiteType::class, $suite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();


            $entityManager->persist($suite);
            $entityManager->flush();

            return $this->redirectToRoute('app_managment');
        }

        return $this->render('managment/create_suite.html.twig', [
            'controller_name' => 'ManagmentController',
            'suite' => $suite,
            'form' => $form->createView()
        ]);
    }
}
