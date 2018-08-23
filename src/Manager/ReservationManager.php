<?php


namespace App\Manager;


use App\Entity\Brand;
use App\Entity\Classification;
use App\Entity\Model;
use App\Entity\Reservation;
use App\Entity\Status;
use App\Entity\Type;
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

        $dateStart = $reservation->getDateStart();
        $dateEnd = $reservation->getDateEnd();

        $diff = $dateStart->diff($dateEnd)->d;

        if ($dateStart->diff($dateEnd)->invert == 0){
        $price = $this->priceReservation($vehicle,$diff);

        $reservation
            ->setDateStart($dateStart)
            ->setDateEnd($dateEnd)
            ->setUser($idUser)
            ->setVehicle($idVehicle)
            ->setStatus($status)
            ->setPrice($price)
        ;

        $this->em->persist($reservation);
        $this->em->flush();

        $this->em->persist($statusVehicle);
        $this->em->flush();
        }
        else {
            die;
        }
    }

    public function priceReservation($idVehicle, $diffDate)
    {
        /** @var Vehicle $idVehicle */
        $vehicle = $this->em->getRepository(Vehicle:: class)
            ->find($idVehicle);

        $idModel = $vehicle->getModel();

        /** @var Model $model */
        $model = $this->em->getRepository(Model:: class)
            ->find($idModel);

        $startingPrice = $model->getStartingPrice();
        $idClassification = $model ->getClassification();
        $idType = $model->getType();
        $idBrand = $model->getBrand();

        /** @var Classification $classification */
        $classification = $this->em->getRepository(Classification:: class)
            ->find($idClassification);

        /** @var Type $type */
        $type = $this->em->getRepository(Type:: class)
            ->find($idType);

        /** @var Brand $brand */
        $brand = $this->em->getRepository(Brand:: class)
            ->find($idBrand);

        $classificationRate = $classification->getRate();
        $typeRate = $type->getRate();
        $brandRate = $brand->getRate();

        return $price = ((($startingPrice * $classificationRate) * $typeRate) * $brandRate) * $diffDate;

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
