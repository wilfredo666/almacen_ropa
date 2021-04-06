<script src="assets/js/almacen.js"></script>
<?php
session_start();
include "panel_control.php";
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
                                <th>Id de alamacen</th>
                                <th>Tipo de ropa</th>
                                <th>Direccion</th>
                                <th>Usuario a cargo</th>
                                <td><button onclick="nuevoAlmacen();" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody>
<!--colocar el usuario a cargo-->
                            <?php
                            $res=mysqli_query($conectador,"SELECT id_almacen,direccion,nombre,apellido_pat,apellido_mat,desc_almacen FROM `almacen` JOIN usuario ON almacen.id_usuario=usuario.id_usuario ");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo " $f[0] ";?></td>
                                <td><?php echo " $f[5] ";?></td>
                                <td><?php echo " $f[1] ";?></td>
                                <td><?php echo " $f[2] $f[3] $f[4]";?></td>
                                <td>
                                    <div class="btn-group">
                                       <a href="almacen/MenuAlmacen.php?id_almacen=<?php echo $f[0]; ?>" class="btn btn-info btn-circle"><i class="fas fa-indent"></i></a>
                                        <button onclick="MEditAlmacen(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                                        <button onclick="MEliAlmacen(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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