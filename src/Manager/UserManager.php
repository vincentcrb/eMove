<?php


namespace App\Manager;


use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function deleteUser($id){
        $user = $this->getUser($id);

        $this->em->remove($user);
        $this->em->flush();
    }

    public function getUsers()
    {
        return $this->em->getRepository(Users:: class)
            ->findAll();
    }

    public function getUser($id)
    {
        return $this->em->getRepository(Users:: class)
            ->find($id);
    }
}