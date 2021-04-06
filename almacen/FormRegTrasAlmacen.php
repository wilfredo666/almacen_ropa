<?php
$id_almacen=$_GET["id_almacen"];
include "../conexion.php";
?>

<form action="" id="form_traspaso_almacen" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label>Producto</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                </div>
                <input type="text" class="form-control" name="producto" id="producto" onkeyup="infoProductoTraspaso(<?php echo $id_almacen;?>);">
            </div>
            <!--detalles del producto-->
            <table class="table">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Color</th>
                        <th>Stock</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="info_producto">
                </tbody>
            </table>                                 
        </div>
        <div class="col">
            <label>Almacen</label>
            <select name="id_almacen_des" id="id_almacen_des" class="form-control">
                <option>Seleccionar</option>
                <?php
                $resul=mysqli_query($conectador,"select * from almacen where id_almacen <> $id_almacen");
                while($f=mysqli_fetch_array($resul))
                {
                    echo "<option value=".$f[0].">$f[3]</option>";
                }
                ?>
            </select>
            <br>
            <label>Cantidad</label>
            <input type="number" name="cantidad_pro" id="cantidad_pro"  class="form-control"/>
        </div>

    </div>

</form>
<div id="mensaje_cont" class="float-left">
</div>   
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Guardar" onclick="RegTraspaso(<?php echo $id_almacen;?>);">
</div>    