<?php
include "../conexion.php";
$producto=$_GET["producto"];
$id_almacen=$_GET["id_almacen"];

//consulta para extraer las tallas
$tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen");
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
        $color_sql=mysqli_query($conectador, "SELECT DISTINCT color FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen AND descripcion='$producto'");
        
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
            $tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen");
            while($tallas=mysqli_fetch_array($tallas_sql)){
                //comparando si tiene dicha stock en dicha talla y dado color
                $stock_sql=mysqli_query($conectador,"SELECT stock FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen AND descripcion='$producto' and color='$color[0]' and talla=$tallas[0]");
                $stock=mysqli_fetch_row($stock_sql);
                if($stock>0){
                    echo "<td>$stock[0]</td>";
                    $acum=$acum+$stock[0];
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