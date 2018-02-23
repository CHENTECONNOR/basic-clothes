function modal(str){
	$.get('ver_mas.php',{
			clave:str,
		beforeSend: function(){
			$('#res').html("Espere un momento");
		}

	}, function(respuesta){
		$('#res').html(respuesta);
	});
}