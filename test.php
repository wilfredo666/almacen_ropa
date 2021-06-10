<?php
include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
      <tr>
          <td>Talla 1</td>
          <td>Talla 2</td>
          <td>Talla 3</td>
          <td>Talla 4</td>
          <td>Talla 5</td>
          <td>Talla 6</td>
      </tr>
       <tr>
        <?php
        $sql=mysqli_query($conectador, "SELECT DISTINCT talla from producto ORDER BY talla");
        while($tallas=mysqli_fetch_array($sql)){
            ?>
            <td><?php echo $tallas[0];?></td>        
            
            <?php
        }
        
        ?>
        </tr>
    </table>
    
</body>
</html>




//
<tr>
                                <?php
                                switch ($almacen[4]){
                                    case "2-16":
                                        echo "<td>2</td>
                                <td>4</td>
                                <td>6</td>
                                <td>8</td>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>";
                                        break;
                                    case "P-XXXL":
                                        echo "<td>P</td>
                                <td>M</td>
                                <td>L</td>
                                <td>XL</td>
                                <td>XXL</td>
                                <td>XXXL</td>
                                <td>48</td>
                                <td>50</td>
                                <td>54</td>";
                                        break;
                                    case "36-54":
                                        echo "<td>36</td>
                                <td>38</td>
                                <td>40</td>
                                <td>42</td>
                                <td>44</td>
                                <td>46</td>
                                <td>48</td>
                                <td>50</td>
                                <td>54</td>";
                                        break;
                                }
                                ?>
                            </tr>
                            
                           SELECT producto.id_producto, descripcion, categoria, talla, precio, color, stock
FROM stock_almacen
JOIN producto
ON producto.id_producto=stock_almacen.id_producto
WHERE id_almacen=$id_almacen