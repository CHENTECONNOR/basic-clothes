<?php 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'/vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'ASbmZL8wXf2K7V12yOv9eNuZpP7YKNheHyxfN2y_UtDPo6OPrKXgcI8HB1IddrBfcL1f2RZ6ougLvJj_', //Client ID
		'EJ5ZveuN0V7VKfZit1pmx6UG7hpHbOUV_dKJQAOwTT6J2qYjYRy8912sYVMdibPmQt4sbv25yWwqR3J0'//Secret
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