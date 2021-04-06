<script src="../assets/js/almacen.js"></script>
<?php
include "../panel_control.php";
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
?>

<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <h4>Traspaso a tienda</h4>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                                </div>
                                <input type="text" name="txt_bus_traspaso" id="txt_bus_traspaso"  class="form-control" placeholder="Buscar traspaso, escriba el producto" onkeyup="buscarTraspaso(<?php echo $id_almacen;?>);">
                            </div>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th>Producto</th>
                                <th>Talla</th>
                                <th>Color</th>
                                <th>Cantidad</th>
                                <th>Tienda</th>
                                <th>Fecha y hora</th>
                                <td><button onclick="nuevoTraspasoTienda(<?php echo $id_almacen;?>);" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody id="res_bus_traspaso" class="res_bus_traspaso">

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*10;
                            $res=mysqli_query($conectador,"SELECT id_traspaso_tienda, descripcion, talla, color, cantidad, nombre_tienda,  fecha_hora
FROM traspaso_tienda
JOIN producto 
ON producto.id_producto=traspaso_tienda.id_producto
JOIN tienda
on tienda.id_tienda=traspaso_tienda.id_tienda_destino
WHERE id_almacen_origen=$id_almacen");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo  $f[1] ;?></td>
                                <td><?php echo  $f[2] ;?></td>
                                <td><?php echo  $f[3] ;?></td>                          
                                <td><?php echo  $f[4] ;?></td>
                                <td><?php echo  $f[5] ;?></td>
                                <td><?php echo  $f[6] ;?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="EliTraspaso(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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
                    $sql=mysqli_query($conectador,"select count(*) as total from ingreso_almacen where id_almacen=$id_almacen");
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