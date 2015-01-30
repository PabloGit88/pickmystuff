<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Odiseo\Bundle\PickMyStuffBundle\Form\Type\OrderFrontendType;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Order;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Client;

class HomeController extends Controller
{
    
    public function indexAction()
    {    	    	
        return $this->render('OdiseoPickMyStuffBundle:Frontend:index.html.twig');
    	
    }
    
    public function orderAction(Request $request)
    {
    	$order = null;
    	if($id = $request->get('id'))
    	{
    		$repository = $this->get('odiseo_pickmystuff.repository.order');
    		$orderFormData = $repository->find($id);
    		
    		$order = new Order();
    		$client = $orderFormData->getClient();
    		$order->setClient($client);
    	}
    	
    	$form = $this->createForm(new OrderFrontendType(), $order, array(
    		'action' => $this->generateUrl('odiseo_pick_my_stuff_frontend_order'))
    	);
    	
    	if($request->isMethod('POST'))
    	{
    		$form->handleRequest($request);
    		 
    		if ($form->isValid())
    		{
    			$orderForm = $form->getData();
    			/* si ordena con el mismo mail se pisa el cliente*/
    			$emailForm = $orderForm->getClient()->getEmail();
    			$fullnameForm = $orderForm->getClient()->getFullname();
    			$phoneForm = $orderForm->getClient()->getPhone();
    		
    			$repository = $this->get('odiseo_pickmystuff.repository.client');
    			$clientData = $repository->findOneBy(array('email'  => $emailForm));
    			if($clientData != null)
    			{
    				$clientData->setFullname($fullnameForm);
    				$clientData->setPhone($phoneForm);
    				 
    				$orderForm->setClient($clientData);
    			}
    			/**/
    		
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($orderForm);
    			$em->flush();
    				
    			/*send mail*/
    			$this->sendMail($orderForm);
    			/**/
    				
    			$vars = array();
    			$noticeMessage = 'Pedido enviado correctamente!';
    		
    			if($form->get('Add')->isClicked())
    			{
    				$vars['id'] = $orderForm->getId();
    				$noticeMessage .= ' Puede agregar otro a continuación';
    			}
    		
    			$this->get('session')->getFlashBag()->add('notice', $noticeMessage);
    		
    			return $this->redirect($this->generateUrl('odiseo_pick_my_stuff_frontend_order', $vars));
    		}    		
    	}
    	
        return $this->render('OdiseoPickMyStuffBundle:Frontend:order.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    private function sendSms()
    {
    	$smsSender = $this->get('pickmystuff.sms.sender');
    	$smsSender->sendTextMessageToNumber("+14108675309", "TEST MESSAGE!!");
    }
    private function sendMail($orderForm)
    {
		$emailFrom = $this->container->getParameter('pickmystuff.contact.mail');
		$this->get('pickmystuff.send.mailer')->sendHomeMail($orderForm,$emailFrom);
    }
    
    public function aboutUsAction()
    {    	    	
        return $this->render('OdiseoPickMyStuffBundle:Frontend:aboutUs.html.twig');
    	
    }
    
    public function contactAction()
    {
        return $this->render('OdiseoPickMyStuffBundle:Frontend:contact.html.twig');
    	
    }
}
