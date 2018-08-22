<?php


namespace App\Controller;

use App\Entity\Vehicle;
use App\Form\VehicleType;
use App\Manager\ReservationManager;
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
    public function listVehicles(VehicleManager $vehiclesManager, ReservationManager $reservationManager)
    {
        $vehicle = $vehiclesManager->getVehicles();
        $reservation = $reservationManager->getReservations();

        // $price = getPrice();

        return $this->render('vehicle/list-vehicles.html.twig', [
            'vehicles' => $vehicle,
            'reservations' => $reservation,
            // 'price' => $price
        ]);
    }

    public function searchBarAction()
    {

        $form = $this->createFormBuilder(null)
            ->add('search', CheckboxType::class)
            ->getForm();

        return $this->render('/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

}