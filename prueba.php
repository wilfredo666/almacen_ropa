<?php 
//ruta
$ruta=$_SERVER['REQUEST_URI'];
//dominio
$dominio=$_SERVER['HTTP_HOST'];
//delimitando dominio
$carpeta_sistema=explode("/",$ruta);
$ruta_absoluta="http://".$dominio."/".$carpeta_sistema[1];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Pruebas</title>
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
    <body>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">Nro</th>
                    <th rowspan="2">Producto</th>
                    <th rowspan="2">Color</th>
                    <th colspan="8">Tallas</th>
                    <th rowspan="1">Total</th>
                </tr>
                <tr>
                    <?php
                    for($i=0;$i<8;$i++){
                        echo "<th>$i</th>";
                    }
                    ?>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">...</td>
                    <td rowspan="3">Jean Fitnes</td>            
                </tr>
                <tr>
                    <td>Rojo</td>//color
                    <td>x</td>//las cantidades de las tallas
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>tot</td>total
                </tr>
                <tr>
                    <td>Negro</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>tot</td>
                </tr>


            </tbody>
        </table>
        <?php include "footer.php";?>