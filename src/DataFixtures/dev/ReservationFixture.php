<?php

namespace App\DataFixtures\dev;

use App\Entity\Reservation;
use App\DataFixtures\dev\UserFixture;
use App\DataFixtures\VehicleFixture;
use App\DataFixtures\KilometerFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ReservationFixture extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {

/************ RESERVATIONS OF USER1 ************/

    // R1
        $r1 = new Reservation();
        $r1->setUser($this->getReference('user1'));
        $r1->setVehicle($this->getReference('v1_renault_espace'));
        $r1->setKilometer($this->getReference('km50'));
        $r1->setDateStart(new \DateTime('2018-01-01'));
        $r1->setDateEnd(new \DateTime('2018-01-05'));
        $r1->setPrice(60);
        $manager->persist($r1);
        $this->addReference('r1', $r1);
    
    // R2
        $r2 = new Reservation();
        $r2->setUser($this->getReference('user1'));
        $r2->setVehicle($this->getReference('v2_peugeot_308cc'));
        $r2->setKilometer($this->getReference('km100'));
        $r2->setDateStart(new \DateTime('2018-01-08'));
        $r2->setDateEnd(new \DateTime('2018-01-11'));
        $r2->setPrice(70.8);
        $manager->persist($r2);
        $this->addReference('r2', $r2);

    // R3
        $r3 = new Reservation();
        $r3->setUser($this->getReference('user1'));
        $r3->setVehicle($this->getReference('v3_bmw_serie4coupe'));
        $r3->setKilometer($this->getReference('km150'));
        $r3->setDateStart(new \DateTime('2018-01-14'));
        $r3->setDateEnd(new \DateTime('2018-01-14'));
        $r3->setPrice(77);
        $manager->persist($r3);
        $this->addReference('r3', $r3);

    // R4
        $r4 = new Reservation();
        $r4->setUser($this->getReference('user1'));
        $r4->setVehicle($this->getReference('v4_bentley_continental_gt'));
        $r4->setKilometer($this->getReference('km200'));
        $r4->setDateStart(new \DateTime('2018-01-15'));
        $r4->setDateEnd(new \DateTime('2018-01-16'));
        $r4->setPrice(83.19);
        $manager->persist($r4);
        $this->addReference('r4', $r4);
    
    // R5
        $r5 = new Reservation();
        $r5->setUser($this->getReference('user1'));
        $r5->setVehicle($this->getReference('v5_porsche_911'));
        $r5->setKilometer($this->getReference('km250'));
        $r5->setDateStart(new \DateTime('2018-01-19'));
        $r5->setDateEnd(new \DateTime('2018-01-29'));
        $r5->setPrice(89.9);
        $manager->persist($r5);
        $this->addReference('r5', $r5);

/************ RESERVATIONS OF USER2 ************/
    
    // R6
        $r6 = new Reservation();
        $r6->setUser($this->getReference('user2'));
        $r6->setVehicle($this->getReference('v3_bmw_serie4coupe'));
        $r6->setKilometer($this->getReference('km400'));
        $r6->setDateStart(new \DateTime('2018-01-08'));
        $r6->setDateEnd(new \DateTime('2018-01-11'));
        $r6->setPrice(77);
        $manager->persist($r6);
        $this->addReference('r6', $r6);

    // R7
        $r7 = new Reservation();
        $r7->setUser($this->getReference('user2'));
        $r7->setVehicle($this->getReference('v9_classeC_mercedes'));
        $r7->setKilometer($this->getReference('km150'));
        $r7->setDateStart(new \DateTime('2018-01-29'));
        $r7->setDateEnd(new \DateTime('2018-02-02'));
        $r7->setPrice(100.99);
        $manager->persist($r7);
        $this->addReference('r7', $r7);

        // R8
        $r8 = new Reservation();
        $r8->setUser($this->getReference('user2'));
        $r8->setVehicle($this->getReference('v4_bentley_continental_gt'));
        $r8->setKilometer($this->getReference('km700'));
        $r8->setDateStart(new \DateTime('2018-02-15'));
        $r8->setDateEnd(new \DateTime('2018-02-16'));
        $r8->setPrice(103.19);
        $manager->persist($r8);
        $this->addReference('r8', $r8);


        $manager->flush();
        $manager->clear();
    }


    public function getDependencies()
    {
        return array(
            UserFixture::class,
            VehicleFixture::class,
            KilometerFixture::class,
        );
    }

}