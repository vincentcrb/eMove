<?php


namespace App\Controller;


use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Manager\ReservationManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends Controller
{
    /**
     * @Route("/reservation/{idVehicle}", name="add_reservation")
     */
    public function addReservation(Request $request, ReservationManager $brandManager, $idVehicle)
    {
        $reservation = new Reservation();

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $brandManager->createReservation($reservation, $user, $idVehicle);

        }

        return $this->render('user/add/add-reservation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/reservation", name="my_reservation")
     */
    public function userReservation(Request $request, ReservationManager $brandManager)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $reservation = $brandManager->myReservation($user);

        return $this->render('user/list/list-reservation.html.twig', ['reservations' => $reservation]);

    }
}