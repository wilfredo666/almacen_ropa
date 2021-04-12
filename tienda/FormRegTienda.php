<form action="" id="form_tienda" enctype="multipart/form-data">
    <h4>Registrar nueva Tienda</h4>
    <div class="row">
        <div class="col">
           <label>Nombre de la tienda</label>
            <input type="text" name="nombre" id="nombre"  class="form-control"/>
            <br>
            <textarea name="direccion" id="direccion" cols="30" rows="3" placeholder="Direccion de la tienda"></textarea>
        </div>
        <div class="col">
           <label>Usuario a cargo</label>
            <select class="form-control" name="usuario" id="usuario">
                <option>Seleccionar</option>
                <?php
                include "../conexion.php";
                $usu_sql=mysqli_query($conectador,"select * from usuario WHERE not exists (select id_usuario from tienda WHERE usuario.id_usuario=tienda.id_usuario)");
                while($u=mysqli_fetch_array($usu_sql))
                {
                    echo "<option value=".$u[0].">$u[4] $u[5] $u[6]</option>";
                }
                ?>
            </select>
            <br>
            <label>Telefonos de contacto</label>
            <input type="text" name="telefono" id="telefono"  class="form-control"/>
        </div>     
    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Guardar" onclick="RegTienda();">
</div>