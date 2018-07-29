<?php


namespace App\Manager;

use App\Entity\Marque;
use Doctrine\ORM\EntityManagerInterface;

class MarqueManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createVehicule(Marque $marque)
    {

        $marque
            ->setNom($marque->getNom());

        $this->em->persist($marque);
        $this->em->flush();
    }
}