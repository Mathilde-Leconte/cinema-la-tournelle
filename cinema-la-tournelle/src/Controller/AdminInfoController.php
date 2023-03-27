<?php

namespace App\Controller;

use App\Entity\Info;
use App\Form\InfoType;
use App\Repository\InfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/info')]
class AdminInfoController extends AbstractController
{
    #[Route('/', name: 'app_admin_info_index', methods: ['GET'])]
    public function index(InfoRepository $infoRepository): Response
    {
        return $this->render('admin_info/index.html.twig', [
            'infos' => $infoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_info_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InfoRepository $infoRepository): Response
    {
        $info = new Info();
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $infoRepository->save($info, true);

            return $this->redirectToRoute('app_admin_info_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_info/new.html.twig', [
            'info' => $info,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_info_show', methods: ['GET'])]
    public function show(Info $info): Response
    {
        return $this->render('admin_info/show.html.twig', [
            'info' => $info,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_info_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Info $info, InfoRepository $infoRepository): Response
    {
        $form = $this->createForm(InfoType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $infoRepository->save($info, true);

            return $this->redirectToRoute('app_admin_info_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_info/edit.html.twig', [
            'info' => $info,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_info_delete', methods: ['POST'])]
    public function delete(Request $request, Info $info, InfoRepository $infoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$info->getId(), $request->request->get('_token'))) {
            $infoRepository->remove($info, true);
        }

        return $this->redirectToRoute('app_admin_info_index', [], Response::HTTP_SEE_OTHER);
    }
}
