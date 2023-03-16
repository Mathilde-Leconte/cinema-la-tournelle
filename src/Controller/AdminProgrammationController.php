<?php

namespace App\Controller;

use App\Repository\SeanceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminProgrammationController extends AbstractController
{
    #[Route('/admin/programmation', name: 'app_admin_programmation')]
    public function index(): Response
    {
        return $this->render('admin_programmation/index.html.twig', [
            'controller_name' => 'AdminProgrammationController',
        ]);
    }

    #[Route('/admin/programmation/json', name: 'app_admin_programmation_json')]
    public function getEventsAsjson(SeanceRepository $seance): JsonResponse
    {
        $events = $seance->findAll();

        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id' => $event->getId(),
                'title' => $event->getFilm()->getTitre(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'allDay' => false, // Set to true if the event is an all-day event
                // Add any other event properties that you want to display
            ];
        }

        return new JsonResponse($data);
    }
}
