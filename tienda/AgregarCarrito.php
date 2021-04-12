<?php
include "../conexion.php";
$id_stock=$_POST["id_stock"];
$i=$_POST["i"];

    $pro_carrito=mysqli_query($conectador,"select descripcion, talla, color, precio, stock_tienda.id_producto  
FROM stock_tienda
JOIN producto
ON stock_tienda.id_producto=producto.id_producto
where id_stock=$id_stock");
    
$pro_carrito_dt=mysqli_fetch_row($pro_carrito);

?>
<tr id="fila<?php echo $i;?>">
  <td hidden=""><input type="text" value="<?php echo $pro_carrito_dt[4];?>" name="id_producto[]"></td>
    <td style="width: 200px"><?php echo $pro_carrito_dt[0]." ".$pro_carrito_dt[1]." ".$pro_carrito_dt[2];?></td>
    <td><input type="number" name="precio_pro[]" id="precio_pro<?php echo $i;?>"  class="form-control form-control-sm" value="<?php echo $pro_carrito_dt[3];?>"/></td>
    <td><input type="number" name="cantidad_pro[]" id="cantidad_pro<?php echo $i;?>"  class="form-control form-control-sm" onkeyup="TotImporte(<?php echo $i;?>)"/></td>
    <td><input type="number" id="importe<?php echo $i;?>" name="importe[]" readonly class="form-control form-control-sm"></td>
    <td>
    <a onclick="QuitarItem(<?php echo $i;?>);" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
    </td>

</tr>