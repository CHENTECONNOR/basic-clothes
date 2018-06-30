<?php
 include './scripts/conexion.php';
 include './assets/header.php';
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
  <body class="bg-light">

	<div class="container mx-auto" style="margin-top: 15%; width: 40rem;">
		<div class="contenedor">
				<img src="img/bc4.png">	
		</div>			
		<div class="well" style="margin-top: 10px; position: relative; z-index: 3">
			<h1 class="text-white font-weight-bold" >REGISTRAR ADMIN</h1>
			<div class="form-group">
				<input type="email" id="correo" class="form-control form-control-lg" placeholder="Correo">
			</div>
			<div class="form-group" >
				<input type="password" id="pass" class="form-control form-control-lg" placeholder="Contraseña" >
			</div>			
      <button type="button" class="btn btn-primary" id="registro">ACEPTAR</button>
		</div>    
	</div>

	<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>  
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
  var config = {
    apiKey: "AIzaSyBCtC-yUKItbgI4LU_HbYNo277sgk13hds",
    authDomain: "basic-clothes.firebaseapp.com",
    databaseURL: "https://basic-clothes.firebaseio.com",
    projectId: "basic-clothes",
    storageBucket: "basic-clothes.appspot.com",
    messagingSenderId: "686683550155"
  };
  firebase.initializeApp(config);


  const txtEmail = document.getElementById('correo');
  const txtPassword = document.getElementById('pass');

     $('#registro').click(function() {
      console.log("Activo el boton de registro");
        const email = txtEmail.value;
        const pass = txtPassword.value;
        //const auth = firebase.auth();

         console.log(email);
         console.log(pass);

         firebase.auth().createUserWithEmailAndPassword(email, pass).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;

            //console.log();
            alert(errorMessage + "\n" + errorCode);
            // ...
          });       

         firebase.auth().onAuthStateChanged(firebaseUser => {
          if (firebaseUser) {
              location.href="admin";
              }
            });
      
    });
  </script>
  
</body>
</html>