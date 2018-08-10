<?php


namespace App\Controller;

use App\Entity\Model;
use App\Form\ModelType;
use App\Manager\ModelManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ModelController extends Controller
{
    /**
     * @Route("/admin/add/model", name="add_model")
     */
    public function addModel(Request $request, ModelManager $modelManager)
    {
        $model = new Model();

        $form = $this->createForm(ModelType::class, $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $model->getImage();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_model_directory'),
                $fileName
            );

            $model->setImage($fileName);
            $modelManager->createModel($model);

        }

        return $this->render('admin/add/add-model.html.twig', array(
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