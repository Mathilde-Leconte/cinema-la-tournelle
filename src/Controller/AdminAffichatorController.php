<?php

namespace App\Controller;

use App\Repository\SeanceRepository;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAffichatorController extends AbstractController
{
    #[Route('/admin/affichator', name: 'app_admin_affichator')]
    public function index(): Response
    {
        return $this->render('admin_affichator/index.html.twig', [
            'controller_name' => 'AdminAffichatorController',
        ]);
    }

    #[Route('/admin/affichator/generate', name: 'app_admin_affichator_generate', methods: ['POST'])]
    public function generate(Request $request, SeanceRepository $seanceRepository): Response
    {
        // Get the start and end dates from the request
        $startDate = new \DateTime($request->request->get('start'));
        $endDate = new \DateTime($request->request->get('end'));
        // var_dump($endDate);
        
        // Query the events between the two dates
        $events = $seanceRepository->findByDateRange($startDate, $endDate);
    
        // Create a new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Events between '.$startDate->format('Y-m-d').' and '.$endDate->format('Y-m-d'));
        $section->addTextBreak();
    
        // Add the events to the Word document
        foreach ($events as $event) {
            // Get the content of data and add it to the Word document
            $content = $event->getData();
            $section->addText($content);
            $section->addTextBreak();
        }
    
        // Generate the Word document buffer
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $filename = 'events.docx';
        $response = new Response();
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');
        $writer->save('php://output');
        $response->send();
        return $response;
    }
    
}
