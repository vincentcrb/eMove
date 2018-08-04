<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BrandRepository")
 */
class Brand
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicle", mappedBy="brand")
     */
    private $vehicle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Model", mappedBy="model")
     */
    private $models;

    public function __construct()
    {
        $this->vehicle = new ArrayCollection();
        $this->models = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicle(): Collection
    {
        return $this->vehicle;
    }

    public function addVehicule(Vehicle $vehicule): self
    {
        if (!$this->vehicle->contains($vehicule)) {
            $this->vehicle[] = $vehicule;
            $vehicule->setBrand($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicle $vehicule): self
    {
        if ($this->vehicle->contains($vehicule)) {
            $this->vehicle->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getBrand() === $this) {
                $vehicule->setBrand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Model[]
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function addModel(Model $brand): self
    {
        if (!$this->models->contains($brand)) {
            $this->models[] = $brand;
            $brand->setBrand($this);
        }

        return $this;
    }

    public function removeModele(Model $brand): self
    {
        if ($this->models->contains($brand)) {
            $this->models->removeElement($brand);
            // set the owning side to null (unless already changed)
            if ($brand->getBrand() === $this) {
                $brand->setBrand(null);
            }
        }

        return $this;
    }
}
