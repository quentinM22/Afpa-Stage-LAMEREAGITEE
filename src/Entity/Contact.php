<?php

namespace App\Entity;

use App\Entity\Autre;

use App\Entity\Mobilier;
use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstname;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastname;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[0-9]{10}/")
     */
    private $phone;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @var Mobilier|null
     */
    private $mobilier;

    /**
     * @var Collage|null
     */
    private $collage;

     /**
     * @var Autre|null
     */
    private $autre; 


    /**
     * @return null|string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param null|string $firstname
     * @return Contact
     */
    public function setFirstname(?string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param null|string $lastname
     * @return Contact
     */
    public function setLastname(?string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     * @return Contact
     */
    public function setPhone(?string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param null|string $message
     * @return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Mobilier|null
     */
    public function getMobilier(): ?Mobilier
    {
        return $this->mobilier;
    }

    /**
     * @param Mobilier|null $Mobilier
     * @return Contact
     */
    public function setMobilier(?Mobilier $mobilier): Contact
    {
        $this->mobilier = $mobilier;
        return $this;
    }

    /**
     * Get the value of collage
     *
     * @return  Collage|null
     */ 
    public function getCollage(): ?Collage
    {
        return $this->collage;
    }

    /**
     * Set the value of collage
     *
     * @param  Collage|null  $collage
     *
     * @return  self
     */ 
    public function setCollage(?Collage $collage): Contact
    {
        $this->collage = $collage;
        return $this;
    }

    /**
     * Get the value of autre
     *
     * @return  Autre|null
     */ 
    public function getAutre(): ?Autre
    {
        return $this->autre;
    }

    /**
     * Set the value of autre
     *
     * @param  Autre|null  $autre
     *
     * @return  self
     */ 
    public function setAutre(?Autre $autre): Contact
    {
        $this->autre = $autre;

        return $this;
    }
}
