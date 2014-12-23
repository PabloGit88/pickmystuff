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

    public function getId()
    {
        return $this->id;
    }
    
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
    		$this->addMercancy($mercancy);
    	}
    
    	return $this;
    }
    
    public function removeMercancy(Mercancy $mercancy)
    {
    	if ($this->hasMercancy($mercancy)) {
    		$mercancy->setMercancy(null);
    		$this->mercancy->removeElement($mercancy);
    	}
    
    	return $this;
    }
    
    public function hasMercancy(Mercancy $mercancy)
    {
    	return $this->mercancy->contains($mercancy);
    }

}