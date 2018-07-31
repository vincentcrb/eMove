<?php

namespace App\Manager;

use App\Entity\Vehicule;
use Doctrine\ORM\EntityManagerInterface;

class VehiculeManager {

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createVehicule(Vehicule $vehicule)
    {

        $vehicule
            ->setMarque($vehicule->getMarque())
            ->setModele($vehicule->getModele())
            ->setNumeroSerie($vehicule->getNumeroSerie())
            ->setCouleur($vehicule->getCouleur())
            ->setImmatriculation($vehicule->getImmatriculation())
            ->setKilometrage($vehicule->getKilometrage())
            ->setDateAchat($vehicule->getDateAchat())
            ->setPrix($vehicule->getPrix());

        $this->em->persist($vehicule);
        $this->em->flush();
    }

    public function deleteVehicule($id){
        $movie = $this->getVehicule($id);

        $this->em->remove($movie);
        $this->em->flush();
    }

    public function getVehicules()
    {
        return $this->em->getRepository(Vehicule:: class)
            ->findAll();
    }

    public function getVehicule($id)
    {
        return $this->em->getRepository(Vehicule:: class)
            ->find($id);
    }
}