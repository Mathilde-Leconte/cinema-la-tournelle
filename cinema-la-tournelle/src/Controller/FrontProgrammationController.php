<?php

namespace App\Controller;

use App\Repository\InfoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontProgrammationController extends AbstractController
{
    #[Route('/front/programmation', name: 'app_front_programmation')]
    public function index(InfoRepository $infoRepository): Response
    {
        $infos = $infoRepository->findAll();

        return $this->render('front_programmation/index.html.twig', [
            'infos'            => $infos
        ]);
    }
}
