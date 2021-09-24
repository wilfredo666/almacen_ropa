<?php
session_start();
if($_SESSION["categoria"]=="administrador"){
    include "../panel_control.php";
}else{
    include "../panel_control_tienda.php";
}
include "../conexion.php";

?>
<script src="../assets/js/tienda.js"></script>
<div class="content-wrapper">


    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <form id="form_consulta_ventas" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-2">
                                <h4>Ventas</h4>
                            </div>

                            <div class="col-3">
                                <input type="date" name="fecha_inicio" id="fecha_ingreso" class="form-control">
                            </div>
                            <div class="col-3">
                                <input type="date" name="fecha_fin" id="fecha_salida" class="form-control">
                            </div>
                            <div class="3">
                                <button class="btn btn-primary float-right" type="button" onclick="consultar(<?php echo $tienda_detalle[0];?>);">Consultar</button>
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                    </form>
                    <br>
                    <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="resp_consulta">

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*10;
                            $res=mysqli_query($conectador,"select venta.id_venta, cliente, fecha_hora, sum(importe) FROM venta
JOIN detalle_venta
ON detalle_venta.id_venta=venta.id_venta
WHERE id_tienda=$tienda_detalle[0] limit $inicio,50");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo  $f[1] ;?></td>
                                <td> <?php echo $f[2] ;?></td>
                                <td><?php echo  $f[3] ;?></td>

                                <td>
                                    <div class="btn-group">
                                        <button onclick="VerDetalleVenta(<?php echo $f[0]; ?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
                                        <button onclick="MEliVenta(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <!--paginacion-->
                    <?php
                    //obtener el total de filas
                    $sql=mysqli_query($conectador,"select count(*) as total from venta where id_tienda=$tienda_detalle[0]");
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