<?php

namespace App\Controller;

use App\Repository\SeanceRepository;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class AdminAffichatorController extends AbstractController
{
    #[Route('/admin/affichator', name: 'app_admin_affichator')]
    public function index(): Response
    {
        return $this->render('admin_affichator/index.html.twig', [
            'controller_name' => 'AdminAffichatorController',
        ]);
    }

    #[Route('/affichator/generate', name: 'app_admin_affichator_generate', methods: ['POST'])]
    public function generate(Request $request, SeanceRepository $seanceRepository, LoggerInterface $logger): Response
    {
        // Get the start and end dates from the request
        $parameters = json_decode($request->getContent(), true);
        $startDate = new \DateTime($parameters['start']);
        $endDate = new \DateTime($parameters['end']);
        // $logger -> info($startDate->format('Y-m-d H:i:s'));
        // var_dump($endDate);
        
        // Query the events between the two dates
        $events = $seanceRepository->findByDateRange($startDate, $endDate, $logger);

        $logger -> info('titi');

        // Create a new Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $logger -> info('trtr');
        $section->addText('Events between '.$startDate->format('Y-m-d').' and '.$endDate->format('Y-m-d'));
        $section->addTextBreak();
    
        // Add the events to the Word document
        $logger -> info('tata');
        foreach ($events as $event) {
            // Get the content of data and add it to the Word document
            $logger -> info('toto');
            $logger -> info($event->getDisplay());
            $content = $event->getDisplay();
            
            $section->addText($content);
            $section->addTextBreak();
        }
    
        // Generate the Word document buffer
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $filename = 'events.docx';
        $response = new Response();
        $logger -> info('tutu');
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');
        $writer->save('php://output');
        $response->send();
        return $response;
    }
    
}
