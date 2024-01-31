<?php

namespace App\Entity;

use App\Repository\MediasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MediasRepository::class)]
class Medias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    #[Assert\IsNull]
    private $photos = null;

    #[ORM\Column(type: Types::BINARY, nullable: true)]
    #[Assert\IsNull]
    private $videos = null;

    #[ORM\ManyToOne(inversedBy: 'medias')]
    private ?Annonces $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setPhotos($photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    public function setVideos($videos): static
    {
        $this->videos = $videos;

        return $this;
    }

    public function getAnnonce(): ?Annonces
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonces $annonce): static
    {
        $this->annonce = $annonce;

        return $this;
    }
}
