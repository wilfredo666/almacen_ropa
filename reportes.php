<script src="assets/js/producto.js"></script>
<?php
include "panel_control.php";
include "conexion.php";

?>
<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <form action="" id="form_consulta" enctype="multipart/form-data">
                                <select name="saling" id="saling" class="form-control">
                                    <option>Seleccionar</option>
                                    <option>Salidas</option>
                                    <option>Ingresos</option>
                                </select>
                                <br>
                                <input type="date" name="fecha_inicio" id="fecha_ingreso" class="form-control">
                                <br>
                                <input type="date" name="fecha_fin" id="fecha_salida" class="form-control">
                                <br>
                                <button class="btn btn-primary float-right" type="button" onclick="consultar();">Consultar</button>
                            </form>

                        </div>
                        <div class="col-8" id="resp_consulta">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- final contenido principal -->


</div>
<?php
include "footer.php";
?>