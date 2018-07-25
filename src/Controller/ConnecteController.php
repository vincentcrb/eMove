<?php


// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnecteController extends Controller
{
    /**
     * @Route("/connecte", name="connecte")
     */
    public function login()
    {
        return $this->render('connecte/connecte.html.twig');
    }


    /**
     * @Route("/account", name="account")
     */
    public function account()
    {
        return $this->render('connecte/account.html.twig');
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }
}