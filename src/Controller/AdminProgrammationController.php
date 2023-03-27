<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Repository\SeanceRepository;
use Symfony\Component\HttpFoundation\Request;
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
    public function getEventsAsjson(Request $request, SeanceRepository $seance): JsonResponse
    {
        $startDate = new \DateTime($request->get('start'));
        $endDate = new \DateTime($request->get('end'));
        $events = $seance->findByDateRange($startDate, $endDate);
    
        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id'               => $event->getId(),
                'title'            => $event->getFilm()->getTitre(),
                'start'            => $event->getStart()->format('Y-m-d H:i:s'),
                'end'              => $event->getEnd()->format('Y-m-d H:i:s'),
                'realisation'      => $event->getFilm()->getRealisation(),
                'casting'          => $event->getFilm()->getCasting(),
                'pays'             => $event->getFilm()->getPays(),
                'duree'            => $event->getFilm()->getDuree(),
                'synopsis'         => $event->getFilm()->getSynopsis(),
                'recompenses'      => $event->getFilm()->getRecompense(),
                'is_vo_seance'     => $event->getFilm()->isVoFilm(true),
                'is_vost_seance'   => $event->getFilm()->isVostFilm(true),
                'is_deuxd_seance'  => $event->getFilm()->isDeuxDFilm(true),
                'is_troisd_seance' => $event->getFilm()->isTroisDFilm(true),                
            ];
        }
    
        return new JsonResponse($data);
    }
    
    #[Route('/admin/programmation/add-seance', name: 'app_admin_programmation_add_seance', methods: ['POST'])]
    public function addSeance(Request $request, SeanceRepository $seanceRepository): Response
    {
        $seance = new Seance();
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Call updateEnd method to set end time based on start time and film duration
            $seance->updateEnd();
            // Save the new Seance object to the database
            $seanceRepository->save($seance, true);

            // Return a success response
            return new JsonResponse(['status' => 'success', 'message' => 'La séance a été ajoutée avec succès.']);
        }

        // Return an error response if the form is not valid
        return new JsonResponse(['status' => 'error', 'message' => 'Le formulaire est invalide.']);
    }

    #[Route('/admin/programmation/next-event', name: 'app_admin_programmation_next_event')]
    public function getNextEvent(SeanceRepository $seanceRepository): JsonResponse
    {
        $now = new \DateTime();
        $nextEvent = $seanceRepository->findNextEvent($now);

        if (!$nextEvent) {
            return new JsonResponse(['status' => 'error', 'message' => 'No upcoming events found.']);
        }

        $data = [
            'title' => $nextEvent->getFilm()->getTitre(),
            'start' => $nextEvent->getStart()->format('Y-m-d H:i:s')
        ];

        return new JsonResponse($data);
    }


}
