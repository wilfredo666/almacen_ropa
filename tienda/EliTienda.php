<?php
include "../conexion.php";
$id=$_GET["id"];
$sql=mysqli_query($conectador,"DELETE FROM tienda WHERE id_tienda=$id");
if($sql==true){
    echo "<center class='alert alert-success' style='width:350px;'>La tienda ha sido eliminada!!!</center>";
}else{
    echo "<center class='alert alert-danger' style='width:350px;'>Tienda en uso, no se puede eliminar!!!</center>";
}
?>