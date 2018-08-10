<?php


namespace App\Controller;

use App\Entity\Vehicle;
use App\Form\VehicleType;
use App\Manager\VehicleManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VehicleController extends Controller
{
    /**
    * @Route("/admin/add/vehicle", name="add_vehicle")
    */
    public function addVehicle(Request $request, VehicleManager $vehicleManager)
    {
        $vehicle = new Vehicle();

        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $vehicleManager->createVehicle($vehicle);

        }

        return $this->render('admin/add/add-vehicle.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/vehicles", name="list_vehicles")
     */
    public function listVehicles(VehicleManager $vehiclesManager)
    {
        $vehicle = $vehiclesManager->getVehicles();
        return $this->render('vehicle/list-vehicles.html.twig', ['vehicles' => $vehicle]);
    }
}