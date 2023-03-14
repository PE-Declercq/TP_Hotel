<?php

namespace App\Controller;

use App\Repository\HotelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HotelsRepository $hotelsRepo): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'hotels' => $hotelsRepo->findAll()
        ]);
    }
}
