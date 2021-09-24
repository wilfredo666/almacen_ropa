<?php
include "../conexion.php";
$id_venta=$_GET["id_venta"];
$tot_venta=0;
//detalle de venta
$det_venta=mysqli_query($conectador,"SELECT descripcion, talla, color, detalle_venta.precio, cantidad, importe
FROM detalle_venta
JOIN producto
ON producto.id_producto=detalle_venta.id_producto
WHERE id_venta=$id_venta");

//venta
$venta=mysqli_fetch_array(mysqli_query($conectador,"select cliente, fecha_hora
FROM venta
WHERE id_venta=$id_venta"));
?>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Cliente:</th>
            <td><?php echo $venta[0];?></td>
            <th>Fecha y hora:</th>
            <td><?php echo $venta[1];?></td>
        </tr>
        <tr>
            <th>Producto</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Importe</th>
        </tr>
        <?php
        while($f=mysqli_fetch_array($det_venta)){
            $tot_venta=$tot_venta+$f[5];
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
            <td><?php echo $tot_venta;?></td>
        </tr>
    </table>
</div>   
<div class="modal-footer">
    <input class="btn btn-primary" type="button" data-dismiss="modal" value="OK">
</div>