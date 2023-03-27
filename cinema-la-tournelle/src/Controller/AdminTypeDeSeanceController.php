<?php

namespace App\Controller;

use App\Entity\TypeSeSeance;
use App\Form\TypeSeSeanceType;
use App\Repository\TypeSeSeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/type/de/seance')]
class AdminTypeDeSeanceController extends AbstractController
{
    #[Route('/', name: 'app_admin_type_de_seance_index', methods: ['GET'])]
    public function index(TypeSeSeanceRepository $typeSeSeanceRepository): Response
    {
        $typeSeSeances = $typeSeSeanceRepository->findAllWithTypeSeSeance();
        return $this->render('admin_type_de_seance/index.html.twig', [
            'type_se_seances' => $typeSeSeanceRepository->findAll(),
            'typeSeSeances' => $typeSeSeances
        ]);
    }

    #[Route('/new', name: 'app_admin_type_de_seance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeSeSeanceRepository $typeSeSeanceRepository): Response
    {
        $typeSeSeance = new TypeSeSeance();
        $form = $this->createForm(TypeSeSeanceType::class, $typeSeSeance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeSeSeanceRepository->save($typeSeSeance, true);

            return $this->redirectToRoute('app_admin_type_de_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_de_seance/new.html.twig', [
            'type_se_seance' => $typeSeSeance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_type_de_seance_show', methods: ['GET'])]
    public function show(TypeSeSeance $typeSeSeance): Response
    {
        return $this->render('admin_type_de_seance/show.html.twig', [
            'type_se_seance' => $typeSeSeance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_type_de_seance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeSeSeance $typeSeSeance, TypeSeSeanceRepository $typeSeSeanceRepository): Response
    {
        $form = $this->createForm(TypeSeSeanceType::class, $typeSeSeance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeSeSeanceRepository->save($typeSeSeance, true);

            return $this->redirectToRoute('app_admin_type_de_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_de_seance/edit.html.twig', [
            'type_se_seance' => $typeSeSeance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_type_de_seance_delete', methods: ['POST'])]
    public function delete(Request $request, TypeSeSeance $typeSeSeance, TypeSeSeanceRepository $typeSeSeanceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeSeSeance->getId(), $request->request->get('_token'))) {
            $typeSeSeanceRepository->remove($typeSeSeance, true);
        }

        return $this->redirectToRoute('app_admin_type_de_seance_index', [], Response::HTTP_SEE_OTHER);
    }
}
