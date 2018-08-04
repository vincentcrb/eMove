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
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="reservation")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicle", mappedBy="reservation")
     */
    private $vehicle;

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
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Status", mappedBy="reservation")
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bill", mappedBy="reservation", cascade={"persist", "remove"})
     */
    private $bill;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->vehicle = new ArrayCollection();
        $this->status = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setReservation($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getReservation() === $this) {
                $user->setReservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicle(): Collection
    {
        return $this->vehicle;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicle->contains($vehicle)) {
            $this->vehicle[] = $vehicle;
            $vehicle->setReservation($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicle->contains($vehicle)) {
            $this->vehicle->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getReservation() === $this) {
                $vehicle->setReservation(null);
            }
        }

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Status[]
     */
    public function getStatus(): Collection
    {
        return $this->status;
    }

    public function addStatus(Status $status): self
    {
        if (!$this->status->contains($status)) {
            $this->status[] = $status;
            $status->setReservation($this);
        }

        return $this;
    }

    public function removeStatus(Status $status): self
    {
        if ($this->status->contains($status)) {
            $this->status->removeElement($status);
            // set the owning side to null (unless already changed)
            if ($status->getReservation() === $this) {
                $status->setReservation(null);
            }
        }

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
}
