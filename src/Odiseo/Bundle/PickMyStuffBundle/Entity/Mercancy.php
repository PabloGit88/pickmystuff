<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Entity;

use DateTime;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

class Mercancy
{
	private $id;
    private $createdAt;
    private $updatedAt;
    private $type;
    private $length;
    private $width;
    private $height;
    private $weight;
    private $quantity;
 	protected $imageFile;
    protected $imageName;
    private $order;

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
        
    public function getType() {
    	return $this->type;
    }
    public function setType($type) {
    	$this->type = $type;
    	return $this;
    }
	
    public function getLength() {
    	return $this->length;
    }
    public function setLength($length) {
    	$this->length = $length;
    	return $this;
    }
    
	public function getWidth() {
		return $this->width;
	}
	
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}
	
	public function getHeight() {
		return $this->height;
	}
	
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}
	
	public function getWeight() {
		return $this->weight;
	}
	
	public function setWeight($weight) {
		$this->weight = $weight;
		return $this;
	}
	
 	public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setQuantity($quantity) {
    	$this->quantity = $quantity;
    	return $this;
    }
	
 	public function getOrder()
    {
        return $this->order;
    }
    
    public function setOrder(Order $order) {
    	$this->order = $order;
    	return $this;
    }
    /* vichuploader*/
    public function setImageFile(File $image = null)
    {
    	$this->imageFile = $image;
    
    	if ($image) {
    		// It is required that at least one field changes if you are using doctrine
    		// otherwise the event listeners won't be called and the file is lost
    		$this->updatedAt = new \DateTime('now');
    	}
    }
    
    /**
     * @return File
     */
    public function getImageFile()
    {
    	return $this->imageFile;
    }
    
    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
    	$this->imageName = $imageName;
    }
    
    /**
     * @return string
     */
    public function getImageName()
    {
    	return $this->imageName;
    }

}