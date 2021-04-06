<?php
include "../conexion.php";

$id=$_GET["id"];

$desc_prod=$_POST["desc_prod"];
$categoria=$_POST["categoria"];
$precio=$_POST["precio"];
$talla=$_POST["talla"];
$color=$_POST["color"];

mysqli_query($conectador,"UPDATE producto SET descripcion='$desc_prod', categoria='$categoria', talla='$talla', precio='$precio', color='$color' WHERE id_producto='$id';");

?>