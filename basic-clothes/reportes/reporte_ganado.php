<?php include '../assets/header2.php'; ?>

<div class="container" style="margin-top: 1%;">

	<div class="card text-white" style="background-color: rgba(0,0,0,0.8);">
			<div class="card-header"><h4 class="card-title">FILTRO DE GANANCIAS</h4></div>
			<div class="card-body">
				<h2>REPORTE POR DIA</h2>
				<form action="reporte_ganancias.php" method="post" >
					<div class="form-group">
						<input type="date" name="fecha" class="form-control" required >
					</div>
					<input type="submit" class="btn btn-primary" value="Enviar" >
				</form>
				
				<h2>REPORTE POR MES</h2>
				<form action="reporte_ganancias.php" method="post" >
					<div class="form-group">
						<input type="number" min="2018" max="2099" id="anio" required class="form-control" placeholder="Ej: 2018" >
					</div>
					<div class="form-group">
						<select  id="mes" required class="form-control">
							<option selected="" disabled="">Selecciona el Mes</option>
							<option value="01">ENERO</option>
							<option value="02">FEBRERO</option>
							<option value="03">MARZO</option>
							<option value="04">ABRIL</option>
							<option value="05">MAYO</option>
							<option value="06">JUNIO</option>
							<option value="07">JULIO</option>
							<option value="08">AGOSTO</option>
							<option value="09">SEPTIEMBRE</option>
							<option value="10">OCTUBRE</option>
							<option value="11">NOVIEMBRE</option>
							<option value="12">DICIEMBRE</option>
						</select>
					</div>
					<input type="hidden" name="fecha" id="fecha">
					<input type="submit" class="btn btn-primary" value="Enviar" >
				</form>
				<h2>REPORTE POR AÑO</h2>
				<form action="reporte_ganancias.php" method="post" >
					<div class="form-group">
						<input type="number" min="2018" name="fecha" max="2099" id="anio2" required class="form-control" placeholder="Ej: 2018" >
					</div>
					<input type="submit" class="btn btn-primary" value="Enviar" >
				</form>

			</div>
		</div>
	
</div>

<?php include '../assets/footer2.php'; ?>
<script>
	$('#mes').click(function(event) {
		var buscar = $('#anio').val() + '-' + $('#mes').val();
		$('#fecha').val(buscar);
	});

	$('#anio').keyup(function(event) {
		var buscar = $('#anio').val() + '-' + $('#mes').val();
		$('#fecha').val(buscar);
	});
</script>
</body>
</html>