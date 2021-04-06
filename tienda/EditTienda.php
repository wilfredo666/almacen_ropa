<?php 
include "../conexion.php";

$id=$_GET["id"];

$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$usuario=$_POST["usuario"];
$telefono=$_POST["telefono"];

mysqli_query($conectador,"UPDATE tienda SET nombre_tienda='$nombre', dir_tienda='$direccion', id_usuario='$usuario', tel_contacto='$telefono' WHERE id_tienda='$id';");
?>
