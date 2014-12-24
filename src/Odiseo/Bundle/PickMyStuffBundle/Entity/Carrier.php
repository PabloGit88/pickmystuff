<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Entity;

use DateTime;

class Carrier
{
	private $id;
    private $createdAt;
    private $updatedAt;
    private $orders;
    private $vehicleType;
    private $name;
    private $phone;

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
        
    public function getVehicleType() {
    	return $this->vehicleType;
    }
    
    public function setVehicleType($vehicleType) {
    	$this->vehicleType = $vehicleType;
    	return $this;
    }
        
    public function getName() {
    	return $this->name;
    }
    
    public function setName($name) {
    	$this->name = $name;
    	return $this;
    }
	
	public function getPhone() {
		return $this->phone;
	}
	
	public function setPhone($phone) {
		$this->phone = $phone;
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