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
    private $email;
    private $isPaid;
    private $originTown;
    private $destinationTown;
    private $address;
    private $photoTruck;
    private $commissionPermits;
    private $portsPermits;
    private $carPolicy;
    private $mercancyPolicy;
    private $responsabilityPolicy;
    private $contractPickmystuff;

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
	
    public function getIsPaid() {
    	return $this->isPaid;
    }
    
    public function setIsPaid($isPaid) {
    	$this->isPaid = $isPaid;
    	return $this;
    }
	
    public function getOriginTown() {
    	return $this->originTown;
    }
    
    public function setOriginTown($originTown) {
    	$this->originTown = $originTown;
    	return $this;
    }    
	
    public function getDestinationTown() {
    	return $this->destinationTown;
    }
    
    public function setDestinationTown($destinationTown) {
    	$this->destinationTown = $destinationTown;
    	return $this;
    }    
	/**/
	
 	public function getAddress()
    {
        return $this->address;
    }    
    public function setAddress($address) {
    	$this->address = $address;
    	return $this;
    }
    
	public function getEmail() {
		return $this->email;
	}	
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	
    public function getPhotoTruck() {
    	return $this->photoTruck;
    }    
    public function setPhotoTruck($photoTruck) {
    	$this->photoTruck = $photoTruck;
    	return $this;
    }    
	
    public function getCommissionPermits() {
    	return $this->commissionPermits;
    }    
    public function setCommissionPermits($commissionPermits) {
    	$this->commissionPermits = $commissionPermits;
    	return $this;
    }    
	
    public function getPortsPermits() {
    	return $this->portsPermits;
    }
    
    public function setPortsPermits($portsPermits) {
    	$this->portsPermits = $portsPermits;
    	return $this;
    }    
	
    public function getCarPolicy() {
    	return $this->carPolicy;
    }
    
    public function setCarPolicy($carPolicy) {
    	$this->carPolicy = $carPolicy;
    	return $this;
    }    
	
    public function getMercancyPolicy() {
    	return $this->mercancyPolicy;
    }
    
    public function setMercancyPolicy($mercancyPolicy) {
    	$this->mercancyPolicy = $mercancyPolicy;
    	return $this;
    }    
	
    public function getResponsabilityPolicy() {
    	return $this->responsabilityPolicy;
    }
    
    public function setResponsabilityPolicy($responsabilityPolicy) {
    	$this->responsabilityPolicy = $responsabilityPolicy;
    	return $this;
    }    
	
    public function getContractPickmystuff() {
    	return $this->contractPickmystuff;
    }
    
    public function setContractPickmystuff($contractPickmystuff) {
    	$this->contractPickmystuff = $contractPickmystuff;
    	return $this;
    }
}