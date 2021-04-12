<?php
include "../conexion.php";
$id=$_GET["id"];
$res=mysqli_query($conectador,"SELECT * FROM producto WHERE id_producto=$id");
$f=mysqli_fetch_array($res);
?>
<form action="" id="form_edit_producto" enctype="multipart/form-data">
    <h4>Editar Prenda</h4>
    <div class="row">
        <div class="col">
            <textarea name="desc_prod" id="desc_prod" cols="30" rows="5" placeholder="Describa la prenda de vestir que es"><?php echo $f[1];?></textarea>
        </div>
        <div class="col">
            <select name="categoria" id="categoria" class="form-control">
                <option><?php echo $f[2];?></option>
                <option>--Seleccionar categoria--</option>
                <option>Pantalones jeans</option>
                <option>Poleras</option>
                <option>Chamarras</option>
                <option>Ropa infantil</option>
                <option>Mangas sport</option>
            </select>
            <br>
            <input type="number" name="precio" id="precio"  class="form-control" placeholder="Precio del producto" value="<?php echo $f[4];?>"/>
        </div>
        <div class="col">
           <input type="text" name="talla" id="talla"  class="form-control" placeholder="Escriba la talla" value="<?php echo $f[3];?>"/>
            <br>
            <input type="text" name="color" id="color"  class="form-control" placeholder="Escriba el color" value="<?php echo $f[5];?>"/>
        </div>     
    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Actualizar" onclick="EditProducto(<?php echo $id;?>);">
</div>