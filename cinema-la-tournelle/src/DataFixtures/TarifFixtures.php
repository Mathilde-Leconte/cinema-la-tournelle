<?php

namespace App\DataFixtures;

use App\Entity\Tarif;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TarifFixtures extends Fixture

{
public const PLEIN      = "Tarif plein";
public const REDUIT     = "Tarif réduit";
public const KINOKIDS   = "Tarif KK";
public const EVENEMENT  = "Tarif evenement";
public const GROUPE     = "Tarif groupe";
public const CARTE      = "Tarif carte";
public const MAJORATION = "Tarif majoration";
public const BANCAIRE   = "Tarif bancaire";

    public function load(ObjectManager $manager): void
    {
        $tarif = New Tarif();
        $tarif -> setNom("PLEIN");
        $tarif -> setPrix("6,20€");
        // $tarif -> setDescription('');
        $manager->persist($tarif);
        $this->addReference(self::PLEIN, $tarif);

        
        $tarif = New Tarif();
        $tarif -> setNom("RÉDUIT");
        $tarif -> setPrix("5€");
        $tarif -> setDescription('(sur présentation d’un justificatif) pour tous, les lundis et mercredis aux séances désignées sur le programme. Tarif réduit à toutes les séances pour les étudiants, pour les moins de 25 ans, apprentis, familles nombreuses, demandeurs d’emploi, bénéficiaires du RSA et les personnes handicapées.');
        $manager->persist($tarif);
        $this->addReference(self::REDUIT, $tarif);



        $tarif = New Tarif();
        $tarif -> setNom("KINO-KIDS");
        $tarif -> setPrix("4,20€");
        // $tarif -> setDescription('');
        $manager->persist($tarif);
        $this->addReference(self::KINOKIDS, $tarif);



        $tarif = New Tarif();
        $tarif -> setNom("ÉVÉNEMENT");
        $tarif -> setPrix("4,20€");
        // $tarif -> setDescription('');
        $manager->persist($tarif);
        $this->addReference(self::EVENEMENT, $tarif);


        $tarif = New Tarif();
        $tarif -> setNom("Carte 10 entrèes");
        $tarif -> setPrix("40");
        $tarif -> setDescription('Valable 1 an');
        $manager->persist($tarif);
        $this->addReference(self::CARTE, $tarif);



        $tarif = New Tarif();
        $tarif -> setNom("GROUPE");
        $tarif -> setPrix("3€");
        $tarif -> setDescription('sur réservation (collectivité, CE, associations, scolaire, accueils de loisirs, crèches).');
        $manager->persist($tarif);
        $this->addReference(self::GROUPE, $tarif);


        $tarif = New Tarif();
        $tarif -> setNom("Majoration appliqué aux film en 3D");
        $tarif -> setPrix("tarifs réduit + 1€, tarif plein + 2€");
        // $tarif -> setDescription();
        $manager->persist($tarif);
        $this->addReference(self::MAJORATION, $tarif);

        $tarif = New Tarif();
        $tarif -> setNom("Possibilité de régler par carte bancaire");
        $tarif -> setPrix("");
        // $tarif -> setDescription();
        $manager->persist($tarif);
        $this->addReference(self::BANCAIRE, $tarif);




        $manager->flush();
    }
}
