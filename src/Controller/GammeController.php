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
     * @Route("/admin/addGamme", name="add_gamme")
     */
    public function addGamme(Request $request, GammeManager $gammeManager)
    {
        $gamme = new Gamme();

        $form = $this->createForm(GammeType::class, $gamme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $gammeManager->createGamme($gamme);

        }

        return $this->render('admin/gamme.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}