<?php

namespace App\Entity;

use App\Repository\BoxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoxRepository::class)]
class Box
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 35)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: Associer::class, mappedBy: 'box')]
    private Collection $associers;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'adorerBox')]
    private Collection $users;

    #[ORM\OneToMany(targetEntity: AssocierBox::class, mappedBy: 'box')]
    private Collection $associerBoxes;

    #[ORM\OneToMany(targetEntity: Inserer::class, mappedBy: 'box', orphanRemoval: true)]
    private Collection $inserers;

    #[ORM\OneToMany(targetEntity: Ajouter::class, mappedBy: 'box')]
    private Collection $ajouters;

    public function __construct()
    {
        $this->associers = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->associerBoxes = new ArrayCollection();
        $this->inserers = new ArrayCollection();
        $this->ajouters = new ArrayCollection();
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
            $associer->setBox($this);
        }

        return $this;
    }

    public function removeAssocier(Associer $associer): static
    {
        if ($this->associers->removeElement($associer)) {
            // set the owning side to null (unless already changed)
            if ($associer->getBox() === $this) {
                $associer->setBox(null);
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
            $user->addAdorerBox($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeAdorerBox($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AssocierBox>
     */
    public function getAssocierBoxes(): Collection
    {
        return $this->associerBoxes;
    }

    public function addAssocierBox(AssocierBox $associerBox): static
    {
        if (!$this->associerBoxes->contains($associerBox)) {
            $this->associerBoxes->add($associerBox);
            $associerBox->setBox($this);
        }

        return $this;
    }

    public function removeAssocierBox(AssocierBox $associerBox): static
    {
        if ($this->associerBoxes->removeElement($associerBox)) {
            // set the owning side to null (unless already changed)
            if ($associerBox->getBox() === $this) {
                $associerBox->setBox(null);
            }
        }

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
            $inserer->setBox($this);
        }

        return $this;
    }

    public function removeInserer(Inserer $inserer): static
    {
        if ($this->inserers->removeElement($inserer)) {
            // set the owning side to null (unless already changed)
            if ($inserer->getBox() === $this) {
                $inserer->setBox(null);
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
            $ajouter->setBox($this);
        }

        return $this;
    }

    public function removeAjouter(Ajouter $ajouter): static
    {
        if ($this->ajouters->removeElement($ajouter)) {
            // set the owning side to null (unless already changed)
            if ($ajouter->getBox() === $this) {
                $ajouter->setBox(null);
            }
        }

        return $this;
    }
}
