<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Frontend;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class CostumerController extends Controller
{
	public function indexAction(Request $request)
	{
		$contact = $request->get('contact');
		$emailTo = $this->container->getParameter('pickmystuff.contact.mail');
		$this->get('pickmystuff.send.mailer')->sendCostumerMail($contact,$emailTo);
		
		return $this->render('OdiseoPickMyStuffBundle:Frontend:contact.html.twig');
        //return $this->redirect($this->generateUrl('odiseo_pick_my_stuff_frontend_contact'));
	}
		
}