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
        if(empty($brand->getImage())){
            $brand
                ->setName($brand->getName());
        } else{
            $brand
                ->setName($brand->getName())
                ->setImage($brand->getImage());
        }

        $this->em->persist($brand);
        $this->em->flush();
    }

    public function deleteBrand($id){
        $vehicle = $this->getBrand($id);

        $this->em->remove($vehicle);
        $this->em->flush();
    }

    public function getBrands()
    {
        return $this->em->getRepository(Brand:: class)
            ->findAll();
    }

    public function getBrand($id)
    {
        return $this->em->getRepository(Brand:: class)
            ->find($id);
    }
}