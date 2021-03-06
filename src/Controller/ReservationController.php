<?php


namespace App\Controller;


use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Manager\ReservationManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;


class ReservationController extends Controller
{
    /**
     * @Route("/reservation/{idVehicle}", name="add_reservation")
     */
    public function addReservation(Request $request, ReservationManager $reservationManager, $idVehicle)
    {
        $reservation = new Reservation();

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservationManager->createReservation($reservation, $user, $idVehicle);

        }

        return $this->render('user/add/add-reservation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/reservation", name="my_reservation")
     */
    public function userReservation(Request $request, ReservationManager $reservationManager)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $reservation = $reservationManager->myReservation($user);

        return $this->render('user/list/list-reservation.html.twig', ['reservations' => $reservation]);

    }

    /**
     * @Route("/reservation/price", name="price_reservation")
     */
    public function priceReservation(Request $request, ReservationManager $reservationManager)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $reservation = $reservationManager->myReservation($user);

        return $this->render('user/list/list-reservation.html.twig', ['reservations' => $reservation]);

    }

    /**
     * @Route("/reservation/details/{idReservation}", name="show_reservation")
     */
    public function showReservation(Request $request, ReservationManager $reservationManager, $idReservation)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $reservation = $reservationManager->getReservation($idReservation);

        $content =  $this->render('reservation/bill.html.twig', [
            'reservation' => $reservation,
            'user' => $user
        ])->getContent();

        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML ($content);
        $html2pdf->output('facture-'.$idReservation.'.pdf', 'D');
    }

    /**
     * @Route("/admin/late/{idReservation}", name="late_reservation")
     */
    public function lateReservation(Request $request, ReservationManager $reservationManager, $idReservation, \Swift_Mailer $mailer)
    {
        $reservation = $reservationManager->getReservation($idReservation);

        $message = (new \Swift_Message('Retard véhicule - eMove'))
            ->setFrom('20100.crb@gmail.com')
            ->setTo('vincent.carabin@gmail.com')
            ->setBody(
                $this->renderView(
                    'emails/late-reservation.html.twig'),
                'text/html'
            )
        ;

        $mailer->send($message);

        return $this->redirectToRoute("admin_list_reservations");
    }

    /**
     * @Route("/admin/close/{idReservation}", name="close_reservation")
     */
    public function closeReservation(Request $request, ReservationManager $reservationManager, $idReservation)
    {
        $myReservation = $reservationManager->getReservation($idReservation);

        $reservationManager->closeReservation($myReservation);

        return $this->redirectToRoute("admin_list_reservations");
    }
}