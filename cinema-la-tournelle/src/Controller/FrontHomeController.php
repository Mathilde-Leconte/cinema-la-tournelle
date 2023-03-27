<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use App\Repository\FilmRepository;
use App\Repository\InfoRepository;
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
    public function index(SeanceRepository $seanceRepository, LoggerInterface $logger, FilmRepository $filmRepository, InfoRepository $infoRepository): Response
    {
        $nextEvent = $seanceRepository->findNextEvent(new \DateTime());
        $currentDate = new \DateTime();
        $locale = 'fr_FR'; // set the locale to French
        $dateFormat = 'cccc d MMMM'; // set the desired date format in French
    
        $formatter = new \IntlDateFormatter($locale, \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
        $formatter->setPattern($dateFormat);

        $endDate = new \DateTime();
        $endDate = $endDate->modify('+6 day');

        // $logger->info($currentDate->format('Y-m-d H:i:s'));
        // $logger->info($endDate->format('Y-m-d H:i:s'));

        $filmSemaines = $seanceRepository->findByDateRange($currentDate, $endDate, $logger);
        $listeFilm = array();

        foreach($filmSemaines as $seance){
            $listeFilm[]=$seance->getFilm()->getTitre();
            
        }
        $listeFilm=array_unique($listeFilm);

        $films = $filmRepository->findByTitre($listeFilm);
        foreach($films as $film){
            // $logger->info($film->getTitre());
        }

        $infos = $infoRepository->findAll();

    
        return $this->render('front_home/index.html.twig', [
            'controller_name'  => 'FrontHomeController',
            'next_event_title' => $nextEvent ? $nextEvent->getFilm()->getTitre() : null,
            'next_event_start' => $nextEvent ? $nextEvent->getStart()->format('H:i') : null,
            'current_date'     => $formatter->format($currentDate->getTimestamp()), // use the IntlDateFormatter to format the date
            'locale'           => $locale,
            'language'         => Languages::getName($locale),
            'country'          => Locales::getName($locale),
            'films'            => $films,
            'infos'            => $infos
            ]);
    }
}
