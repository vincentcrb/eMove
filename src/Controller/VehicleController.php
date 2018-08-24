<?php


namespace App\Controller;

use App\Entity\Vehicle;
use App\Entity\Reservation;
use App\Form\VehicleType;
use App\Form\SearchType;
use App\Manager\ReservationManager;
use App\Manager\SearchManager;
use App\Manager\VehicleManager;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
    public function listVehicles(Request $request, VehicleManager $vehiclesManager, ReservationManager $reservationManager, SearchManager $searchManager)
    {
        $em = $this->getDoctrine()->getManager();

        $vehicle = $vehiclesManager->getVehicles();

        if($request) {
            $moto = $request->request->get('form')['moto'];
        }
        // $car = $request->request->get('form')['car'];
        if($moto) {

            // $qb_moto = $this->createQueryBuilder('v')
            // ->findOneByIdJoinedToCategory($id)
            // ->andWhere('p.price > :price')
            // ->setParameter('price', $price)
            // ->getQuery();

            $vehicle = $em->getRepository(Vehicle::class)->findBy(
                ['color' => 'beige']
            );
        }

        
        $reservation = $reservationManager->getReservations();

        // $price = getPrice();

        $prices = [55, 60, 68, 86, 80, 90, 91, 110, 90];

        return $this->render('vehicle/list-vehicles.html.twig', [
            'vehicles' => $vehicle,
            'reservations' => $reservation,
            'prices' => $prices,
            // 'price' => $price
        ]);
    }

    public function searchBarAction()
    {
        
        $searchForm = $this->createFormBuilder(null)
            ->add('car', CheckboxType::class, array('required' => false))
            ->add('moto', CheckboxType::class, array('required' => false))
            // ->setAction($this->generateUrl('list_vehicles'))
            ->getForm();


        return $this->render('vehicle/search.html.twig', [
            'searchForm' => $searchForm->createView()
        ]);
    }

}