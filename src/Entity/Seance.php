<?php

namespace App\Entity;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SeanceRepository;

#[ORM\Entity(repositoryClass: SeanceRepository::class)]
class Seance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTime $start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTime $end = null;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    private ?Film $film = null;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    private ?TypeSeSeance $typeDeSeance = null;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    private ?Evenement $evenement = null;

    #[ORM\Column(nullable: true)]
    private ?bool $voSeance = null;

    #[ORM\Column(nullable: true)]
    private ?bool $vostSeance = null;

    #[ORM\Column(nullable: true)]
    private ?bool $deuxDseance = null;

    #[ORM\Column(nullable: true)]
    private ?bool $troisDSeance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTime
    {
        return $this->start;
    }

    public function setStart(?DateTime $start): self
    {
        $this->start = $start;
        
        if ($this->start && $this->film && $this->film->getDuree()) {
            $this->updateEnd();
        }
        
        return $this;
    }

    public function getEnd(): ?\DateTime
    {
        return $this->end;
    }

    public function setEnd(?\DateTime $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;
    
        return $this;
    }

    public function getTypeDeSeance(): ?TypeSeSeance
    {
        return $this->typeDeSeance;
    }

    public function setTypeDeSeance(?TypeSeSeance $typeDeSeance): self
    {
        $this->typeDeSeance = $typeDeSeance;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }
    public function updateEnd(): self
    {
        $end = new \dateTime(); //pour que seance ne deviennent pas null
        if ($this->start !== null && $this->film !== null) {
            $end = clone $this->start;
            $end->add(new \DateInterval('PT' . $this->film->getDuree() . 'M'));
            $this->end = $end;
        }
    
        return $this;
    }

    public function isVoSeance(): ?bool
    {
        return $this->voSeance;
    }

    public function setVoSeance(?bool $voSeance): self
    {
        $this->voSeance = $voSeance;

        return $this;
    }
    



    public function isVostSeance(): ?bool
    {
        return $this->vostSeance;
    }

    public function setVostSeance(?bool $vostSeance): self
    {
        $this->vostSeance = $vostSeance;

        return $this;
    }

    public function isDeuxDseance(): ?bool
    {
        return $this->deuxDseance;
    }

    public function setDeuxDseance(?bool $deuxDseance): self
    {
        $this->deuxDseance = $deuxDseance;

        return $this;
    }

    public function isTroisDSeance(): ?bool
    {
        return $this->troisDSeance;
    }

    public function setTroisDSeance(?bool $troisDSeance): self
    {
        $this->troisDSeance = $troisDSeance;

        return $this;
    }
}
