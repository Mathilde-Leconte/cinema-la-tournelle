<?php

namespace App\DataFixtures;

use App\Entity\TypeDeSeance;
use App\Entity\TypeSeSeance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $type = new TypeSeSeance();
        $type -> setNom("CINÉ DE PEUR");
        $type -> setPrive(true);
        $type -> setPublique(false);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::PLEIN));
        $manager->persist($type);

        $type = new TypeSeSeance();
        $type -> setNom("CINÉ DE Z");
        $type -> setPrive(true);
        $type -> setPublique(false);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::PLEIN));
        $manager->persist($type);
        
        $type = new TypeSeSeance();
        $type -> setNom("CINÉ TÉTINE");
        $type -> setPrive(FALSE);
        $type -> setPublique(TRUE);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::KINOKIDS));
        $manager->persist($type);

        $type = new TypeSeSeance();
        $type -> setNom("CINÉ DE B");
        $type -> setPrive(true);
        $type -> setPublique(false);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::EVENEMENT));
        $manager->persist($type);

        $manager->flush();
    }
}
