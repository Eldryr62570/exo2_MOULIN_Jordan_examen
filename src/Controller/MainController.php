<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Repository\ProjectRepository;
use App\Repository\DocumentRepository;
use App\Service\DocumentService;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main")
     */
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        return $this->render('main/index.html.twig',[
            "projects" => $projects
        ]);
    }
    /**
     * @Route("/map", name="map")
     */
    public function map(): Response
    {
        return $this->render('main/map.html.twig');
    }
    
    /**
     * @Route("/projets/document", name="document")
     */
    public function document(Request $request, DocumentService $documentService ) : Response{ 
        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $currentUser = $this->getUser();
            $document->setUser($currentUser);
            return $documentService->handleDocumentForm($form);
        }
        return $this->render('main/document.html.twig', [
            'documentForm' => $form->createView(),
        ]);
    }
}
