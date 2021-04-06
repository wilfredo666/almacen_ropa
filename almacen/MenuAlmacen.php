<script src="../assets/js/almacen.js"></script>
<?php
session_start();
include "../panel_control.php";
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Almacen</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <a href="TraspasoAlmacen.php?id_almacen=<?php echo $id_almacen; ?>&pagina=1" class="btn btn-info">Traspasar a otro almacen</a>
                <br>
                <br>
                <a href="TraspasoTienda.php?id_almacen=<?php echo $id_almacen; ?>&pagina=1" class="btn btn-info">Traspasar a tienda</a>
                <br>
                <br>
                <a href="ListaIngresos.php?id_almacen=<?php echo $id_almacen; ?>&pagina=1" class="btn btn-info">Ingresar inventario</a>
                <br>
                <br>
                <a href="stockAlmacen.php?id_almacen=<?php echo $id_almacen; ?>&pagina=1" class="btn btn-info">Stock</a>
            </div>
            <div class="col-4">
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "../footer.php";

?>