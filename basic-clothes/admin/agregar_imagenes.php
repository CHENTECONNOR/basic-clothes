<?php include '../assets/header2.php'; 
$clave = htmlentities($_GET['clave']);
$sel = $con->prepare("SELECT producto,foto FROM inventario WHERE clave = ?");
$sel->execute(array($clave));
  	if ($f = $sel->fetch()) { 
  	}
?>

<div class="container" style="margin-top: 1%;">
	<div class="card text-white bg-secondary">
			<div class="card-header">Agregar imagenes</div>
			<div class="card-body">
				<h4 class="card-title"><img src="<?php echo $f['foto'] ?>" width="100" height="100" class="rounded-circle"> <?php echo $f['producto'] ?></h4>
				<form action="ins_imagenes.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="clave" value="<?php echo $clave ?>">
					<div class="form-group">
						<input type="file" name="imagen[]" class="form-control" multiple="" title="SOLO SE ACEPTAN LAS SIGUIENTES EXTENCIONES: .jpg, .jpeg y .png" >
					</div>
					<input type="submit" value="Guardar" class="btn btn-info">
				</form>
			</div>
		</div>
<?php 
$sel = null;
 ?>
 <div class="row">
 	<?php 
 		$sel_img = $con->prepare("SELECT ruta,clave FROM imagenes WHERE clave_producto = ?");
 		$sel_img->execute(array($clave));
 		  	while ($f_img = $sel_img->fetch()) { 	
 	 ?>
 		
 		<div class="col-4">
 			<div class="card" style="width: 20rem; margin-top: 1%;">

				<a href="#" onclick="bootbox.confirm('Deseas realizar esta accion', function(result){if (result == true){ location.href='eliminar_imagen.php?clave_producto=<?php echo $clave ?>&clave_img=<?php echo $f_img['clave'] ?>&ruta=<?php echo $f_img['ruta'] ?>'; }})" ><img src="<?php echo $f_img['ruta'] ?>" class="card-img-top"></a>

 				
 			</div>
 		</div>

 	<?php 
 	}
 		  	$sel_img = null;
 		  	$con = null;
 	 ?>
 </div>

</div>

<?php include '../assets/footer2.php'; ?>
</body>
</html>