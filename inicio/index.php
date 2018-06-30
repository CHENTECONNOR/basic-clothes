<?php include '../assets/header2.php'; 
?>

<div class="container" style="margin-top: 6%;">
	<h2 class="text-white" style="background-color: rgba(0,0,0,0.5); width: 20%;">ROPA</h2>
	<div class="row">
		<?php 
		$sel_ropa = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'ROPA' AND cantidad > 0 ORDER BY id DESC LIMIT 4 ");
		$sel_ropa->execute();
		  	while ($f_ropa = $sel_ropa->fetch()) {
		 ?>
		 <div class="col-md-6 col-sm-12 col-lg-3">
		 	<div class="card" style="margin-top: 1%;">
		 		<img class="card-img-top" src="../basic-clothes/admin/<?php echo $f_ropa['foto'] ?>" width="200" height="200">
		 		<div class="card-body">
		 			<h4 class="card-title"><?php echo $f_ropa['producto'] ?></h4>
		 			<p class="card-text"><?php echo "$". number_format($f_ropa['precio'], 2) ?></p>
		 			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_ropa['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>
		 			<button class="btn btn-danger text-white float-right" onclick="enviar(this.value)" value="<?php echo $f_ropa['clave'] ?>"><i class="fa fa-heart"></i></button>
		 		</div>
		 	</div>
		 </div>
		<?php }
		$sel_ropa = null;
		 ?>
	</div>
</div>

<hr>
<div class="container" style="margin-top: 3%;">
	<h2 class="text-white" style="background-color: rgba(0,0,0,0.5); width: 20%;">ACCESORIOS</h2>
	<div class="row">
		<?php $sel_acc = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'ACCESORIOS' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_acc->execute();
		  	while ($f_acc = $sel_acc->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../basic-clothes/admin/<?php echo $f_acc['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_acc['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_acc['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_acc['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_acc['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_acc = null;
		 ?>
	</div>
</div>
<hr>

<div class="container" style="margin-top: 3%;">
	<h2 class="text-white" style="background-color: rgba(0,0,0,0.5); width: 20%;">BISUTERIA</h2>
	<div class="row">
		<?php $sel_bis = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'BISUTERIA' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
	        $sel_bis->execute();
		  	while ($f_bis = $sel_bis->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../basic-clothes/admin/<?php echo $f_bis['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_bis['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_bis['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_bis['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>	
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_bis['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_bis = null;
		 ?>
	</div>
</div>

<hr>

<div class="container" style="margin-top: 3%;">
	<h2 class="text-white" style="background-color: rgba(0,0,0,0.5); width: 20%;">BEBES</h2>
	<div class="row">
		<?php $sel_bebes = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'BEBES' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_bebes->execute();
		  	while ($f_bebes = $sel_bebes->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../basic-clothes/admin/<?php echo $f_bebes['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_bebes['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_bebes['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_bebes['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>	
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_bebes['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_bebes = null;
		 ?>
	</div>
</div>
<hr>

<div class="container" style="margin-top: 3%;">
	<h2 class="text-white" style="background-color: rgba(0,0,0,0.5); width: 20%;">HOGAR</h2>
	<div class="row">
		<?php $sel_hogar = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'HOGAR' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_hogar->execute();
		  	while ($f_hogar = $sel_hogar->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../basic-clothes/admin/<?php echo $f_hogar['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_hogar['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_hogar['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_hogar['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>	
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_hogar['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_hogar = null;
		 ?>
	</div>
</div>
<hr>

<div class="container" style="margin-top: 3%;">
	<h2 class="text-white" style="background-color: rgba(0,0,0,0.5); width: 20%;">CALZADO</h2>
	<div class="row">
		<?php $sel_zapatos = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'CALZADO' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_zapatos->execute();
		  	while ($f_zapatos = $sel_zapatos->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%; background-color: rgba(0,0,0,0.3);">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../basic-clothes/admin/<?php echo $f_zapatos['foto'] ?>" width="200" height="200" >
			  <div class="card-body" style="background-color: rgba(0,0,0,0.2)">
			    <h4 class="card-title"><?php echo $f_zapatos['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_zapatos['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_zapatos['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>	
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_zapatos['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_zapatos = null;
		$con = null;
		 ?>
	</div>
</div>

<div class="modal fade modal_mas" tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="res" ></div>
		</div>
	</div>
</div>



<script src="../js/deseos.js"></script>
<script src="../js/ver_mas.js" ></script>
<?php include '../assets/footer2.php'; ?>
</body>
</html>