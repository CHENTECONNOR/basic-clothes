<?php include '../assets/header2.php';
$sel_ganado = $con->prepare("SELECT SUM(total) AS ganado FROM compras WHERE estatus_compra = 'COMPRADO' ");
$sel_ganado->execute();
if ($f_ganado = $sel_ganado->fetch()) { 
$ganado = $f_ganado['ganado'];
}
$sel_ganado = null;

$mes = date('Y-m');
$sel_mes = $con->prepare("SELECT SUM(total) AS ganado_mes FROM compras WHERE estatus_compra = 'COMPRADO' AND fecha LIKE ? ");
$sel_mes->execute(array("%$mes%"));
if ($f_mes = $sel_mes->fetch()) { 
$ganado_mes = $f_mes['ganado_mes'];
}
$sel_mes = null;


$hoy = date('Y-m-d');
$sel_hoy = $con->prepare("SELECT SUM(total) AS ganado_hoy FROM compras WHERE estatus_compra = 'COMPRADO' AND fecha LIKE ? ");
$sel_hoy->execute(array("%$hoy%"));
if ($f_hoy = $sel_hoy->fetch()) { 
$ganado_hoy = $f_hoy['ganado_hoy'];
}
$sel_hoy = null;


$sel_compras = $con->prepare("SELECT id FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'POR ENVIAR' ");
$sel_compras->execute();
$row_compras = $sel_compras->rowCount();
$sel_compras = null;

$sel_enviados = $con->prepare("SELECT id FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'ENVIADO' ");
$sel_enviados->execute();
$row_enviados = $sel_enviados->rowCount();
$sel_enviados = null;

$sel_entregado = $con->prepare("SELECT id FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'ENTREGADO' ");
$sel_entregado->execute();
$row_entregado = $sel_entregado->rowCount();
$sel_entregado = null;


$sel_rating = $con->prepare("SELECT id FROM rating WHERE fecha = ? ");
$sel_rating->execute(array($hoy));
$row_rating = $sel_rating->rowCount();
$sel_rating = null;

$sel_inv = $con->prepare("SELECT id FROM inventario WHERE cantidad < 20 ");
$sel_inv->execute();
$row_inv = $sel_inv->rowCount();
$sel_inv = null;

$sel_usuarios = $con->prepare("SELECT id FROM usuarios ");
$sel_usuarios->execute();
$row_usuarios = $sel_usuarios->rowCount();
$sel_usuarios = null;

$con = null;
?>

<div class="container" style="margin-top: 1%;">
	<div class="row">
		<div class="col">
			<div class="card text-black mb-3" style="max-width: 20rem; background-color: rgba(0,255,0,0.6);">
					<div class="card-header"><strong>TOTAL GANADO</strong></div>
					<div class="card-body">
						<h1 class="card-title text-center text-black"><?php echo "$". number_format($ganado, 2); ?></h1>
					</div>
				</div>
		</div>
		<div class="col">
			<div class="card text-black mb-3" style="max-width: 20rem; background-color: rgba(0,0,255,0.6);">
					<div class="card-header"><strong>GANADO EN EL MES</strong></div>
					<div class="card-body">
					<a href="../reportes/reporte_ganado.php"><h1 class="card-title text-center text-black"><?php echo "$". number_format($ganado_mes, 2); ?></h1></a>
					</div>
				</div>
		</div>
		<div class="col">
			<div class="card text-black mb-3" style="max-width: 20rem; background-color: rgba(128,128,128,0.6);">
					<div class="card-header"><strong>GANADO HOY</strong></div>
					<div class="card-body">
					<a href="../reportes/reporte_ganado.php"><h1 class="card-title text-center text-black"><?php echo "$". number_format($ganado_hoy, 2); ?></h1></a>
					</div>
				</div>
		</div>
	</div>

	<hr>
<div class="row">
	<div class="col">
		<div class="card text-black mb-3" style="max-width: 20rem; background-color: rgba(0,255,255,0.6);">
			<div class="card-header"><strong>PEDIDOS POR ENVIAR</strong></div>
			<div class="card-body">
			<a href="../reportes/pedidos.php"><h1 class="card-title text-center text-black"><?php echo $row_compras; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-black mb-3" style="max-width: 20rem; background-color: rgba(255,255,0,0.6);">
			<div class="card-header"><strong>PEDIDOS ENVIADOS</strong></div>
			<div class="card-body">
			<a href="../reportes/enviados.php"><h1 class="card-title text-center text-black"><?php echo $row_enviados; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-black mb-3" style="max-width: 20rem; background-color: rgba(192,192,192,0.6);">
			<div class="card-header"><strong>PEDIDOS ENTREGADOS</strong></div>
			<div class="card-body">
			<a href="../reportes/entregados.php"><h1 class="card-title text-center text-black"><?php echo $row_entregado; ?></h1></a>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col">
		<div class="card text-white mb-3" style="max-width: 20rem; background-color: rgba(128,128,0,0.5);">
			<div class="card-header" style="background-color: rgba(0,0,0,0.3);"><strong>RESEÑAS DE HOY</strong></div>
			<div class="card-body">
			<a href="../reportes/resenas.php"><h1 class="card-title text-center text-black"><?php echo $row_rating; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-white mb-3" style="max-width: 20rem; background-color: rgba(255,0,0,0.6);">
			<div class="card-header" style="background-color: rgba(0,0,0,0.3);"><strong>PUNTO DE REORDEN</strong></div>
			<div class="card-body">
			<a href="reorden.php"><h1 class="card-title text-center text-black"><?php echo $row_inv; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-white mb-3" style="max-width: 20rem; background-color: rgba(255,0,255,0.6);">
			<div class="card-header" style="background-color: rgba(0,0,0,0.3);"><strong>USUARIOS</strong></div>
			<div class="card-body">
			<h1 class="card-title text-center "><?php echo $row_usuarios; ?></h1>
			</div>
		</div>
	</div>
</div>


</div>


<?php include '../assets/footer2.php'; ?>
</body>
</html>