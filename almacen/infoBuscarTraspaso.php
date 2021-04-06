<?php
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
$txt_bus=$_POST["txt_bus"];
echo $id_almacen."-".$txt_bus;
$res=mysqli_query($conectador,"SELECT id_traspaso, descripcion, talla, color, desc_almacen, cantidad, fecha_hora
FROM traspaso_almacen
JOIN producto 
ON producto.id_producto=traspaso_almacen.id_producto
JOIN almacen
on almacen.id_almacen=traspaso_almacen.id_almacen_destino
WHERE id_almacen_origen=$id_almacen and  descripcion like '%$txt_bus%'");
while($f=mysqli_fetch_array($res))
{
?>
<tr>
    <td><?php echo " $f[1] ";?></td>
    <td><?php echo " $f[2] ";?></td>
    <td><?php echo " $f[3] ";?></td>
    <td><?php echo " $f[4] ";?></td>
    <td><?php echo " $f[5] ";?></td>
    <td><?php echo " $f[6] ";?></td>
    <td>
        <div class="btn-group">
            <button onclick="EliTraspaso(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="<i class="fas fa-trash">"></i></button>
        </div>
    </td>
</tr>
<?php
}
?>