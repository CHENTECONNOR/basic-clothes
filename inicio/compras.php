<?php include '../assets/header2.php'; 
$correo = $_SESSION['correo_user'];
$sel_compras = $con->prepare("SELECT * FROM compras WHERE correo = ? AND estatus_compra = 'COMPRADO' ORDER BY fecha DESC ");
$sel_compras->execute(array($correo));
?>

<div class="container" style="margin-top: 6%;">
	<?php while ($f_compras = $sel_compras->fetch()) { ?>
	<div class="card w-100">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<img src="../basic-clothes/admin/<?php echo $f_compras['foto'] ?>" width="100%">
					</div>
					<div class="col-8">
						<h4 class="card-title"><?php echo $f_compras['producto'] ?></h4>
						<h5>Fecha de compra: <?php echo $f_compras['fecha'] ?></h5>
						<h5>Estatus de compra: <?php echo $f_compras['estatus_compra'] ?></h5>
						<h5>Pedido: <?php echo $f_compras['estatus_envio'] ?></h5>
						<h5>Precio: <?php echo "$". number_format($f_compras['precio'],2 ) ?></h5>
						<h5>Cantidad: <?php echo $f_compras['cantidad'] ?></h5>
						<h5>Total: <?php echo "$". number_format($f_compras['total'],2 ) ?></h5>
						<p class="card-text"><?php echo $f_compras['descripcion'] ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php 
		}
	$sel_compras = null;
	$con = null;
	 ?>
</div>

<?php include '../assets/footer2.php'; ?>
</body>
</html>