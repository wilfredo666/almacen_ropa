<?php
session_start();
if($_SESSION["categoria"]=="administrador"){
    include "../panel_control.php";
}else{
    include "../panel_control_tienda.php";
}
include "../conexion.php";
$num=1;
$acum=0;
//consulta para extraer las tallas de dada tienda
$tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_tienda_destino=$tienda_detalle[0]");

//extraer la cantidad de tallas
$tallas_cant=mysqli_num_rows($tallas_sql);
?>
<script src="../assets/js/tienda.js"></script>
<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <h4>Buscar producto</h4>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                                </div>
                                <input type="text" name="dat_producto" id="dat_producto"  class="form-control" placeholder="Escriba el producto que desee buscar" onkeyup="BuscarProducto();">
                            </div>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <thead>                  
                                <tr>
                                    <th rowspan="2">Nro</th>
                                    <th rowspan="2">Producto</th>
                                    <th style="text-align:center;" colspan="<?php echo $tallas_cant;?>">Tallas</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <?php
                                //imprimiendo las tallas
                                while($tallas=mysqli_fetch_array($tallas_sql)){
                                    echo "<th>$tallas[0]</th>";  
                                }?>
                            </thead>                  
                        </thead>
                        <tbody id="res_bus_producto" class="res_bus_producto">

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*50;
                            //1.- extrayendo todos los productos
                            $res=mysqli_query($conectador,"SELECT DISTINCT descripcion FROM stock_tienda JOIN producto
ON stock_tienda.id_producto=producto.id_producto where id_tienda_destino=$tienda_detalle[0] limit $inicio,50");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo $num;?></td>
                                <td><?php echo  $f[0] ;?></td>
                                <?php
                                //2.- Extrayendo las tallas
                                $tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_tienda_destino=$tienda_detalle[0]");
                                while($tallas=mysqli_fetch_array($tallas_sql)){
                                    //3.- consulta para extraer las cantidades de dado producto y dada talla (entradas)
                                    $productos_cant_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_tienda_destino=$tienda_detalle[0] and descripcion='$f[0]' and talla='$tallas[0]'");
                                    $productos_cant=mysqli_fetch_row($productos_cant_sql);
                                    //salidas (ventas)
                                    $tot_ventas_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM venta
JOIN detalle_venta
ON venta.id_venta=detalle_venta.id_venta
JOIN producto
ON producto.id_producto=detalle_venta.id_producto
WHERE id_tienda=$tienda_detalle[0]
AND descripcion='$f[0]'
AND talla='$tallas[0]'");
                                    $tot_ventas=mysqli_fetch_row($tot_ventas_sql);
                                    $stock_disp=$productos_cant[0]-$tot_ventas[0];

                                    if($stock_disp>0){
                                        echo "<td>$stock_disp</td>"; 
                                        $acum=$acum+$stock_disp;
                                    }else{

                                        echo "<td>0</td>";
                                    }

                                }
                                ?>

                                <td><?php echo $acum;?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="DetalleProducto('<?php echo $f[0];?>',<?php echo $tienda_detalle[0];?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $acum=0;
                                $num=$num+1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <!--paginacion-->
                    <?php
                    //obtener el total de filas
                    $sql=mysqli_query($conectador,"select count(*) as total from stock_tienda WHERE id_tienda_destino=$tienda_detalle[0]");
                    $totalRegistros=mysqli_fetch_array($sql);

                    $productosPorPagina=50;
                    $total=ceil($totalRegistros[0]/$productosPorPagina);

                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET["pagina"]<=1 ? "disabled" : " "?>">
                                <a class="page-link" href="producto.php?pagina=<?php echo $_GET['pagina']-1;?>" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for($i=0; $i<$total; $i++)
{
                            ?>
                            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? "active": ""?>"><a class="page-link" href="producto.php?pagina=<?php echo $i+1;?>">
                                <?php echo $i+1;?>
                                </a>
                            </li>
                            <?php
}
                            ?>
                            <li class="page-item <?php echo $_GET["pagina"]>=$total ? "disabled" : " "?>">
                                <a class="page-link" href="producto.php?pagina=<?php echo $_GET['pagina']+1;?>" aria-label="Siguiente">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!--final paginacion-->
                </div>
            </div>
        </div>
    </section>
    <!-- final contenido principal -->


</div>
<?php
include "../footer.php";
?>