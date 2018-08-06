<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClassificationRepository")
 */
class Classification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $hour_rate;

    /**
     * @ORM\Column(type="float")
     */
    private $kilometer_rate;

    public function getId()
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

    public function getHourRate(): ?float
    {
        return $this->hour_rate;
    }

    public function setHourRate(float $hour_rate): self
    {
        $this->hour_rate = $hour_rate;

        return $this;
    }

    public function getKilometerRate(): ?float
    {
        return $this->kilometer_rate;
    }

    public function setKilometerRate(float $kilometer_rate): self
    {
        $this->kilometer_rate = $kilometer_rate;

        return $this;
    }
}
