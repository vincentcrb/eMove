<?php

namespace App\DataFixtures;

use App\Entity\Model;
use App\DataFixtures\TypeFixture;
use App\DataFixtures\ClassificationFixture;
use App\DataFixtures\BrandFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ModelFixture extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
    // Espace Renault
        $renault_espace = new Model();
        $renault_espace->setName('Espace');
        $renault_espace->setType($this->getReference('car'));
        $renault_espace->setClassification($this->getReference('monospace'));
        $renault_espace->setBrand($this->getReference('renault'));
        $renault_espace->setStartingPrice(29);
        $manager->persist($renault_espace);
        $this->addReference('renault_espace', $renault_espace);

    // 308 cc Peugeot
        $peugeot_308cc = new Model();
        $peugeot_308cc->setName('308 cc');
        $peugeot_308cc->setType($this->getReference('car'));
        $peugeot_308cc->setClassification($this->getReference('cabriolet'));
        $peugeot_308cc->setBrand($this->getReference('peugeot'));
        $peugeot_308cc->setStartingPrice(31);
        $manager->persist($peugeot_308cc);
        $this->addReference('peugeot_308cc', $peugeot_308cc);
    
    // Série 4 coupé BMW
        $bmw_serie4coupe = new Model();
        $bmw_serie4coupe->setName('Série 4');
        $bmw_serie4coupe->setType($this->getReference('car'));
        $bmw_serie4coupe->setClassification($this->getReference('coupe'));
        $bmw_serie4coupe->setBrand($this->getReference('bmw')); 
        $bmw_serie4coupe->setStartingPrice(30);
        $manager->persist($bmw_serie4coupe);
        $this->addReference('bmw_serie4coupe', $bmw_serie4coupe);

    // Continental GT Bentley
        $bentley_continental_gt = new Model();
        $bentley_continental_gt->setName('Continental GT');
        $bentley_continental_gt->setType($this->getReference('car'));
        $bentley_continental_gt->setClassification($this->getReference('luxe'));
        $bentley_continental_gt->setBrand($this->getReference('bentley')); 
        $bentley_continental_gt->setStartingPrice(30);
        $manager->persist($bentley_continental_gt);
        $this->addReference('bentley_continental_gt', $bentley_continental_gt);

    // 911 Porsche
        $porsche_911 = new Model();
        $porsche_911->setName('911');
        $porsche_911->setType($this->getReference('car'));
        $porsche_911->setClassification($this->getReference('sportive'));
        $porsche_911->setBrand($this->getReference('porsche')); 
        $porsche_911->setStartingPrice(30);
        $manager->persist($porsche_911);
        $this->addReference('porsche_911', $porsche_911);

    // R 1200 RT BMW
        $bmw_r1200rt = new Model();
        $bmw_r1200rt->setName('R 1200 RT');
        $bmw_r1200rt->setType($this->getReference('moto'));
        $bmw_r1200rt->setClassification($this->getReference('sport'));
        $bmw_r1200rt->setBrand($this->getReference('bmw')); 
        $bmw_r1200rt->setStartingPrice(30);
        $manager->persist($bmw_r1200rt);
        $this->addReference('bmw_r1200rt', $bmw_r1200rt);

    // 5008 Peugeot
        $peugeot_5008 = new Model();
        $peugeot_5008->setName('5008');
        $peugeot_5008->setType($this->getReference('car'));
        $peugeot_5008->setClassification($this->getReference('suv'));
        $peugeot_5008->setBrand($this->getReference('peugeot')); 
        $peugeot_5008->setStartingPrice(29);
        $manager->persist($peugeot_5008);
        $this->addReference('peugeot_5008', $peugeot_5008);

    // Série 1 BMW
        $bmw_serie1 = new Model();
        $bmw_serie1->setName('Série 1');
        $bmw_serie1->setType($this->getReference('car'));
        $bmw_serie1->setClassification($this->getReference('break'));
        $bmw_serie1->setBrand($this->getReference('bmw'));
        $bmw_serie1->setStartingPrice(26);
        $manager->persist($bmw_serie1);
        $this->addReference('bmw_serie1', $bmw_serie1);

    // Classe C Mercedes
        $classeC_mercedes = new Model();
        $classeC_mercedes->setName('Classe C');
        $classeC_mercedes->setType($this->getReference('car'));
        $classeC_mercedes->setClassification($this->getReference('berline'));
        $classeC_mercedes->setBrand($this->getReference('mercedes'));
        $classeC_mercedes->setStartingPrice(26);
        $manager->persist($classeC_mercedes);
        $this->addReference('classeC_mercedes', $classeC_mercedes);
    
        $manager->flush();
        $manager->clear();
    }


    public function getDependencies()
    {
        return array(
            TypeFixture::class,
            ClassificationFixture::class,
            BrandFixture::class,
        );
    }

}