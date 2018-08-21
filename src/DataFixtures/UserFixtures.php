<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Admin
        $user = new User();
        $admin = new User();

        $passwordAdmin = $this->passwordEncoder->encodePassword($admin, 'admin');

        $passwordUser = $this->passwordEncoder->encodePassword($user, 'test');

        $admin
            ->setUsername('admin')
            ->setPassword($passwordAdmin)
            ->setEmail('admin@gmail.com')
            ->setFirstName('admin')
            ->setLastName('admin')
            ->setBirthDate(new \DateTime('2018-01-01'))
            ->setIsAdmin(1);

        $manager->persist($admin);

        $user
            ->setUsername('user')
            ->setPassword($passwordUser)
            ->setEmail('user@gmail.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setBirthDate(new \DateTime('2018-01-01'))
            ->setIsAdmin(0);

        $manager->persist($user);

        $manager->flush();
        $manager->clear();
    }
}