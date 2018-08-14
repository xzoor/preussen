<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;




class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     *
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('default/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(){
        return $this->render('@App/Security/logout.html.twig', array(
        ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(){

    }



}
