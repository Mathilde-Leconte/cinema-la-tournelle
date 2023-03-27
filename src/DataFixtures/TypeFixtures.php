<?php

namespace App\DataFixtures;

use App\Entity\TypeSeSeance;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TypeFixtures extends Fixture implements DependentFixtureInterface
{
    public const PEUR  = "Ciné de peur";
    public const Z  = "Ciné de Z";
    public const TETINE  = "Ciné TÉTINE";
    public const B  = "Ciné de B";

    public function load(ObjectManager $manager): void
    {
        $type = new TypeSeSeance();
        $type -> setNom("CINÉ DE PEUR");
        $type -> setPrive(true);
        $type -> setPublique(false);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::PLEIN));
        $manager->persist($type);
        $this->addReference(self::PEUR, $type);


        $type = new TypeSeSeance();
        $type -> setNom("CINÉ DE Z");
        $type -> setPrive(true);
        $type -> setPublique(false);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::PLEIN));
        $manager->persist($type);
        $this->addReference(self::Z, $type);

        
        $type = new TypeSeSeance();
        $type -> setNom("CINÉ TÉTINE");
        $type -> setPrive(FALSE);
        $type -> setPublique(TRUE);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::KINOKIDS));
        $manager->persist($type);
        $this->addReference(self::TETINE, $type);


        $type = new TypeSeSeance();
        $type -> setNom("CINÉ DE B");
        $type -> setPrive(true);
        $type -> setPublique(false);
        $type -> setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora harum sapiente distinctio obcaecati quisquam cum culpa odio fuga vitae assumenda tenetur, numquam quos praesentium perspiciatis eveniet minima nulla expedita ratione!");
        $type -> addTarif($this->getReference(TarifFixtures::EVENEMENT));
        $manager->persist($type);
        $this->addReference(self::B, $type);


        $manager->flush();

        
    }

    public function getDependencies()
    {
        return [
            TarifFixtures::class,
        ];
    }

}
