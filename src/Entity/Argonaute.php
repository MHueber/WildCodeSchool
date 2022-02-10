<?php

namespace App\Entity;

use App\Repository\ArgonauteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArgonauteRepository::class)
 * @UniqueEntity("name", message="Argonaute déjà enregistré")
 */
class Argonaute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Veuillez saisir un nom")
     * @Assert\Length(min=3, max=30, minMessage="Saisir plus de 3 caractères", maxMessage="Maximum de cactères atteint,  Max = 30")
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skillOne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skillTwo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skillThree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @Assert\Choice(choices={"En vie", "Décédé", "Inconnu"})
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

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

    public function getSkillOne(): ?string
    {
        return $this->skillOne;
    }

    public function setSkillOne(?string $skillOne): self
    {
        $this->skillOne = $skillOne;

        return $this;
    }

    public function getSkillTwo(): ?string
    {
        return $this->skillTwo;
    }

    public function setSkillTwo(?string $skillTwo): self
    {
        $this->skillTwo = $skillTwo;

        return $this;
    }

    public function getSkillThree(): ?string
    {
        return $this->skillThree;
    }

    public function setSkillThree(?string $skillThree): self
    {
        $this->skillThree = $skillThree;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }
}
