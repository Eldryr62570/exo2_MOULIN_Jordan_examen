<?php

namespace App\Controller\Project;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name_project')->setLabel("Nom du projet"),
            TextareaField::new('description_projet')->setLabel("Description du projet"),
            TextField::new('lien_github')->setLabel("Lien du github"),
            TextField::new('lien_projet')->setLabel("Lien du projet"),
            ImageField::new('url_image')->setUploadedFileNamePattern('/build/uploads/[contenthash].[extension]')->setUploadDir('public/build/uploads')->setLabel('Image'),
            DateField::new('createdAt')->hideOnForm()->setLabel("Date de création"),
        ];
    }
    
}
