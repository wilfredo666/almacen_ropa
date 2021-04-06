<?php
include "../conexion.php";
$id_traspaso=$_GET["id_traspaso"];
mysqli_query($conectador,"DELETE FROM traspaso_almacen WHERE id_traspaso=$id_traspaso");
?>