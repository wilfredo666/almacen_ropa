<?php
session_start();
error_reporting(0);
if($_SESSION["categoria"]==null || $_SESSION["categoria"]==""){
    echo "Usted no ha iniciado sesion";
    die();
}
include "conexion.php";
include "panel_control_tienda.php";

?>
<?php
include "footer.php";
?>
