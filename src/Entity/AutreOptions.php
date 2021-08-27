<?php

namespace App\Entity;

use App\Repository\AutreOptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutreOptionsRepository::class)
 */
class AutreOptions
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
     * @ORM\ManyToMany(targetEntity=Autre::class, mappedBy="otherOption")
     */
    private $otherAutre;

    public function __construct()
    {
        $this->otherAutre = new ArrayCollection();
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
     * @return Collection|Autre[]
     */
    public function getOtherAutre(): Collection
    {
        return $this->otherAutre;
    }

    public function addOtherAutre(Autre $otherAutre): self
    {
        if (!$this->otherAutre->contains($otherAutre)) {
            $this->otherAutre[] = $otherAutre;
            $otherAutre->addOtherOption($this);
        }

        return $this;
    }

    public function removeOtherAutre(Autre $otherAutre): self
    {
        if ($this->otherAutre->removeElement($otherAutre)) {
            $otherAutre->removeOtherOption($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
