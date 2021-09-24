<?php
include "../conexion.php";
$id=$_GET["id"];
$sql=mysqli_query($conectador,"DELETE FROM usuario WHERE id_usuario=$id");
if($sql==true){
    echo "<center class='alert alert-success' style='width:350px;'>El usuario ha sido eliminado!!!</center>";
}else{
    echo "<center class='alert alert-danger' style='width:350px;'>Usuario en uso, no se puede eliminar!!!</center>";
}

?>