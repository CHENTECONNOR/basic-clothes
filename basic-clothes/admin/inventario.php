<?php include '../assets/header2.php'; ?>

<div class="container" style="margin-top: 1%;">
	<div class="card text-white f-tabla">
			<div class="card-header"><h4 class="card-title">Alta de inventario</h4></div>
			<div class="card-body">
				<form action="ins_inventario.php" method="post" autocomplete="off" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="producto" required placeholder="Producto" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="cantidad" required placeholder="Cantidad (STOCK)" class="form-control">
					</div>
					<div class="form-group">
						<input type="number" step="0.01" required name="precio" placeholder="Precio" class="form-control">
					</div>
					<div class="form-group">
						<select name="categoria" required class="form-control">
							<option value="" disabled="" selected="">Elige una categoria</option>
							<option value="ROPA">ROPA</option>
							<option value="ACCESORIOS">ACCESORIOS</option>
							<option value="BISUTERIA">BISUTERIA</option>
							<option value="BEBES">BEBES</option>
							<option value="HOGAR">HOGAR</option>
							<option value="CALZADO">CALZADO</option>
						</select>
					</div>
					<div class="form-group">
						<input type="file" name="imagen" class="form-control" title="SOLO SE ACEPTAN LAS SIGUIENTES EXTENCIONES: .jpg, .jpeg y .png">
					</div>
					<div class="form-group">
						<textarea name="descripcion" required cols="30" rows="10" class="form-control" placeholder="DESCRIPCION DEL ARTICULO..."></textarea>
					</div>
					<button type="submit" class="btn btn-info">Guardar</button>

				</form>
			</div>
		</div>


		<div class="card text-white f-tabla" style="margin-top: 1%;">
				<div class="card-header"><h4 class="card-title">Ultimo registro</h4></div>
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
							$sel = $con->prepare("SELECT * FROM inventario ORDER BY id DESC limit 1 ");
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