<?php
include "../conexion.php";

$id_almacen=$_GET["id"];
$id_producto=$_POST["id_producto"];
$cantidad_pro=$_POST["cantidad_pro"];

//regitrando nuevo ingreso en ingreso_almacen
mysqli_query($conectador,"insert into stock_almacen(
id_producto,
cantidad,
id_almacen)
values('$id_producto','$cantidad_pro','$id_almacen')");
?>