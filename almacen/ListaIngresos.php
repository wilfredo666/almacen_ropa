<?php
session_start();
include "../panel_control.php";
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
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
                            <h4>Ingresos</h4>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                                </div>
                                <input type="text" name="txt_bus_ingreso" id="txt_bus_ingreso"  class="form-control" placeholder="Buscar registro, escriba el producto" onkeyup="BuscarIngreso(<?php echo $id_almacen;?>);">
                            </div>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Talla</th>
                                <th>Precio</th>
                                <th>Color</th>
                                <th>Cantidad</th>
                                <th>Fecha y hora</th>
                                <td><button onclick="nuevoIngreso(<?php echo $id_almacen;?>);" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody id="res_bus_ingreso" class="res_bus_ingreso">

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*10;
                            $res=mysqli_query($conectador,"SELECT descripcion, categoria, talla, precio, color, cantidad, fecha_hora, id_ingreso
FROM ingreso_almacen
JOIN producto
WHERE producto.id_producto=ingreso_almacen.id_producto and id_almacen=$id_almacen limit $inicio,10");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo $f[0];?></td>
                                <td><?php echo $f[1];?></td>
                                <td><?php echo $f[2];?></td>
                                <td><?php echo $f[3];?></td>
                                <td><?php echo $f[4];?></td>
                                <td><?php echo $f[5];?></td>
                                <td><?php echo $f[6];?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="FormEliIngreso(<?php echo $f[7]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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
                    //obtener el total de registros
                    $sql=mysqli_query($conectador,"select count(*) as total from ingreso_almacen where id_almacen=$id_almacen");
                    $totalRegistros=mysqli_fetch_array($sql);

                    $productosPorPagina=10;
                    $total=ceil($totalRegistros[0]/$productosPorPagina);

                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET["pagina"]<=1 ? "disabled" : " "?>">
                                <a class="page-link" href="ListaIngresos.php?pagina=<?php echo $i+1;?>&id_almacen=<?php echo $id_almacen;?>" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for($i=0; $i<$total; $i++)
{
                            ?>
                            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? "active": ""?>"><a class="page-link" href="ListaIngresos.php?pagina=<?php echo $i+1;?>&id_almacen=<?php echo $id_almacen;?>">
                                <?php echo $i+1;?>
                                </a>
                            </li>
                            <?php
}
                            ?>
                            <li class="page-item <?php echo $_GET["pagina"]>=$total ? "disabled" : " "?>">
                                <a class="page-link" href="ListaIngresos.php?pagina=<?php echo $i+1;?>&id_almacen=<?php echo $id_almacen;?>" aria-label="Siguiente">
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