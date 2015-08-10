<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/")
     * @Template("AppBundle:Index:Index.html.twig")
     */
    public function showIndexAction(){
    
        $session = new Session();
        $token = $this->get('security.token_storage')->getToken();
	
	if($token->isAuthenticated() && count($token->getRoles()) && $token->getProviderKey() == 'wykop'){
		$login_date = $token->getAttribute('wykop_login_date');
		$now_date = new \DateTime('now');

		$diff = $login_date->diff($now_date);

		if($diff->format('%h') >= 23)
		    return $this->redirectToRoute ('login');
	}else{
	    return $this->redirectToRoute('login', array(), 301);
	}
        
        return $this->redirectToRoute('training_new', array(), 301);
    }
    
    /**
     * @Route("/test")
     * @Template("AppBundle:Index:test.html.twig")
     */
    public function testAction(){
    
        $training_details = $this->get('getTrainingDetails');
		
	
//	dump($training_details->get('https://www.endomondo.com/users/10391720/workouts/343135237'));
//	dump($training_details->get('https://www.endomondo.com/workouts/571529785/9982639'));
//	dump($training_details->get('http://www.strava.com/activities/56519726'));
	
	
	
	$lastDistance = $this->get('LastDistance');
	dump($lastDistance->get('#kochamgory'));
        
       
        
        return array();
    }
}
