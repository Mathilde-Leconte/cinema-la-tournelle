<?php

namespace App\DataFixtures;

use App\Entity\Info;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InfoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $info = new Info();
        $info -> setNom('La tournelle');
        $info -> setTelProgrammation(149085070);
        $info -> setTelAdmin(149085070);
        $info -> setInstagram('https://www.instagram.com/cinema.la.tournelle/');
        $info -> setFacebook('https://www.facebook.com/cineLaTournelle/?locale=fr_FR');
        $info -> setSite('https://www.lhaylesroses.fr/cinema');
        $info -> setNumero('14');
        $info -> setRue('Rue Dispan');
        $info -> setCodePostale('94240');
        $info -> setVille("L'Haÿ-les-Roses");

        $manager->persist($info);

        $manager->flush();
    }
}
