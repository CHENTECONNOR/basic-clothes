<?php 
function estrellas($num){

	if ($num == 1) {
		$estrellas = '<i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i>';
	}elseif ($num == 2) {
		$estrellas = '<i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i>';
	}elseif ($num == 3) {
		$estrellas = '<i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i>';
	}elseif ($num == 4) {
		$estrellas = '<i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star-o" ></i>';
	}elseif ($num == 5) {
		$estrellas = '<i class="text-warning fa fa-star"></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star" ></i><i class="text-warning fa fa-star" ></i>';
	}else{
		$estrellas = '<i class="text-warning fa fa-star-o"></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i><i class="text-warning fa fa-star-o" ></i>';
	}

	return $estrellas;
}


 ?>