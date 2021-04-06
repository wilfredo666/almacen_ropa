<script src="../assets/js/producto.js"></script>
<?php
include "../panel_control.php";
include "../conexion.php";
$id_almacen=$_GET["id_almacen"];
?>

<div class="content-wrapper">
    <br>
    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!--formulario ingreso producto - lado izquierdo-->
                    <form action="" id="form_ingreso_producto" enctype="multipart/form-data">
                        <h4>Ingreso de Productos en Almacenes</h4>
                        <div class="row">
                            <div class="col">
                                <?php
                                $resul=mysqli_query($conectador,"select * from producto");
                                ?>
                                <label for="">Seleccione el producto del cual ingresara stock</label>
                                <select name="producto" id="producto" class="form-control" onchange="infoProducto();">
                                   <option>Seleccionar</option>
                                    <?php

                                    while($f=mysqli_fetch_array($resul))
                                    {
                                        echo "<option value=".$f[0].">$f[1] - $f[3]</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <label>Cantidad:</label>
                                <input type="number" name="cantidad_pro" id="cantidad_pro"  class="form-control" placeholder="Cantidad a ingresar"/>
                                <br>
                                <label>A que almacen ingresara?</label>
                                <select name="almacen" id="almacen" class="form-control" onchange="infoAlmacen();">
                                    <option>Seleccionar</option>
                                    <?php
                                    $resul=mysqli_query($conectador,"select * from almacen");
                                    while($f=mysqli_fetch_array($resul))
                                    {
                                        echo "<option value=".$f[0].">$f[3]</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <div id="mensaje_cont" class="float-left">
                                </div>
                                <button class="btn btn-primary float-right" type="button" onclick="RegIngreso();">Registrar</button>
                            </div>
                        </div>
                    </form>     
                </div>
                <!--final - formulario ingreso producto-->

                <!--detalles del producto - lado derecho-->
                <div class="col" id="info_producto">
                    <!-- aqui se muestra informacion del producto de "IngInfoProducto"-->
                </div>
                <!--final - detalles del producto-->

                <!--detalles del almacen de ingreso - lado derecho-->
                <div class="col" id="info_almacen">
                </div>
                <!--final - detalles del almacen-->
            </div>

        </div>
    </section>
</div>
<!-- final contenido principal -->
<?php
include "../footer.php";
?>
