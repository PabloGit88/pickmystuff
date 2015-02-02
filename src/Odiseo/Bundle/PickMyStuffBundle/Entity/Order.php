<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Entity;

use DateTime;

class Order
{
	private $id;
    private $createdAt;
    private $updatedAt;
    private $client;
    private $carrier;
    private $status;
    private $sourceAddress;
    private $destinationAddress;
    private $mercancy;
    private $deliveryTime;
    private $collectedTime;
    private $comments;
    private $vehicleType;
    private $isComplete;

    public function getId()
    {
        return $this->id;
    }
    
    public function __construct()
    {
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
        
    public function getClient() {
    	return $this->client;
    }
    public function setClient(Client $client) {
    	$this->client = $client;
    	return $this;
    }
        
    public function getCarrier() {
    	return $this->carrier;
    }
    public function setCarrier(Carrier $carrier) {
    	$this->carrier = $carrier;
    	return $this;
    }
	
    public function getStatus() {
    	return $this->status;
    }
    public function setStatus($status) {
    	$this->status = $status;
    	return $this;
    }
    
	public function getSourceAddress() {
		return $this->sourceAddress;
	}
	
	public function setSourceAddress(Address $sourceAddress) {
		$this->sourceAddress = $sourceAddress;
		return $this;
	}
	
	public function getDestinationAddress() {
		return $this->destinationAddress;
	}
	
	public function setDestinationAddress(Address $destinationAddress) {
		$this->destinationAddress = $destinationAddress;
		return $this;
	}
    
    public function setAddress(Address $address) {
    	$this->address = $address;
    	return $this;
    }
	
 	public function getMercancy()
    {
        return $this->mercancy;
    }
    public function setMercancy(Mercancy $mercancy)
    {
    	$this->mercancy = $mercancy;
    	$this->mercancy->setOrder($this);
    	return $this;
    }
	
 	public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }
    
    public function setDeliveryTime($deliveryTime) {
    	$this->deliveryTime = $deliveryTime;
    	return $this;
    }
	
 	public function getCollectedTime()
    {
        return $this->collectedTime;
    }
    
    public function setCollectedTime($collectedTime) {
    	$this->collectedTime = $collectedTime;
    	return $this;
    }
    
    public function getComments()
    {
    	return $this->comments;
    }
    public function setComments($comments)
    {
    	$this->comments = $comments;
    	return $this;
    }    
        
    public function getVehicleType() {
    	return $this->vehicleType;
    }
    
    public function setVehicleType($vehicleType) {
    	$this->vehicleType = $vehicleType;
    	return $this;
    }
    
    public function __toString()
    {
    	return $this->getStatus();
    }    
	
    public function getIsComplete() {
    	return $this->isComplete;
    }
    
    public function setIsComplete($isComplete) {
    	$this->isComplete = $isComplete;
    	return $this;
    }

}