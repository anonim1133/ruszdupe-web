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
	    $training = $this->_endomondo->get($this->_url);
	    
	    $this->_training['training'] = $training;
	    
	    $this->_training['start_time'] = $training->local_start_time;
	    $this->_training['duration'] = $training->duration;
	    $this->_training['distance'] = $training->distance;
	    $this->_training['distance_vertical'] = $training->ascent+$training->descent;
	    $this->_training['calories'] = $training->calories;
	    $this->_training['speed_avg'] = $training->speed_avg;
	    $this->_training['speed_max'] = $training->speed_max;
	    $this->_training['heart_rate_avg'] = $training->heart_rate_avg;
	    $this->_training['heart_rate_max'] = $training->heart_rate_max;

	    if(isset($training->pictures))
		$this->_training['pictures'] = $training->pictures;
	    
	}elseif(preg_match('/strava/', $url)){
	    $training = $this->_strava->get($this->_url);
	    
	    $this->_training['training'] = $training;
	    
	    $this->_training['start_time'] = $training->start_date;
	    
	    $date = new \DateTime();
	    $date->setTimeStamp($training->elapsed_time/10);
	    $this->_training['duration'] = $date->format('H:i:s');
	    $this->_training['distance'] = $training->distance;
	    $this->_training['calories'] = $training->kilojoules*0.2388458966;
	    $this->_training['speed_avg'] = $training->average_speed;
	    $this->_training['speed_max'] = $training->max_speed;
	    $this->_training['heart_rate_avg'] = $training->average_heartrate;
	    $this->_training['heart_rate_max'] = $training->max_heartrate;
	    
	}elseif(preg_match('/endo/', $url)){
	    $this->_training = $this->_runkeeper->get($this->_url);
	}else{
	    throw new Exception('Unrecognized url');
	}
    }
    
    function get(){
	return $this->_training;
    }
}