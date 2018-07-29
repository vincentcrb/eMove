<?php


namespace App\Controller;

use App\Entity\Modele;
use App\Form\ModeleType;
use App\Manager\ModeleManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ModeleController extends Controller
{
    /**
     * @Route("/admin/addModele", name="add_modele")
     */
    public function addModele(Request $request, ModeleManager $modeleManager)
    {
        $modele = new Modele();

        $form = $this->createForm(ModeleType::class, $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $modeleManager->createModele($modele);

        }

        return $this->render('admin/modele.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}