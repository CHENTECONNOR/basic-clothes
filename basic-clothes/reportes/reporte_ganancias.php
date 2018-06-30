<?php include '../assets/header2.php';
include '../assets/alertas.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$fecha = htmlentities($_POST['fecha']); 

$sel = $con->prepare("SELECT producto,foto,cantidad,precio, total FROM compras WHERE estatus_compra = 'COMPRADO' AND fecha LIKE ? ");
$sel->execute(array("%$fecha%"));
$total = 0;
 ?>

<div class="container" style="margin-top: 1%;">
	<div class="card text-white" style="margin-top: 1%; background-color: rgba(0,0,0,0.8);">
			<div class="card-header"><h4 class="card-title">REPORTE DE:&nbsp;<?php echo $fecha ?></h4></div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>Foto</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Total</th>
					</thead>
					<tbody>
						<?php while ($f = $sel->fetch()) { ?>
						<tr>
							<td><img src="../admin/<?php echo $f['foto'] ?>" width="50" heught="50"></td>
							<td><?php echo $f['producto'] ?></td>
							<td><?php echo $f['cantidad'] ?></td>
							<td><?php echo "$". number_format($f['precio'], 2) ?></td>
							<td><?php echo "$". number_format($f['total'], 2) ?></td>
						</tr>
						<?php 
					$total = $total + $f['total'];
					} 
					$sel = null;
					$con= null;
					?>
					<tr>
						<td colspan="4" class="text-right">TOTAL:</td>
						<td><?php echo "$". number_format($total, 2) ?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

</div>



<?php

}else {
    echo alerta('Utiliza el formulario','reporte_ganado.php');
  }

 include '../assets/footer2.php'; ?>
</body>
</html>