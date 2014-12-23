<?php
/*
namespace Odiseo\Bundle\ChallengeBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;
use Odiseo\Bundle\ConAgraBundle\Entity\User;

class LoadUserData extends DataFixture
{
    public function load(ObjectManager $manager)
    {
    	$userAdmin = new User();
    	$userAdmin->setFullName('Admin ConAgra Foods');
    	$userAdmin->setUsername('admin');
    	$userAdmin->setEmail('admin@conagra.com');
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
*/