<?php

namespace App\DataFixtures;

use App\Entity\Tarif;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TarifFixtures extends Fixture

{
public const PLEIN = "Tarif plein";
public const REDUIT = "Tarif réduit";
public const KINOKIDS = "Tarif KK";
public const EVENEMENT = "Tarif evenement";
public const GROUPE = "Tarif groupe";

    public function load(ObjectManager $manager): void
    {
        $tarif = New Tarif();
        $tarif -> setNom("PLEIN");
        $tarif -> setPrix("6,20€");
        $manager->persist($tarif);
        $this->addReference(self::PLEIN, $tarif);

        
        $tarif = New Tarif();
        $tarif -> setNom("RÉDUIT");
        $tarif -> setPrix("5€");
        $manager->persist($tarif);
        $this->addReference(self::REDUIT, $tarif);



        $tarif = New Tarif();
        $tarif -> setNom("KINO-KIDS");
        $tarif -> setPrix("4,20€");
        $manager->persist($tarif);
        $this->addReference(self::KINOKIDS, $tarif);



        $tarif = New Tarif();
        $tarif -> setNom("ÉVÉNEMENT");
        $tarif -> setPrix("4,20€");
        $manager->persist($tarif);
        $this->addReference(self::EVENEMENT, $tarif);



        $tarif = New Tarif();
        $tarif -> setNom("GROUPE");
        $tarif -> setPrix("3€");
        $manager->persist($tarif);
        $this->addReference(self::GROUPE, $tarif);




        $manager->flush();
    }
}
