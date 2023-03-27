<?php

namespace App\Entity;

use App\Repository\InformationPageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;




#[ORM\Entity(repositoryClass: InformationPageRepository::class)]
class InformationPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $presentation = null;

    #[ORM\Column(length: 255)]
    private ?string $imagePresentation = null;

    #[ORM\Column(length: 255)]
    private ?string $TitreTarifs = null;

    #[ORM\OneToMany(mappedBy: 'informationPage', targetEntity: Tarif::class)]
    private Collection $tarifs;


    public function __construct()
    {
        $this->tarifs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getImagePresentation(): ?string
    {
        return $this->imagePresentation;
    }

    public function setImagePresentation(string $imagePresentation): self
    {
        $this->imagePresentation = $imagePresentation;

        return $this;
    }

    public function getTitreTarifs(): ?string
    {
        return $this->TitreTarifs;
    }

    public function setTitreTarifs(string $TitreTarifs): self
    {
        $this->TitreTarifs = $TitreTarifs;

        return $this;
    }

    /**
     * @return Collection<int, Tarif>
     */
    public function getTarifs(): Collection
    {
        return $this->tarifs;
    }

    public function addTarif(Tarif $tarif): self
    {
        if (!$this->tarifs->contains($tarif)) {
            $this->tarifs->add($tarif);
            $tarif->setInformationPage($this);
        }

        return $this;
    }

    public function removeTarif(Tarif $tarif): self
    {
        if ($this->tarifs->removeElement($tarif)) {
            // set the owning side to null (unless already changed)
            if ($tarif->getInformationPage() === $this) {
                $tarif->setInformationPage(null);
            }
        }

        return $this;
    }
}
