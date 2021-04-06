<?php
include "../conexion.php";

$id_tienda=$_GET["id_tienda"];
$id_producto=$_POST["id_producto"];
$cantidad_pro=$_POST["cantidad_pro"];

$stock_nuevo=0;

//regitrando nuevo ingreso en ingreso_tienda
mysqli_query($conectador,"insert into ingreso_tienda(
id_producto,
cantidad,
id_tienda)
values('$id_producto','$cantidad_pro','$id_tienda')");


//consultando si el registro ya existe en la tabla "stock_tienda"
$consulta_stock=mysqli_query($conectador,"select * from stock_tienda where id_producto='$id_producto' and id_tienda='$id_tienda'");
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
values('$id_producto','$id_tienda','$cantidad_pro')");
}

?>