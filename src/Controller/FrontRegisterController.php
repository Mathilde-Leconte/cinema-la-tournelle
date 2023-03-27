<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontRegisterController extends AbstractController
{
    #[Route('/front/register', name: 'app_front_register')]
    public function index(): Response
    {
        return $this->render('front_register/index.html.twig', [
            'controller_name' => 'FrontRegisterController',
        ]);
    }
}
