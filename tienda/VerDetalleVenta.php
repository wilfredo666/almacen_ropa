<?php
include "../conexion.php";
$id_venta=$_GET["id_venta"];

$res=mysqli_query($conectador,"SELECT descripcion, talla, color, detalle_venta.precio, cantidad, importe
FROM detalle_venta
JOIN producto
ON producto.id_producto=detalle_venta.id_producto
WHERE id_venta=$id_venta");
$venta=mysqli_fetch_array(mysqli_query($conectador,"SELECT *
FROM venta
WHERE id_venta=$id_venta"));
?>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Cliente:</th>
            <td><?php echo $venta[1];?></td>
            <th>Fecha y hora:</th>
            <td><?php echo $venta[4];?></td>
        </tr>
        <tr>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Importe</th>
        </tr>
        <?php
        while($f=mysqli_fetch_array($res)){
        ?>
        <tr>
            <td><?php echo $f[0]." ".$f[1]." ".$f[2];?></td>
            <td><?php echo $f[3];?></td>
            <td><?php echo $f[4];?></td>
            <td><?php echo $f[5];?></td>
        </tr>
        <?php }?>
        <tr>
            <th colspan="3">Total</th>
            <td><?php echo $venta[3];?></td>
        </tr>
    </table>
</div>   
<div class="modal-footer">
    <input class="btn btn-primary" type="button" data-dismiss="modal" value="OK">
</div>