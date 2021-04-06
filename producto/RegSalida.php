<?php
include "../conexion.php";

$id=$_POST["producto"];

$cantidad_pro=$_POST["cantidad_pro"];
$cod_almacen=$_POST["cod_almacen"];

mysqli_query($conectador,"insert into salida_producto(
id_producto,
id_destino,
cantidad)
values('$id','$cod_almacen','$cantidad_pro');");


/*1.- obteniendo el actual stock*/
$stock_actual = mysqli_query($conectador, "SELECT stock FROM producto WHERE id_producto=$id");
$stock=mysqli_fetch_row($stock_actual);

/*2.- restando la cantidad del stock obtenido*/
$nuevo_stock=$stock[0]-$cantidad_pro;

/*3.- actualizar el stock en nuestra tabla producto*/
mysqli_query($conectador,"UPDATE producto SET stock='$nuevo_stock' WHERE id_producto='$id';");

?>