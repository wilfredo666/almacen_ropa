<?php
include "../conexion.php";
$id=$_GET["id"];
mysqli_query($conectador,"DELETE FROM tienda WHERE id_tienda=$id");
?>