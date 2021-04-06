<?php
include "../conexion.php";

$desc_prod=$_POST["desc_prod"];
$categoria=$_POST["categoria"];
$precio=$_POST["precio"];
$talla=$_POST["talla"];
$color=$_POST["color"];

mysqli_query($conectador,"insert into producto(
descripcion,
categoria,
talla,
precio,
color)
values('$desc_prod','$categoria','$talla','$precio','$color');");

?>