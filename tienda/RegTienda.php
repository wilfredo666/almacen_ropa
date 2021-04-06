<?php
include "../conexion.php";

$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$usuario=$_POST["usuario"];
$telefono=$_POST["telefono"];

mysqli_query($conectador,"insert into tienda(
nombre_tienda,
dir_tienda,
id_usuario,
tel_contacto)
values('$nombre','$direccion','$usuario','$telefono');");

?>