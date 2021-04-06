<?php
include "../conexion.php";
$id=$_GET["id"];

//extraer todos los datos de almacen
$almacen_sql=mysqli_query($conectador,"SELECT * FROM almacen WHERE id_almacen=$id"); 
$almacen=mysqli_fetch_array($almacen_sql);


//extraer el usuario a cargo
$usuario_sql=mysqli_query($conectador,"SELECT * FROM usuario WHERE id_usuario=$almacen[2]"); 
$u=mysqli_fetch_array($usuario_sql);
?>
<h3>Almacen:</h3>
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Descripcion:</th>
                <td>Almacen para <?php echo $almacen[3];?></td>
            </tr>
            <tr>
                <th>Direccion:</th>
                <td><?php echo $almacen[1];?></td>
            </tr>
            <tr>
                <th>Usuario a cargo:</th>
                <td><?php echo "$u[4] $u[5] $u[6]";?></td>
            </tr>
        </tbody>

    </table> 
</div>





