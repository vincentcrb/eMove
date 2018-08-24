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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookingController extends Controller
{
    /**
     * @Route("/booking-results", name="booking_results")
     */
    public function Booking(Request $request)
    {

        $motoCheckbox = json_decode($request->get('moto'));

        if($motoCheckbox) {
            var_dump($motoCheckbox);
        }
        else {
            var_dump("cool" . $motoCheckbox);
        }

        $result = "test";

        return new JsonResponse(array('result' => $result));

    }

    /**
     * @Route("/booking", name="booking")
     */
    public function BookingDisplay(Request $request)
    {


        // $moto = $this->getModel()->getType();


        $result = "testDisplay";

        return $this->render(
            'reservation/booking.html.twig',
            array(
                'result' => $result
            )
        );

    }


    // public function searchBarAction()
    // {
        
    //     $searchForm = $this->createFormBuilder(null)
    //         ->add('car', CheckboxType::class, array('required' => false))
    //         ->add('moto', CheckboxType::class, array('required' => false))
    //         ->setAction($this->generateUrl('list_vehicles'))
    //         ->getForm();


    //     return $this->render('vehicle/search.html.twig', [
    //         'searchForm' => $searchForm->createView()
    //     ]);
    // }

}