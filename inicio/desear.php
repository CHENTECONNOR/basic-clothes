<?php 
include '../scripts/conexion.php';

$clave_producto = htmlentities($_GET['clave']);
$correo_user = $_SESSION['correo_user'];

$sql="SELECT id FROM deseos WHERE correo_user ='".$correo_user."' AND clave_producto ='".$clave_producto."'";

echo'<script> console.log("hola")<script>'; 
$sel = $con->prepare($sql);
$sel->execute();
$row = $sel->rowCount();

if ($row == 0) {
	$clave = sha1(rand(0000,99999).rand(00,99));
	$ins = $con->prepare("INSERT INTO deseos VALUES (DEFAULT, :clave, :correo_user, :clave_producto)");
	    $ins->bindparam(':clave', $clave);
	   	$ins->bindparam(':correo_user', $correo_user);
	   	$ins->bindparam(':clave_producto', $clave_producto);
	   	$ins->execute();
}

$ins = null;
$con = null;

echo phpinfo();

 ?>