<?php 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'./vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
		'AYfFlxELUwFKvojgupFN8rwxRcddo0aIrlT0MinogB1J3YtKclear2XPO7Of_bO-7JHlA-Xshi3nYUO-', //Client ID
		'EHVyWA5XGK9_V7pbDhmvC_XBHM5ZOQOyuKARg29OA-yLN6S8ESx3cnZD1dXsqU3svQFCoeRLegBTAc9e'//Secret
	)
);

$apiContext->setConfig(
	array(
    	 /**
    	    * Available option 'sandbox' or 'live'
    	 */
    	 'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => './paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'     

    )  
);

 ?>