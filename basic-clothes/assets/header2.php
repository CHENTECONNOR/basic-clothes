<?php include '../scripts/conexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BASIC CLOTHES|Tienda Online de Ropa, Calzado, Accesorios....</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
          padding-bottom: 10px;
       
          display: flex;
          min-height: 100vh;
          flex-direction: column;
          background-image: url("../img/fondo2.jpg");
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;

        }

        .f-tabla{
          background-color: rgba(0,0,0,0.8);
        }

        /* unvisited link */
        a:link {
            color: black;
        }

        /* visited link */
        a:visited {
            color: black;
        }

        /* mouse over link */
        a:hover {
            color: black;
        }

        /* selected link */
        a:active {
            color: black;
        }
</style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
  </head>
  <body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0,0,0,0.5);">
		<a class="navbar-brand text-white" href="../admin/index.php">BASIC CLOTHES (ADMIN)</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mr-auto">
          <a href="../admin/inventario.php" class="nav-link text-white">Inventario</a>
        </li>
        <li class="nav-item dropdown" >
          <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="../admin/categorias.php?opc=GENERAL" class="dropdown-item">GENERAL</a>
            <a href="../admin/categorias.php?opc=ROPA" class="dropdown-item">ROPA</a>
            <a href="../admin/categorias.php?opc=ACCESORIOS" class="dropdown-item">ACCESORIOS</a>
            <a href="../admin/categorias.php?opc=BISUTERIA" class="dropdown-item">BISUTERIA</a>
            <a href="../admin/categorias.php?opc=BEBES" class="dropdown-item">BEBES</a>
            <a href="../admin/categorias.php?opc=HOGAR" class="dropdown-item">HOGAR</a>
            <a href="../admin/categorias.php?opc=CALZADO" class="dropdown-item">CALZADO</a>
          </div>
        </li>
      </ul>
      <button class="btn btn-dark" id="logout" >Salir</button>
    </div>
	</nav>