<?php
session_start();

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$cat=$_POST['categoria'];
/*$conexion=mysqli_connect("localhost","root","","almacen_ropa");*/
$conexion=mysqli_connect("localhost:3306","marketin_sistemaalmacen","Admin123!","marketin_almacen_ropa");


$consulta="select * from usuario where nombre_usu='$usuario' and password='$clave' and categoria='$cat'";
$resultado=mysqli_query($conexion,$consulta);
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
    //print_r($_SESSION); <?php print_r($_SESSION);
    
    if($filas[3]=="administrador"){
        header("Location:panel_inicial.php"); 
    }elseif($filas[3]=="cajero"){
        header("Location:panel_inicial_tienda.php");
    }
}
else{
    echo "Error de autenticacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>