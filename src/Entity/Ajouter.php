<?php

namespace App\Entity;

use App\Repository\AjouterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AjouterRepository::class)]
class Ajouter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'ajouters')]
    private ?Panier $panier = null;

    #[ORM\ManyToOne(inversedBy: 'ajouters')]
    private ?Maillot $maillot = null;

    #[ORM\ManyToOne(inversedBy: 'ajouters')]
    private ?Box $box = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

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
}
