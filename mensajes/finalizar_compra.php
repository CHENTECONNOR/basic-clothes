<?php include '../scripts/conexion.php';
$correo = $_SESSION['correo_user'];

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require __DIR__.'./../bootstrap.php';

if (isset($_GET['aprobado']) && $_GET['aprobado'] == 'true') {
	$paymentId = $_GET['paymentId'];
	$payment = Payment::get($paymentId,$apiContext);

	$excution = new PaymentExecution();
	$excution ->setPayerId($_GET['PayerID']);

	$payment->execute($excution, $apiContext);

	$sel_inv = $con->prepare("SELECT cantidad FROM inventario WHERE clave = ? ");
	$up_inv = $con->prepare("UPDATE inventario SET cantidad = :resta WHERE clave = :clave_producto ");
	$sel = $con->prepare("SELECT clave_producto, cantidad FROM compras WHERE correo = ? AND estatus_compra = 'AGREGADO' ");
	$sel->execute(array($correo));
	  	while ($f = $sel->fetch()) { 

	  			$clave_producto = $f['clave_producto'];
	  			$cantidad = $f['cantidad'];

	  			$sel_inv->execute(array($clave_producto));
	  			if ($f_inv = $sel_inv->fetch()) {
	  				$resta = $f_inv['cantidad'] - $cantidad;
	  			}

	  			$up_inv->bindparam(':resta', $resta);
	  			$up_inv->bindparam(':clave_producto', $clave_producto);
	  			$up_inv->execute();
	  	}
	  	$up_inv = null;
	  	$sel = null;
	  	$sel_inv = null;
	  	

	  	$fecha = date('Y-m-d');
	  	$up = $con->prepare("UPDATE compras SET estatus_envio = 'POR ENVIAR', estatus_compra = 'COMPRADO', fecha = :fecha WHERE correo = :correo AND estatus_compra = 'AGREGADO' ");
	  	     $up->bindparam(':fecha', $fecha);
	  	     $up->bindparam(':correo', $correo);
	  	 	if ($up->execute()){
	  	 		header("Location:../inicio/compras.php");
	  	 	}
	  	 	$up = null;
	  	 	$con = null;

}else{
	header("Location:../mensajes/cancelado.php");
}


 ?>