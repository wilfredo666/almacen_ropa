<?php
/*$conectador=mysqli_connect("localhost","root","","almacen_ropa");*/
$conectador=mysqli_connect("localhost:3306","marketin_sistemaalmacen","Admin123!","marketin_almacen_ropa");
//se activa la BD
date_default_timezone_set('America/La_Paz');
mysqli_query($conectador,"SET charset 'utf8'");
mysqli_set_charset($conectador,'utf-8');
?>
