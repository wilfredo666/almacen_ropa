<?php
session_start();

include "conexion.php";

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$cat=$_POST['categoria'];

$consulta="select * from usuario where nombre_usu='$usuario' and password='$clave' and categoria='$cat'";
$resultado=mysqli_query($conectador,$consulta);
$filas=mysqli_fetch_row($resultado);
//prueba de comentario
if($filas>0){
    $_SESSION["id_usuario"]=$filas[0];
    $_SESSION["nombre_usu"]=$filas[2];
    $_SESSION["categoria"]=$filas[3];
    $_SESSION["nombre"]=$filas[4];
    $_SESSION["apellido_pat"]=$filas[5];
    $_SESSION["apellido_mat"]=$filas[6];
    $_SESSION["ci"]=$filas[7];
    
    if($filas[3]=="administrador"){
        header("Location:panel_inicial.php"); 
    }elseif($filas[3]=="cajero"){
        $cajero_sql=mysqli_query($conectador,"select * from tienda where id_usuario=$filas[0]");
        $cajero=mysqli_fetch_row($cajero_sql);
        if($cajero>0){
            header("Location:panel_inicial_tienda.php");
        }else{
            include ("index.html");
    ?>
    <h1 class="error">El cajero no tiene tienda asignada!!!</h1>
    <?php
        }
    }
}
else{
    include ("index.html");
    ?>
    <h1 class="error">Error de autenticacion!!!</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conectador);

?>