<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'Cette adresse mail est déja utilisée !')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\ManyToMany(targetEntity: Maillot::class, inversedBy: 'users')]
    private Collection $adorer;

    #[ORM\ManyToMany(targetEntity: Box::class, inversedBy: 'users')]
    private Collection $adorerBox;

    #[ORM\ManyToMany(targetEntity: Panier::class, inversedBy: 'users')]
    private Collection $panier;

    public function __construct()
    {
        $this->adorer = new ArrayCollection();
        $this->adorerBox = new ArrayCollection();
        $this->panier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Maillot>
     */
    public function getAdorer(): Collection
    {
        return $this->adorer;
    }

    public function addAdorer(Maillot $adorer): static
    {
        if (!$this->adorer->contains($adorer)) {
            $this->adorer->add($adorer);
        }

        return $this;
    }

    public function removeAdorer(Maillot $adorer): static
    {
        $this->adorer->removeElement($adorer);

        return $this;
    }

    /**
     * @return Collection<int, Box>
     */
    public function getAdorerBox(): Collection
    {
        return $this->adorerBox;
    }

    public function addAdorerBox(Box $adorerBox): static
    {
        if (!$this->adorerBox->contains($adorerBox)) {
            $this->adorerBox->add($adorerBox);
        }

        return $this;
    }

    public function removeAdorerBox(Box $adorerBox): static
    {
        $this->adorerBox->removeElement($adorerBox);

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(Panier $panier): static
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
        }

        return $this;
    }

    public function removePanier(Panier $panier): static
    {
        $this->panier->removeElement($panier);

        return $this;
    }
}
