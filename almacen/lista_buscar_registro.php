<?php
require "../conexion.php";
$txt_buscar = trim($_POST['txt_bus']);
$id_almacen= $_GET["id_almacen"];

if($txt_buscar=="")
{
    echo "No se encontraron resultados";
}

else{ 
    $sql = mysqli_query($conectador,"SELECT producto.id_producto, descripcion, categoria, talla, precio, color, cantidad, fecha_hora, id_ingreso
FROM ingreso_almacen
JOIN producto
WHERE producto.id_producto=ingreso_almacen.id_producto and id_almacen=$id_almacen and descripcion LIKE '%$txt_buscar%' LIMIT 10");

    while ($f = mysqli_fetch_array($sql)) {

?>
        <tr>
            <td><?php echo " $f[1] ";?></td>
            <td><?php echo " $f[2] ";?></td>
            <td><?php echo " $f[3] ";?></td>
            <td><?php echo " $f[4] ";?></td>
            <td><?php echo " $f[5] ";?></td>
            <td><?php echo " $f[6] ";?></td>
            <td><?php echo " $f[7] ";?></td>
            <td>
                <div class="btn-group">
                    <button onclick="MEditIngreso(<?php echo $f[8]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                    <button onclick="MEliIngreso(<?php echo $f[8]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                </div>
            </td>
        </tr>
<?php
}

}
?>