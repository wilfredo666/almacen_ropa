<?php
include "../conexion.php";
$id=$_GET["id"];
$res=mysqli_query($conectador,"SELECT * FROM almacen WHERE id_almacen=$id");
$f=mysqli_fetch_array($res);

//extrayendo el usuario del almacen
$usu_sql_id=mysqli_query($conectador,"SELECT * FROM usuario WHERE id_usuario=$f[2]");
$u_id=mysqli_fetch_array($usu_sql_id);

?>
<form action="" id="form_edit_almacen" enctype="multipart/form-data">
    <h4>Editar Almacen</h4>
    <div class="row">
        <div class="col">
            <textarea name="direccion" id="direccion" cols="20" rows="3" placeholder="Direccion o ubicacion del almacen"><?php echo $f[1];?></textarea>
        </div>
        <div class="col">
            <label>Que tipo de ropa almacena?:</label>
             <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $f[3];?>">
        </div>
        <div class="col">
            <label>Persona a cargo:</label>
            <select class="form-control" name="usuario" id="usuario">
                <option value="<?php echo $u_id[0];?>"><?php echo "$u_id[4] $u_id[5] $u_id[6]";?></option>
                <option>--Seleccionar--</option>
                <?php
                include "../conexion.php";
                $usu_sql=mysqli_query($conectador,"select * from usuario");
                while($u=mysqli_fetch_array($usu_sql))
                {
                    echo "<option value=".$u[0].">$u[4] $u[5] $u[6]</option>";
                }
                ?>
            </select>
        </div>     
    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Actualizar" onclick="EditAlmacen(<?php echo $id;?>);">
</div>