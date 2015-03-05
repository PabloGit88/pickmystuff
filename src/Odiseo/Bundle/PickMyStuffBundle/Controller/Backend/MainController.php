<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    	$textMessage = $request->get('smsText');
    	$response = array('status' => "success");
    	try {
    		$smsSender->sendTextMessageToNumber('+'.$carrierPhone, $textMessage);
		} catch (\Services_Twilio_RestException $e) {
					$response['status'] = "error";
    				$noticeMessage = $e->getMessage();
		}

		//array_push($response, $noticeMessage);
    	//$this->get('session')->getFlashBag()->add('notice', $noticeMessage);
    	return new JsonResponse($response);
    	//return $this->redirect($this->generateUrl('odiseo_pickmystuff_backend_carrier_index'));
    }
    public function sendSmsAllAction(Request $request)
    {
    	$repository = $this->get('odiseo_pickmystuff.repository.carrier');
    	$carriers = $repository->findAll();

    	$smsSender = $this->get('pickmystuff.sms.sender');
    	$noticeMessage = 'Sms enviado correctamente a todos los tranportistas ';
    	foreach ($carriers as $carrierData)
    	{
    		$carrierPhone = $carrierData->getPhone();
	    	try {
	    		$smsSender->sendTextMessageToNumber('+'.$carrierPhone, "TEST MESSAGE!!");
			} catch (\Services_Twilio_RestException $e) {
	    				$errorCarriers[] = $carrierData->getName();
			}
    		
    	}
    	// si hay error con algun numero de telefono
    	if(count($errorCarriers) == count($carriers))
    	{
    		$noticeMessage = 'No se mando ningun mensaje. Chequea los numeros de telefono';
    	}else if(count($errorCarriers) > 0)
    	{
    		$noticeMessage = $noticeMessage.' excepto el/los transportistas ';
	    	foreach ($errorCarriers as $carrierName)
	    	{
	    		$noticeMessage = $noticeMessage.', '.$carrierName;
	    		
	    	}
	    	$noticeMessage = $noticeMessage.'. Número de telefono inválidos.';
    	}
    	
    	$this->get('session')->getFlashBag()->add('notice', $noticeMessage);
    	
    	return $this->redirect($this->generateUrl('odiseo_pickmystuff_backend_carrier_index'));
    }
}
