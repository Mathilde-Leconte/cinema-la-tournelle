<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EvenementFixtures extends Fixture
{
    public const GOUTER = "Ciné gouter";
    public const FEMME = "Journée droit des femmes";

    public function load(ObjectManager $manager): void
    {
        $evenement = new Evenement();
        $evenement -> setTitre("CINÈ-GOUTER");
        $evenement -> setDescription("Venez pâtisser avec nous avant le film, et déguster vos créations après avoir été émerveillés par les talents de Rémi le rat cuisinier !");
        $evenement -> setDuree(180);
        // $evenement -> setCollaboration("");
        $manager->persist($evenement);
        $this->addReference(self::GOUTER, $evenement);


        $evenement = new Evenement();
        $evenement -> setTitre("JOURNÉE DES DROITS DES FEMMES");
        $evenement -> setDescription("Les femmes sont invitées par la ville.");
        $evenement -> setDuree(270);
        // $evenement -> setCollaboration("");
        $manager->persist($evenement);
        $this->addReference(self::FEMME, $evenement);


        $manager->flush();
    }
}
