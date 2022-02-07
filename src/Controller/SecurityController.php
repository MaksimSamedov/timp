<?php

namespace App\Controller;

use App\Utils\SessionUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
//        $session = SessionUtils::startSession();
         if ($this->getUser()) {
             return $this->redirectToRoute('admin');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
//        if($error === null){
//            $session->set('isAuthenticated', 'authenticated');
//        }elseif($session->get('isAuthenticated')) {
//            $session->remove('isAuthenticated');
//        }

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
//        if(isset($_SESSION['isAuthenticated'])) {
//            unset($_SESSION['isAuthenticated']);
//        }
        $this->redirect('/login');
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
