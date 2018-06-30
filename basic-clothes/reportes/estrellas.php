<?php 
function estrellas($num){

	if ($num == 1) {
		$estrellas = '<i class="text-warning material-icons">star</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i>';
	}elseif ($num == 2) {
		$estrellas = '<i class="text-warning material-icons">star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i>';
	}elseif ($num == 3) {
		$estrellas = '<i class="text-warning material-icons">star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i>';
	}elseif ($num == 4) {
		$estrellas = '<i class="text-warning material-icons">star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star_border</i>';
	}elseif ($num == 5) {
		$estrellas = '<i class="text-warning material-icons">star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star</i><i class="text-warning material-icons" >star</i>';
	}else{
		$estrellas = '<i class="text-warning material-icons">star_border</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i><i class="text-warning material-icons" >star_border</i>';
	}

	return $estrellas;
}


 ?>