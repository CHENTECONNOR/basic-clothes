function enviar(str){

	$.get('desear.php',{
		clave:str,
	}, function(){
		bootbox.alert('El producto se ha agregado a su lista de deseos');
	});
}