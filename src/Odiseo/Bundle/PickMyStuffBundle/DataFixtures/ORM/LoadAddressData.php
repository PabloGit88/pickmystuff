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
use Odiseo\Bundle\PickMyStuffBundle\Entity\Address;

/**
 * User fixtures.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class LoadAddressData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; $i++) 
        {
        	
	        $address = new Address();

	        $address->setContactName('Pepe '.$i);
	        $address->setEmail('Pepe'.$i.'@pick.com');
	        $address->setPhone('4323412');
	        $address->setCellphone('15123123');
	        $address->setLocality('Wilde'.$i);
	        $address->setProvince('Bs.As'.$i);
	        $address->setZipcode('131'.$i);
	        $address->setDeliveryTime('12-12-12');

            $manager->persist($address);

            $this->setReference('pickmystuff.address-'.$i, $address);
        }

        $manager->flush();
    }
    
	public function getAddressRepository()
	{	
		return $this->get('pickmystuff.repository.address');
	}
	
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
