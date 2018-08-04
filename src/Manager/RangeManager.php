<?php


namespace App\Manager;


use App\Entity\Range;
use Doctrine\ORM\EntityManagerInterface;

class RangeManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createRange(Range $range)
    {

        $range
            ->setName($range->getName());

        $this->em->persist($range);
        $this->em->flush();
    }
}