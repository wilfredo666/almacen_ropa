<?php
include "../conexion.php";
$id=$_GET["id_venta"];

//reingresar los productos vendidos al stock
//extrayendo toda el id de tienda
$id_tienda_sql=mysqli_query($conectador,"select id_tienda FROM venta WHERE id_venta=$id");
$id_tienda=mysqli_fetch_row($id_tienda_sql);

//extrayendo toda la informacion de detalle_venta
$venta_sql=mysqli_query($conectador,"select * FROM detalle_venta WHERE id_venta=$id");

while($venta=mysqli_fetch_array($venta_sql)){
    mysqli_query($conectador,"update stock_tienda
set stock=(select sum(stock+$venta[4]) from stock_tienda WHERE id_producto=$venta[2] and id_tienda=$id_tienda[0])
WHERE id_producto=$venta[2] and id_tienda=$id_tienda[0]");
   /* mysqli_query($conectador,"select sum(stock+$venta[4]) from stock_tienda WHERE id_producto=$venta[2] and id_tienda=$id_tienda[0]");*/
}

//eliminar del registro de venta - por relacion se eliminar de detalle venta
mysqli_query($conectador,"DELETE FROM venta WHERE id_venta=$id");



?>