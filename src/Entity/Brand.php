<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

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

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

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
     * Set image
     *
     * @param string $image
     *
     * @return Brand
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
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

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicle->contains($vehicle)) {
            $this->vehicle[] = $vehicle;
            $vehicle->setBrand($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicle->contains($vehicle)) {
            $this->vehicle->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getBrand() === $this) {
                $vehicle->setBrand(null);
            }
        }

        return $this;
    }

    public function removeModel(Model $model): self
    {
        if ($this->models->contains($model)) {
            $this->models->removeElement($model);
            // set the owning side to null (unless already changed)
            if ($model->getModel() === $this) {
                $model->setModel(null);
            }
        }

        return $this;
    }
}
