<?php


namespace App\Manager;


use App\Entity\Gamme;
use Doctrine\ORM\EntityManagerInterface;

class GammeManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createGamme(Gamme $gamme)
    {

        $gamme
            ->setNom($gamme->getNom())
            ->setCoeffHeure($gamme->getCoeffHeure())
            ->setCoeffKilometre($gamme->getCoeffKilometre());

        $this->em->persist($gamme);
        $this->em->flush();
    }
}