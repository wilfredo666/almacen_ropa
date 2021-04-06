<script src="assets/js/usuario.js"></script>
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
                                <th>Usuario</th>
                                <th>Categoria</th>
                                <th>Nombre(s)</th>
                                <td><button onclick="MnuevoUsuario();" type="button" class="btn btn-primary">Nuevo</button></td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $res=mysqli_query($conectador,"SELECT * FROM usuario;");
                            while($f=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr>
                                <td><?php echo " $f[1] ";?></td>
                                <td><?php echo " $f[3] ";?></td>
                                <td><?php echo " $f[4] $f[5] $f[6] ";?></td>
                                <td>
                                    <div class="btn-group">
                                        <button onclick="VerUsuario(<?php echo $f[0]; ?>);" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></button>
                                        <button onclick="MEditUsuario(<?php echo $f[0]; ?>);" class="btn btn-secondary btn-circle"><i class="fas fa-edit"></i></button>
                                        <button onclick="MEliUsuario(<?php echo $f[0]; ?>);" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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
