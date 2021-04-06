<?php
$id_tienda=$_GET["id_tienda"];
?>
<form action="" id="form_ingreso_producto" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label>Producto</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                </div>
                <input type="text" class="form-control" name="producto" id="producto" onkeyup="infoProducto();">
            </div>
            <!--detalles del producto-->
            <table class="table">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Color</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="info_producto">
                </tbody>
            </table>                                 
        </div>
        <div class="col">
            <label>Cantidad</label>
            <input type="number" name="cantidad_pro" id="cantidad_pro"  class="form-control"/>
        </div>

    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Guardar" onclick="RegIngreso(<?php echo $id_tienda;?>);">
</div>     