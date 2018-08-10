<?php


namespace App\Controller;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Manager\BrandManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BrandController extends Controller
{
    /**
     * @Route("/admin/add/brand", name="add_brand")
     */
        public function addBrand(Request $request, BrandManager $brandManager)
    {
        $brand = new Brand();

        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if(!empty($brand->getImage())){
                /** @var UploadedFile $file */
                $file = $brand->getImage();

                $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

                // moves the file to the directory where brochures are stored
                $file->move(
                    $this->getParameter('images_brand_directory'),
                    $fileName
                );

                $brand->setImage($fileName);
            }

            $brandManager->createBrand($brand);

        }

        return $this->render('admin/add/add-brand.html.twig', array(
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