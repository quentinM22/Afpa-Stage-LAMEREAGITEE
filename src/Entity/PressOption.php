<?php

namespace App\Entity;

use App\Repository\PressOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PressOptionRepository::class)
 */
class PressOption
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
     * @ORM\ManyToMany(targetEntity=Presses::class, mappedBy="pressOptions")
     */
    private $presse;

    public function __construct()
    {
        $this->presse = new ArrayCollection();
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
     * @return Collection|Presses[]
     */
    public function getPresse(): Collection
    {
        return $this->presse;
    }

    public function addPresse(Presses $presse): self
    {
        if (!$this->presse->contains($presse)) {
            $this->presse[] = $presse;
        }

        return $this;
    }

    public function removePresse(Presses $presse): self
    {
        $this->presse->removeElement($presse);

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
