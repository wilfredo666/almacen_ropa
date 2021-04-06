<?php
session_start();

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$cat=$_POST['categoria'];
$conexion=mysqli_connect("localhost","root","","almacen_ropa");

$_SESSION["usuario"]=$usuario;
$_SESSION["clave"]=$clave;
$_SESSION["categoria"]=$cat;

$consulta="select * from usuario where nombre_usu='$usuario' and password='$clave' and categoria='$cat'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_fetch_row($resultado);
//prueba de comentario
if($filas>0){
    if($filas[3]=="administrador"){
        header("Location:panel_inicial.php");
        $_SESSION["id_usuario"]=$filas[0];
    }elseif($filas[3]=="cajero"){
        header("Location:panel_inicial_tienda.php");
        $_SESSION["id_usuario"]=$filas[0];
    }
}
else{
    echo "Error de autenticacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>