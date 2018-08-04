<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RangeRepository")
 */
class Range
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

    public function getHourrate(): ?float
    {
        return $this->hour_rate;
    }

    public function setHourrate(?float $hour_rate): self
    {
        $this->hour_rate = $hour_rate;

        return $this;
    }

    public function getKilometerrate(): ?float
    {
        return $this->kilometer_rate;
    }

    public function setKilometerrate(?float $kilometer_rate): self
    {
        $this->kilometer_rate = $kilometer_rate;

        return $this;
    }
}
