<?php

namespace App\Controller;

use App\Entity\Seance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class AdminFullCalendarController extends AbstractController
{
    #[Route('/admin/full/calendar', name: 'app_admin_full_calendar')]
    public function index(): Response
    {
        return $this->render('admin_full_calendar/index.html.twig', [
            'controller_name' => 'AdminFullCalendarController',
        ]);
    }
    #[Route('/admin/full/calendar/{id}/edit', name: 'app_admin_full_calendar_event_edit', methods: ['PUT'])]
    public function updateEvent(Request $request, EntityManagerInterface $em, int $id, LoggerInterface $logger): Response
    {

        // Get the new start and end times from the request data
        // $logger -> info('tata');

        $parameters = json_decode($request->getContent(), true);
        $start = new \DateTime($parameters['start']);
        // $logger -> info ($parameters['start']);
        // $startString = $start->format('Y-m-d H:i:s');
        $end = new \DateTime($parameters['end']);
        // $endString = $end->format('Y-m-d H:i:s');

        // $logger -> info($startString);
        // $logger -> info($endString);
        // $logger -> info("{end}");

        // Get the seance from the database
        $seance = $em->getRepository(Seance::class)->find($id);
        // $idString = (string)$id;

        // Check if the seance exists
        $start0String = $seance->getStart()->format('Y-m-d H:i:s');
        $end0String = $seance->getEnd()->format('Y-m-d H:i:s');

        // $logger -> info('toto');
        // $logger -> info($start0String);
        // $logger -> info($end0String);
        if (!$seance) {

            return new Response('Seance not found', 404);
        }
    
        // Update the seance with the new start and end times
        $seance->setStart($start);

        $seance->setEnd($end);

        // Save the changes to the database
        $em->flush();
        // $em->persist();

        // Return a response to indicate that the update was successful
        return new Response('Seance updated successfully!');
    }
    
    
}

