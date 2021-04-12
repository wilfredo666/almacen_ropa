<?php
include "../conexion.php";
$lista_idStock=$_POST["lista"];
echo count($lista_idStock);
for($i=0; $i<count($lista_idStock); $i++){
    $pro_carrito=mysqli_query($conectador,"select descripcion, talla, color, precio 
FROM stock_tienda
JOIN producto
ON stock_tienda.id_producto=producto.id_producto
where id_stock=$lista_idStock[$i]");
    
    $pro_carrito_dt=mysqli_fetch_row($pro_carrito);

?>
<tr>
    <td  style="width: 200px"><?php echo $pro_carrito_dt[0]." ".$pro_carrito_dt[1]." ".$pro_carrito_dt[2];?></td>
    <td><input type="number" name="precio_pro[]" id="precio_pro"  class="form-control form-control-sm" value="<?php echo $pro_carrito_dt[3];?>"/></td>
    <td><input type="number" name="cantidad_pro[]" id="cantidad_pro"  class="form-control form-control-sm" onkeyup="TotImporte()"/></td>
    <td><input type="number" id="importe" name="importe[]" readonly class="form-control form-control-sm"></td>
    <td><button onclick="QuitarItem();" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></td>
</tr>
<?php }?>