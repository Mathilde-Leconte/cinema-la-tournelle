<?php

namespace App\Controller;

use App\Entity\ContenuFrontInfo;
use App\Form\ContenuFrontInfoType;
use App\Repository\ContenuFrontInfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/contenu')]
class AdminContenuController extends AbstractController
{
    #[Route('/', name: 'app_admin_contenu_index', methods: ['GET'])]
    public function index(ContenuFrontInfoRepository $contenuFrontInfoRepository): Response
    {
        
        return $this->render('admin_contenu/index.html.twig', [
            'contenu_front_infos' => $contenuFrontInfoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_contenu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContenuFrontInfoRepository $contenuFrontInfoRepository): Response
    {
        $contenuFrontInfo = new ContenuFrontInfo();
        $form = $this->createForm(ContenuFrontInfoType::class, $contenuFrontInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contenuFrontInfoRepository->save($contenuFrontInfo, true);

            return $this->redirectToRoute('app_admin_contenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contenu/new.html.twig', [
            'contenu_front_info' => $contenuFrontInfo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_contenu_show', methods: ['GET'])]
    public function show(ContenuFrontInfo $contenuFrontInfo): Response
    {
        return $this->render('admin_contenu/show.html.twig', [
            'contenu_front_info' => $contenuFrontInfo,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_admin_contenu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContenuFrontInfo $contenuFrontInfo, ContenuFrontInfoRepository $contenuFrontInfoRepository): Response
    {
        $form = $this->createForm(ContenuFrontInfoType::class, $contenuFrontInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contenuFrontInfoRepository->save($contenuFrontInfo, true);

            return $this->redirectToRoute('app_admin_contenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contenu/edit.html.twig', [
            'contenu_front_info' => $contenuFrontInfo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_contenu_delete', methods: ['POST'])]
    public function delete(Request $request, ContenuFrontInfo $contenuFrontInfo, ContenuFrontInfoRepository $contenuFrontInfoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contenuFrontInfo->getId(), $request->request->get('_token'))) {
            $contenuFrontInfoRepository->remove($contenuFrontInfo, true);
        }

        return $this->redirectToRoute('app_admin_contenu_index', [], Response::HTTP_SEE_OTHER);
    }
    
}
