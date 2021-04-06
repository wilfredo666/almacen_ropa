
<h4>Esta seguro de eliminar esta tienda?</h4>
<?php
$id=$_GET["id"];
?>

<div class="modal-footer">
    <input class="btn btn-primary" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-danger" type="button" value="Eliminar" onclick="EliTienda(<?php echo $id;?>);">
</div>