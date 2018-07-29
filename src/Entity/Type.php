<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coeff_heure;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coeff_kilometre;

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCoeffHeure(): ?float
    {
        return $this->coeff_heure;
    }

    public function setCoeffHeure(?float $coeff_heure): self
    {
        $this->coeff_heure = $coeff_heure;

        return $this;
    }

    public function getCoeffKilometre(): ?float
    {
        return $this->coeff_kilometre;
    }

    public function setCoeffKilometre(?float $coeff_kilometre): self
    {
        $this->coeff_kilometre = $coeff_kilometre;

        return $this;
    }
}
