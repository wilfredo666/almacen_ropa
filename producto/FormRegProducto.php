<form action="" id="form_producto" enctype="multipart/form-data">
    <h4>Registro de Prendas de vestir Nuevas</h4>
    <div class="row">
        <div class="col">
            <textarea name="desc_prod" id="desc_prod" cols="30" rows="5" placeholder="Describa la prenda de vestir"></textarea>
        </div>
        <div class="col">
            <select name="categoria" id="categoria" class="form-control">
                <option>Seleccionar categoria</option>
                <option>Pantalones jeans</option>
                <option>Poleras</option>
                <option>Chamarras</option>
                <option>Ropa infantil</option>
                <option>Mangas sport</option>
                <option>Tenis</option>
                <option>Zapatos</option>
            </select>
            <br>
            <input type="number" name="precio" id="precio"  class="form-control" placeholder="Precio del producto"/>
        </div>
        <div class="col">
<input type="text" name="talla" id="talla"  class="form-control" placeholder="Escriba la talla"/>
            <br>
            <input type="text" name="color" id="color"  class="form-control" placeholder="Escriba el color"/>
        </div>     
    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Guardar" onclick="RegProducto();">
</div>