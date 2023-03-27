<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontLoggingController extends AbstractController
{
    #[Route('/front/logging', name: 'app_front_logging')]
    public function index(): Response
    {
        return $this->render('front_logging/index.html.twig', [
            'controller_name' => 'FrontLoggingController',
        ]);
    }
}
