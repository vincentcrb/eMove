<?php


namespace App\Manager;


use App\Entity\Model;
use Doctrine\ORM\EntityManagerInterface;

class ModelManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function createModel(Model $model)
    {
        if(empty($model->getImage())) {
            $model
                ->setBrand($model->getBrand())
                ->setName($model->getName())
                ->setHourrate($model->getHourrate())
                ->setKilometerrate($model->getKilometerrate());
        } else{
            $model
                ->setBrand($model->getBrand())
                ->setName($model->getName())
                ->setHourrate($model->getHourrate())
                ->setKilometerrate($model->getKilometerrate())
                ->setImage($model->getImage());
        }

        $this->em->persist($model);
        $this->em->flush();
    }
}