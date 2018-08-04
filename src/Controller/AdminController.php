<?php


namespace App\Controller;

use App\Manager\VehicleManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Manager\UserManager;
use Symfony\Component\Routing\Annotation\Route;
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
        return $this->render('admin/list/list-users.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/admin/vehicles", name="list_vehicles")
     */
    public function listVehicles(VehicleManager $vehiclesManager)
    {
        $vehicle = $vehiclesManager->getVehicles();
        return $this->render('admin/list/list-vehicles.html.twig', ['vehicles' => $vehicle]);
    }

    /**
     * @Route("/admin/delete/{id}", name="delete_vehicle")
     */
    public function deleteVehicle(VehicleManager $vehiclesManager, $id)
    {
        $vehiclesManager->deleteVehicle($id);
        return $this->redirectToRoute("dashboard");
    }
}