<?php
include "../conexion.php";
$txt_bus=$_POST["txt_bus"];
$id_tienda=$_GET["id_tienda"];
//si texto es mas que uno
if(strlen($txt_bus)>0){
    $res=mysqli_query($conectador,"SELECT id_stock, descripcion, talla, precio, color, stock, stock_tienda.id_producto
FROM stock_tienda
JOIN producto
ON stock_tienda.id_producto=producto.id_producto
where id_tienda=$id_tienda AND descripcion like '%$txt_bus%'");
    while($f=mysqli_fetch_array($res)){
?>
<tr>
    <td><?php echo $f[1];?></td>
    <td><?php echo $f[2];?></td>
    <td><?php echo $f[3];?></td>
    <td><?php echo $f[4];?></td>
    <td><?php echo $f[5];?></td>
    <td><input class="form-check-input" type="radio" name="id_stock" id="id_stock" value="<?php echo $f[0];?>"></td>
</tr>



<?php
                                      }          
} ?>