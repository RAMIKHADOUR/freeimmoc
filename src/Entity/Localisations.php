<?php

namespace App\Entity;

use App\Repository\LocalisationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalisationsRepository::class)]
class Localisations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $n_voie = null;

    #[ORM\Column(length: 100)]
    private ?string $type_voie = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_voie = null;

    #[ORM\Column(length: 255)]
    private ?string $villes = null;

    #[ORM\Column]
    private ?int $codepostales = null;

    #[ORM\Column(length: 100)]
    private ?string $region = null;

    #[ORM\OneToMany(mappedBy: 'localisation', targetEntity: Propertys::class)]
    private Collection $propertys;

    public function __construct()
    {
        $this->propertys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNVoie(): ?int
    {
        return $this->n_voie;
    }

    public function setNVoie(int $n_voie): static
    {
        $this->n_voie = $n_voie;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->type_voie;
    }

    public function setTypeVoie(string $type_voie): static
    {
        $this->type_voie = $type_voie;

        return $this;
    }

    public function getNomVoie(): ?string
    {
        return $this->nom_voie;
    }

    public function setNomVoie(string $nom_voie): static
    {
        $this->nom_voie = $nom_voie;

        return $this;
    }

    public function getVilles(): ?string
    {
        return $this->villes;
    }

    public function setVilles(string $villes): static
    {
        $this->villes = $villes;

        return $this;
    }

    public function getCodepostales(): ?int
    {
        return $this->codepostales;
    }

    public function setCodepostales(int $codepostales): static
    {
        $this->codepostales = $codepostales;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection<int, Propertys>
     */
    public function getPropertys(): Collection
    {
        return $this->propertys;
    }

    public function addProperty(Propertys $property): static
    {
        if (!$this->propertys->contains($property)) {
            $this->propertys->add($property);
            $property->setLocalisation($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->propertys->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getLocalisation() === $this) {
                $property->setLocalisation(null);
            }
        }

        return $this;
    }
}
