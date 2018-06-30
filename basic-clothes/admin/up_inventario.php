<?php 
include '../assets/headerphp.php';
include '../assets/alertas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$clave = htmlentities($_POST['clave']);
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
		$copia = htmlentities($_POST['anterior']);
	}

	$up = $con->prepare("UPDATE inventario SET producto = :producto, cantidad = :cantidad, precio = :precio, categoria = :categoria, foto = :foto, descripcion = :descripcion WHERE clave = :clave ");
	    $up->bindparam(':clave', $clave);
	    $up->bindparam(':producto', $producto);
	    $up->bindparam(':cantidad', $cantidad);
	    $up->bindparam(':precio', $precio);
	    $up->bindparam(':categoria', $categoria);
	    $up->bindparam(':descripcion', $descripcion);
	    $up->bindparam(':foto', $copia);
	     
		if ($up->execute()){
		echo alerta('El producto ha sido actualizado','editar_producto.php?clave='.$clave.'');
		$up = null;
		$con = null;
		}else{
			echo alerta('El producto no ha podido ser actualizado','editar_producto.php?clave='.$clave.'');
		}
		



}else{
echo alerta('Utiliza el formulario','editar_producto.php?clave='.$clave.'');
}

 ?> 
 </body>
 </html>