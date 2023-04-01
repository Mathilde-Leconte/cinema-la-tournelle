<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PdfController extends AbstractController
{
    #[Route('/pdf', name: 'app_pdf')]
    public function download()
    {
        $pdfPath = $this->getParameter('kernel.project_dir') . '/public/pdf/';
        $pdfFiles = scandir($pdfPath, SCANDIR_SORT_ASCENDING);
        $pdfFilename = null;
        foreach ($pdfFiles as $pdfFile) {
            if (is_file($pdfPath . $pdfFile) && pathinfo($pdfFile, PATHINFO_EXTENSION) === 'pdf') {
                $pdfFilename = $pdfFile;
                break;
            }
        }
        if ($pdfFilename !== null) {
            return $this->file($pdfPath . $pdfFilename, $pdfFilename);
        } else {
            // Handle case where no PDF file was found
            // For example, redirect to a page with an error message
        }
    }

    #[Route('/pdf/upload', name: 'app_pdf_upload')]
    public function upload(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('pdf_file', FileType::class, [
                'label' => 'PDF File',
                'required' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Upload',
            ])
            ->getForm();
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $pdfFile = $form->get('pdf_file')->getData();
    
            // Get the file name and extension
            $fileName = pathinfo($pdfFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $pdfFile->getClientOriginalExtension();
    
            // Generate a unique name for the file
            $newFileName = $fileName . '-' . uniqid() . '.' . $extension;
    
            // Move the file to the public/pdf directory
            $pdfFile->move(
                $this->getParameter('pdf_directory'),
                $newFileName
            );
    
            $this->addFlash('success', 'PDF file uploaded successfully.');
    
            return $this->redirectToRoute('app_pdf');
        }
    
        return $this->render('admin_pdf/upload.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
