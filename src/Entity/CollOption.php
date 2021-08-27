<?php

namespace App\Entity;

use App\Repository\CollOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollOptionRepository::class)
 */
class CollOption
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
     * @ORM\ManyToMany(targetEntity=Collage::class, mappedBy="collOptions")
     */
    private $collage;

    public function __construct()
    {
        $this->collage = new ArrayCollection();
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
     * @return Collection|Collage[]
     */
    public function getCollage(): Collection
    {
        return $this->collage;
    }

    public function addCollage(Collage $collage): self
    {
        if (!$this->collage->contains($collage)) {
            $this->collage[] = $collage;
        }

        return $this;
    }

    public function removeCollage(Collage $collage): self
    {
        $this->collage->removeElement($collage);

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

}
