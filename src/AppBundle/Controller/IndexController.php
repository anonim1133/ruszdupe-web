<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/")
     * @Template("AppBundle:Index:Index.html.twig")
     */
    public function showIndexAction(){
    
        
        
       
        
        return $this->redirectToRoute('training_new', array(), 301);
    }
    
    /**
     * @Route("/test")
     * @Template("AppBundle:Index:test.html.twig")
     */
    public function testAction(){
    
        $training_details = $this->get('getTrainingDetails');
		
	
	dump($training_details->get('https://www.endomondo.com/users/10391720/workouts/343135237'));
//	dump($training_details->get('https://www.endomondo.com/workouts/571529785/9982639'));
	dump($training_details->get('http://www.strava.com/activities/56519726'));
	
	
	
	$lastDistance = $this->get('LastDistance');
	dump($lastDistance->get('#rowerowyrownik'));
        
       
        
        return array();
    }
}
