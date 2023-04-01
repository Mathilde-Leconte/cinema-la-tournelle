<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\InfoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_admin_profil')]
    public function index(InfoRepository $infoRepository, Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('plainPassword')->getData()) {
                $encodedPassword = $userPasswordHasherInterface->hashPassword($user, $form->get('plainPassword')->getData());
                $user->setPassword($encodedPassword);
            }

            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Votre profil a bien été mis à jour.');
            return $this->redirectToRoute('app_admin_profil');
        }
        return $this->render('admin_profil/index.html.twig', [
            'controller_name' => 'AdminProfilController',
            'infos' => $infoRepository->findAll(),
            'form' => $form->createView(),

        ]);
    }
}
