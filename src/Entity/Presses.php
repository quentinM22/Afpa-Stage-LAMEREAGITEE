<?php

namespace App\Entity;

use App\Repository\PressesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=PressesRepository::class)
 * @Vich\Uploadable
 */
class Presses
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Url
     */
    private $url;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=PressOption::class, inversedBy="presse")
     */
    private $pressOptions;



     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="press_image", fileNameProperty="imageName")
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
     $this->pressOptions = new ArrayCollection();
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection|PressOption[]
     */
    public function getPressOptions(): Collection
    {
        return $this->pressOptions;
    }

    public function addPressOption(PressOption $pressOption): self
    {
        if (!$this->pressOptions->contains($pressOption)) {
            $this->pressOptions[] = $pressOption;
            $pressOption->addPresse($this);
        }

        return $this;
    }

    public function removePressOption(PressOption $pressOption): self
    {
        if ($this->pressOptions->removeElement($pressOption)) {
            $pressOption->removePresse($this);
        }

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
