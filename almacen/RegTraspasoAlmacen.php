<?php
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
$id_almacen_destino=$_POST["id_almacen_des"];
$id_stock_almacen=$_POST["id_stock_almacen"];
$cantidad_pro=$_POST["cantidad_pro"];

//desglosando el item seleccionado
$consulta=mysqli_query($conectador, "select * from stock_almacen where id_stock_almacen=$id_stock_almacen");
$stock_detalle=mysqli_fetch_row($consulta);

//regitrando traspaso a almacen
mysqli_query($conectador,"insert into traspaso_almacen(
id_producto,
id_almacen_origen,
id_almacen_destino,
cantidad)
values('$stock_detalle[1]','$id_almacen','$id_almacen_destino','$cantidad_pro')");


//*********** quitando a stock de almacen origen ***********

$stock_nv_alm=$stock_detalle[3]-$cantidad_pro;
mysqli_query($conectador,"update stock_almacen set stock='$stock_nv_alm' where id_stock_almacen=$id_stock_almacen");

//*********** aumentando a stock almacen destino ***********

//consultando si el registro ya existe en la tabla "stock_almacen"
$consulta_stock=mysqli_query($conectador,"select * from stock_almacen where id_producto=$stock_detalle[1] and id_almacen=$id_almacen_destino");
$reg_stock=mysqli_fetch_row($consulta_stock);

if($reg_stock>0){
    $stock_nuevo=$reg_stock[3]+$cantidad_pro;
    mysqli_query($conectador,"update stock_almacen set stock='$stock_nuevo' where id_stock_almacen=$reg_stock[0]");
}else{
    //regitrando nuevo ingreso stock_almacen
mysqli_query($conectador,"insert into stock_almacen(
id_producto,
id_almacen,
stock)
values('$stock_detalle[1]','$id_almacen_destino','$cantidad_pro')");
}

?>