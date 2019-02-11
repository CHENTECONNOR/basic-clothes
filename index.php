<?php
 include 'scripts/conexion.php';
 include 'assets/header.php';
?>
<head>
	<style>
		body {
   
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
  	margin-left: 30px;
  	margin-top:-250px; 
  	position: absolute;
  	z-index: 1;
  }
	</style>
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(0,0,0,0.5); z-index: 3">
		<a class="navbar-brand text-white mx-auto" href="#">BASIC CLOTHES</a>
	</nav>

	
	<div class="container mx-auto" style="margin-top: 10%; width: 40rem;">
		<div class="contenedor">
				<img src="img/bc4.png">	
		</div>			
		<div class="well col-7" style="margin-top: 10%; position: absolute; z-index: 2">
			<h2 class="text-black">Inicio de sesión</h2>			
			<div class="form-group">
					<button id="btn-Google" class="btn btn-danger btn-lg btn-block"><i class="fa fa-google"></i> Google</button>
			</div>
			<div class="form-group">
				<button id="btn-Facebook" class="btn btn-primary btn-lg btn-block"><i class="fa fa-facebook"></i> Facebook</button>
			</div>
		<!--	<div class="form-group">
				<button id="btn-Twitter" class="btn btn-info btn-lg btn-block"><i class="fa fa-twitter"></i> Twitter</button>
			</div>-->
			
		</div>
	</div>

	<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
	<script src="js/app.js"></script>
	
</body>
</html>