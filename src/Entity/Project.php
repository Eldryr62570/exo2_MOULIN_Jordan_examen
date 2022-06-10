<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectRepository;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_project;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_image;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $description_projet;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="projects")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_github;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_projet;

    public function __construct()
    {
        $now = new DateTime('now');
        $this->created_at = $now;


    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProject(): ?string
    {
        return $this->name_project;
    }

    public function setNameProject(string $name_project): self
    {
        $this->name_project = $name_project;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): self
    {
        $this->url_image = $url_image;

        return $this;
    }

    public function getDescriptionProjet(): ?string
    {
        return $this->description_projet;
    }

    public function setDescriptionProjet(string $description_projet): self
    {
        $this->description_projet = $description_projet;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getLienGithub(): ?string
    {
        return $this->lien_github;
    }

    public function setLienGithub(string $lien_github): self
    {
        $this->lien_github = $lien_github;

        return $this;
    }

    public function getLienProjet(): ?string
    {
        return $this->lien_projet;
    }

    public function setLienProjet(string $lien_projet): self
    {
        $this->lien_projet = $lien_projet;

        return $this;
    }
}
