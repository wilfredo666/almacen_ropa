<script src="../assets/js/tienda.js"></script>
<?php
session_start();
if($_SESSION["categoria"]=="administrador"){
    include "../panel_control.php";
}else{
    include "../panel_control_tienda.php";
}
include "../conexion.php";

?>
<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <form action="" id="form_venta" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-5">
                        <label>Producto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-info btn-circle" disabled><i class="fas fa-search"></i></button>
                            </div>
                            <input type="text" class="form-control" name="producto" id="producto" onkeyup="infoProductoTienda(<?php echo $tienda_detalle[0];?>);">
                        </div>
                        <!--detalles del producto-->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Talla</th>
                                    <th>Precio</th>
                                    <th>Color</th>
                                    <th>Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="info_producto">

                            </tbody>
                        </table>                                 
                        <br>
                        <div id="mensaje_cont" class="float-right">
                        </div>
                        <input type="button" class="btn btn-success" value="Agregar" onclick="AgregarCarrito();">

                    </div>
                    <div class="col-7">
                        
                        <div class="row">
                            <div class="col-5">
                                <label>Cliente</label>
                                <input type="text" name="cliente" id="cliente"  class="form-control">
                            </div>
                            <div class="col-4"></div>
                            <div class="col">
                                <br>
                                <input type="button" class="btn btn-primary" value="Finalizar venta" onclick="FinVenta(<?php echo $tienda_detalle[0];?>);">
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Cantidad</th>
                                    <th>Importe</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="carrito">
                            </tbody>
                            <tr>
                                <th colspan="3">Total
                                    <input type="text" id="totalInp" name="totalInp" hidden=""></th>
                                <td id="total">0</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </form>
        </div>
    </section>
    <!-- final contenido principal -->

</div>
<?php
include "../footer.php";
?>