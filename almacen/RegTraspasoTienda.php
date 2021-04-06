<?php
include "../conexion.php";

$id_almacen=$_GET["id_almacen"];
$id_tienda=$_POST["id_tienda_des"];
$id_stock_almacen=$_POST["id_stock_almacen"];
$cantidad_pro=$_POST["cantidad_pro"];

//desglosando el item seleccionado
$consulta=mysqli_query($conectador, "select * from stock_almacen where id_stock_almacen=$id_stock_almacen");
$stock_detalle=mysqli_fetch_row($consulta);

//regitrando traspaso a tienda
mysqli_query($conectador,"insert into traspaso_tienda(
id_producto,
cantidad,
id_almacen_origen,
id_tienda_destino)
values('$stock_detalle[1]','$cantidad_pro','$id_almacen','$id_tienda');");

//*********** quitando a stock de almacen origen ***********

$stock_nv_alm=$stock_detalle[3]-$cantidad_pro;
mysqli_query($conectador,"update stock_almacen set stock='$stock_nv_alm' where id_stock_almacen=$id_stock_almacen");

//*********** aumentando a stock de tienda destino ***********

//consultando si el registro ya existe en la tabla "stock_tienda"
$consulta_stock=mysqli_query($conectador,"select * from stock_tienda where id_producto=$stock_detalle[1] and id_tienda=$id_tienda");
$reg_stock=mysqli_fetch_row($consulta_stock);

if($reg_stock>0){
    $stock_nuevo=$reg_stock[3]+$cantidad_pro;
    mysqli_query($conectador,"update stock_tienda set stock='$stock_nuevo' where id_stock=$reg_stock[0]");
}else{
    //regitrando nuevo ingreso stock_tienda
mysqli_query($conectador,"insert into stock_tienda(
id_producto,
id_tienda,
stock)
values('$stock_detalle[1]','$id_tienda','$cantidad_pro')");
}

?>