<?php

namespace App\Entity;

use App\Repository\AgenceServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenceServicesRepository::class)]
class AgenceServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Agences $agence = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Services $service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgence(): ?Agences
    {
        return $this->agence;
    }

    public function setAgence(?Agences $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getService(): ?Services
    {
        return $this->service;
    }

    public function setService(?Services $service): self
    {
        $this->service = $service;

        return $this;
    }
}
