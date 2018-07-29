<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeleRepository")
 */
class Modele
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicule", mappedBy="modele")
     */
    private $vehicules;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="modeles")
     */
    private $marque;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

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

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setModele($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->contains($vehicule)) {
            $this->vehicules->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getModele() === $this) {
                $vehicule->setModele(null);
            }
        }

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

}
