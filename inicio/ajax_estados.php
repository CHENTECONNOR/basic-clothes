<?php 
include '../scripts/conexion.php';
$pais = htmlentities($_POST['pais']);
$sel_estado = $con->prepare("SELECT * FROM estado WHERE pais_id = ?");
$sel_estado->execute(array($pais));
 ?>
 <select name="estado" id="estado" class="form-control">
 	<option value="" disabled selected>Elige el estado</option>
 	<?php 
 	while ($f_estado = $sel_estado->fetch()) { 
 	 ?>
		<option value="<?php echo $f_estado['estado'] ?>"><?php echo $f_estado['estado'] ?></option>
 	 <?php 
 	 }
  	$sel_estado = null;
  	$con = null;
 	  ?>
 </select>
