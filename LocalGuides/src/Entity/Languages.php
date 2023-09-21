<?php

namespace App\Entity;

use App\Repository\LanguagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguagesRepository::class)]
class Languages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Level $id_level = null;

    #[ORM\OneToMany(mappedBy: 'id_language', targetEntity: Guide::class)]
    private Collection $guides;

    public function __construct()
    {
        $this->guides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIdLevel(): ?Level
    {
        return $this->id_level;
    }

    public function setIdLevel(?Level $id_level): static
    {
        $this->id_level = $id_level;

        return $this;
    }

    /**
     * @return Collection<int, Guide>
     */
    public function getGuides(): Collection
    {
        return $this->guides;
    }

    public function addGuide(Guide $guide): static
    {
        if (!$this->guides->contains($guide)) {
            $this->guides->add($guide);
            $guide->setIdLanguage($this);
        }

        return $this;
    }

    public function removeGuide(Guide $guide): static
    {
        if ($this->guides->removeElement($guide)) {
            // set the owning side to null (unless already changed)
            if ($guide->getIdLanguage() === $this) {
                $guide->setIdLanguage(null);
            }
        }

        return $this;
    }
}
