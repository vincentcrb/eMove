<?php


namespace App\Controller;


use App\Entity\Range;
use App\Form\RangeType;
use App\Manager\RangeManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class RangeController extends Controller
{
    /**
     * @Route("/admin/add/range", name="add_range")
     */
    public function addRange(Request $request, RangeManager $rangeManager)
    {
        $range = new Range();

        $form = $this->createForm(RangeType::class, $range);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $rangeManager->createRange($range);

        }

        return $this->render('admin/add/add-range.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}