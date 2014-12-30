<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Entity;

use DateTime;

class Address
{
	private $id;
    private $createdAt;
    private $updatedAt;
    private $contactName;
    private $email;
    private $phone;
    private $cellphone;
    private $locality;
    private $province;
    private $zipcode;
    private $street;
    private $orders;
    
    public function __construct()
    {
    	$this->createdAt = new DateTime('now');
    	$this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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
	
    public function getContactName() {
    	return $this->contactName;
    }
    public function setContactName($contactName) {
    	$this->contactName = $contactName;
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
	
 	public function getLocality()
    {
        return $this->locality;
    }
    
    public function setLocality($locality) {
    	$this->locality = $locality;
    	return $this;
    }
	
 	public function getProvince()
    {
        return $this->province;
    }
    
    public function setProvince($province) {
    	$this->province = $province;
    	return $this;
    }
	
 	public function getZipcode()
    {
        return $this->zipcode;
    }
    
    public function setZipcode($zipcode) {
    	$this->zipcode = $zipcode;
    	return $this;
    }
	
 	public function getStreet()
    {
        return $this->street;
    }
    
    public function setStreet($street) {
    	$this->street = $street;
    	return $this;
    }
    
    public function __toString()
    {
    	return $this->getStreet();
    }
    
    /*order*/
    public function getOrder()
    {
    	return $this->order;
    }
    
    public function addOrder(Order $order)
    {
    	if (!$this->hasOrder($order)) {
    		$order->setClient($this);
    		$this->orders->add($order);
    	}
    
    	return $this;
    }
    
    public function setOrders(Order $orders)
    {
    	foreach ($orders as $order) {
    		$this->addOrder($order);
    	}
    
    	return $this;
    }
    
    public function removeOrder(Order $order)
    {
    	if ($this->hasOrder($order)) {
    		$order->setClient(null);
    		$this->orders->removeElement($order);
    	}
    
    	return $this;
    }
    
    public function hasOrder(Order $order)
    {
    	return $this->orders->contains($order);
    }    
    
}