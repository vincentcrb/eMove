<?php


namespace App\Manager;


use App\Entity\Modele;
use Doctrine\ORM\EntityManagerInterface;

class ModeleManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createModele(Modele $modele)
    {

        $modele
            ->setMarque($modele->getMarque())
            ->setNom($modele->getNom())
            ->setCoeffHeure($modele->getCoeffHeure())
            ->setCoeffKilometre($modele->getCoeffKilometre());

        $this->em->persist($modele);
        $this->em->flush();
    }
}