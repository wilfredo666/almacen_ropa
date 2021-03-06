<?php
session_start();
include "panel_control.php";
include "conexion.php";

?>
<script src="assets/js/producto.js"></script>
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
                            <tr>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Talla</th>
                                <th>Precio</th>
                                <th style="width: 40px">Color</th>
                                <td><button onclick="nuevoProducto();" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody id="res_bus_producto" class="res_bus_producto">

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*50;//devuelve 0
                            $res=mysqli_query($conectador,"SELECT * FROM producto limit $inicio,50");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo $f[1];?></td>
                                <td><?php echo $f[2];?></td>
                                <td><?php echo $f[3];?></td>
                                <td><?php echo $f[4];?></td>
                                <td><?php echo $f[5];?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="VerProducto(<?php echo $f[0]; ?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
                                        <button onclick="MEditProducto(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                                        <button onclick="MEliProducto(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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
                    $sql=mysqli_query($conectador,"select count(*) as total from producto");//143
                    $totalRegistros=mysqli_fetch_row($sql);//devuelve 21

                    $productosPorPagina=50;
                    $total=ceil($totalRegistros[0]/$productosPorPagina);//devuelve 2,1 redondeado a 3

                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <!-- simbolo << -->
                            <li class="page-item <?php echo $_GET["pagina"]<=1 ? "disabled" : " "?>">
                                <a class="page-link" href="producto.php?pagina=<?php echo $_GET['pagina']-1;?>" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <!-- fin simbolo << -->
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
include "footer.php";
?>