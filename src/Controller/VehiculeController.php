<?php


namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Manager\VehiculeManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VehiculeController extends Controller
{
    /**
    * @Route("/admin/addVehicule", name="add_vehicule")
    */
    public function addVehicule(Request $request, VehiculeManager $vehiculeManager)
    {
        $vehicule = new Vehicule();

        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $vehiculeManager->createVehicule($vehicule);

        }

        return $this->render('admin/vehicule.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}