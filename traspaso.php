<script src="assets/js/producto.js"></script>
<?php
include "panel_control.php";
include "conexion.php";
?>

<div class="content-wrapper">
    <br>
    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!--formulario ingreso producto - lado izquierdo-->
                    <form action="" id="form_salida_producto" enctype="multipart/form-data">
                        <h4>Traspaso de productos a tienda(s)</h4>
                        <div class="row">
                            <div class="col">
                                <label for="">Seleccione el producto</label>
                                <?php
                                $resul=mysqli_query($conectador,"select * from producto");
                                ?>
                                <select name="producto" id="producto" class="form-control" onchange="infoProducto();">
                                    <?php

                                    while($f=mysqli_fetch_array($resul))
                                    {
                                        echo "<option value=".$f[0].">$f[1]</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <input type="number" name="cantidad_pro" id="cantidad_pro"  class="form-control" placeholder="Cantidad"/>
                                <br>
                                <label for="">De que almacen transferira el producto?</label>
                                <?php
                                $destino=mysqli_query($conectador,"select * from almacen");
                                ?>
                                <select name="almacen" id="almacen" class="form-control" onchange="infoAlmacen();">
                                   <option>Seleccionar</option>
                                    <?php

                                    while($des=mysqli_fetch_array($destino))
                                    {
                                        echo "<option value=".$des[0].">$des[3]</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <label for="">A que tienda transferira el producto?</label>
                                <?php
                                $destino=mysqli_query($conectador,"select * from tienda");
                                ?>
                                <select name="tienda" id="tienda" class="form-control" onchange="infoTienda();">
                                    <option>Seleccionar</option>
                                    <?php
                                    while($des=mysqli_fetch_array($destino))
                                    {
                                        echo "<option value=".$des[0].">$des[1]</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <div id="mensaje_cont" class="float-left">

                                </div>
                                <button class="btn btn-primary float-right" type="button" onclick="RegTraspaso();">Registrar</button>
                            </div>
                        </div>
                    </form>     
                </div>
                <!--final - formulario traspaso producto a tienda-->

                <!--detalles del producto - lado derecho-->
                <div class="col" id="info_producto">
                    <!-- aqui se muestra informacion del producto de "IngInfoProducto"-->
                </div>
                <!--final - detalles del producto-->

                <!--detalles del almacen - lado derecho-->
                <div class="col">
                    <div id="info_almacen">
                        <!-- aqui se muestra informacion del almacen de "IngInfoAlmacen"-->

                    </div>
                    <div id="info_tienda">
                        <!-- aqui se muestra informacion de la tienda de "InfoTienda-->

                    </div>

                </div>
                <!--final - detalles del almacen-->


            </div>

        </div>
    </section>
</div>
<!-- final contenido principal -->
<?php
include "footer.php";
?>
