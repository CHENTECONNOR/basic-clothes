<?php include '../assets/header2.php';
include '../assets/alertas.php';
$sel = $con->prepare("SELECT producto,foto,cantidad,precio, clave, direccion, nombre, fecha FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'POR ENVIAR' ORDER BY fecha DESC   ");
$sel->execute();

 ?>

<div class="container" style="margin-top: 1%;">
	<div class="card text-white" style="margin-top: 1%; background-color: rgba(0,0,0,0.8);">
			<div class="card-header"><h4 class="card-title">REPORTE PEDIDOS</h4></div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>Foto</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Enviar</th>
					</thead>
					<tbody>
						<?php while ($f = $sel->fetch()) { ?>
						<tr>
							<td><img src="../admin/<?php echo $f['foto'] ?>" width="50" heught="50"></td>
							<td><?php echo $f['producto'] ?></td>
							<td><?php echo $f['cantidad'] ?></td>
							<td nowrap><?php echo $f['fecha'] ?></td>
							<td><?php echo $f['nombre'] ?></td>
							<td><?php echo $f['direccion'] ?></td>
							<td>
								<a href="#" class="btn btn-outline-primary btn-sm" onclick="bootbox.confirm('Seguro que desea realizar esta accion', function(result){ if (result == true){ location.href='enviar_producto.php?clave=<?php echo $f['clave'] ?>';} })"><span class="material-icons text-white" >local_shipping</span></a>
							</td>
							
						</tr>
						<?php 
					}
					$sel = null;
					$con= null;
					?>
					
					</tbody>
				</table>
			</div>
		</div>

</div>



<?php include '../assets/footer2.php'; ?>
</body>
</html>