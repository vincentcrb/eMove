<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PricingRepository")
 */
class Pricing
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
    private $period;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_start;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_end;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hour_price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $kilometer_price;

    public function getId()
    {
        return $this->id;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(?string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(?\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getHourPrice(): ?float
    {
        return $this->hour_price;
    }

    public function setHourPrice(?float $hour_price): self
    {
        $this->hour_price = $hour_price;

        return $this;
    }

    public function getKilometerPrice(): ?float
    {
        return $this->kilometer_price;
    }

    public function setKilometerPrice(?float $kilometer_price): self
    {
        $this->kilometer_price = $kilometer_price;

        return $this;
    }

}
