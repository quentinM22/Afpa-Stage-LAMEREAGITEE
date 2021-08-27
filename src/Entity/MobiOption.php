<?php

namespace App\Entity;

use App\Repository\MobiOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MobiOptionRepository::class)
 */
class MobiOption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Mobilier::class, mappedBy="mobiOptions")
     */
    private $mobilier;

    public function __construct()
    {
        $this->mobilier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Mobilier[]
     */
    public function getMobilier(): Collection
    {
        return $this->mobilier;
    }

    public function addMobilier(Mobilier $mobilier): self
    {
        if (!$this->mobilier->contains($mobilier)) {
            $this->mobilier[] = $mobilier;
        }

        return $this;
    }

    public function removeMobilier(Mobilier $mobilier): self
    {
        $this->mobilier->removeElement($mobilier);

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
