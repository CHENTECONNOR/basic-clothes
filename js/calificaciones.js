
$('#1').click(function(event) {
	$('#rating').val(1);
	$('#1').attr('class', 'text-warning fa fa-star');
	$('#2').attr('class', 'text-warning fa fa-star-o');
	$('#3').attr('class', 'text-warning fa fa-star-o');
	$('#4').attr('class', 'text-warning fa fa-star-o');
	$('#5').attr('class', 'text-warning fa fa-star-o');
});

$('#2').click(function(event) {
	$('#rating').val(2);
	$('#1').attr('class', 'text-warning fa fa-star');
	$('#2').attr('class', 'text-warning fa fa-star');
	$('#3').attr('class', 'text-warning fa fa-star-o');
	$('#4').attr('class', 'text-warning fa fa-star-o');
	$('#5').attr('class', 'text-warning fa fa-star-o');
});

$('#3').click(function(event) {
	$('#rating').val(3);
	$('#1').attr('class', 'text-warning fa fa-star');
	$('#2').attr('class', 'text-warning fa fa-star');
	$('#3').attr('class', 'text-warning fa fa-star');
	$('#4').attr('class', 'text-warning fa fa-star-o');
	$('#5').attr('class', 'text-warning fa fa-star-o');
});

$('#4').click(function(event) {
	$('#rating').val(4);
	$('#1').attr('class', 'text-warning fa fa-star');
	$('#2').attr('class', 'text-warning fa fa-star');
	$('#3').attr('class', 'text-warning fa fa-star');
	$('#4').attr('class', 'text-warning fa fa-star');
	$('#5').attr('class', 'text-warning fa fa-star-o');
});

$('#5').click(function(event) {
	$('#rating').val(5);
	$('#1').attr('class', 'text-warning fa fa-star');
	$('#2').attr('class', 'text-warning fa fa-star');
	$('#3').attr('class', 'text-warning fa fa-star');
	$('#4').attr('class', 'text-warning fa fa-star');
	$('#5').attr('class', 'text-warning fa fa-star');
});

$('#cancelar').click(function(event) {
	limpiar();
});

function limpiar(){
	$('#comentario').val("");
	$('#1').attr('class', 'text-warning fa fa-star-o');
	$('#2').attr('class', 'text-warning fa fa-star-o');
	$('#3').attr('class', 'text-warning fa fa-star-o');
	$('#4').attr('class', 'text-warning fa fa-star-o');
	$('#5').attr('class', 'text-warning fa fa-star-o');
}

$('#calificar').click(function() {
	var rating = $('#rating').val();
	if (rating == 0) {
		bootbox.alert("Selecciona una calicacion");
	}else{
		var comentario = $('#comentario').val();
		if (comentario == "") {
			bootbox.alert("Escribe un comentario");
		}else{

			$.post('ins_resena.php', {
			clave_user:$('#clave_user').val(),
			clave_producto:$('#clave').val(),
			foto:$('#foto_user').val(),
			fecha:$('#fecha').val(),
			comentario:$('#comentario').val(),
			usuario:$('#user').val(),
			rating:$('#rating').val(),

			beforeSend: function(){
				$('#datos').html("Espere un momento por favor...");
			}

			}, function(respuesta){
				$('#datos').html(respuesta);
				limpiar();
			});
		}
	}
});


$('#agregar_carrito').click(function(event) {
	
	$.post('ins_pedido.php', {

		clave_producto: $('#clave').val(),
		producto: $('#producto').val(),
		foto: $('#foto').val(),
		descripcion: $('#descripcion').val(),
		precio: $('#precio').val(),
		cantidad: $('#cantidad').val(),

		beforeSend: function(){
			$('.res_carrito').html('Espere un momento por favor...');
		}

	},function(respuesta){
		if (respuesta == 1) {
			location.reload();
		}else{
			$('.res_carrito').html(respuesta);
		}

	});
});