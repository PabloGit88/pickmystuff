<?php

namespace Odiseo\Bundle\PickMyStuffBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;
use Odiseo\Bundle\PickMyStuffBundle\Entity\User;

class LoadUserData extends DataFixture
{
    public function load(ObjectManager $manager)
    {
    	$userAdmin = new User();
    	$userAdmin->setFullName('Admin PickMyStuff');
    	$userAdmin->setUsername('admin');
    	$userAdmin->setEmail('admin@pickmystuff.com');
    	$userAdmin->setPlainPassword('123456');
    	$userAdmin->setEnabled(true);
    	$userAdmin->setRoles(array('ROLE_ADMIN'));
    	 
    	$manager->persist($userAdmin);
    	
    	$manager->flush();
    }
    
    public function getOrder()
    {
    	return 1;
    }
}