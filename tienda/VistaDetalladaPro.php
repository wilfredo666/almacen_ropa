<?php
include "../conexion.php";
$producto=$_GET["producto"];
$id_tienda=$_GET["id_tienda"];

//consulta para extraer las tallas
$tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_tienda_destino=$id_tienda");
//extraer la cantidad de tallas
$tallas_cant=mysqli_num_rows($tallas_sql);
$acum=0;
?>
<table class="table table-bordered">
    <thead>                  
        <tr>
            <th rowspan="2">Producto</th>
            <th rowspan="2">Color</th>
            <th style="text-align:center;" colspan="<?php echo $tallas_cant;?>">Tallas</th>
            <th rowspan="2">Total</th>
        </tr>
        <?php
        //imprimiendo las tallas
        while($tallas=mysqli_fetch_array($tallas_sql)){
            echo "<th>$tallas[0]</th>";  
        }?>
    </thead>
    <tbody>
        <!--extrayendo todos los colores del producto dado-->
        <?php
        $color_sql=mysqli_query($conectador, "SELECT DISTINCT color FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_tienda_destino=$id_tienda AND descripcion='$producto'");

        $cant_colores=mysqli_num_rows($color_sql)+1;
        ?>
        <tr>
            <td rowspan="<?php echo $cant_colores;?>"><?php echo $producto;?></td>
        </tr>
        <?php
        while($color=mysqli_fetch_array($color_sql)){
            echo "<tr>";
            echo "<td>".$color[0]."</td>";

            //extrayendo todas las tallas
            $tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_tienda_destino=$id_tienda");
            while($tallas=mysqli_fetch_array($tallas_sql)){
                //comparando si tiene dicho stock en dicha talla y dado color
                $stock_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM stock_tienda
JOIN producto
ON producto.id_producto=stock_tienda.id_producto
WHERE id_tienda_destino=$id_tienda
AND descripcion='$producto'
AND color='$color[0]'
AND talla=$tallas[0]");
                $stock=mysqli_fetch_row($stock_sql);
                //salidas (ventas)
                                    $tot_ventas_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM venta
JOIN detalle_venta
ON venta.id_venta=detalle_venta.id_venta
JOIN producto
ON producto.id_producto=detalle_venta.id_producto
WHERE id_tienda=$id_tienda
AND descripcion='$producto'
AND color='$color[0]'
AND talla='$tallas[0]'");
                $tot_ventas=mysqli_fetch_row($tot_ventas_sql);
                $stock_disp=$stock[0]-$tot_ventas[0];
                if($stock_disp>0){
                    echo "<td>$stock_disp</td>";
                    $acum=$acum+$stock_disp;
                }else{
                    echo "<td>0</td>";
                }
            }
            echo "<td>$acum</td>";
            echo "</tr>";
            $acum=0;
        }
        ?>
    </tbody>
</table>