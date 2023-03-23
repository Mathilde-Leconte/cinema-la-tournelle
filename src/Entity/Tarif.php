<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\ManyToMany(targetEntity: TypeSeSeance::class, inversedBy: 'tarifs')]
    private Collection $types;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    private ?InformationPage $informationPage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

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
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, TypeSeSeance>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(TypeSeSeance $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(TypeSeSeance $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    public function getInformationPage(): ?InformationPage
    {
        return $this->informationPage;
    }

    public function setInformationPage(?InformationPage $informationPage): self
    {
        $this->informationPage = $informationPage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
