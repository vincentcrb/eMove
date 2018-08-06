<?php

namespace App\Controller;

use App\Entity\Gamme;
use App\Form\GammeType;
use App\Manager\GammeManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class GammeController extends Controller
{
    /**
     * @Route("/admin/add/gamme", name="add_gamme")
     */
    public function addGamme(Request $request, GammeManager $rangeManager)
    {
        $range = new Gamme();

        $form = $this->createForm(GammeType::class, $range);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $rangeManager->createGamme($range);

        }

        return $this->render('admin/add/add-gamme.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}