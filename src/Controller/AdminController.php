<?php


namespace App\Controller;

use App\Manager\VehiculeManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Manager\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('admin/dashboard.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/admin/users", name="list_users")
     */
    public function listUsers(UserManager $usersManager)
    {
        $users = $usersManager->getUsers();
        return $this->render('admin/list-users.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/admin/vehicules", name="list_vehicules")
     */
    public function listVehicules(VehiculeManager $vehiculesManager)
    {
        $vehicule = $vehiculesManager->getVehicules();
        return $this->render('admin/list-vehicules.html.twig', ['vehicules' => $vehicule]);
    }

    /**
     * @Route("/admin/delete/{id}", name="delete_vehicule")
     */
    public function deleteVehicule(VehiculeManager $vehiculesManager, $id)
    {
        $vehiculesManager->deleteVehicule($id);
        return $this->redirectToRoute("dashboard");
    }
}