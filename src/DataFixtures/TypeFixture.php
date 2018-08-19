<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    // CAR
        $car = new Type();
        $car->setId(1);
        $car->setName('Voiture');
        $car->setRate(1.2);
        $manager->persist($car);
        $this->addReference('car', $car);

    // MOTO
        $moto = new Type();
        $moto->setId(2);
        $moto->setName('Moto');
        $moto->setRate(1);
        $manager->persist($moto);
        $this->addReference('moto', $moto);

        $manager->flush();
        $manager->clear();
    }
}
