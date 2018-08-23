<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Manager\BrandManager;
use App\Manager\ReservationManager;
use App\Manager\VehicleManager;
use AppBundle\Form\UseradminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Manager\UserManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function dashboard(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('admin/dashboard.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/admin/users", name="admin_list_users")
     */
    public function listUsers(UserManager $usersManager)
    {
        $users = $usersManager->getUsers();
        return $this->render('admin/list/list-users.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/admin/vehicles", name="admin_list_vehicles")
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
        return $this->redirectToRoute("admin_list_vehicles");
    }

    /**
     * @Route("/admin/user_delete/{id}", name="delete_user")
     */
    public function deleteUser(UserManager $userManager, $id)
    {
        $userManager->deleteUser($id);
        return $this->redirectToRoute("admin_list_users");
    }

    /**
     * @Route("/admin/brands", name="admin_list_brands")
     */
    public function listBrands(BrandManager $brandManager)
    {
        $brand = $brandManager->getBrands();
        return $this->render('admin/list/list-brand.html.twig', ['brands' => $brand]);
    }

    /**
     * @Route("/admin/delete/{id}", name="delete_brand")
     */
    public function deleteBrand(BrandManager $brandManager, $id)
    {
        $brandManager->deleteBrand($id);
        return $this->redirectToRoute("dashboard");
    }

    /**
     * @Route("/admin/reservations", name="admin_list_reservations")
     */
    public function listReservations(ReservationManager $reservationManager)
    {
        $reservation = $reservationManager->getReservations();
        return $this->render('admin/list/list-reservations.html.twig', ['reservations' => $reservation]);
    }

    /**
     * @Route("/admin/user/edit/{id}", name="admin_edit")
     */
    public function editAction(UserManager $userManager, Request $request, UserPasswordEncoderInterface $passwordEncoder,  $id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User:: class)
            ->findOneBy(['id'=>$id]);
        
        $form = $this->createForm(UserType:: class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            $password = password_hash($user->getPlainPassword(), PASSWORD_DEFAULT);
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('admin_list_users');
        }

        return $this->render('admin/list/edit_account.html.twig', [ 'form' => $form->createView()
        ]);
    }
}