<?php

namespace App\Controller;

use App\Entity\Seance;
use App\Form\SeanceType;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/seance')]
class AdminSeanceController extends AbstractController
{
    #[Route('/', name: 'app_admin_seance_index', methods: ['GET'])]
    public function index(SeanceRepository $seanceRepository): Response
    {
        return $this->render('admin_seance/index.html.twig', [
            'seances' => $seanceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_seance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SeanceRepository $seanceRepository): Response
    {
        $seance = new Seance();
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $seance->updateEnd();
        //     $seanceRepository->save($seance, true);
            

        // // Redirect to the calendar page
        // return $this->redirectToRoute('app_calendar_index');
        // }

        return $this->renderForm('admin_seance/new.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_seance_show', methods: ['GET'])]
    public function show(Seance $seance): Response
    {
        return $this->render('admin_seance/show.html.twig', [
            'seance' => $seance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_seance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Seance $seance, SeanceRepository $seanceRepository): Response
    {
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seanceRepository->save($seance, true);

            return $this->redirectToRoute('app_admin_seance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_seance/edit.html.twig', [
            'seance' => $seance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_seance_delete', methods: ['POST'])]
    public function delete(Request $request, Seance $seance, SeanceRepository $seanceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $seance->getId(), $request->request->get('_token'))) {
            $seanceRepository->remove($seance, true);
        }

        return $this->redirectToRoute('app_admin_seance_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/add-from-calendar', name: 'app_admin_seance_add_from_calendar', methods: ['GET', 'POST'])]
    public function addFromCalendar(Request $request, SeanceRepository $seanceRepository): Response
    {
        $seance = new Seance();
        $form = $this->createForm(SeanceType::class, $seance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seance->updateEnd();
            $seanceRepository->save($seance, true);

            return $this->redirectToRoute('app_admin_programmation', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_seance/_form.html.twig', [
            'seance' => $seance,
            'form' => $form->createView(),
        ]);
    }
}
