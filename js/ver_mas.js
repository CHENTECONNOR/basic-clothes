function modal(str){
	$.get('ver_mas.php',{
			clave:str,
		beforeSend: function(){
			$('#res').html("Espere un momento... Por Favor");
		}

	}, function(respuesta){
		$('#res').html(respuesta);
	});
}