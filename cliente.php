<?php
session_start();
if($_SESSION["categoria"]=="administrador"){
    include "panel_control.php";
}else{
    include "panel_control_tienda.php";
}
include "conexion.php";
?>
<script src="assets/js/cliente.js"></script>
<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h4>Buscar cliente</h4>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                                </div>
                                <input type="text" name="dat_cliente" id="dat_cliente"  class="form-control" placeholder="Buscar por: nombre, ci/nit del cliente" onkeyup="BuscarCliente();">
                            </div>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th>Nombre(s)</th>
                                <th>Nit/C.I.</th>
                                <th>Telefono(s)</th>
                                <th>Direccion</th>
                                <td><button onclick="nuevoCliente();" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody id="res_bus_cliente">

                            <?php
                            //obtener por get el inicio y multiplicarlo por la cantidad de registros que queremos que se vea
                            $inicio=($_GET["pagina"]-1)*10;
                            $res=mysqli_query($conectador,"SELECT * FROM cliente limit $inicio,10");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo " $f[1] $f[2] $f[3] ";?></td>
                                <td><?php echo " $f[4] ";?></td>
                                <td><?php echo " $f[5] ";?></td>
                                <td><?php echo " $f[6] ";?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="MEditCliente(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                                        <button onclick="MEliCliente(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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
                    $sql=mysqli_query($conectador,"select count(*) as total from cliente");
                    $totalRegistros=mysqli_fetch_array($sql);

                    $itemsPorPagina=10;
                    $total=ceil($totalRegistros[0]/$itemsPorPagina);
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET["pagina"]<=1 ? "disabled" : " "?>">
                                <a class="page-link" href="cliente.php?pagina=<?php echo $_GET['pagina']-1;?>" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for($i=0; $i<$total; $i++)
{
                            ?>
                            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? "active": ""?>"><a class="page-link" href="cliente.php?pagina=<?php echo $i+1;?>">
                                <?php echo $i+1;?>
                                </a>
                            </li>
                            <?php
}
                            ?>
                            <li class="page-item <?php echo $_GET["pagina"]>=$total ? "disabled" : " "?>">
                                <a class="page-link" href="cliente.php?pagina=<?php echo $_GET['pagina']+1;?>" aria-label="Siguiente">
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
