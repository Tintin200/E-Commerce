<?php

namespace App\Entity;

use App\Repository\InsererRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsererRepository::class)]
class Inserer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'inserers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Maillot $maillot = null;

    #[ORM\ManyToOne(inversedBy: 'inserers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Panier $panier = null;

    #[ORM\ManyToOne(inversedBy: 'inserers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Box $box = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): static
    {
        $this->panier = $panier;

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
}
