<?php 
	include './../scripts/conexion.php';
	$correo = $_SESSION['correo_user'];
	if (isset($_POST)){
		$pay_status = htmlspecialchars($_POST[ 'payment_status' ], ENT_QUOTES);
		echo $payment_status;
/*		$product_id = $_REQUEST['item_number']; // ID del producto
		$product_transaction = $_REQUEST['tx']; // ID de transacción Paypal
		$product_price = $_REQUEST['amt']; // Monto recibido Paypal
		$product_currency = $_REQUEST['cc']; // Moneda recibida de Paypal
		$product_status = $_REQUEST['st']; // Estado del producto Paypal
		 
		$product_id = $product_id;
		$sel = $con->prepare("SELECT * FROM compras WHERE id = ? AND estatus_compra = 'AGREGADO' ");
		$sel->execute(array($product_id));
		$sel->setFetchMode(PDO::FETCH_ASSOC);
		$result = $sel->fetch();

		//ACTUALIZAR EN LA BD 
		$sel_inv = $con->prepare("SELECT cantidad FROM inventario WHERE clave = ? ");
		$up_inv = $con->prepare("UPDATE inventario SET cantidad = :resta WHERE clave = :clave_producto ");
		$sel = $con->prepare("SELECT clave_producto, cantidad FROM compras WHERE id = ? AND estatus_compra = 'AGREGADO' ");
		$sel->execute(array($product_id));
	  	if ($f = $sel->fetch()) { 

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
	  	$up = $con->prepare("UPDATE compras SET estatus_envio = 'POR ENVIAR', estatus_compra = 'COMPRADO', fecha = :fecha WHERE id = :id AND estatus_compra = 'AGREGADO' ");
	  	     $up->bindparam(':fecha', $fecha);
	  	     $up->bindparam(':id', $product_id);
	  	 	if ($up->execute()){
	  	 		//header("Location:../inicio/compras.php");
	  	 		$up_compras='true';
	  	 	}
	  	 	$up = null;		
*/
} else {
	header("location:./../inicio/carrito.php");
	exit;
}

//include './../assets/header2.php';
//include './../assets/alertas.php';
 ?>

		
 
 <?php 
 	//include './../assets/footer2.php';
 	$con = null;
  ?>