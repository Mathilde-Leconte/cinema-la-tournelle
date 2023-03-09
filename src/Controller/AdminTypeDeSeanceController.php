<?php

namespace App\Controller;

use App\Entity\TypeDeSeance;
use App\Form\TypeDeSeanceType;
use App\Repository\TarifRepository;
use App\Repository\TypeDeSeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/type/de/seance')]
class AdminTypeDeSeanceController extends AbstractController
{
    #[Route('/', name: 'app_admin_type_de_seance_index', methods: ['GET'])]
    public function index(TypeDeSeanceRepository $typeDeSeanceRepository, TarifRepository $tarifRepository): Response
    {
        $tarifs = $tarifRepository->findByTypeID("findByTypeID");

        return $this->render('admin_type_de_seance/index.html.twig', [
            'type_de_seances' => $typeDeSeanceRepository->findAll(),
            'tarifs'          => $tarifs
        ]);
    }

    #[Route('/new', name: 'app_admin_type_de_seance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeDeSeanceRepository $typeDeSeanceRepository): Response
    {
        $typeDeSeance = new TypeDeSeance();
        $form = $this->createForm(TypeDeSeanceType::class, $typeDeSeance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeDeSeanceRepository->save($typeDeSeance, true);

            return $this->redirectToRoute('app_admin_type_de_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_de_seance/new.html.twig', [
            'type_de_seance' => $typeDeSeance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_type_de_seance_show', methods: ['GET'])]
    public function show(TypeDeSeance $typeDeSeance): Response
    {
        return $this->render('admin_type_de_seance/show.html.twig', [
            'type_de_seance' => $typeDeSeance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_type_de_seance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeDeSeance $typeDeSeance, TypeDeSeanceRepository $typeDeSeanceRepository): Response
    {
        $form = $this->createForm(TypeDeSeanceType::class, $typeDeSeance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeDeSeanceRepository->save($typeDeSeance, true);

            return $this->redirectToRoute('app_admin_type_de_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_de_seance/edit.html.twig', [
            'type_de_seance' => $typeDeSeance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_type_de_seance_delete', methods: ['POST'])]
    public function delete(Request $request, TypeDeSeance $typeDeSeance, TypeDeSeanceRepository $typeDeSeanceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDeSeance->getId(), $request->request->get('_token'))) {
            $typeDeSeanceRepository->remove($typeDeSeance, true);
        }

        return $this->redirectToRoute('app_admin_type_de_seance_index', [], Response::HTTP_SEE_OTHER);
    }


}
