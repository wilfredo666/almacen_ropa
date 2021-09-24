<!--usado para el formulario "FormRegTrasAlmacen" / "FormRegTrasTienda" -->
<?php
include "../conexion.php";

$id_almacen=$_GET["id_almacen"];
$txt_bus=$_POST["txt_bus"];

//total de ingresos
$res=mysqli_query($conectador,"SELECT descripcion, talla,  precio, color, sum(cantidad), producto.id_producto
FROM stock_almacen
JOIN producto
ON producto.id_producto=stock_almacen.id_producto
WHERE id_almacen=$id_almacen
AND descripcion LIKE '%$txt_bus%'
GROUP BY producto.id_producto");


while($f=mysqli_fetch_array($res))
{
//total salidas de cada producto
$tot_salidas_sql=mysqli_query($conectador,"SELECT sum(cantidad)
FROM stock_tienda
WHERE id_almacen_origen=$id_almacen
AND id_producto=$f[5]");
$tot_salidas=mysqli_fetch_row($tot_salidas_sql);
    $stock=$f[4]-$tot_salidas[0];
?>
<tr>
    <td><?php echo $f[0];?></td>
    <td><?php echo $f[1];?></td>
    <td><?php echo $f[2];?></td>
    <td><?php echo $f[3];?></td>
    <td><?php echo $stock;?></td>
    <td>
        <input class="form-check-input" type="radio" name="id_producto" id="id_producto" value="<?php echo $f[5];?>" onclick="StockProducto(<?php echo $stock;?>);">
    </td>
</tr>
<?php
}
?>