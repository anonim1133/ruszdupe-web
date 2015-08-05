<?php

namespace WykopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Training
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WykopBundle\Entity\TrainingRepository")
 */
class Training
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Tag")
     * @ORM\JoinColumn(name="id_tag", )
     */
    private $tag;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="id_city")
     */
    private $city;
    
    /**
     * @var integer
     *
     * @ORM\ManyToMany(targetEntity="Distance")
     * @ORM\JoinColumn(name="id_distance", nullable=false)
     */
    private $distance;

    /**
     * @var string
     *
     * @ORM\Column(name="name_user", type="string", length=255)
     */
    private $nameUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $date_add;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    private $details;
    
    /**
     * @var \DateTime
     */
    private $dates;
    
    /**
     * @var boolean
     */
    private $ad;
    
    public function __construct(){
	$date = new \DateTime();
	$minutes = $date->format('i');
	if($minutes > 0){
	    //$date->modify("+- hour");
	    $date->modify('-'.$minutes.' minutes');
	}

    
        $this->date = $date;
	
	$this->date_add = new \DateTime();
	
	$this->distance = new ArrayCollection();
	$this->dates = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Tag
     *
     * @param Tag $Tag
     * @return Training
     */
    public function setTag($Tag)
    {
        $this->tag = $Tag;
	
	setcookie('default_tag', $Tag->getId(), time()+3600*24*32);

        return $this;
    }

    /**
     * Get Tag
     *
     * @return integer 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set City
     *
     * @param City $City
     * @return Training
     */
    public function setCity($City)
    {
        $this->city = $City;

        return $this;
    }

    /**
     * Get City
     *
     * @return City 
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Set distance
     *
     * @param Distance $distance
     * @return Training
     */
    public function setDistance($distance)
    {
        $this->distance->add($distance);

        return $this;
    }

    /**
     * Get distance
     *
     * @return Distance
     */
    public function getDistance()
    {
        return $this->distance;
    }
    
    /**
     * Set nameUser
     *
     * @param string $nameUser
     * @return Training
     */
    public function setNameUser($nameUser)
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    /**
     * Get nameUser
     *
     * @return string 
     */
    public function getNameUser()
    {
        return $this->nameUser;
    }

    /**
     * Set add date
     *
     * @param \DateTime $date
     * @return Training
     */
    public function setDateAdd($date)
    {
        $this->date_add = $date;

        return $this;
    }

    /**
     * Get add date
     *
     * @return \DateTime 
     */
    public function getDateAdd()
    {
        return $this->date_add;
    }
    
    /**
     * Set details
     *
     * @param string $details
     * @return Distance
     */
    public function setDetails($details)
    {
        $this->details= $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }
    
    /**
     * Add date
     *
     * @param \DateTime $date
     * @return Training
     */
    public function setDates($date)
    {
        $this->dates->add($date);

        return $this;
    }

    /**
     * Get dates
     *
     * @return Array
     */
    public function getDates()
    {
        return $this->dates;
    }
    
    /**
     * Set ad
     * 
     * @return Training
     */
    public function setAd($on){
	$this->ad = $on;
	if($on)
	    setcookie('ad', 'true', time()+3600*24*32);
	else
	    setcookie('ad', 'false', time()+3600*24*32);
	
	return $this;
    }
    
    /**
     * Get ad
     * 
     * @return boolean
     */
    public function getAd(){
	return $this->ad;
    }
}
