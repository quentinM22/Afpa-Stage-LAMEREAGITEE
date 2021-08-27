<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AutreRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=AutreRepository::class)
 * @Vich\Uploadable
 */
class Autre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 150,
     *      minMessage = "Le titre doit comporter Plus de  {{ limit }} caractères",
     *      maxMessage = "Le titre doit comporter Moins de {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Positive
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sold;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $collaborationBool = false;

    /**
     * @ORM\ManyToMany(targetEntity=Collaborateur::class, inversedBy="collaborateurAutre")
     */
    private $collaboration;

    /**
     * @ORM\ManyToMany(targetEntity=AutreOptions::class, inversedBy="otherAutre")
     */
    private $otherOption;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="galerie_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    private $imageName;

    public function __construct()
    {
     $this->created_at = new \DateTime();
     $this->collaboration = new ArrayCollection();
     $this->otherOption = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(?bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getSlug(){
        return (new Slugify())->slugify($this->title);
    }

    public function getCollaborationBool(): ?bool
    {
        return $this->collaborationBool;
    }

    public function setCollaborationBool(bool $collaborationBool): self
    {
        $this->collaborationBool = $collaborationBool;

        return $this;
    }

    /**
     * @return Collection|Collaborateur[]
     */
    public function getCollaboration(): Collection
    {
        return $this->collaboration;
    }

    public function addCollaboration(Collaborateur $collaboration): self
    {
        if (!$this->collaboration->contains($collaboration)) {
            $this->collaboration[] = $collaboration;
        }

        return $this;
    }

    public function removeCollaboration(Collaborateur $collaboration): self
    {
        $this->collaboration->removeElement($collaboration);

        return $this;
    }

    /**
     * @return Collection|AutreOptions[]
     */
    public function getOtherOption(): Collection
    {
        return $this->otherOption;
    }

    public function addOtherOption(AutreOptions $otherOption): self
    {
        if (!$this->otherOption->contains($otherOption)) {
            $this->otherOption[] = $otherOption;
        }

        return $this;
    }

    public function removeOtherOption(AutreOptions $otherOption): self
    {
        $this->otherOption->removeElement($otherOption);

        return $this;
    }
    /**
     *
     * @return string|null
     */
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     *
     * @param string|null $imageName
     * @return $this
     */
    public function setImageName(?string $imageName):self
    {
        $this->imageName = $imageName;
        return $this;
    }
    




    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
     /**
     *
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            
            $this->created_at = new \DateTime();
        }
    }


    
}
