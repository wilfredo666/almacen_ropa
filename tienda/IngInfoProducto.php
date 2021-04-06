<?php
include "../conexion.php";
$txt_bus=$_POST["txt_bus"];
//si texto es mas que uno
if(strlen($txt_bus)>0){
    $res=mysqli_query($conectador,"SELECT * FROM producto WHERE descripcion Like '%$txt_bus%'");
    while($f=mysqli_fetch_array($res)){
?>
  <tr>
    <td><?php echo $f[1];?></td>
    <td><?php echo $f[2];?></td>
    <td><?php echo $f[3];?></td>
    <td><?php echo $f[4];?></td>
    <td><?php echo $f[5];?></td>
    <td><input class="form-check-input" type="radio" name="id_producto" id="id_producto" value="<?php echo $f[0];?>"></td>
</tr>



<?php
                                      }          
} ?>