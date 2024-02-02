<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TypesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TypesRepository::class)]
class Types
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Propertys::class)]
    private Collection $propertys;

    public function __construct()
    {
        $this->propertys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
            $property->setType($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->propertys->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getType() === $this) {
                $property->setType(null);
            }
        }

        return $this;
    }
}
