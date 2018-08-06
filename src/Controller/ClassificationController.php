<?php

namespace App\Controller;

use App\Entity\Classification;
use App\Form\ClassificationType;
use App\Manager\ClassificationManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ClassificationController extends Controller
{
    /**
     * @Route("/admin/add/classification", name="add_classification")
     */
    public function addClassification(Request $request, ClassificationManager $classificationManager)
    {
        $classification = new Classification();

        $form = $this->createForm(ClassificationType::class, $classification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $classificationManager->createClassification($classification);

        }

        return $this->render('admin/add/add-classification.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}