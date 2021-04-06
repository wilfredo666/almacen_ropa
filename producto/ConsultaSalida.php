<?php
require "../conexion.php";
$saling = $_POST['saling']; //salida o ingreso
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

if($saling=="Selecionar")//validar con js antes de que salga
{
    echo "No se encontraron resultados, verifique las opciones seleccionadas";
}
elseif($saling=="Salidas"){
       $sql = mysqli_query($conectador,"SELECT id_salida_producto, descripcion, nombre, cantidad, fecha_hora FROM `salida_producto`
    JOIN producto
    ON producto.id_producto=salida_producto.id_producto
    JOIN destino_mercaderia
    ON destino_mercaderia.id_destino=salida_producto.id_destino
    where fecha_hora between '$fecha_inicio 00:00:01' and '$fecha_fin 23:59:59'");

    while ($f = mysqli_fetch_array($sql)) {

?>
<table class="table table-bordered">
    <thead>                  
        <tr>
            <th>Producto</th>
            <th>Cliente/Almacen</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <td><button onclick="nuevoProducto();" type="button" class="btn btn-success">Imprimir</button></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo " $f[1] ";?></td>
            <td><?php echo " $f[2] ";?></td>
            <td><?php echo " $f[3] ";?></td>
            <td><?php echo " $f[4] ";?></td>
            <td>
                <div class="btn-group">
                    <button onclick="MEditSalida(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                    <button onclick="MEliSalida(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<?php
                                          }
}
/*elseif($saling=="Ingresos"){

    $sql = mysqli_query($conectador,"SELECT id_salida_producto, descripcion, nombre, cantidad, fecha_hora FROM `salida_producto`
JOIN producto
ON producto.id_producto=salida_producto.id_producto
JOIN destino_mercaderia
ON destino_mercaderia.id_destino=salida_producto.id_destino");

    while ($f = mysqli_fetch_array($sql)) {
?>
<table class="table table-bordered">
    <thead>                  
        <tr>
            <th>Producto</th>
            <th>Cliente/Almacen</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <td><button onclick="nuevoProducto();" type="button" class="btn btn-success">Imprimir</button></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo " $f[1] ";?></td>
            <td><?php echo " $f[2] ";?></td>
            <td><?php echo " $f[3] ";?></td>
            <td><?php echo " $f[4] ";?></td>
            <td>
                <div class="btn-group">
                    <button onclick="MEditSalida(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                    <button onclick="MEliSalida(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<?php
                                          }
}*/
?>