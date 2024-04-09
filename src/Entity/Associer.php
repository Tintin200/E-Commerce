<?php

namespace App\Entity;

use App\Repository\AssocierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssocierRepository::class)]
class Associer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\ManyToOne(inversedBy: 'associers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maillot $maillot = null;

    #[ORM\ManyToOne(inversedBy: 'associers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Box $box = null;

    #[ORM\ManyToOne(inversedBy: 'associers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Taille $taille = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getMaillot(): ?Maillot
    {
        return $this->maillot;
    }

    public function setMaillot(?Maillot $maillot): static
    {
        $this->maillot = $maillot;

        return $this;
    }

    public function getBox(): ?Box
    {
        return $this->box;
    }

    public function setBox(?Box $box): static
    {
        $this->box = $box;

        return $this;
    }

    public function getTaille(): ?Taille
    {
        return $this->taille;
    }

    public function setTaille(?Taille $taille): static
    {
        $this->taille = $taille;

        return $this;
    }
}
