<?php

namespace App\DataFixtures;

use App\Entity\Seance;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class SeanceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-22 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-22 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-22 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-22 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-22 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-22 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-22 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-22 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-23 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-23 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-23 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-23 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-23 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-23 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-23 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-23 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-24 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-24 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-24 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-24 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-24 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-24 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-24 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-24 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-25 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-25 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-25 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-25 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-25 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-25 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-25 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-25 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-26 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-26 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-26 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-26 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-26 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-26 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-26 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-26 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-27 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-27 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-27 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-27 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-27 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-27 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-27 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-27 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);
       
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
        ];
    }
}
