<?php
include "../conexion.php";


$id_tienda=$_GET["id_tienda"];
$cliente=$_POST["cliente"];
$total_venta=$_POST["totalInp"];

$id_producto=$_POST["id_producto"];
$precio_pro=$_POST["precio_pro"];
$cantidad_pro=$_POST["cantidad_pro"];
$importe=$_POST["importe"];

// 1.-registrar venta nueva
mysqli_query($conectador,"insert into venta(
id_cliente,
id_tienda,
total_venta)
values('$cliente','$id_tienda','$total_venta')");

// recuperando el ultimo registro de venta
$ultimo_registro=mysqli_fetch_row(mysqli_query($conectador,"SELECT MAX(id_venta) FROM venta"));

// 2.-registrar los detalles de la venta
for($i=0;$i<sizeof($id_producto);$i++){
    mysqli_query($conectador,"insert into detalle_venta(
id_venta,
id_producto,
precio,
cantidad,
importe)
values('$ultimo_registro[0]','$id_producto[$i]','$precio_pro[$i]','$cantidad_pro[$i]','$importe[$i]')");
}




/*
$stock_nuevo=0;



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
}*/
?>