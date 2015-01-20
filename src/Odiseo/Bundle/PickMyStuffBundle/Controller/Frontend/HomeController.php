<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Odiseo\Bundle\PickMyStuffBundle\Form\Type\OrderFrontendType;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Order;
use Odiseo\Bundle\PickMyStuffBundle\Entity\Client;

class HomeController extends Controller
{
    public function indexAction(Request $request)
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
    		'action' => $this->generateUrl('odiseo_pick_my_stuff_frontend_home_submit'))
    	);
    	
        return $this->render('OdiseoPickMyStuffBundle:Frontend:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function submitAction(Request $request)
    {
    	$form = $this->createForm(new OrderFrontendType());
    	$form->handleRequest($request);
    	
	    if ($form->isValid()) 
	    {
	    	$orderForm = $form->getData();
	    	
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($orderForm);
		    $em->flush();

		    $this->sendSms();
			
		    $vars = array();
		    $noticeMessage = 'Pedido enviado correctamente!';
		    
			if($form->get('Add')->isClicked())
			{
				$vars['id'] = $orderForm->getId();
				$noticeMessage .= ' Puede agregar otro a continuación';
		    }
		    
		    $this->get('session')->getFlashBag()->add('notice', $noticeMessage);
		    
		    return $this->redirect($this->generateUrl('odiseo_pick_my_stuff_frontend_home', $vars));
		}
    }
    
    private function sendSms()
    {
    	$smsSender = $this->get('pickmystuff.sms.sender');
    	$smsSender->sendTextMessageToNumber("+14108675309", "TEST MESSAGE!!");
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
