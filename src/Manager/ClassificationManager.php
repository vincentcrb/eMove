<?php


namespace App\Manager;


use App\Entity\Classification;
use Doctrine\ORM\EntityManagerInterface;

class ClassificationManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createClassification(Classification $classification)
    {

        $classification
            ->setName($classification->getName());

        $this->em->persist($classification);
        $this->em->flush();
    }
}