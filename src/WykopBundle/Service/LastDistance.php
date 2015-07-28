<?php

namespace WykopBundle\Service;

class LastDistance{
    
    private $_api;
    private $_em;
    
    function __construct($WykopApi, $entityManager){
            $this->_api = $WykopApi;
            $this->_em = $entityManager;
    }
    
    function get($tag){
	$tag = ltrim($tag, '#'); // Delete redundant # from tag
        $result = $this->_api->doRequest('tag/entries/'.$tag);
	

        if($this->_api->isValid()){
            preg_match('/=(.+)/', $result['items'][0]['body'], $result);
            $result = $result[1];

            $result = preg_replace('/[^\.\,0-9]+/', '', $result);
            $result = preg_replace('/[\,]+/', '.', $result);
            
            if($result > 0){
                $last_distance = new \WykopBundle\Entity\LastDistance();
                
                $last_distance->setDistance($result);
                $last_distance->setDate(new \DateTime('now'));
		
		$tag_r = $this->_em->getRepository('WykopBundle:Tag');
		$tag = $tag_r->findOneByName($tag);
		
		$last_distance->setTag($tag);
                
                $this->_em->persist($last_distance);
                $this->_em->flush();
            }
            
	    return $result;
        }else{
	    return $this->_api->getError();
        }
    }
}