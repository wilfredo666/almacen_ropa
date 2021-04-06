<?php
include "../conexion.php";
$id=$_GET["id"];
mysqli_query($conectador,"DELETE FROM almacen WHERE id_almacen=$id");
?>