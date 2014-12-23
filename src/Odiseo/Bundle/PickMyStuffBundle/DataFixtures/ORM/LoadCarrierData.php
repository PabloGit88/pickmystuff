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
use Odiseo\Bundle\PickMyStuffBundle\Entity\Carrier;

/**
 * User fixtures.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class LoadCarrierData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; $i++) 
        {
	        $carrier = new Carrier();
	        
	        $carrier->setVehicleType('Camion');
	        $carrier->setName('Jorge'.$i);
	        $carrier->setPhone('41235124');

            $manager->persist($carrier);

            $this->setReference('pickmystuff.carrier-'.$i, $carrier);
        }

        $manager->flush();
    }
    
	public function getCarrierRepository()
	{	
		return $this->get('pickmystuff.repository.carrier');
	}
	
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
