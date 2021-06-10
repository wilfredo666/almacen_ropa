<h4>Esta seguro de eliminar este traspaso?</h4>
<?php
$id=$_GET["id_traspaso"];
?>
<div class="modal-footer">
    <input class="btn btn-primary" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-danger" type="submit" value="Eliminar" onclick="EliTraspaso(<?php echo $id;?>);">
</div>
