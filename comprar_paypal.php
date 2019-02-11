<?php 

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;


require __DIR__ . './bootstrap.php';

$precio_item = $_POST['total'];


$payer = new Payer();
$payer->setPaymentMethod('paypal');

$details = new Details();
$details->setShipping('0.00') /*Cargo de envió*/
		->setTax('0.00') /*Impuestos*/
		->setSubtotal($precio_item); 

$amount = new Amount();
$amount->setCurrency('MXN') /*Tipo de Moneda(Divisa)*/
		->setTotal($precio_item)
		->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
			->setDescription("Compra Desde Basic Clothes");

$payment = new Payment();
$payment->setIntent('sale') /*Tipo de Acción*/
		->setPayer($payer)
		->setTransactions( [$transaction] );

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('https://basic-clothes.000webhostapp.com/mensajes/finalizar_compra.php?aprobado=true')
			->setCancelUrl('https://basic-clothes.000webhostapp.com/mensajes/cancelado.php');

$payment->setRedirectUrls($redirectUrls);

try{

	$payment->create($apiContext);

	//var_dump($payment);

}catch(PayPal\Exception\PayPalConnectionException $ex){
	header("Location:mensajes/error.php");
}

foreach ($payment->getLinks() as $link) {
	if ($link->getRel() == 'approval_url') {
		$redirectUrl = $link->getHref();
	}
}

header("Location:".$redirectUrl);


 ?>