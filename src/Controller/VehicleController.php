<?php


namespace App\Controller;

use App\Entity\Vehicle;
use App\Form\VehicleType;
use App\Manager\VehicleManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

            /** @var UploadedFile $file */
            $file = $vehicle->getImage();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_vehicle_directory'),
                $fileName
            );

            $vehicle->setImage($fileName);

            $vehicleManager->createVehicle($vehicle);

        }

        return $this->render('admin/add/add-vehicle.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}