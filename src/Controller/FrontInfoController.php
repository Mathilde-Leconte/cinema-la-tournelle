<?php

namespace App\Controller;

use App\Repository\ContenuFrontInfoRepository;
use App\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontInfoController extends AbstractController
{
    #[Route('/front/info', name: 'app_front_info')]
    public function index(ContenuFrontInfoRepository $contenuRepository, TarifRepository $tarifs): Response
    {
        return $this->render('front_info/index.html.twig', [
            'contenus' => $contenuRepository ->findAll(),
            'tarifs'   => $tarifs ->findAll(),
        ]);
    }
}
