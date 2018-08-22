<?php

namespace App\Manager;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;

class VehicleManager {

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createVehicle(Vehicle $vehicle)
    {
        $vehicle
            ->setModel($vehicle->getModel())
            ->setSerialnumber($vehicle->getSerialnumber())
            ->setColor($vehicle->getColor())
            ->setLicenseplate($vehicle->getLicenseplate())
        ;

        $this->em->persist($vehicle);
        $this->em->flush();
    }

    public function deleteVehicle($id)
    {
        $vehicle = $this->getVehicle($id);

        $this->em->remove($vehicle);
        $this->em->flush();
    }

    public function getVehicles()
    {
        return $this->em->getRepository(Vehicle:: class)
            ->findAll();
    }

    public function getVehicle($id)
    {
        return $this->em->getRepository(Vehicle:: class)
            ->find($id);
    }


}