<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillRepository")
 */
class Bill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservation", inversedBy="bill", cascade={"persist", "remove"})
     */
    private $reservation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bill;

    public function getId()
    {
        return $this->id;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getBill(): ?string
    {
        return $this->bill;
    }

    public function setBill(?string $bill): self
    {
        $this->bill = $bill;

        return $this;
    }
}
