<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Manager\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminController extends Controller
{
    /**
     * @Route("/admin/users", name="list_users")
     */
    public function listUsers(UserManager $usersManager)
    {
        $users = $usersManager->getUsers();
        return $this->render('admin/list-users.html.twig', ['users' => $users]);
    }
}