const btnLogout = document.getElementById('logout');

btnLogout.addEventListener('click', e => {
	firebase.auth().signOut();
	location.href="../";
});