<?php

namespace App\Manager;

use App\Entity\Reservation;
use App\Entity\User;
use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;

class SearchManager
{

    public function isComplete(User $user)
    {
        return $user->getReservations();
    }

    public function getReservations()
    {
        return $this->em->getRepository(Reservation:: class)
            ->findAll();
    }

    public function getReservation($id)
    {
        return $this->em->getRepository(Reservation:: class)
            ->find($id);
    }
}
