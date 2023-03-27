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
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-28 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-28 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-28 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-28 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-28 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-28 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-28 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-28 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-29 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-29 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-29 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-29 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-29 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-29 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-29 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-29 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-30 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-30 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-30 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-30 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-30 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-30 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-30 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-30 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-31 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-31 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-31 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-31 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-31 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-31 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-31 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-31 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-01 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-01 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-01 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-01 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-01 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-01 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-02 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-02 11:34:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::RABBIT));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-02 14:30:00'));
        $seance -> setEnd(new DateTime('2023-03-02 15:24:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::GOSSES));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::TETINE));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);
        
        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-02 16:00:00'));
        $seance -> setEnd(new DateTime('2023-03-02 17:03:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::INDIANA));
        $seance -> setVoSeance(true);
        $seance -> setVostSeance(false);
        $seance -> setDeuxDseance(true);
        $seance -> setTroisDseance(false);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::B));
        $seance -> setEvenement($this->getReference(EvenementFixtures::FEMME));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-02 17:15:00'));
        $seance -> setEnd(new DateTime('2023-03-02 18:20:00'));
        $seance -> setFilm($this->getReference(FilmFixtures::CINQUIEME_ELEMENT));
        $seance -> setVoSeance(false);
        $seance -> setVostSeance(true);
        $seance -> setDeuxDseance(false);
        $seance -> setTroisDseance(true);
        $seance -> setTypeDeSeance($this->getReference(TypeFixtures::PEUR));
        $seance -> setEvenement($this->getReference(EvenementFixtures::GOUTER));
        $manager->persist($seance);

        $seance = new Seance();
        $seance -> setStart(new DateTime('2023-03-03 09:00:00'));
        $seance -> setEnd(new DateTime('2023-03-03 11:34:00'));
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
