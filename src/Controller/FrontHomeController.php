<?php

namespace App\Controller;

use Symfony\Component\Intl\Locales;
use App\Repository\SeanceRepository;
use Symfony\Component\Intl\Languages;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontHomeController extends AbstractController
{
    #[Route('/', name: 'app_front')]
    #[Route('/home', name: 'app_front_home')]
    public function index(SeanceRepository $seanceRepository): Response
    {
        $nextEvent = $seanceRepository->findNextEvent(new \DateTime());
            
        $currentDate = new \DateTime();
        $locale = 'fr_FR'; // set the locale to French
        $dateFormat = 'cccc d MMMM'; // set the desired date format in French
    
        $formatter = new \IntlDateFormatter($locale, \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
        $formatter->setPattern($dateFormat);

    
        return $this->render('front_home/index.html.twig', [
            'controller_name' => 'FrontHomeController',
            'next_event_title' => $nextEvent ? $nextEvent->getFilm()->getTitre() : null,
            'next_event_start' => $nextEvent ? $nextEvent->getStart()->format('H:i') : null,
            'current_date' => $formatter->format($currentDate->getTimestamp()), // use the IntlDateFormatter to format the date
            'locale' => $locale,
            'language' => Languages::getName($locale),
            'country' => Locales::getName($locale),

        ]);
    }
}
