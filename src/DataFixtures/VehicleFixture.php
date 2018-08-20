<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use App\DataFixtures\ModelFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class VehicleFixture extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    { 

    // Espace Renault
        $v1_renault_espace = new Vehicle();
        $v1_renault_espace->setModel($this->getReference('renault_espace'));
        $v1_renault_espace->setLicensePlate("VC876IA");
        $v1_renault_espace->setColor("anthracite");
        $v1_renault_espace->setIsDispo(true);
        $manager->persist($v1_renault_espace);
        $this->addReference('v1_renault_espace', $v1_renault_espace);

    // 308 cc Peugeot
        $v2_peugeot_308cc = new Vehicle();
        $v2_peugeot_308cc->setModel($this->getReference('peugeot_308cc'));
        $v2_peugeot_308cc->setLicensePlate("JL948EE");
        $v2_peugeot_308cc->setColor("noir");
        $v2_peugeot_308cc->setIsDispo(true);
        $manager->persist($v2_peugeot_308cc);
        $this->addReference('v2_peugeot_308cc', $v2_peugeot_308cc);
    
    // Série 4 coupé BMW
        $v3_bmw_serie4coupe = new Vehicle();
        $v3_bmw_serie4coupe->setModel($this->getReference('bmw_serie4coupe'));
        $v3_bmw_serie4coupe->setLicensePlate("BM019MI");
        $v3_bmw_serie4coupe->setColor("gris");
        $v3_bmw_serie4coupe->setIsDispo(true);
        $manager->persist($v3_bmw_serie4coupe);
        $this->addReference('v3_bmw_serie4coupe', $v3_bmw_serie4coupe);

    // Continental GT Bentley
        $v4_bentley_continental_gt = new Vehicle();
        $v4_bentley_continental_gt->setModel($this->getReference('bentley_continental_gt'));
        $v4_bentley_continental_gt->setLicensePlate("ZO606DA");
        $v4_bentley_continental_gt->setColor("caramel");
        $v4_bentley_continental_gt->setIsDispo(true);
        $manager->persist($v4_bentley_continental_gt);
        $this->addReference('v4_bentley_continental_gt', $v4_bentley_continental_gt);

    // 911 Porsche
        $v5_porsche_911 = new Vehicle();
        $v5_porsche_911->setModel($this->getReference('porsche_911'));
        $v5_porsche_911->setLicensePlate("CH455IE");
        $v5_porsche_911->setColor("anthracite");
        $v5_porsche_911->setIsDispo(true);
        $manager->persist($v5_porsche_911);
        $this->addReference('v5_porsche_911', $v5_porsche_911);

    // R 1200 RT BMW
        $v6_bmw_r1200rt = new Vehicle();
        $v6_bmw_r1200rt->setModel($this->getReference('bmw_r1200rt'));
        $v6_bmw_r1200rt->setLicensePlate("MO765TO");
        $v6_bmw_r1200rt->setColor("noir");
        $v6_bmw_r1200rt->setIsDispo(true);
        $manager->persist($v6_bmw_r1200rt);
        $this->addReference('v6_bmw_r1200rt', $v6_bmw_r1200rt);

    // 5008 Peugeot
        $v7_peugeot_5008 = new Vehicle();
        $v7_peugeot_5008->setModel($this->getReference('peugeot_5008'));
        $v7_peugeot_5008->setLicensePlate("PE063OT");
        $v7_peugeot_5008->setColor("bleu");
        $v7_peugeot_5008->setIsDispo(true);
        $manager->persist($v7_peugeot_5008);
        $this->addReference('v7_peugeot_5008', $v7_peugeot_5008);

    // Série 1 BMW
        $v8_bmw_serie1 = new Vehicle();
        $v8_bmw_serie1->setModel($this->getReference('bmw_serie1'));
        $v8_bmw_serie1->setLicensePlate("BI799MA");
        $v8_bmw_serie1->setColor("blanc");
        $v8_bmw_serie1->setIsDispo(true);
        $manager->persist($v8_bmw_serie1);
        $this->addReference('v8_bmw_serie1', $v8_bmw_serie1);

    // Classe C Mercedes
        $v9_classeC_mercedes = new Vehicle();
        $v9_classeC_mercedes->setModel($this->getReference('classeC_mercedes'));
        $v9_classeC_mercedes->setLicensePlate("ME835ES");
        $v9_classeC_mercedes->setColor("beige");
        $v9_classeC_mercedes->setIsDispo(true);
        $manager->persist($v9_classeC_mercedes);
        $this->addReference('v9_classeC_mercedes', $v9_classeC_mercedes);

    
        $manager->flush();
        $manager->clear();
    }


    public function getDependencies()
    {
        return array(
            ModelFixture::class,
        );
    }

}