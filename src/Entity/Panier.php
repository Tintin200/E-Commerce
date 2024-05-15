<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: self::class, inversedBy: 'panier', cascade: ['persist', 'remove'])]
    private ?self $panier = null;

    #[ORM\OneToMany(targetEntity: Inserer::class, mappedBy: 'panier', orphanRemoval: true)]
    private Collection $inserers;


    #[ORM\OneToMany(targetEntity: Ajouter::class, mappedBy: 'panier')]
    private Collection $ajouters;

    #[ORM\OneToOne(mappedBy: 'panier', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->inserers = new ArrayCollection();
        $this->ajouters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanier(): ?self
    {
        return $this->panier;
    }

    public function setPanier(?self $panier): static
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * @return Collection<int, Inserer>
     */
    public function getInserers(): Collection
    {
        return $this->inserers;
    }

    public function addInserer(Inserer $inserer): static
    {
        if (!$this->inserers->contains($inserer)) {
            $this->inserers->add($inserer);
            $inserer->setPanier($this);
        }

        return $this;
    }

    public function removeInserer(Inserer $inserer): static
    {
        if ($this->inserers->removeElement($inserer)) {
            // set the owning side to null (unless already changed)
            if ($inserer->getPanier() === $this) {
                $inserer->setPanier(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, Ajouter>
     */
    public function getAjouters(): Collection
    {
        return $this->ajouters;
    }

    public function addAjouter(Ajouter $ajouter): static
    {
        if (!$this->ajouters->contains($ajouter)) {
            $this->ajouters->add($ajouter);
            $ajouter->setPanier($this);
        }

        return $this;
    }

    public function removeAjouter(Ajouter $ajouter): static
    {
        if ($this->ajouters->removeElement($ajouter)) {
            // set the owning side to null (unless already changed)
            if ($ajouter->getPanier() === $this) {
                $ajouter->setPanier(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setPanier(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getPanier() !== $this) {
            $user->setPanier($this);
        }

        $this->user = $user;

        return $this;
    }
}
