<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Entity;

use DateTime;

class Client
{
	private $id;
    private $createdAt;
    private $updatedAt;
    private $company;
    private $fullname;
    private $email;
    private $phone;
    private $cellphone;
    private $sendText;
    private $address;
    private $orders;

    public function getId()
    {
        return $this->id;
    }
    
    public function __construct()
    {
    	$this->createdAt = new DateTime('now');
    	$this->orders = new \Doctrine\Common\Collections\ArrayCollection();
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
	
    public function getFullname() {
    	return $this->fullname;
    }
    
    public function setFullname($fullname) {
    	$this->fullname = $fullname;
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