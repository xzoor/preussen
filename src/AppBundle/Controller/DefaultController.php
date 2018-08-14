<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     */
    public function indexAction(Request $request)
    {

        $datos = $this->get('security.token_storage')->getToken()->getUser();
        //dump($datos );exit;
        if($datos == "anon."){
            $user = "Anonimo";
            $validado = false;
        }else{
            $user = $datos->getUsername();
            $validado = $datos->getActivo();
        }


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'user'=> $user,
            'validado' => $validado
        ]);
    }
    public function fooAction(UserInterface $user)
    {
        $userId = $user->getId();
    }

}
