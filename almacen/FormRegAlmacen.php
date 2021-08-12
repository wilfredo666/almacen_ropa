<form action="" id="form_almacen" enctype="multipart/form-data">
    <h4>Registrar nuevo Almacen</h4>
    <div class="row">
        <div class="col">
            <textarea name="direccion" id="direccion" cols="20" rows="3" placeholder="Direccion o ubicacion del almacen"></textarea>
        </div>
        <div class="col">
           <label>Que tipo de ropa almacena?:</label>
           <input type="text" class="form-control" name="descripcion" id="descripcion">
<!--            <label>Que tallas/medidas usara?:</label>
            <select name="medida" id="medida" class="form-control">
               <option>Seleccionar</option>
                <option value="1">2-16</option>
                <option value="2">P-XXXL</option>
                <option value="3">36-54</option>
            </select>-->
        </div>
        <div class="col">
            <label>Persona a cargo:</label>
            <select class="form-control" name="usuario" id="usuario">
               <option value="">Seleccionar</option>
                <?php
                include "../conexion.php";
                $resul=mysqli_query($conectador,"select * from usuario");
                while($f=mysqli_fetch_array($resul))
                {
                    echo "<option value=".$f[0].">$f[4] $f[5] $f[6]</option>";
                }
                ?>
            </select>
        </div>     
    </div>
</form>
<div class="modal-footer">
    <input class="btn btn-danger" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-success" type="button" value="Guardar" onclick="RegAlmacen();">
</div>