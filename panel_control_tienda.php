<?php
include "conexion.php";

//ruta
$ruta=$_SERVER['REQUEST_URI'];
//dominio
$dominio=$_SERVER['HTTP_HOST'];
//delimitando dominio
//$carpeta_sistema=explode("/",$ruta);
$ruta_absoluta="http://".$dominio."/almacen_ropa";

//detalles de tienda
$id_usuario=$_SESSION['id_usuario'];
$tienda=mysqli_query($conectador,"SELECT * FROM tienda WHERE id_usuario=$id_usuario");
$tienda_detalle=mysqli_fetch_row($tienda);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Almacen de ropa</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo $ruta_absoluta;?>/plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <div class="brand-link">
                    <img src="<?php echo $ruta_absoluta;?>/img/logo_ropa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Almacen de ropa</span>

                </div>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="info">
                            <a class="d-block">Tienda - <?php echo $tienda_detalle[1];?></a>
                            <a class="d-block">Encargado: <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido_pat"]." ".$_SESSION["apellido_mat"];?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="<?php echo $ruta_absoluta;?>/cliente.php?pagina=1" class="nav-link">
                                    <i class="nav-icon fas fa-user-tag"></i>
                                    <p>
                                        Clientes
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-store"></i>
                                    <p>
                                        Tienda
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo $ruta_absoluta;?>/tienda/stockTienda.php?pagina=1" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inventario</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $ruta_absoluta;?>/tienda/FormRegVenta.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Realizar venta</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $ruta_absoluta;?>/tienda/ListaVenta.php?pagina=1" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Registro de ventas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo $ruta_absoluta;?>/tienda/HistoriaVenta.php?pagina=1" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Historia de ventas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $ruta_absoluta;?>/salir.php" class="nav-link">
                                    <i class="nav-icon fas fa-door-open"></i>
                                    <p>
                                        Salir
                                    </p>
                                </a>
                            </li>
                            </nav>
                        <!-- /.sidebar-menu -->
                        </div>
                    <!-- /.sidebar -->
                    </aside>

