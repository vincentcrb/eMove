<?php


namespace App\DataFixtures;


use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StatusFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // In progress
        $inProgress = new Status();
        $inProgress->setName('En cours');
        $manager->persist($inProgress);
        $this->addReference('En cours', $inProgress);

        //
        $late = new Status();
        $late->setName('Non rendu');
        $manager->persist($late);
        $this->addReference('Non rendu', $late);

        // Done
        $done = new Status();
        $done->setName('Terminer');
        $manager->persist($done);
        $this->addReference('Terminer', $done);

        $manager->flush();
        $manager->clear();
    }
}