<?php include '../assets/header2.php';
include 'estrellas.php';
$sel = $con->prepare("SELECT inventario.clave, inventario.producto, inventario.foto FROM inventario, rating WHERE inventario.clave = rating.clave_producto GROUP BY inventario.clave ");
$sel->execute();
  	
  	

 ?>

<div class="container" style="margin-top: 1%;">
	<div class="card text-white" style="margin-top: 1%; background-color: rgba(0,0,0,0.8);">
			<div class="card-header"><h4 class="card-title">RESEÑAS</h4></div>
			<div class="card-body">
				<table class="table">
					<thead>
						<th>Foto</th>
						<th>Producto</th>
						<th>Rating</th>
						<th>Ver</th>
					</thead>
					<tbody>
						<?php while ($f = $sel->fetch()) {  ?>
						<tr>
							<td><img src="../admin/<?php echo $f['foto'] ?>" width="50" height="50"></td>
							<td><?php echo $f['producto'] ?></td>
							<td>
								<?php 
								  $clave = $f['clave'];
								  $suma = 0;
								  $sel_promedio = $con->prepare("SELECT rating FROM rating WHERE clave_producto = ?");
								  $sel_promedio->execute(array($clave));
								  $row_promedio = $sel_promedio->rowCount();
								      while ($f_promedio = $sel_promedio->fetch()) { 
								        $suma = $suma + $f_promedio['rating'];
								      }

								      if ($row_promedio > 0) {
								        $promedio = $suma / $row_promedio;
								        $promedio = number_format($promedio);
								      }else{
								        $promedio = 0;
								      }
								      $sel_promedio = null;

								  echo estrellas($promedio);
								 ?>
							</td>
							<td><a href="comentarios.php?clave=<?php echo $f['clave'] ?>&producto=<?php echo $f['producto'] ?>"><i class="material-icons text-white">chat</i></a></td>
						</tr>
						<?php }
  						$sel = null;
  						$con = null; ?>
					</tbody>
				</table>
			</div>
		</div>
</div>

<?php include '../assets/footer2.php'; ?>
</body>
</html>