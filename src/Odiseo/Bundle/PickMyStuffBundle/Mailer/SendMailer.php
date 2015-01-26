<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Mailer;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
//use Odiseo\LanBundle\Entity\User as User;

class SendMailer
{
	
	private $message;
	private $container;
	
	public function __construct(Container $container){
		$this->message = \Swift_Message::newInstance();
		$this->container = $container;
	}
	
	public function sendHomeMail($order, $emailFrom)
	{
		$view = 'OdiseoPickMyStuffBundle:Frontend/Mailer:Order.html.twig';
		
		$message = $this->getMessageHome($view, $order, $emailFrom);

		$failures = $this->send($message);
		
		return $failures;
	}
	
	public function sendCostumerMail($costumer, $emailTo)
	{
		$view = 'OdiseoPickMyStuffBundle:Frontend/Mailer:Email.html.twig';
		
		$message = $this->getMessage($view, $costumer, $emailTo);

		$failures = $this->send($message);
		
		return $failures;
	}
	
	protected function send($message)
	{
		$failures = array();
		
		$mailer = $this->container->get('mailer');
		$mailer->send($message, $failures);
		
	/*	// manually flush the queue (because using spool)
		$spool = $mailer->getTransport()->getSpool();
		$transport = $this->container->get('swiftmailer.transport.real');
		$spool->flushQueue($transport);*/
		
		return $failures;
	}	
	
	
	private function getMessage($view, $costumer, $emailTo)
	{
		$email = $costumer['email'];
		$question = $costumer['message'];
		return $this->message
			->setSubject('Servicio al Cliente')
			->setFrom(array($email => $email))
			->setTo($emailTo)
			->setBody(
				$this->container->get('templating')->render($view, array('costumer' => $costumer)),
				'text/html'
			);
	}
	
	private function getMessageHome($view, $order, $emailFrom)
	{
		/*$email = $order['email'];
		$question = $order['message'];*/
		$emailTo = $order->getClient()->getEmail();
		return $this->message
			->setSubject('Confirmacion de pedido')
			->setFrom(array($emailFrom => $emailFrom))
			->setTo($emailTo)
			->setBody(
				$this->container->get('templating')->render($view),
				'text/html'
			);
	}
}