<script src="../assets/js/almacen.js"></script>
<?php
session_start();
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
                    <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th>Producto</th>
                                <th>Categoria</th>
                                <th>Talla</th>
                                <th>Precio</th>
                                <th>Color</th>
                                <th>Stock</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            //$inicio=($_GET["pagina"]-1)*10;
                            $res=mysqli_query($conectador,"SELECT producto.id_producto, descripcion, categoria, talla, precio, color, stock
FROM stock_almacen
JOIN producto
ON producto.id_producto=stock_almacen.id_producto
WHERE id_almacen=$id_almacen");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo " $f[1] ";?></td>
                                <td><?php echo " $f[2] ";?></td>
                                <td><?php echo " $f[3] ";?></td>
                                <td><?php echo " $f[4] ";?></td>
                                <td><?php echo " $f[5] ";?></td>
                                <td><?php echo " $f[6] ";?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="VerProducto(<?php echo $f[0]; ?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
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
                    $sql=mysqli_query($conectador,"select count(*) as total from stock_almacen");
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