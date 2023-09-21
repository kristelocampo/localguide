<?php

namespace App\Entity;

use App\Repository\ItinerariesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItinerariesRepository::class)]
class Itineraries
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'itineraries')]
    private ?Guide $id_guide = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $tarif = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $created_date = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Location $id_location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGuide(): ?Guide
    {
        return $this->id_guide;
    }

    public function setIdGuide(?Guide $id_guide): static
    {
        $this->id_guide = $id_guide;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(string $tarif): static
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): static
    {
        $this->created_date = $created_date;

        return $this;
    }

    public function getIdLocation(): ?Location
    {
        return $this->id_location;
    }

    public function setIdLocation(?Location $id_location): static
    {
        $this->id_location = $id_location;

        return $this;
    }
}
