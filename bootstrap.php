<?php 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'/vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'AXrCEo9DKFBqscKTlG0xBauJVzQw84eUKXZJl0OQCjFO_TAgexwXZr2M2_AdXWGS-PIbZe7UtEf3AhD6', //Client ID
		'EO-EQM0c6YligzbWiB2UAR6Q-e60deYrQ-S-dft7aTQVzK4aO_JZCg2T3INdqZFacxvlIvohncQ7fRwP'//Secret
	)
);

$apiContext->setConfig(
	array(
		'mode' => 'sandbox',
		'http.ConnectionTimeOut' => 30,
		'log.LogEnable' => true,
		'log.Filename' => 'PayPal.log',
		'log.LogLevel' => 'DEBUG',

	)
);

 ?>