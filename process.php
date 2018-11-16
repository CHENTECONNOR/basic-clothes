<?php 
include './scripts/conexion.php';

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

if(isset($_REQUEST['id'])){
	$product_id=$_REQUEST['id'];	
	//A continuacion realizar una consulta a la base de datos 
	//Para verificar el valor pasado
	$sel = $con->prepare("SELECT * FROM compras WHERE id = ? AND estatus_compra = 'AGREGADO' ");
	$sel->execute(array($product_id));
	$sel->setFetchMode(PDO::FETCH_ASSOC);
	$result = $sel->fetch();
	$product_name = $result['producto'];//Nombre del producto
	$product_price = $result['total'];//Precio del producto
	$product_currency = "MXN";//Moneda del producto 
	
	$con = null;//Cierro la conexion a la base de datos

	//URL Paypal Modo pruebas.
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	//URL Paypal para Recibir pagos 
	//$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
	//Correo electronico del comercio. 
     $merchant_email = 'basic.clothes@basic-clothes.xyz';
	//Pon aqui la URL para redireccionar cuando el pago es completado
	$cancel_return = "http://localhost:8080/basic-clothes/mensajes/cancelado.php";
	//Colocal la URL donde se redicciona cuando el pago fue completado con exito.
	$success_return = "http://localhost:8080/basic-clothes/mensajes/success.php";

 ?>
<div class="container" style="margin-top: 6%;">
		<form name="myform" action="<?php echo $paypal_url; ?>" method="post" >
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="cancel_return" value="<?php echo $cancel_return ?>">
			<input type="hidden" name="return" value="<?php echo $success_return; ?>">
			<input type="hidden" name="business" value="<?php echo $merchant_email; ?>">
			<input type="hidden" name="lc" value="C2">
			<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
			<input type="hidden" name="item_number" value="<?php echo $product_id; ?>">
			<input type="hidden" name="amount" value="<?php echo $product_price; ?>">
			<input type="hidden" name="currency_code" value="<?php echo $product_currency; ?>">
			<input type="hidden" name="button_subtype" value="services">
			<input type="hidden" name="no_note" value="0">
		</form>
	<script type="text/javascript">
		document.myform.submit();
	</script>
</div>

<?php 
	

}	else{
 		header("location:./../inicio/carrito.php");
		exit;
	}
 ?>
