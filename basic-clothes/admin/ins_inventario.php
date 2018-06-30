<?php 
include '../assets/headerphp.php';
include '../assets/alertas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$clave = sha1(rand(0000,9999).rand(00,99));
	$producto = htmlentities($_POST['producto']);
	$cantidad = htmlentities($_POST['cantidad']);
	$precio = htmlentities($_POST['precio']);
	$categoria = htmlentities($_POST['categoria']);
	$descripcion = htmlentities($_POST['descripcion']);


	// redimensionar y validar imagen

	$ruta = $_FILES['imagen']['tmp_name'];
	$imagen = $_FILES['imagen']['name'];

	if ($ruta != '') {
		
		$ancho = 500;
		$alto = 400;
		$info = pathinfo($imagen);
		$tamano = getimagesize($ruta);
		$width = $tamano[0];
		$height = $tamano[1];

		if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPEG') {
			$imagenvieja = imagecreatefromjpeg($ruta);
			$nueva = imagecreatetruecolor($ancho, $alto);
			imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
			$copia = "foto_producto/".$clave.".jpg";
			imagejpeg($nueva,$copia);
		}elseif ($info['extension'] == 'png' || $info['extension'] == 'PNG') {
			$imagenvieja = imagecreatefrompng($ruta);
			$nueva = imagecreatetruecolor($ancho, $alto);
			imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
			$copia = "foto_producto/".$clave.".png";
			imagepng($nueva,$copia);
		}else{
			echo alerta('El formato no es aceptado','inventario.php');
			exit;
		}

	}else{
		$copia = 'foto_producto/producto.png';
	}

	$ins = $con->prepare("INSERT INTO inventario VALUES (DEFAULT, :clave,:producto, :cantidad, :precio, :categoria, :descripcion, :foto)");
	    $ins->bindparam(':clave', $clave);
	    $ins->bindparam(':producto', $producto);
	    $ins->bindparam(':cantidad', $cantidad);
	    $ins->bindparam(':precio', $precio);
	    $ins->bindparam(':categoria', $categoria);
	    $ins->bindparam(':descripcion', $descripcion);
	    $ins->bindparam(':foto', $copia);
	     
		if ($ins->execute()){
		echo alerta('El producto fue guardado','inventario.php');
		$ins = null;
		$con = null;
		}else{
			echo alerta('El producto no pudo ser guardado','inventario.php');
		}
		



}else{
echo alerta('Utiliza el formulario','inventario.php');
}

 ?> 
 </body>
 </html>