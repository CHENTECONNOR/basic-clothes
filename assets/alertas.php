<?php 
function alerta($mensaje,$ruta)
{
	$alerta= '<script>
	bootbox.alert({
    message: "'.$mensaje.'",
    callback: function () {
        location.href="'.$ruta.'";
    }
});
</script>';
return $alerta;
}

 ?>