<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

class Cliente
{
    private $createdAt;
    private $updatedAt;
    private $company;
    private $contact;
    private $email;
    private $phone;
    private $cellphone;
    private $sendText;
    private $address;
    private $mercancy;
    
    public function __construct()
    {
    	parent::__construct();
    	$this->createdAt = new DateTime('now');
    }
  
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
        
    public function getComapany() {
    	return $this->company;
    }
    public function setCompany($company) {
    	$this->company = $company;
    	return $this;
    }
	
    public function getContacty() {
    	return $this->contact;
    }
    public function setContact($contact) {
    	$this->contact = $contact;
    	return $this;
    }
    
	public function getEmail() {
		return $this->email;
	}
	
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}
	
	public function getCellphone() {
		return $this->cellphone;
	}
	
	public function setCellphone($cellphone) {
		$this->cellphone = $cellphone;
		return $this;
	}
	
 	public function getSendText()
    {
        return $this->sendText;
    }
    
    public function setSendText($sendText) {
    	$this->sendText = $sendText;
    	return $this;
    }
	
 	public function getAddress()
    {
        return $this->address;
    }
    
    public function setAddress(Address $address) {
    	$this->address = $address;
    	return $this;
    }
	
 	public function getMercancy()
    {
        return $this->mercancy;
    }
    
    public function addtMercancy(Mercancy $mercancy) {
    	
    	if (!$this->hasMercancy($mercancy)) {
    		$mercancy->setMercancy($this);
    		$this->mercancy->add($mercancy);
    	}
    	    	
    	$this->mercancy = $mercancy;
    	return $this;
    } 
    public function setMercancy(Collection $mercancies)
    {
    	foreach ($mercancies as $mercancy) {
    		$this->addProperty($mercancy);
    	}
    
    	return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function removeMercancy(Mercancy $mercancy)
    {
    	if ($this->hasProperty($mercancy)) {
    		$mercancy->setMercancy(null);
    		$this->mercancy->removeElement($mercancy);
    	}
    
    	return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function hasMercancy(Mercancy $mercancy)
    {
    	return $this->mercancy->contains($mercancy);
    }
    

}