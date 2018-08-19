<?php

namespace App\DataFixtures;

use App\Entity\Classification;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ClassificationFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    /**
     * 1 - Classifications of cars
     * 2 - Classifications of scooters
    */

    /************ CARS ************/

    // BERLINE
        $berline = new Classification();
        $berline->setName('Berline');
        $berline->setRate(1.1);
        $manager->persist($berline);
        $this->addReference('berline', $berline);

    // MONOSPACE
        $monospace = new Classification();
        $monospace->setName('Monospace');
        $monospace->setRate(1.2);
        $manager->persist($monospace);
        $this->addReference('monospace', $monospace);

    // BREAK
        $break = new Classification();
        $break->setName('Break');
        $break->setRate(1.2);
        $manager->persist($break);
        $this->addReference('break', $break);
    
    // COUPE
        $coupe = new Classification();
        $coupe->setName('Coupé');
        $coupe->setRate(1.25);
        $manager->persist($coupe);
        $this->addReference('coupe', $coupe);

    // CABRIOLET
        $cabriolet = new Classification();
        $cabriolet->setName('Cabriolet');
        $cabriolet->setRate(1.3);
        $manager->persist($cabriolet);
        $this->addReference('cabriolet', $cabriolet);

    // SUV 4x4
        $suv = new Classification();
        $suv->setName('SUV/4x4');
        $suv->setRate(1.4);
        $manager->persist($suv);
        $this->addReference('suv', $suv);

    // SPORTIVE
        $sportive = new Classification();
        $sportive->setName('Sportive');
        $sportive->setRate(1.6);
        $manager->persist($sportive);
        $this->addReference('sportive', $sportive);

    // LUXE
        $luxe = new Classification();
        $luxe->setName('Luxe');
        $luxe->setRate(1.8);
        $manager->persist($luxe);
        $this->addReference('luxe', $luxe);

    /************ MOTO ************/

    // SCOOTER
        $scooter = new Classification();
        $scooter->setName('Scooter');
        $scooter->setRate(1.1);
        $manager->persist($scooter);
        $this->addReference('scooter', $scooter);

    // CROSS
        $cross = new Classification();
        $cross->setName('Cross');
        $cross->setRate(1.2);
        $manager->persist($cross);
        $this->addReference('cross', $cross);

    // SPORT
        $sport = new Classification();
        $sport->setName('Sport');
        $sport->setRate(1.3);
        $manager->persist($sport);
        $this->addReference('sport', $sport);

        $manager->flush();
        $manager->clear();
    }
}