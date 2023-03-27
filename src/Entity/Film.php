<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $realisation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $casting = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $synopsis = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $recompense = null;

    #[ORM\Column(length: 255)]
    private ?string $distributeur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coutLocation = null;

    #[ORM\Column]
    private ?bool $voFilm = null;

    #[ORM\Column]
    private ?bool $vostFilm = null;

    #[ORM\Column]
    private ?bool $deuxDFilm = null;

    #[ORM\Column]
    private ?bool $troisDFilm = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column]
    private ?bool $aPartir = null;

    #[ORM\Column]
    private ?bool $interditAns = null;

    #[ORM\Column]
    private ?bool $aPartirMois = null;

    #[ORM\Column]
    private ?bool $isActive = null;

    #[ORM\OneToMany(mappedBy: 'film', targetEntity: Seance::class)]
    private Collection $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }

    // MAGIC FONCTION
    public function __toString()
    {
        return $this->titre;
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

    public function getRealisation(): ?string
    {
        return $this->realisation;
    }

    public function setRealisation(string $realisation): self
    {
        $this->realisation = $realisation;

        return $this;
    }

    public function getCasting(): ?string
    {
        return $this->casting;
    }

    public function setCasting(?string $casting): self
    {
        $this->casting = $casting;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getRecompense(): ?string
    {
        return $this->recompense;
    }

    public function setRecompense(?string $recompense): self
    {
        $this->recompense = $recompense;

        return $this;
    }

    public function getDistributeur(): ?string
    {
        return $this->distributeur;
    }

    public function setDistributeur(string $distributeur): self
    {
        $this->distributeur = $distributeur;

        return $this;
    }

    public function getCoutLocation(): ?string
    {
        return $this->coutLocation;
    }

    public function setCoutLocation(?string $coutLocation): self
    {
        $this->coutLocation = $coutLocation;

        return $this;
    }

    public function isVoFilm(): ?bool
    {
        return $this->voFilm;
    }

    public function setVoFilm(bool $voFilm): self
    {
        $this->voFilm = $voFilm;

        return $this;
    }

    public function isVostFilm(): ?bool
    {
        return $this->vostFilm;
    }

    public function setVostFilm(bool $vostFilm): self
    {
        $this->vostFilm = $vostFilm;

        return $this;
    }

    public function isDeuxDFilm(): ?bool
    {
        return $this->deuxDFilm;
    }

    public function setDeuxDFilm(bool $deuxDFilm): self
    {
        $this->deuxDFilm = $deuxDFilm;

        return $this;
    }

    public function isTroisDFilm(): ?bool
    {
        return $this->troisDFilm;
    }

    public function setTroisDFilm(bool $troisDFilm): self
    {
        $this->troisDFilm = $troisDFilm;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function isAPartir(): ?bool
    {
        return $this->aPartir;
    }

    public function setAPartir(bool $aPartir): self
    {
        $this->aPartir = $aPartir;

        return $this;
    }

    public function isInterditAns(): ?bool
    {
        return $this->interditAns;
    }

    public function setInterditAns(bool $interditAns): self
    {
        $this->interditAns = $interditAns;

        return $this;
    }

    public function isAPartirMois(): ?bool
    {
        return $this->aPartirMois;
    }

    public function setAPartirMois(bool $aPartirMois): self
    {
        $this->aPartirMois = $aPartirMois;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection<int, Seance>
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances->add($seance);
            $seance->setFilm($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getFilm() === $this) {
                $seance->setFilm(null);
            }
        }

        return $this;
    }
}
