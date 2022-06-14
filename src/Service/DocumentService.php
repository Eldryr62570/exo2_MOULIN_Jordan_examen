<?php 

namespace App\Service;

use App\Entity\Document;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class DocumentService
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
       $this->em = $em;
    }
    public function handleDocumentForm(FormInterface $documentForm){
        if($documentForm->isValid()){
            return $this->handleValidForm($documentForm);
        }else{
            return $this->handleInvalidForm($documentForm);
        }
    }

    public function handleValidForm(FormInterface $documentForm) : JsonResponse{
        $document = $documentForm->getData();   
        $this->em->persist($document);
        $this->em->flush();
        return new JsonResponse([
            'code' => Document::DOCUMENT_ADDED_SUCCESSFULLY,
            'html' => ''
        ]);
    }
    public function handleInvalidForm(FormInterface $documentForm): JsonResponse{
        return new JsonResponse([
            'code' => Document::DOCUMENT_INVALID_FORM
        ]);
    }
}