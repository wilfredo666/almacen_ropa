<?php
include "../conexion.php";

$id_tienda=$_GET["id_tienda"];
$cliente=$_POST["cliente"];

$id_producto=$_POST["id_producto"];
$precio_pro=$_POST["precio_pro"];
$cantidad_pro=$_POST["cantidad_pro"];
$importe=$_POST["importe"];
// 1.-registrar venta nueva
mysqli_query($conectador,"insert into venta(
cliente,
id_tienda)
values('$cliente','$id_tienda')");

// 2.- recuperando el ultimo registro de venta
$ultimo_registro=mysqli_fetch_row(mysqli_query($conectador,"SELECT MAX(id_venta) FROM venta"));

// 3.-registrar los detalles de la venta
for($i=0;$i<sizeof($id_producto);$i++){
    mysqli_query($conectador,"insert into detalle_venta(
id_venta,
id_producto,
precio,
cantidad,
importe)
values('$ultimo_registro[0]','$id_producto[$i]','$precio_pro[$i]','$cantidad_pro[$i]','$importe[$i]')");
}
?>