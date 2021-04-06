<!--usado para el formulario "FormRegTrasAlmacen" - "FormRegTrasTienda" -->
<?php
include "../conexion.php";

$id_almacen=$_GET["id_almacen"];
$txt_bus=$_POST["txt_bus"];

$res=mysqli_query($conectador,"SELECT id_stock_almacen, descripcion, talla,  precio, color, stock
FROM stock_almacen
JOIN producto
ON producto.id_producto=stock_almacen.id_producto
WHERE id_almacen=$id_almacen
AND descripcion LIKE '%$txt_bus%'");
while($f=mysqli_fetch_array($res))
{
?>
<tr>
    <td><?php echo $f[1];?></td>
    <td><?php echo $f[2];?></td>
    <td><?php echo $f[3];?></td>
    <td><?php echo $f[4];?></td>
    <td><?php echo $f[5];?></td>
    <td>
        <input class="form-check-input" type="radio" name="id_stock_almacen" id="id_stock_almacen" value="<?php echo $f[0];?>">
    </td>
</tr>
<?php
}
?>