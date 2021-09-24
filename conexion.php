<?php
$servername = "localhost";
$database = "almacen_ropa";
$username = "root";
$password = "";
$conectador=mysqli_connect($servername, $username, $password, $database);

//se activa la BD
date_default_timezone_set('America/La_Paz');
mysqli_query($conectador,"SET charset 'utf8'");
mysqli_set_charset($conectador,'utf-8');
?>
