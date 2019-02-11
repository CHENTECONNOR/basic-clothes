<?php include '../scripts/conexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BASIC CLOTHES|Tienda Online de Ropa, Calzado, Accesorios....</title>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
          padding-bottom: 10px;
       
          display: flex;
          min-height: 100vh;
          flex-direction: column;
          background-image: url("../img/fondo4.jpg");
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;

        }

        .f-tabla{
          background-color: rgba(0,0,0,0.8);
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
  </head>
  <body class="bg-light">
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: rgba(0,0,0,0.5);">
		<a class="navbar-brand text-white" href="../inicio/index.php">BASIC CLOTHES</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon" ></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mr-auto">
          <a href="../inicio/index.php" class="nav-link text-white">Inicio</a>
        </li>
        <li class="nav-item dropdown" >
          <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">            
            <a href="../inicio/categorias.php?opc=ROPA" class="dropdown-item">ROPA</a>
            <a href="../inicio/categorias.php?opc=ACCESORIOS" class="dropdown-item">ACCESORIOS</a>
            <a href="../inicio/categorias.php?opc=BISUTERIA" class="dropdown-item">BISUTERIA</a>
            <a href="../inicio/categorias.php?opc=BEBES" class="dropdown-item">BEBES</a>
            <a href="../inicio/categorias.php?opc=HOGAR" class="dropdown-item">HOGAR</a>
            <a href="../inicio/categorias.php?opc=CALZADO" class="dropdown-item">CALZADO</a>
          </div>
        </li>
        <li class="nav-item mr-auto">
          <a href="../inicio/compras.php" class="nav-link text-white">Compras</a>
        </li>
      </ul>
        <?php 
      $correo = $_SESSION['correo_user'];
      $sel_carrito = $con->prepare("SELECT id FROM compras WHERE correo = ? AND estatus_compra = 'AGREGADO' ");
      $sel_carrito->execute(array($correo));
      $carrito = $sel_carrito->rowCount();
      $sel_carrito = null;

      $sel_des = $con->prepare("SELECT id FROM deseos WHERE correo_user = ?");
      $sel_des->execute(array($correo));
      $deseos = $sel_des->rowCount();
      $sel_des = null;
       ?>
       <?php if ($carrito >0 ): ?>
        <a href="carrito.php" class="nav-link text-white"><i class="fa fa-shopping-cart fa-2x"></i> <span class="badge badge-pill badge-danger"><?php echo $carrito ?></span></a>
       <?php else: ?>
        <a href="carrito.php" class="nav-link text-white"><i class="fa fa-shopping-cart fa-2x"></i></a>
       <?php endif ?>
       <?php if ($deseos >0 ): ?>
        <a href="deseos.php" class="nav-link text-white"><i class="fa fa-heart fa-2x text-danger"></i> <span class="badge badge-pill badge-danger"><?php echo $deseos ?></span></a>
       <?php else: ?>
        <a href="deseos.php" class="nav-link"><i class="fa fa-heart fa-2x text-danger"></i></a>
       <?php endif ?>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle text-white" id="perfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo $_SESSION['foto_user'] ?>" width="40" height="40" class="rounded-circle" >
        </a>
        <div class="dropdown-menu" aria-labelledby="perfil">
            <a href="deseos.php" class="dropdown-item">Deseos</a>
            <a href="compras.php" class="dropdown-item">Compras</a>
            <a href="#" class="dropdown-item" id="logout">Salir</a>
          </div>
         
      </div>
    </div>
	</nav>