<?php

namespace App\DataFixtures;

use App\Entity\Seance;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SeanceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-20 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-20 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        // $seance -> setTypeDeSeance();
        // $seance -> setEvenement();
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-20 17:00:00'));
        $seance -> setEnd(new DateTime('2023-03-20 19:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        // $seance -> setTypeDeSeance();
        // $seance -> setEvenement();
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-21 14:00:00'));
        $seance -> setEnd(new DateTime('2023-03-21 16:05:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        // $seance -> setTypeDeSeance();
        // $seance -> setEvenement();
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-21 18:00:00'));
        $seance -> setEnd(new DateTime('2023-03-21 19:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        // $seance -> setTypeDeSeance();
        // $seance -> setEvenement();
        $manager->persist($seance);

        $manager->flush();
    }
}
