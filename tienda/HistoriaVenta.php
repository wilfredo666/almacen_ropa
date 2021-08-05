<?php
session_start();
if($_SESSION["categoria"]=="administrador"){
    include "../panel_control.php";
}else{
    include "../panel_control_tienda.php";
}
include "../conexion.php";
$i=1;
$acum=0;
//consulta para extraer las tallas de dada tienda en venta
$tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM detalle_venta
JOIN producto ON producto.id_producto=detalle_venta.id_producto
JOIN venta ON venta.id_venta=detalle_venta.id_venta
where id_tienda=$tienda_detalle[0]");

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
                            <h4>Historial de ventas</h4>
                        </div>
                        <div class="col-6">
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
                        <tbody>

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*50;

                            //colocando su cantidad correspondiente a cada talla para vista simple

                            //1.- extrayendo todos los productos
                            $res=mysqli_query($conectador,"SELECT DISTINCT descripcion FROM detalle_venta
JOIN producto ON producto.id_producto=detalle_venta.id_producto
JOIN venta ON venta.id_venta=detalle_venta.id_venta
where id_tienda=$tienda_detalle[0] limit $inicio,50");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo  $f[0] ;?></td>
                                <?php
                                //2.- Extrayendo las tallas
                                $tallas_sql=mysqli_query($conectador,"SELECT DISTINCT talla FROM detalle_venta
JOIN producto ON producto.id_producto=detalle_venta.id_producto
JOIN venta ON venta.id_venta=detalle_venta.id_venta
where id_tienda=$tienda_detalle[0]");
                                while($tallas=mysqli_fetch_array($tallas_sql)){
                                    //3.- consulta para extraer las cantidades de dado producto y dada talla
                                    $productos_cant_sql=mysqli_query($conectador,"SELECT sum(cantidad) FROM detalle_venta
JOIN producto ON producto.id_producto=detalle_venta.id_producto
JOIN venta ON venta.id_venta=detalle_venta.id_venta
where id_tienda=$tienda_detalle[0] and descripcion='$f[0]' and talla='$tallas[0]'");
                                    $productos_cant=mysqli_fetch_row($productos_cant_sql);
                                    if($productos_cant[0]>0){
                                        echo "<td>$productos_cant[0]</td>"; 
                                        $acum=$acum+$productos_cant[0];
                                    }else{

                                        echo "<td>0</td>";
                                    }

                                }
                                ?>

                                <td><?php echo $acum;?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="DetalleHistoria('<?php echo $f[0];?>',<?php echo $tienda_detalle[0];?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $acum=0;
                                $i=1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <!--paginacion-->
                    <?php
                    //obtener el total de filas
                    $sql=mysqli_query($conectador,"select count(*) as total from producto");
                    $totalRegistros=mysqli_fetch_array($sql);

                    $productosPorPagina=10;
                    $total=ceil($totalRegistros[0]/$productosPorPagina);
                    //var_dump($resultado);


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