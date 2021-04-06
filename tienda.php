<script src="assets/js/tienda.js"></script>
<?php
session_start();
if($_SESSION["categoria"]=="administrador"){
    include "panel_control.php";
}else{
    include "panel_control_tienda.php";
}
include "conexion.php";

?>
<div class="content-wrapper">

    <!-- contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th>Tienda</th>
                                <th>Direccion</th>
                                <th>Usuario a cargo</th>
                                <th>Telefonos de contacto</th>
                                <td><button onclick="nuevaTienda();" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $res=mysqli_query($conectador,"SELECT id_tienda,nombre_tienda,dir_tienda,nombre,apellido_pat,apellido_mat,tel_contacto
FROM tienda
JOIN usuario
ON tienda.id_usuario=usuario.id_usuario");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo " $f[1] ";?></td>
                                <td><?php echo " $f[2] ";?></td>
                                <td><?php echo " $f[3] $f[4] $f[5] ";?></td>
                                <td><?php echo " $f[6]";?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="MEditTienda(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                                        <button onclick="MEliTienda(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- final contenido principal -->

</div>
<?php
include "footer.php";
?>