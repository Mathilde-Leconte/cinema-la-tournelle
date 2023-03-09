<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifRepository::class)]
class Tarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 10)]
    private ?string $Prix = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    private ?TypeDeSeance $typeDeSeance = null;

        // MAGIC FUNCTION
        public function __toString()
        {
            return $this->nom;
        }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(string $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getTypeDeSeance(): ?TypeDeSeance
    {
        return $this->typeDeSeance;
    }

    public function setTypeDeSeance(?TypeDeSeance $typeDeSeance): self
    {
        $this->typeDeSeance = $typeDeSeance;

        return $this;
    }

}
