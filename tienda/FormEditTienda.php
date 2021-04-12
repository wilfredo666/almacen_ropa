<?php
include "../conexion.php";
$id=$_GET["id"];
$res=mysqli_query($conectador,"SELECT * FROM tienda WHERE id_tienda=$id");
$f=mysqli_fetch_array($res);

?>
   <form action="" id="form_edit_tienda" enctype="multipart/form-data">
    <h4>Editar Tienda</h4>
    <div class="row">
        <div class="col">
           <label>Nombre de la tienda</label>
            <input type="text" name="nombre" id="nombre"  class="form-control" value="<?php echo $f[1]?>"/>
            <br>
            <textarea name="direccion" id="direccion" cols="30" rows="3" placeholder="Direccion de la tienda"><?php echo $f[2]?></textarea>
        </div>
        <div class="col">
           <label>Usuario a cargo</label>
            <select class="form-control" name="usuario" id="usuario">                
                <?php
                include "../conexion.php";
                $usu_diponible=mysqli_query($conectador,"select * from usuario WHERE not exists (select id_usuario from tienda WHERE usuario.id_usuario=tienda.id_usuario)");
                   
                $usu_act=mysqli_fetch_row(mysqli_query($conectador,"select * from usuario where id_usuario=$f[3]"));
                   echo "<option value=".$u[0]." selected>$usu_act[4] $usu_act[5] $usu_act[6]</option>";
                while($u=mysqli_fetch_array($usu_diponible))
                {

                        echo "<option value=".$u[0].">$u[4] $u[5] $u[6]</option>";
                }
                ?>
            </select>
            <br>
            <label>Telefonos de contacto</label>
            <input type="text" name="telefono" id="telefono"  class="form-control" placeholder="Telefonos de contacto" value="<?php echo $f[4];?>"/>
        </div>     
    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Guardar" onclick="EditTienda(<?php echo $f[0];?>);">
</div>