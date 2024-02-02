<?php

namespace App\Entity;

use App\Repository\PropertysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertysRepository::class)]
class Propertys
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $chambres = null;

    #[ORM\Column]
    private ?int $salle_bains = null;

    #[ORM\Column]
    private ?int $etages = null;

    #[ORM\Column]
    private ?int $n_etage = null;

    #[ORM\Column(type: Types::BINARY)]
    private $image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Annonces $annonce = null;

    #[ORM\ManyToOne(inversedBy: 'propertys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorys $category = null;

    

    #[ORM\ManyToMany(targetEntity: Installations::class)]
    private Collection $installation;

    #[ORM\ManyToOne(inversedBy: 'propertys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Localisations $localisation = null;

    public function __construct()
    {
        $this->installation = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
          $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): static
    {
        $this->surface = $surface;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): static
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getSalleBains(): ?int
    {
        return $this->salle_bains;
    }

    public function setSalleBains(int $salle_bains): static
    {
        $this->salle_bains = $salle_bains;

        return $this;
    }

    public function getEtages(): ?int
    {
        return $this->etages;
    }

    public function setEtages(int $etages): static
    {
        $this->etages = $etages;

        return $this;
    }

    public function getNEtage(): ?int
    {
        return $this->n_etage;
    }

    public function setNEtage(int $n_etage): static
    {
        $this->n_etage = $n_etage;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAnnonce(): ?Annonces
    {
        return $this->annonce;
    }

    public function setAnnonce(Annonces $annonce): static
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getCategory(): ?Categorys
    {
        return $this->category;
    }

    public function setCategory(?Categorys $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getType(): ?Types
    {
        return $this->type;
    }

    public function setType(?Types $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Installations>
     */
    public function getInstallation(): Collection
    {
        return $this->installation;
    }

    public function addInstallation(Installations $installation): static
    {
        if (!$this->installation->contains($installation)) {
            $this->installation->add($installation);
        }

        return $this;
    }

    public function removeInstallation(Installations $installation): static
    {
        $this->installation->removeElement($installation);

        return $this;
    }

    public function getLocalisation(): ?Localisations
    {
        return $this->localisation;
    }

    public function setLocalisation(?Localisations $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }
}
