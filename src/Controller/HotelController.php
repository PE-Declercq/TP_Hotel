<?php

namespace App\Controller;

use App\Entity\Hotels;
use App\Entity\Reservation;
use App\Entity\Suite;
use App\Form\ReservationType;
use App\Repository\HotelsRepository;
use App\Repository\ReservationRepository;
use App\Repository\SuiteRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class HotelController extends AbstractController
{
    private $security;
    private $authorizationChecker;

    public function __construct(Security $security, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->security = $security;
        $this->authorizationChecker = $authorizationChecker;
    }

    #[Route('/hotel/{id}-{slug}', name: 'app_hotel')]
    public function index(Hotels $hotel, HotelsRepository $hotelsRepo,SuiteRepository $suitesRepo, int $id): Response
    {
        if (!$hotel) {
            return $this->redirectToRoute('app_home');
        }

        $hotels = $hotelsRepo->find($id);
        $suites = $suitesRepo->findBy(['hotel' => $hotels]);        

        return $this->render('hotel/index.html.twig', [
            'controller_name' => 'HôtelController',
            'suites' => $suites
        ]);
    }

    #[Route('/hotel/reservation/{id}', name: 'app_hotel_reservation')]
    public function renderReservationForm(Request $request, SuiteRepository $suiteRepo, ManagerRegistry $doctrine, int $id):Response
    {
        $user = $this->security->getUser();
        $suite = $suiteRepo->find($id);
        $reservation = new Reservation();
        $reservation->setCreationDate(new DateTime());
        $reservation->setSuite($suite);
        $reservation->setUser($user);
        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $reservation = $form->getData();

            if (!$this->isDateAvailable($suite, $reservation)) {
                $errorMessage = "Les dates sélectionnées ne sont pas disponibles.";
                return $this->render("reservation/reservation.html.twig", [
                    "form" => $form->createView(),
                    "errorMessage" => $errorMessage,
                    "suite" => $suite,
                ]);
            } else {
                $entityManager->persist($reservation);
                $entityManager->flush();

                return $this->redirectToRoute('app_reservation_success', ['id' => $reservation->getId()]);
            }
        }

        return $this->render('reservation/reservation.html.twig', [
            'controller_name' => 'HôtelController',
            'suite' => $suite,
            'form' => $form->createView()
        ]);
    }

    private function isDateAvailable(Suite $suite, Reservation $reservation): bool
    {
        $start = $reservation->getStartDate();
        $end = $reservation->getEndDate();

        foreach ($suite->getReservations() as $existingReservation) {
            if (($start < $existingReservation->getEndDate()) && ($end > $existingReservation->getStartDate())) {
                return false;
            }
        }

        return true;
    }

    #[Route('/hotel/recapitulatif/{id}', name: 'app_reservation_success')]
    public function reservationSuccess(ReservationRepository $reservationRepo, int $id): Response
    {
        $reservation = $reservationRepo->find($id);

        $reservation->getSuite()->getName();
        $reservation->getCreationDate();
        $reservation->getStartDate();
        $reservation->getEndDate();

        return $this->render('/reservation/success.html.twig', [
            'controller_name' => 'HôtelController',
            'reservation' => $reservation
        ]);
    }
}