<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Odiseo\Bundle\PickMyStuffBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Order;

/**
 * User fixtures.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class LoadOrderData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; $i++) 
        {
        	$client = $this->getReference('pickmystuff.client-'.$i);
        	$carrier = $this->getReference('pickmystuff.carrier-'.$i);
        	$sourceAddress = $this->getReference('pickmystuff.address-1');
        	$destinationAddress = $this->getReference('pickmystuff.address-2');
        	
	        $order = new Order();
	        
	        $order->setClient($client);
	        $order->setCarrier($carrier);
	        $order->setSourceAddress($sourceAddress);
	        $order->setDestinationAddress($destinationAddress);
	        $order->setStatus('Abierto');
	        $order->setCollectedTime('11:30');
	        $order->setDeliveryTime('15:30');

            $manager->persist($order);

            $this->setReference('pickmystuff.order-'.$i, $order);
        }

        $manager->flush();
    }
    
	public function getOrderRepository()
	{	
		return $this->get('pickmystuff.repository.order');
	}
	
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 4;
    }
}
