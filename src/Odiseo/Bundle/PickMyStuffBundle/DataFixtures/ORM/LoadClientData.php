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
use Odiseo\Bundle\PickMyStuffBundle\Entity\Client;

/**
 * User fixtures.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class LoadClientData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; $i++) 
        {
        	
        	$date = new \DateTime('15-01-20');
        	
	        $client = new Client();
	        $client->setFullname('Pepe '.$i);
	        $client->setAddress('Direccion'.$i);
	        $client->setEmail('Pepe'.$i.'@pick.com');
	        $client->setPhone('4323412');
	        $client->setCellphone('15123123');
	        $client->setDesiredDeliveryDate($date);

            $manager->persist($client);

            $this->setReference('pickmystuff.client-'.$i, $client);
        }

        $manager->flush();
    }
    
	public function getClientRepository()
	{	
		return $this->get('pickmystuff.repository.client');
	}
	
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }
}