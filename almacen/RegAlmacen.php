<?php
include "../conexion.php";

$dire=$_POST["direccion"];
$des=$_POST["descripcion"];
$usu=$_POST["usuario"];
$medida=$_POST["medida"];
mysqli_query($conectador,"insert into almacen(
direccion,
id_usuario,
desc_almacen)
values('$dire','$usu','$des');");

?>