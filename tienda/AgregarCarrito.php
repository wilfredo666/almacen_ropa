<?php
include "../conexion.php";
$id_producto=$_POST["id_producto"];
$stock_disp=$_POST["stock"];
$i=$_POST["i"];

$pro_carrito=mysqli_query($conectador,"select descripcion, talla, color, precio
FROM producto
where id_producto=$id_producto");

$pro_carrito_dt=mysqli_fetch_row($pro_carrito);

?>
<tr id="fila<?php echo $i;?>">
    <td hidden="">
        <input type="text" value="<?php echo $stock_disp;?>" id="stock_disp<?php echo $i;?>">
        <input type="text" value="<?php echo $id_producto;?>" name="id_producto[]" id="id_producto<?php echo $i;?>">
    </td>
    <td style="width: 200px"><?php echo $pro_carrito_dt[0]." ".$pro_carrito_dt[1]." ".$pro_carrito_dt[2];?></td>
    <td><input type="number" name="precio_pro[]" id="precio_pro<?php echo $i;?>"  class="form-control form-control-sm" value="<?php echo $pro_carrito_dt[3];?>"/></td>
    <td><input type="number" name="cantidad_pro[]" id="cantidad_pro<?php echo $i;?>"  class="form-control form-control-sm" onkeyup="TotImporte(<?php echo $i;?>)"/></td>
    <td><input type="number" id="importe<?php echo $i;?>" name="importe[]" readonly class="form-control form-control-sm"></td>
    <td>
        <a onclick="QuitarItem(<?php echo $i;?>);" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
    </td>

</tr>