<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    // ~~~~~~~~~~~~~~ PROPRIETES ~~~~~~~~~~~~~ //
    private $encoder;

    // ~~~~~~~~~~~~~ CONSTRUCTEUR ~~~~~~~~~~~~ //
    public function __construct(UserPasswordHasherInterface $encoder){
        $this->encoder = $encoder;
    }


    // ~~~~~~~~~~~~~~~ METHODES ~~~~~~~~~~~~~~ //
    public function load(ObjectManager $manager): void
    {
        
        $user = new User();
        $user -> setEmail("admin0@gmail.com");
        $user -> setNom("Paul");
        $encoderPassword = $this->encoder->hashPassword($user, "password");
        $user -> setPassword($encoderPassword);
        $user -> setIsVerified(true);
        $user -> setRoles(["ROLE_USER", "ROLE_ADMIN"]);

        $manager->persist($user);
        
        $user = new User();
        $user -> setEmail("worker0@gmail.com");
        $user -> setNom("Ivan");
        $encoderPassword = $this->encoder->hashPassword($user, "password");
        $user -> setPassword($encoderPassword);
        $user -> setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $user -> setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $user -> setEmail("worker1@gmail.com");
        $user -> setNom("Steeve");
        $encoderPassword = $this->encoder->hashPassword($user, "password");
        $user -> setPassword($encoderPassword);
        $user -> setRoles(["ROLE_USER"]);
        $user -> setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $user -> setEmail("user1@gmail.com");
        $user -> setNom("Paul");
        $encoderPassword = $this->encoder->hashPassword($user, "password");
        $user -> setPassword($encoderPassword);
        $user -> setRoles(["ROLE_USER"]);    
        $user -> setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $user -> setEmail("user2@gmail.com");
        $user -> setNom("Jacques");
        $encoderPassword = $this->encoder->hashPassword($user, "password");
        $user -> setPassword($encoderPassword);
        $user -> setRoles(["ROLE_USER"]);
        $manager->persist($user);

        $user = new User();
        $user -> setEmail("user3@gmail.com");
        $user -> setNom("Mallow");
        $encoderPassword = $this->encoder->hashPassword($user, "password");
        $user -> setPassword($encoderPassword);
        $user -> setRoles(["ROLE_USER"]);
        $user -> setIsVerified(true);
        $manager->persist($user);


        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}
