<?php include '../assets/header2.php'; ?>

<div class="container" style="margin-top: 1%;">

	<div class="card text-white" style="margin-top: 1%; background-color: rgba(0,0,0,0.8);">
				<div class="card-header"><h4 class="card-title">PUNTO DE REORDEN</h4></div>
				<div class="card-body">
					
					<table class="table">
						<thead>
							<th>Foto</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Categoria</th>
							<th>Desc.</th>
							<th></th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
							<?php 
							$sel = $con->prepare("SELECT * FROM inventario WHERE cantidad < 20 ORDER BY id ");
							$sel->execute();
							  	while ($f = $sel->fetch()) {  ?>
							  	<tr>
							  		<td><img src="<?php echo $f['foto'] ?>" width="50" heigth="50" ></td>
							  		<td><?php echo $f['producto'] ?></td>
							  		<td><?php echo $f['cantidad'] ?></td>
							  		<td><?php echo "$". number_format($f['precio'], 2) ?></td>
							  		<td><?php echo $f['categoria'] ?></td>
							  		<td><?php echo substr($f['descripcion'] , 0, 100) ?>...</td>
							  		<td><a href="agregar_imagenes.php?clave=<?php echo $f['clave'] ?>" class="btn btn-outline-success btn-sm"><span class="material-icons font-weight-bold text-secondary">add</span></a></td>
							  		<td><a href="editar_producto.php?clave=<?php echo $f['clave'] ?>" class="btn btn-outline-primary btn-sm"><span class="material-icons font-weight-bold text-info">edit</span></a></td>
							  		<td><a href="#" class="btn btn-outline-danger btn-sm" onclick="bootbox.confirm('Seguro que desea realizar esta accion', function(result){ if (result == true){ location.href='eliminar_producto.php?clave=<?php echo $f['clave'] ?>&foto=<?php echo $f['foto'] ?>&pag=inventario.php';} })"><span class="material-icons font-weight-bold text-danger" >clear</span></a></td>
							  	</tr>
							  	<?php 
							  	}
							  	$sel = null;
							  	$con = null;
							  	 ?>
						</tbody>
					</table>

				

				</div>
			</div>
	
</div>

<?php include '../assets/footer2.php'; ?>
</body>
</html>