<?php
include "../conexion.php";
$id=$_GET["id"];
$sql=mysqli_query($conectador,"DELETE FROM producto WHERE id_producto=$id");
if($sql==true){
    echo "<center class='alert alert-success' style='width:350px;'>El producto ha sido eliminado!!!</center>";
}else{
    echo "<center class='alert alert-danger' style='width:350px;'>Producto en uso, no se puede eliminar!!!</center>";
}

?>