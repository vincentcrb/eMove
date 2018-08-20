<?php

namespace App\DataFixtures;

use App\Entity\Kilometer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class KilometerFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

/************ Max Kilometers by Day ************/

    // 50km
        $km50 = new Kilometer();
        $km50->setId(1);
        $km50->setMaxKm(50);
        $km50->setRate(1.05);
        $manager->persist($km50);
        $this->addReference('km50', $km50);

    // 100km
        $km100 = new Kilometer();
        $km100->setId(2);
        $km100->setMaxKm(100);
        $km100->setRate(1.1);
        $manager->persist($km100);
        $this->addReference('km100', $km100);

    // 150km
        $km150 = new Kilometer();
        $km150->setId(3);
        $km150->setMaxKm(150);
        $km150->setRate(1.15);
        $manager->persist($km150);
        $this->addReference('km150', $km150);

    // 200km
        $km200 = new Kilometer();
        $km200->setId(4);
        $km200->setMaxKm(200);
        $km200->setRate(1.2);
        $manager->persist($km200);
        $this->addReference('km200', $km200);
    
    // 250km
        $km250 = new Kilometer();
        $km250->setId(5);
        $km250->setMaxKm(250);
        $km250->setRate(1.25);
        $manager->persist($km250);
        $this->addReference('km250', $km250);

    // 300km
        $km300 = new Kilometer();
        $km300->setId(6);
        $km300->setMaxKm(300);
        $km300->setRate(1.3);
        $manager->persist($km300);
        $this->addReference('km300', $km300);
    
    // 400km
        $km400 = new Kilometer();
        $km400->setId(7);
        $km400->setMaxKm(400);
        $km400->setRate(1.4);
        $manager->persist($km400);
        $this->addReference('km400', $km400);

    // 500km
        $km500 = new Kilometer();
        $km500->setId(8);
        $km500->setMaxKm(500);
        $km500->setRate(1.5);
        $manager->persist($km500);
        $this->addReference('km500', $km500);
    
    // 600km
        $km600 = new Kilometer();
        $km600->setId(9);
        $km600->setMaxKm(600);
        $km600->setRate(1.6);
        $manager->persist($km600);
        $this->addReference('km600', $km600);
    
    // 700km
        $km700 = new Kilometer();
        $km700->setId(10);
        $km700->setMaxKm(700);
        $km700->setRate(1.7);
        $manager->persist($km700);
        $this->addReference('km700', $km700);

    // 800km
        $km800 = new Kilometer();
        $km800->setId(11);
        $km800->setMaxKm(800);
        $km800->setRate(1.8);
        $manager->persist($km800);
        $this->addReference('km800', $km800);

    // 900km
        $km900 = new Kilometer();
        $km900->setId(12);
        $km900->setMaxKm(900);
        $km900->setRate(1.9);
        $manager->persist($km900);
        $this->addReference('km900', $km900);

        $manager->flush();
        $manager->clear();
    }
}
