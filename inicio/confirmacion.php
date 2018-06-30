<?php include '../assets/header2.php';
include '../assets/alertas.php';
$correo = $_SESSION['correo_user'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	foreach ($_POST as $campo => $valor) {
	  $variable = "$" . $campo. "='" . htmlentities($valor). "';";
	  eval($variable);
	}

	$direccion = $calle.' '.$colonia.' '.$cp.' '.$ciudad.' '.$estado.', '.$pais;

	$up = $con->prepare("UPDATE compras SET direccion = :direccion, nombre = :nombre WHERE correo = :correo AND estatus_compra = 'AGREGADO' ");
	     $up->bindparam(':direccion', $direccion);
	     $up->bindparam(':nombre', $nombre);
	     $up->bindparam(':correo', $correo);
	 	if ($up->execute()){
	 
	 	}else{
	 		echo alerta('La de envio no puso ser actualizada','carrito.php');
	 	}
	 	$up = null;
	 	$con = null;
  
  }else {
    echo alerta('Utiliza el formulario','carrito.php');
  }


 ?>

<div class="container" style="margin-top: 6%;">
	<div class="card text-white bg-secondary">
			<div class="card-header"><h4 class="card-title">Total de compra <?php echo "$". number_format($total, 2) ?></h4></div>
			<div class="card-body">
				<form action="../comprar_paypal.php" method="post" >
					<input type="hidden" name="total" value="<?php echo $total ?>">
					<input type="submit" class="btn btn-primary" value="Pagar" >
				</form>
			</div>
		</div>
</div>

<?php include '../assets/footer2.php'; ?>
</body>
</html>