<?php

namespace App\Controller;

use App\Repository\InfoRepository;
use App\Repository\TarifRepository;
use App\Repository\ContenuFrontInfoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontInfoController extends AbstractController
{
    #[Route('/front/info', name: 'app_front_info')]
    public function index(ContenuFrontInfoRepository $contenuRepository, TarifRepository $tarifs, InfoRepository $infoRepository): Response
    {
        $infos = $infoRepository->findAll();

        return $this->render('front_info/index.html.twig', [
            'contenus' => $contenuRepository ->findAll(),
            'tarifs'   => $tarifs ->findAll(),
            'infos'            => $infos
        ]);
    }
}
