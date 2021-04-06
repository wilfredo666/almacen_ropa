<?php
include "../conexion.php";
$id=$_GET["id"];

//extraer todos los datos de la tienda
$tienda_sql=mysqli_query($conectador,"SELECT * FROM tienda WHERE id_tienda=$id"); 
$tienda=mysqli_fetch_array($tienda_sql);


?>
<h3>Tienda:</h3>
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Nombre de la tienda:</th>
                <td><?php echo $tienda[1];?></td>
            </tr>
            <tr>
                <th>Direccion:</th>
                <td><?php echo $tienda[2];?></td>
            </tr>
            <tr>
                <th>Responsable:</th>
                <td><?php echo $tienda[5];?></td>
            </tr>
        </tbody>

    </table> 
</div>



