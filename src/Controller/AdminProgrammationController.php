<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProgrammationController extends AbstractController
{
    #[Route('/admin/programmation', name: 'app_admin_programmation')]
    public function index(): Response
    {
        return $this->render('admin_programmation/index.html.twig', [
            'controller_name' => 'AdminProgrammationController',
        ]);
    }
}
