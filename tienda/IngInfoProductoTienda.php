<?php
include "../conexion.php";
$txt_bus=$_POST["txt_bus"];
$id_tienda=$_GET["id_tienda"];
//si texto es mas que uno
if(strlen($txt_bus)>0){
    $res=mysqli_query($conectador,"SELECT stock_tienda.id_producto, descripcion, talla, precio, color, sum(cantidad) FROM stock_tienda JOIN producto ON stock_tienda.id_producto=producto.id_producto where id_tienda_destino=$id_tienda AND descripcion like '%$txt_bus%' GROUP BY producto.id_producto");
    while($f=mysqli_fetch_array($res)){
        //total salidas
        $tot_salidas_sql=mysqli_query($conectador,"Select  sum(cantidad)
        from venta
        join detalle_venta
        on venta.id_venta=detalle_venta.id_venta
        where id_tienda=$id_tienda AND id_producto=$f[0]");
        $tot_salidas=mysqli_fetch_row($tot_salidas_sql);
        $total=$f[5]-$tot_salidas[0];
?>    
<tr>
    <td><?php echo $f[1];?></td>
    <td><?php echo $f[2];?></td>
    <td><?php echo $f[3];?></td>
    <td><?php echo $f[4];?></td>
    <td><?php echo $total;?></td>
    <td><input class="form-check-input" type="radio" name="id_producto" id="id_producto" value="<?php echo $f[0]."-".$total;?>"></td>
</tr>

<?php
                                      }          
} 
?>