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
const btnLogin = document.getElementById('login');
const btnRegistro = document.getElementById('reg');


console.log("cargo el archivo app.js");


btnLogin.addEventListener('click', e => {
	const email = txtEmail.value;
	const pass = txtPassword.value;
	const auth = firebase.auth();

	const promesa = auth.signInWithEmailAndPassword(email,pass);
	promesa.catch(e => location.href = "admin/error.php");

});


firebase.auth().onAuthStateChanged(firebaseUser => {
	if (firebaseUser) {
			location.href="admin";
		}
});

btnRegistro.addEventListener('click', e =>{
  location.href = "./registro.php"
});

/*btnRegistrar.addEventListener('click', e =>{
  console.log("click al boton registrar")
  const email = txtEmail.value;
  const pass = txtPassword.value;
  const auth = firebase.auth();

  console.log(email);
  console.log(pass);
  
  //const promesa = auth.createUserWithEmailAndPassword(email,pass);
  //promesa.catch(e => location.href = "admin/error.php");


});*/

