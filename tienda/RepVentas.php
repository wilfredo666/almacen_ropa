<?php
require "../conexion.php";
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$id_tienda=$_GET['id_tienda'];
$res = mysqli_query($conectador,"select id_venta, id_cliente, fecha_hora, total_venta FROM venta WHERE id_tienda=$id_tienda and fecha_hora between '$fecha_inicio 00:00:01' and '$fecha_fin 23:59:59'");
$total=0;
while($f=mysqli_fetch_array($res))
{
    $total=$total+$f[3];
?>
<tr>

    <td> <?php echo $f[1] ;?></td>
    <td><?php echo  $f[2] ;?></td>
    <td><?php echo  $f[3] ;?></td>
    <td>
        <div class="btn-group">
            <button onclick="VerDetalleVenta(<?php echo $f[0]; ?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
            <button onclick="MEliVenta(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
        </div>
    </td>
</tr>
<?php
}
?>
<tr>
<th colspan="2">Total</th>
<td><?php echo $total;?></td>
</tr>