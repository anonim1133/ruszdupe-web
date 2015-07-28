<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AuthController extends Controller
{
    /**
     * @Route("/signIn")
     * @Template()
     */
    public function signInAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/signUp")
     * @Template()
     */
    public function signUpAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/signOut")
     * @Template()
     */
    public function signOutAction()
    {
        return array(
                // ...
            );    }

}
