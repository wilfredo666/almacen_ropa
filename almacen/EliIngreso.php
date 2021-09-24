<?php
include "../conexion.php";
$id_ingreso=$_GET["id_ingreso"];
mysqli_query($conectador,"DELETE FROM stock_almacen WHERE id_ingreso=$id_ingreso");
?>