<?php

namespace App\Entity;

use App\Repository\MaillotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaillotRepository::class)]
class Maillot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 65)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: Associer::class, mappedBy: 'maillot')]
    private Collection $associers;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'adorer')]
    private Collection $users;

    #[ORM\Column]
    private ?float $prix = null;

    public function __construct()
    {
        $this->associers = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Associer>
     */
    public function getAssociers(): Collection
    {
        return $this->associers;
    }

    public function addAssocier(Associer $associer): static
    {
        if (!$this->associers->contains($associer)) {
            $this->associers->add($associer);
            $associer->setMaillot($this);
        }

        return $this;
    }

    public function removeAssocier(Associer $associer): static
    {
        if ($this->associers->removeElement($associer)) {
            // set the owning side to null (unless already changed)
            if ($associer->getMaillot() === $this) {
                $associer->setMaillot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addAdorer($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeAdorer($this);
        }

        return $this;
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
}