<?php

namespace Odiseo\Bundle\PickMyStuffBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Services_Twilio;


class SmsSenderService
{
	
	private $twilioAccountSid;
	private $twilioAuthToken;
	private $fromNumber;
	
	public function __construct( $twilioAccountSid, $twilioAuthToken, $fromNumber){
		$this->twilioAccountSid = $twilioAccountSid;
		$this->twilioAuthToken = $twilioAuthToken;
		$this->fromNumber = $fromNumber;
	}

	public function sendTextMessageToNumber($number, $body)
	{

		$client = new Services_Twilio($this->twilioAccountSid, $this->twilioAuthToken);
		
		try {
			$message = $client->account->messages->create(array(
					"From" => $this->fromNumber,
					"To" => $number,
					"Body" => "Test message!",
			));
		} catch (Services_Twilio_RestException $e) {
					echo $e->getMessage();
		}
	}
	
}