
<h4>Esta seguro de eliminar esta Venta?</h4>
<?php
$id=$_GET["id_venta"];
?>

<div class="modal-footer">
    <input class="btn btn-primary" type="button" data-dismiss="modal" value="Cancelar">
    <input class="btn btn-danger" type="button" value="Eliminar" onclick="EliVenta(<?php echo $id;?>);">
</div>