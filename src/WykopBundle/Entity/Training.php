<?php

namespace WykopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    private $idTag;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="id_city")
     */
    private $idCity;

    /**
     * @var string
     *
     * @ORM\Column(name="name_user", type="string", length=255)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float")
     */
    private $distance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $date_add;

    public function __construct(){
	$date = new \DateTime();
	$minutes = $date->format('i');
	if($minutes > 0){
	    //$date->modify("+- hour");
	    $date->modify('-'.$minutes.' minutes');
	}

    
        $this->date = $date;
	
	$this->date_add = new \DateTime();
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
     * Set idTag
     *
     * @param integer $idTag
     * @return Training
     */
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get idTag
     *
     * @return integer 
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
    
    /**
     * Get Tag
     *
     * @return integer 
     */
    public function getTag()
    {
        return $this->idTag;
    }

    /**
     * Set idCity
     *
     * @param integer $idCity
     * @return Training
     */
    public function setIdCity($idCity)
    {
        $this->idCity = $idCity;

        return $this;
    }

    /**
     * Get idCity
     *
     * @return integer 
     */
    public function getIdCity()
    {
        return $this->idCity;
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
     * Set link
     *
     * @param string $link
     * @return Training
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set distance
     *
     * @param float $distance
     * @return Training
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return float 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Training
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
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
}
