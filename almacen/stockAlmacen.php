<?php
session_start();
include "../panel_control.php";
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
$almacen_sql=mysqli_query($conectador,"SELECT * from almacen where id_almacen=$id_almacen");
$almacen=mysqli_fetch_row($almacen_sql);
$acum=0;
$i=1;
//consulta para extraer las tallas
$tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen");

//extraer la cantidad de tallas
$tallas_cant=mysqli_num_rows($tallas_sql);
?>
<script src="../assets/js/almacen.js"></script>
<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <h4>Stock Almacen - <?php echo $almacen[3];?></h4>
                        </div>
                        <div class="col-6">
                            
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <br>                    
                    <table class="table table-bordered">
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
                        <tbody>
                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*50;
                            //colocando su cantidad correspondiente a cada talla para vista simple

                            //1.- extrayendo todos los productos
                            $productos_sql=mysqli_query($conectador,"SELECT DISTINCT descripcion FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen");
                            while($productos=mysqli_fetch_array($productos_sql))
                            {
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $productos[0];?></td>
                                <?php
                                //2.- Extrayendo las tallas
                                $tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen");
                                while($tallas=mysqli_fetch_array($tallas_sql)){
                                    //3.- consulta para extraer las cantidades total de dado producto y dada talla registrados en la tabla "stock_almacen" (porque son ingresos que equivale a una entrada)
                                    $tot_ingresos_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM stock_almacen JOIN producto ON producto.id_producto=stock_almacen.id_producto WHERE id_almacen=$id_almacen and descripcion='$productos[0]' and talla='$tallas[0]'");
                                    
                                    //4.- consulta para extraer las cantidades total de dado producto y dada talla registrados en la tabla "stock_tienda" (porque son un traspaso que equivale a una salida)
                                   $tot_traspasos_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM stock_tienda JOIN producto ON producto.id_producto=stock_tienda.id_producto WHERE id_almacen_origen=$id_almacen and descripcion='$productos[0]' and talla='$tallas[0]'"); $tot_ingresos=mysqli_fetch_row($tot_ingresos_sql);
                                    $tot_traspasos=mysqli_fetch_row($tot_traspasos_sql);
                                    $productos_cant=$tot_ingresos[0]-$tot_traspasos[0];
                                    if($productos_cant>0){
                                        echo "<td>$productos_cant</td>"; 
                                        $acum=$acum+$productos_cant;
                                    }else{

                                        echo "<td>0</td>";
                                    }

                                }
                                ?>
                                <td><?php echo $acum;?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="VerProducto('<?php echo $productos[0];?>',<?php echo $id_almacen;?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $acum=0;
                                $i=$i+1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <!--paginacion-->
                    <?php
                    //obtener el total de filas
                    $sql=mysqli_query($conectador,"select count(*) as total from stock_almacen where id_almacen=$id_almacen");
                    $totalRegistros=mysqli_fetch_array($sql);

                    $productosPorPagina=50;
                    $total=ceil($totalRegistros[0]/$productosPorPagina);
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET["pagina"]<=1 ? "disabled" : " "?>">
                                <a class="page-link" href="stockAlmacen.php?id_almacen=<?php echo $id_almacen; ?>&pagina=<?php echo $_GET['pagina']+1;?>" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for($i=0; $i<$total; $i++)
{
                            ?>
                            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? "active": ""?>"><a class="page-link" href="stockAlmacen.php?id_almacen=<?php echo $id_almacen; ?>&pagina=<?php echo $i+1;?>">
                                <?php echo $i+1;?>
                                </a>
                            </li>
                            <?php
}
                            ?>
                            <li class="page-item <?php echo $_GET["pagina"]>=$total ? "disabled" : " "?>">
                                <a class="page-link" href="stockAlmacen.php?id_almacen=<?php echo $id_almacen; ?>&pagina=<?php echo $_GET['pagina']+1;?>" aria-label="Siguiente">
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