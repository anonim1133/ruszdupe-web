<?php

namespace TrainingSourceBundle\Service;

class getTrainingDetails{
    
    private $_url;
    private $_endomondo;
    private $_strava;
    private $_runkeeper;
    
    private $_training;
    
    function __construct($endomondo, $strava, $runkeeper){
	$this->_endomondo = $endomondo;
	$this->_strava = $strava;
	$this->_runkeeper = $runkeeper;
    }
    
    function setUrl($url){
	$this->_url = $url;
	
	if(preg_match('/endo/', $url)){
	    $this->_training = $this->_endomondo->get('url');
	}elseif(preg_match('/strava/', $url)){
	    $this->_training = $this->_strava->get('url');
	}elseif(preg_match('/endo/', $url)){
	    $this->_training = $this->_runkeeper->get('url');
	}else{
	    throw new Exception('Unrecognized url');
	}
    }
    
    function get(){
	return $this->_training;
    }
}