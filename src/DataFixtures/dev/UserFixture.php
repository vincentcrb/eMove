<?php


namespace App\DataFixtures\dev;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

    // ADMIN
        $admin = new User();
        $admin
            ->setUsername('admin')
            ->setPassword( $this->passwordEncoder->encodePassword($admin, 'admin') )
            ->setEmail('admin@gmail.com')
            ->setFirstName('admin')
            ->setLastName('admin')
            ->setBirthDate(new \DateTime('2018-01-01'))
            ->setIsAdmin(1);
        $this->addReference('admin', $admin);
        $manager->persist($admin);

    // USER1
        $user1 = new User();
        $user1
            ->setUsername('user1')
            ->setPassword( $this->passwordEncoder->encodePassword($user1, 'user') )
            ->setEmail('user1@gmail.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setBirthDate(new \DateTime('1997-01-01'))
            ->setIsAdmin(0);
        $this->addReference('user1', $user1);
        $manager->persist($user1);

    // USER2
        $user2 = new User();
        $user2
            ->setUsername('user2')
            ->setPassword( $this->passwordEncoder->encodePassword($user2, 'user') )
            ->setEmail('user2@gmail.com')
            ->setFirstName('François')
            ->setLastName('Hollande')
            ->setBirthDate(new \DateTime('1997-01-01'))
            ->setIsAdmin(0);
        $this->addReference('user2', $user2);
        $manager->persist($user2);


        $manager->flush();
        $manager->clear();
    }
}