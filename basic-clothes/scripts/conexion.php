<?php
@session_start();
  //local
   	$con = new PDO("mysql:host=127.0.0.1:3307; dbname=basic_clothes;","root","root");
 //Servidor
   //$con = new PDO("mysql:host=mysql.hostinger.mx; dbname=u861461626_store;","u861461626_root","Basic_Clothes&");
  $result = $con->prepare("SET NAMES 'utf8'");
  $result->execute();
 ?>
