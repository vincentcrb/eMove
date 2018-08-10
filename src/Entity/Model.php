<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelRepository")
 */
class Model
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $hour_rate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $kilometer_rate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicle", mappedBy="model")
     */
    private $vehicles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="models")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="models")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classification", inversedBy="models")
     */
    private $classification;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
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
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles[] = $vehicle;
            $vehicle->setModel($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicles->contains($vehicle)) {
            $this->vehicles->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getModel() === $this) {
                $vehicle->setModel(null);
            }
        }

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getHourRate(): ?float
    {
        return $this->hour_rate;
    }

    public function setHourRate(?float $hour_rate): self
    {
        $this->hour_rate = $hour_rate;

        return $this;
    }

    public function getKilometerRate(): ?float
    {
        return $this->kilometer_rate;
    }

    public function setKilometerRate(?float $kilometer_rate): self
    {
        $this->kilometer_rate = $kilometer_rate;

        return $this;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Model
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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getClassification(): ?Classification
    {
        return $this->classification;
    }

    public function setClassification(?Classification $classification): self
    {
        $this->classification = $classification;

        return $this;
    }
}
