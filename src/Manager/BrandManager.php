<?php


namespace App\Manager;

use App\Entity\Brand;
use Doctrine\ORM\EntityManagerInterface;

class BrandManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createBrand(Brand $brand)
    {

        $brand
            ->setName($brand->getName());

        $this->em->persist($brand);
        $this->em->flush();
    }
}