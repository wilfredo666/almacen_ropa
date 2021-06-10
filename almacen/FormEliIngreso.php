<h4>Esta seguro de eliminar este ingreso?</h4>
<?php
$id=$_GET["id_ingreso"];
?>
<div class="modal-footer">
    <input class="btn btn-primary" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-danger" type="submit" value="Eliminar" onclick="EliIngreso(<?php echo $id;?>);">
</div>
