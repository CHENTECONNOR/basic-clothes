<?php include '../scripts/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  foreach ($_POST as $campo => $valor) {
    $variable = "$" . $campo. "='" . htmlentities($valor). "';";
    eval($variable);
  }

  $clave = sha1(rand(0000,9999).rand(00,99));
  $correo = $_SESSION['correo_user'];
  $total = $cantidad * $precio;
  $fecha = date('Y-m-d');
  $estatus_envio = '';
  $estatus_compra = 'AGREGADO';
 

  $sel = $con->prepare("SELECT cantidad, clave FROM compras WHERE clave_producto = ?  AND correo = ? AND estatus_compra = 'AGREGADO' ");
  $sel->execute(array($clave_producto,$correo));
    	if ($f = $sel->fetch()) { 
    		$clave_compra = $f['clave'];
    	}
    	
$row = $sel->rowCount();
$sel = null;
if ($row == 1) {
	
	$cantidad = $cantidad + $f['cantidad'];

  if ($cantidad <= 0) {
      $del = $con->prepare("DELETE FROM compras WHERE clave = :clave ");
           $del->bindparam(':clave', $clave_compra);
         if ($del->execute()){
            echo 1;
         }
         $del = null;
  }else{
    $total = $precio * $cantidad;

  $up = $con->prepare("UPDATE compras SET cantidad = :cantidad, precio= :precio, total= :total WHERE clave = :clave ");
       $up->bindparam(':cantidad', $cantidad);
       $up->bindparam(':precio', $precio);
       $up->bindparam(':total', $total);
       $up->bindparam(':clave', $clave_compra);
    if ($up->execute()){
      echo 1;
    }else{
      echo "El producto no puso ser agregado";
    }
    $up = null;
  }

}else{
	 $direccion = '';
  	$nombre = '';
	$ins = $con->prepare("INSERT INTO compras VALUES (DEFAULT, :clave, :correo, :clave_producto, :producto, :foto, :descripcion, :cantidad, :precio, :total, :fecha, :estatus_envio, :estatus_compra, :direccion, :nombre)");
      $ins->bindparam(':clave', $clave);
      $ins->bindparam(':correo', $correo);
      $ins->bindparam(':clave_producto', $clave_producto);
      $ins->bindparam(':producto', $producto);
      $ins->bindparam(':foto', $foto);
      $ins->bindparam(':descripcion', $descripcion);
      $ins->bindparam(':cantidad', $cantidad);
      $ins->bindparam(':precio', $precio);
      $ins->bindparam(':total', $total);
      $ins->bindparam(':fecha', $fecha);
      $ins->bindparam(':estatus_envio', $estatus_envio);
      $ins->bindparam(':estatus_compra', $estatus_compra);
      $ins->bindparam(':direccion', $direccion);
      $ins->bindparam(':nombre', $nombre);
       
  	if ($ins->execute()){
  	echo 1;
  	}else{
  		echo "El producto no pudo ser agregado";
  	}

  	$ins = null;
}

  
  	$con = null;



  }else {
    echo alerta('Utiliza el formulario','../');
  }


 ?>