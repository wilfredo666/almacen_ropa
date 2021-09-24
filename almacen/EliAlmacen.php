<?php
include "../conexion.php";
$id=$_GET["id"];
$sql=mysqli_query($conectador,"DELETE FROM almacen WHERE id_almacen=$id");
if($sql==true){
    echo "<center class='alert alert-success' style='width:350px;'>Almacen eliminado!!!</center>";
}else{
    echo "<center class='alert alert-danger' style='width:350px;'>Almacen en uso, no se puede eliminar!!!</center>";
}

?>