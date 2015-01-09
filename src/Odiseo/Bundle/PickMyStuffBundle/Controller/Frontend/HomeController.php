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
    	$form = $this->createForm(new OrderFrontendType(),null,array(
    		'action' => $this->generateUrl('odiseo_pick_my_stuff_frontend_home_submit'))
    	);
    	
    	
        return $this->render('OdiseoPickMyStuffBundle:Frontend:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function submitAction(Request $request)
    {
    	$form = $this->createForm(new OrderFrontendType()
    	);
    	
    	$form->handleRequest($request);
    	
    	$OrderForm = $form->getData();
    	
	    if ($form->isValid()) {
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($OrderForm);
		    $em->flush();

			if($form->get('Add')->isClicked())
			{
				$nextAction = 'odiseo_pick_my_stuff_frontend_home_add';
				$id = $OrderForm->getId();
		    	
		    }else
		    { 
		    	$nextAction = 'odiseo_pick_my_stuff_frontend_home';
		    	$id = "";
		    }
		    
		    return $this->redirect($this->generateUrl($nextAction, array('id' => $id)));
		}
    }
    
    public function submitAddAction(Request $request)
    {
    	$form = $this->createForm(new OrderFrontendType()
    	);
    	
    	$form->handleRequest($request);
    	
    	$order = new Order();
    	$client = new Client();
    	$id = $request->get('id');
    	/*$em = $this->getDoctrine()->getManager();
    	$query = $em->createQueryBuilder()
	    	->select('o')
	    	->from('Odiseo\Bundle\PickMyStuffBundle\Entity\Order', 'o')
	    	->where('o.id = :id')
	    	->setParameter('id', $id)
	    	->getQuery()
    	;*/
    	$repository = $this->getDoctrine()->getManager()->getRepository('Odiseo\Bundle\PickMyStuffBundle\Entity\Order');
    	$orderFormData = $repository->find($id);
    	//$data = $query->getResult();    	
    	
    	$client = $orderFormData->getClient();
    	$order->setClient($client);
    	
    	$form = $this->createForm(new OrderFrontendType(),$order,array(
    		'action' => $this->generateUrl('odiseo_pick_my_stuff_frontend_home_submit'))
    	);
    	
    	
        return $this->render('OdiseoPickMyStuffBundle:Frontend:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
