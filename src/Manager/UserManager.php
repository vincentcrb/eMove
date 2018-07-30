<?php


namespace App\Manager;


use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{
    /** @var EntityManagerInterface */
    private $em;

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function createUser(User $user)
    {
        $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());

        $user
            ->setUsername($user->getUsername())
            ->setPassword($password)
            ->setEmail($user->getEmail());

        $this->em->persist($user);
        $this->em->flush();
    }

    public function deleteUser($id){
        $user = $this->getUser($id);

        $this->em->remove($user);
        $this->em->flush();
    }

    public function getUsers()
    {
        return $this->em->getRepository(User:: class)
            ->findAll();
    }

    public function getUser($id)
    {
        return $this->em->getRepository(User:: class)
            ->find($id);
    }
}