<?php

include("DB.php");

$con= new producto();

$cerrar=$con->conexion();

$consulta=$con->totaliti();

?>

<table border="3">
    
<?php    
    
 while($imprimir= mysql_fetch_array($consulta)) 
 {
?>

    <tr>
        <td><img src="imagenes/<?php echo $imprimir['imagen'];?>" style="width: 70px;height: 70px;"></td>
        <td><?php echo $imprimir['id_producto']; ?></td>
        
    
        
        <td><a href="producto.php?objeto=<?php echo $imprimir['id_producto']; ?>">     <?php echo $imprimir['nombre']; ?></a></td>        
        <td><?php echo $imprimir['precio']; ?></td>
        <td><?php echo $imprimir['categoria']; ?></td>
        <td><?php echo $imprimir['fabricante']; ?></td>
        <td><?php echo $imprimir['existencias']; ?></td>
        
    </tr>
    
<?php

 }
 
 mysql_close($cerrar);
?>
</table>
