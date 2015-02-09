<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function dashboardAction()
    {
    	$repository = $this->get('odiseo_pickmystuff.repository.order');
    	$orders = $repository->findAll();
    	
    	$totalOrders = count($orders);
    	$complete = 0;
    	$notComplete = 0;
    	foreach ($orders as $order)
    	{
    		$isComplete = $order->getIsComplete();
    		if($isComplete == true){
    			$complete++;
    		}else{
    			$notComplete++;
    		}
    	}
    	
        return $this->render('OdiseoPickMyStuffBundle:Backend/Main:dashboard.html.twig', array(
            'totalOrders' => $totalOrders,
            'complete' => $complete,
            'notComplete' => $notComplete,
        ));
    }
    public function sendSmsAction(Request $request)
    {
    	$idCarrier = $request->get('id');
    	$repository = $this->get('odiseo_pickmystuff.repository.carrier');
    	$carrierData = $repository->find($idCarrier);

    	$carrierName = $carrierData->getName();
    	$carrierPhone = $carrierData->getPhone();
    		
    	$smsSender = $this->get('pickmystuff.sms.sender');

    	$noticeMessage = 'Sms enviado correctamente al transportista '.$carrierName;
    	try {
    		$smsSender->sendTextMessageToNumber('+15005550001', "TEST MESSAGE!!");
		} catch (\Services_Twilio_RestException $e) {
    				$noticeMessage = $e->getMessage();
		}
    	
    	$this->get('session')->getFlashBag()->add('notice', $noticeMessage);
    	
    	return $this->redirect($this->generateUrl('odiseo_pickmystuff_backend_carrier_index'));
    }
    public function sendSmsAllAction(Request $request)
    {
    	$repository = $this->get('odiseo_pickmystuff.repository.carrier');
    	$carriers = $repository->findAll();

    	$smsSender = $this->get('pickmystuff.sms.sender');
    	foreach ($carriers as $carrierData)
    	{

    		$carrierPhone = $carrierData->getPhone();
	    	$smsSender->sendTextMessageToNumber('+15005550001', "TEST MESSAGE!!");
    		
    	}
    	
    	$noticeMessage = 'Sms enviado correctamente a todos los tranportistas ';
    	$this->get('session')->getFlashBag()->add('notice', $noticeMessage);
    	
    	return $this->redirect($this->generateUrl('odiseo_pickmystuff_backend_carrier_index'));
    }
}
