<head><link rel="stylesheet" type="text/css" href="./../css/style.css"></head>
<?php include '../assets/header2.php';
include '../assets/alertas.php';
$correo = $_SESSION['correo_user'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	foreach ($_POST as $campo => $valor) {
	  $variable = "$" . $campo. "='" . htmlentities($valor). "';";
	  eval($variable);
	}

	$direccion = $calle.' '.$colonia.' '.$cp.' '.$ciudad.' '.$estado.', '.$pais;

	$up = $con->prepare("UPDATE compras SET direccion = :direccion, nombre = :nombre WHERE correo = :correo AND estatus_compra = 'AGREGADO' ");
	     $up->bindparam(':direccion', $direccion);
	     $up->bindparam(':nombre', $nombre);
	     $up->bindparam(':correo', $correo);
	 	if ($up->execute()){
	 
	 	}else{
	 		echo alerta('La de envio no puso ser actualizada','carrito.php');
	 	}
	 	$up = null;
	 	//$con = null;
  
  }else {
    echo alerta('Utiliza el formulario','carrito.php');
  }


 ?>

<div class="container" style="margin-top: 6%;">
	<div class="card text-white bg-secondary">
			<div class="card-header"><h4 class="card-title">Total de compra <?php echo "$". number_format($total, 2) ?></h4>
			</div>			
<!-- 			<div class="card-body">
				<form action="../comprar_paypal.php" method="post" >
					<input type="hidden" name="total" value="">
					<input type="submit" class="btn btn-primary" value="Pagar" >
				</form>
			</div> -->
		</div>
		<?php 
				$sel = $con->prepare("SELECT * FROM compras WHERE correo = ? AND estatus_compra = 'AGREGADO' ");
  				$sel->execute(array($correo));
				$sel->setFetchMode(PDO::FETCH_ASSOC);
				while($result = $sel->fetch()){	
	    ?>
    <div class="col-md-4 col-sm-6 col-xs-12">       
            <div class="card text-white bg-secondary" style="margin-top: 1%;">
		 		<img class="card-img-top rounded-circle" src="../basic-clothes/admin/<?php echo $result['foto'] ?>" width="200" height="200">		 		
                <div class="title-products-columns">
                    <h4 class="text-center "><strong><?php echo $result['producto']; ?></strong></h4>
                    <hr>
                    <p >
					<?php
						echo $result['descripcion'];
					?>
					</p>
                </div>
                <div class="footer-realestates-columns">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="./../process.php?id=<?php echo $result['id']; ?>" class="btn btn-info btn-lg btn-block"><i class="fab fa-cc-paypal fa-2x"></i> PAGAR AHORA: $<?php echo number_format($result['total'], 2);?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>		
		<?php
		
	}
	$con = null;
	?>
</div>



<?php include '../assets/footer2.php'; ?>
</body>
</html>