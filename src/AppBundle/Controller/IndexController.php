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
	$training_details->setUrl('https://www.endomondo.com/workouts/546810831/10959221');
	
	dump($training_details->get());
	
	$lastDistance = $this->get('LastDistance');
	dump($lastDistance->get('#rowerowyrownik'));
        
       
        
        return array();
    }
}
