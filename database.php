<?php
$servername = "localhost";
$database = "u248590315_almacen_ropa";
$username = "u248590315_almacen";
$password = "Admin321!";

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

// Create connection
$conectador = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conectador) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Conexion exitosa";
echo "el usuario es: ".$usuario;
echo "la contraseña es: ".$clave;
mysqli_close($conectador);
?>