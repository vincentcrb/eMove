<?php


namespace App\Manager;


use App\Entity\Reservation;
use App\Entity\Status;
use App\Entity\User;
use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;

class ReservationManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createReservation(Reservation $reservation, $idUser, $vehicle)
    {
        /** @var Vehicle $idVehicle */
        $idVehicle = $this->em->getRepository(Vehicle:: class)
            ->find($vehicle);

        /** @var Status $status */
        $status = $this->em->getRepository(Status:: class)
            ->find(1);

        $statusVehicle = $idVehicle->setIsDispo(0);

        $reservation
            ->setDateStart($reservation->getDateStart())
            ->setDateEnd($reservation->getDateEnd())
            ->setUser($idUser)
            ->setVehicle($idVehicle)
            ->setStatus($status)
        ;

        $this->em->persist($reservation);
        $this->em->flush();

        $this->em->persist($statusVehicle);
        $this->em->flush();
    }

    public function closeReservation($idReservation)
    {
        /** @var Reservation $reservation */
        $reservation = $this->em->getRepository(Reservation:: class)
            ->find($idReservation);

        /** @var Status $status */
        $status = $this->em->getRepository(Status:: class)
            ->find(3);

        $vehicle = $reservation->getVehicle();

        /** @var Vehicle $idVehicle */
        $idVehicle = $this->em->getRepository(Vehicle:: class)
            ->find($vehicle);

        $statusVehicle = $idVehicle->setIsDispo(1);

        $reservation->setStatus($status);

        $this->em->persist($reservation);
        $this->em->flush();

        $this->em->persist($statusVehicle);
        $this->em->flush();
    }

    public function myReservation(User $user)
    {
        return $user->getReservations();
    }

    public function getReservations()
    {
        return $this->em->getRepository(Reservation:: class)
            ->findAll();
    }

    public function getReservation($id)
    {
        return $this->em->getRepository(Reservation:: class)
            ->find($id);
    }
}
