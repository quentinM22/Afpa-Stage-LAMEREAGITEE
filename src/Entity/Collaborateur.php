<?php

namespace App\Entity;

use App\Repository\CollaborateurRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CollaborateurRepository::class)
 * @Vich\Uploadable
 */
class Collaborateur
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
     *      max = 100,
     *      minMessage = "Le Nom doit comporter Plus de  {{ limit }} caractères",
     *      maxMessage = "Le Nom doit comporter Moins de {{ limit }} caractères"
     * )
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Le Prénom doit comporter Plus de  {{ limit }} caractères",
     *      maxMessage = "Le Prénom doit comporter Moins de {{ limit }} caractères"
     * )
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Job;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url
     */
    private $UrlFb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url
     */
    private $UrlInsta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url
     */
    private $UrlSite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=Autre::class, mappedBy="collaboration")
     */
    private $collaborateurAutre;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
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
     $this->collaborateurAutre = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->Job;
    }

    public function setJob(string $Job): self
    {
        $this->Job = $Job;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrlFb(): ?string
    {
        return $this->UrlFb;
    }

    public function setUrlFb(?string $UrlFb): self
    {
        $this->UrlFb = $UrlFb;

        return $this;
    }

    public function getUrlInsta(): ?string
    {
        return $this->UrlInsta;
    }

    public function setUrlInsta(?string $UrlInsta): self
    {
        $this->UrlInsta = $UrlInsta;

        return $this;
    }

    public function getUrlSite(): ?string
    {
        return $this->UrlSite;
    }

    public function setUrlSite(?string $UrlSite): self
    {
        $this->UrlSite = $UrlSite;

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
     * @return Collection|Autre[]
     */
    public function getCollaborateurAutre(): Collection
    {
        return $this->collaborateurAutre;
    }

    public function addCollaborateurAutre(Autre $collaborateurAutre): self
    {
        if (!$this->collaborateurAutre->contains($collaborateurAutre)) {
            $this->collaborateurAutre[] = $collaborateurAutre;
            $collaborateurAutre->addCollaboration($this);
        }

        return $this;
    }

    public function removeCollaborateurAutre(Autre $collaborateurAutre): self
    {
        if ($this->collaborateurAutre->removeElement($collaborateurAutre)) {
            $collaborateurAutre->removeCollaboration($this);
        }

        return $this;
    }
    public function getSlug(){
        return (new Slugify())->slugify($this->FirstName. '_' . $this->LastName);
    }
    public function __toString()
    {
        return $this->FirstName.' '. $this->LastName;
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
