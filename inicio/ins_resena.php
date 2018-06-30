<?php 
include '../scripts/conexion.php';
include 'estrellas.php';
foreach ($_POST as $campo => $valor) {
	$variable = "$" . $campo ."='". htmlentities($valor). "';";
	eval($variable);
}


$sel = $con->prepare("SELECT id FROM rating WHERE clave_producto = ? AND clave_user = ? ");
$sel->execute(array($clave_producto,$clave_user));
$row = $sel->rowCount();

if ($row == 0) {
	$ins = $con->prepare("INSERT INTO rating VALUES (DEFAULT, :clave_producto, :clave_user, :foto, :fecha, :comentario, :usuario, :rating)");
    $ins->bindparam(':clave_producto', $clave_producto);
    $ins->bindparam(':clave_user', $clave_user);
    $ins->bindparam(':foto', $foto);
    $ins->bindparam(':fecha', $fecha);
    $ins->bindparam(':comentario', $comentario);
    $ins->bindparam(':usuario', $usuario);
    $ins->bindparam(':rating', $rating);
}else{
	$ins = $con->prepare("UPDATE rating SET fecha = :fecha, comentario= :comentario, rating = :rating WHERE clave_producto = :clave_producto AND clave_user = :clave_user");
    $ins->bindparam(':clave_producto', $clave_producto);
    $ins->bindparam(':clave_user', $clave_user);
    $ins->bindparam(':fecha', $fecha);
    $ins->bindparam(':comentario', $comentario);
    $ins->bindparam(':rating', $rating);
}


if ($ins->execute()) {
	$suma = 0;
	$sel_promedio = $con->prepare("SELECT rating FROM rating WHERE clave_producto = ?");
	$sel_promedio->execute(array($clave_producto));
	$row_promedio = $sel_promedio->rowCount();
	  	while ($f_promedio = $sel_promedio->fetch()) { 
	  		$suma = $suma + $f_promedio['rating'];
	  	}

	  	if ($row_promedio > 0) {
	  		$promedio = $suma / $row_promedio;
	  	}else{
	  		$promedio = 0;
	  	}
	  	$sel_promedio = null;
 ?>
	<div class="row">
		<div class="col">
			<h3>Promedio: <?php echo estrellas($promedio) ?> </h3>
		</div>
	</div>
	<?php 
	$sel_rating = $con->prepare("SELECT * FROM rating WHERE clave_producto = ?");
	$sel_rating->execute(array($clave_producto));
	  	while ($f_rating = $sel_rating->fetch()) { 
	 ?>
	
	<div class="row contenido">
		<div class="col-1"><img src="<?php echo $f_rating['foto'] ?>" width="50" height="50" class="rounded-circle"></div>
		<div class="col-11">
			<div class="row">
				<div class="col-10 text-left">
					<p class="font-weight-bold"><?php echo $f_rating['usuario'] ?>
						<span><?php echo estrellas($f_rating['rating']) ?></span>
					</p>
				</div>
				<div class="col-2">
					<p><?php echo $f_rating['fecha'] ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<p><?php echo $f_rating['comentario'] ?></p>
				</div>
			</div>
		</div>
	</div>

 <?php 
 }
	  	$sel = null;
}else{
	echo "Su calificacion no pudo ser agregada";
}

	$sel = null;
	$ins = null;
	$con = null;

  ?>