<?php
@session_start();
  //local
   	$con = new PDO("mysql:host=127.0.0.1:3307; dbname=basic_clothes;","root","root");
 //Servidor
//$con = new PDO("mysql:host=localhost; dbname=u745880519_store;","u745880519_root","Av0204270309&");
  $result = $con->prepare("SET NAMES 'utf8'");
  $result->execute();
 
?>
