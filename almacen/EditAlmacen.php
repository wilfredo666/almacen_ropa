<?php
include "../conexion.php";

$id=$_GET["id"];

$dire=$_POST["direccion"];
$des=$_POST["descripcion"];
$usu=$_POST["usuario"];

mysqli_query($conectador,"UPDATE almacen SET direccion='$dire', id_usuario='$usu', desc_almacen='$des' WHERE id_almacen='$id';");
?>