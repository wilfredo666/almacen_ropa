<?php
include "../conexion.php";
$id=$_GET["id"];

//extraer almacen
$almacen_sql=mysqli_query($conectador,"SELECT desc_almacen FROM almacen WHERE id_almacen=$id");
$desc_almacen=mysqli_fetch_array($almacen_sql);
?>
<h3>Stock almacen - <?php echo $desc_almacen[0];?></h3>
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>Producto</th>
                <th>Talla</th>
                <th>En stock</th>
            </tr>
            <?php
            //extraer stock
                $stock_sql=mysqli_query($conectador,"SELECT descripcion, talla, stock FROM stock_almacen
                JOIN producto
                ON producto.id_producto=stock_almacen.id_producto
                WHERE id_almacen=$id");
                while($stock=mysqli_fetch_array($stock_sql)){
            ?>
            <tr>
                <td><?php echo $stock[0];?></td>
                <td><?php echo $stock[1];?></td>
                <td><?php echo $stock[2];?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>

    </table> 
</div>

