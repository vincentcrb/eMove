<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_start;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_end;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bill", mappedBy="reservation", cascade={"persist", "remove"})
     */
    private $bill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reservations")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicle", inversedBy="reservations")
     */
    private $vehicle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kilometer", inversedBy="reservations")
     */
    private $kilometer;

    // /**
    //  * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="reservations")
    //  */
    // private $status;

    public function getId()
    {
        return $this->id;
    }

    public function getDateStart()
    {
        return $this->date_start;
    }

    public function setDateStart($date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd()
    {
        return $this->date_end;
    }

    public function setDateEnd($date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBill(): ?Bill
    {
        return $this->bill;
    }

    public function setBill(?Bill $bill): self
    {
        $this->bill = $bill;

        // set (or unset) the owning side of the relation if necessary
        $newReservation = $bill === null ? null : $this;
        if ($newReservation !== $bill->getReservation()) {
            $bill->setReservation($newReservation);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(?Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getKilometer(): ?Kilometer
    {
        return $this->kilometer;
    }

    public function setKilometer(?Kilometer $kilometer): self
    {
        $this->kilometer = $kilometer;

        return $this;
    }


    // public function getStatus(): ?Status
    // {
    //     return $this->status;
    // }

    // public function setStatus(?Status $status): self
    // {
    //     $this->status = $status;

    //     return $this;
    // }
}
