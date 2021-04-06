<?php
session_start();
error_reporting(0);
if($_SESSION["categoria"]==null || $_SESSION["categoria"]==""){
    echo "Usted no ha iniciado sesion";
    die();
}
include "panel_control.php";
include "conexion.php";
?>
<!--recursos extras-->
<?php
include "footer.php";
?>
