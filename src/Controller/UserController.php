<?php


namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /**
     * @Route("/sign-up", name="sign_up")
     */
    public function registerUser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('sign_up');
        }

        return $this->render('default/sign-up.html.twig', [ 'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/", name="sign_in")
     */
    public function login(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('default/sign-in.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }



    /**
     * @Route("/home/profil", name="profil")
     */
    public function profilUser()
    {
        $user = $this->getUser();

        if ($user == null) {
            throw new NotFoundHttpException('404, Utilisateur non trouvé');
        }
        return $this->render('user/profil/profil-page.html.twig', [
            'user' => $user
        ]);
    }



    /**
     * @Route("/sign-out", name="sign_out")
     */
    public function logout()
    {

    }

}