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
use Odiseo\Bundle\PickMyStuffBundle\Entity\Mercancy;

/**
 * User fixtures.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class LoadMercancyData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; $i++) 
        {
        	$order = $this->getReference('pickmystuff.order-'.$i);
        	
	        $mercancy = new Mercancy();

	        $mercancy->setOrder($order);
	        $mercancy->setType('Caja'.$i);
	        $mercancy->setLength('12cm');
	        $mercancy->setHeight('40cm');
	        $mercancy->setWidth('15cm');
	        $mercancy->setWeight('12cm');

            $manager->persist($mercancy);

            $this->setReference('pickmystuff.mercancy-'.$i, $mercancy);
        }

        $manager->flush();
    }
    
	public function getMercancyRepository()
	{	
		return $this->get('pickmystuff.repository.mercancy');
	}
	
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 5;
    }
}
