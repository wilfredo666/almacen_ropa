<?php
session_start();
error_reporting(0);
if($_SESSION["categoria"]==null || $_SESSION["categoria"]==""){
    echo "Usted no ha iniciado sesion";
    die();
}
include "panel_control.php";
include "conexion.php";

/*extratendo total usuarios*/
$user_sql=mysqli_query($conectador, "SELECT COUNT(id_usuario) FROM usuario");
$user=mysqli_fetch_array($user_sql);

/*extratendo total productos*/
$product_sql=mysqli_query($conectador, "SELECT COUNT(id_producto) FROM producto");
$product=mysqli_fetch_array($product_sql);

/*extratendo total clientes*/
$client_sql=mysqli_query($conectador, "SELECT COUNT(id_cliente) FROM cliente");
$client=mysqli_fetch_array($client_sql);

/*extratendo total proveedores*/
$supplier_sql=mysqli_query($conectador, "SELECT COUNT(id_proveedor) FROM proveedor");
$supplier=mysqli_fetch_array($supplier_sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Panel de control</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Usuarios</span>
                        <span class="info-box-number"><?php echo $user[0];?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
                    <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-th"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Productos</span>
                        <span class="info-box-number"><?php echo $product[0];?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
                    <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="nav-icon fas fa-user-tag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Clientes</span>
                        <span class="info-box-number"><?php echo $client[0];?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
                    <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-handshake"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Proveedores</span>
                        <span class="info-box-number"><?php echo $supplier[0];?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

    </div>
</div>
<!-- /.content-wrapper -->


<?php
include "footer.php";
?>
