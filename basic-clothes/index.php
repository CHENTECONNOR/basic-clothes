<?php
 include 'scripts/conexion.php';
 include 'assets/header.php';
?>
<head>
	<style>
		body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    background-image: url("img/fondo.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;

  }
  .hide{
  	display: none;
  }
  img{
  	width: 500px;
  	height: 500px;
  }

  .contenedor{
  	width: 500px;
  	height: 400px;
  	margin-left: 30px;
  	margin-top:-300px; 
  	position: absolute;
  	z-index: 1;
  }
	</style>
</head>
  <body class="bg-light">

	<div class="container mx-auto" style="margin-top: 15%; width: 40rem;">
		<div class="contenedor">
				<img src="img/bc4.png">	
		</div>			
		<div class="well" style="margin-top: 10px; position: relative; z-index: 3">
			<h1 class="text-white" >Inicio de sesión</h1>
			<div class="form-group">
				<input type="email" id="correo" class="form-control form-control-lg" placeholder="Correo">
			</div>
			<div class="form-group" >
				<input type="password" id="pass" class="form-control form-control-lg" placeholder="Contraseña" >
			</div>
			<button type="submit" class="btn btn-primary" id="login">ENTRAR</button>
      <button type="button" class="btn btn-danger" id="reg">REGISTRAR</button>
		</div>    
	</div>

  <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
  <script src="js/app.js"></script>
  <script src="js/bootstrap.min.js"></script>
	
</body>
</html>