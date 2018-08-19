<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    // RENAULT
        $renault = new Brand();
        $renault->setName('Renault');
        $renault->setRate(1.4);
        $manager->persist($renault);
        $this->addReference('renault', $renault);

    // PEUGEOT
        $peugeot = new Brand();
        $peugeot->setName('Peugeot');
        $peugeot->setRate(1.5);
        $manager->persist($peugeot);
        $this->addReference('peugeot', $peugeot);

    // BMW
        $bmw = new Brand();
        $bmw->setName('BMW');
        $bmw->setRate(1.9);
        $manager->persist($bmw);
        $this->addReference('bmw', $bmw);

    // MERCEDES
        $mercedes = new Brand();
        $mercedes->setName('Mercedes');
        $mercedes->setRate(2);
        $manager->persist($mercedes);
        $this->addReference('mercedes', $mercedes);

    // PORSCHE
        $porsche = new Brand();
        $porsche->setName('Porsche');
        $porsche->setRate(3);
        $manager->persist($porsche);
        $this->addReference('porsche', $porsche);

    // BENTLEY
        $bentley = new Brand();
        $bentley->setName('Bentley');
        $bentley->setRate(3);
        $manager->persist($bentley);
        $this->addReference('bentley', $bentley);

        $manager->flush();
        $manager->clear();
    }
}