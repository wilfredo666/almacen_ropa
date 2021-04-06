<?php
include "../conexion.php";

$id_almacen=$_GET["id"];
$id_producto=$_POST["id_producto"];
$cantidad_pro=$_POST["cantidad_pro"];

$stock_nuevo=0;

//regitrando nuevo ingreso en ingreso_almacen
mysqli_query($conectador,"insert into ingreso_almacen(
id_producto,
cantidad,
id_almacen)
values('$id_producto','$cantidad_pro','$id_almacen')");


//consultando si el registro ya existe en la tabla "stock_almacen"
$consulta_stock=mysqli_query($conectador,"select * from stock_almacen where id_producto='$id_producto' and id_almacen='$id_almacen'");
$reg_stock=mysqli_fetch_row($consulta_stock);
if($reg_stock>0){
    $stock_nuevo=$reg_stock[3]+$cantidad_pro;
    mysqli_query($conectador,"update stock_almacen set stock='$stock_nuevo' where id_producto='$id_producto' and id_almacen='$id_almacen'");
}else{
    //regitrando nuevo ingreso stock_almacen
mysqli_query($conectador,"insert into stock_almacen(
id_producto,
id_almacen,
stock)
values('$id_producto','$id_almacen','$cantidad_pro')");
}

?>