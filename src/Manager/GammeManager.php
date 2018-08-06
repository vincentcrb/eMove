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

    public function createGamme(Gamme $range)
    {

        $range
            ->setName($range->getName());

        $this->em->persist($range);
        $this->em->flush();
    }
}