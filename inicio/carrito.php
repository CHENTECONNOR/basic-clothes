<?php include '../assets/header2.php';
$correo = $_SESSION['correo_user'];
$sel = $con->prepare("SELECT * FROM compras WHERE correo = ?  AND estatus_compra = 'AGREGADO' ");
$sel->execute(array($correo));
$total = 0;
 ?>

<div class="container" style="margin-top: 6%;">
	<?php 
	while($f = $sel ->fetch()){ ?>
	<div class="card w-100">
		<div class="card-body">
			<div class="row">
				<div class="col-4">
					<img src="../basic-clothes/admin/<?php echo $f['foto'] ?>" width="100%" >
				</div>
				<div class="col-8">
					<h4 class="card-title"><?php echo $f['producto'] ?></h4>
					<h5><?php echo "$". number_format($f['precio'], 2) ?></h5>
					<h5>Cantidad: <?php echo $f['cantidad'] ?></h5>
					<h5><?php echo "$". number_format($f['total'], 2) ?></h5>
					<h5>Estatus Compra: <?php echo $f['estatus_compra'] ?></h5>
					<p class="card-text" ><?php echo $f['descripcion'] ?></p>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f['clave_producto'] ?>" onclick="modal(this.value)" >Ver mas...</button>
				</div>
			</div>
		</div>
	</div>

	<?php 
	$total = $total + $f['total'];
	}
	$sel = null;
 ?>
</div>

<div class="container" style="margin-top: 1%;">
	<div class="card text-center">
		<div class="card-header">
			Resumen
		</div>
		<div class="card-body">
			<h4 class="card-title">Total de compra: <?php echo "$".number_format($total, 2); ?></h4>
			<p class="card-text">Datos de envio: </p>
			<form action="confirmacion.php" method="post" autocomplete="off">
				<input type="hidden" name="total" value="<?php echo $total ?>">
				<div class="form-group">
					<input type="text" name="nombre" placeholder="Nombre completo" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="calle" placeholder="Calle y numero" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="colonia" placeholder="Colonia" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="cp" placeholder="Codigo postal" pattern="\d{5}" class="form-control">
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-4">
							<select  id="pais" class="form-control" >
								<option value="" disabled selected >Elige tu pais</option>
								<?php $sel_pais = $con->prepare("SELECT * FROM pais");
								$sel_pais->execute();
								  	while ($f_pais = $sel_pais->fetch()) { ?>
								  	<option value="<?php echo $f_pais['id'] ?>"><?php echo $f_pais['pais'] ?></option>
								  	<?php 
									  }
									  $sel_pais = null;
									  $con = nill;
								  	 ?>
							</select>
							<input type="hidden" name="pais" id="pais2">
						</div>
						<div class="col-4">
							<div class="res_estado"></div>
						</div>
						 <div class="form-group col-4">
							<input type="text" name="ciudad" placeholder="Ciudad" class="form-control">
 						</div>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" value="Confirmar">
			</form>
		</div>
	</div>
</div>

<div class="modal fade modal_mas" tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="res" ></div>
		</div>
	</div>
</div>

<?php include '../assets/footer2.php'; ?>
<script src="../js/ver_mas.js" ></script>
<script>
	$('#pais').click(function() {
		$.post('ajax_estados.php',{
			pais:$('#pais').val(),
			beforeSend: function(){
				$('.res_estado').html("Espere un momento por favor...");
			}
		}, function (respuesta){
			$('.res_estado').html(respuesta);
		});
		var valor = $('#pais option:selected').html();
		$('#pais2').val(valor);
	});
</script>
</body>
</html>