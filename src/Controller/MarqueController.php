<?php


namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Manager\MarqueManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MarqueController extends Controller
{
    /**
     * @Route("/admin/addMarque", name="add_marque")
     */
    public function addMarque(Request $request, MarqueManager $marqueManager)
    {
        $marque = new Marque();

        $form = $this->createForm(MarqueType::class, $marque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $marqueManager->createVehicule($marque);

        }

        return $this->render('admin/marque.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}