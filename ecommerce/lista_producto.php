<html>
<head>
    
</head>
<body>
    
    <?php
    
        include "DB.php";
        $con=new producto();
        $cerrar=$con->conexion();
        
        
        
        
        
        if (isset($_GET['objeto'])) 
                    {
                        $categoria=$_GET['objeto'];
                        $result = $con->categorizado($categoria);
                    } 
                else 
                    {
                        $result = $con->totaliti();
                    }
    ?>
 

                

<table border="0" width="100%">
    <tr>
        <td  valign="top" align='right' width="15%">
    <table bgcolor="FF7F00"  border='0' width='45%' align="right">
        <tr><td align="right"><a href="lista_producto.php"><img src="imagenes/categorias.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=accesorios"><img src="imagenes/accesorios.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=almacenamiento"><img src="imagenes/almacenaje.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=audio_y_Video"><img src="imagenes/AV.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=computadoras"><img src="imagenes/computadoras.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=videojuegos"><img src="imagenes/videojuegos.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=pantallas"><img src="imagenes/pantallas.png" style='width:100%;height:auto;'></a></td></tr>
                <tr><td align="right"><a href="lista_producto.php?objeto=energia"><img src="imagenes/energia.png" style='width:100%;height:auto;'></a></td></tr>
                
                
                </table>
            
            
        </td>
        
        
            
        <td width='60%'>
            <table valign="top" border="0" width="100%">
                <?php 
                

                while($mostrar= mysql_fetch_array($result)){
                        ?>
                <tr>
                    <?php
                    for ($x=0;$x<=4;$x++){
                        if(!empty($mostrar))
                        {
                    ?>
                    
                    <td width="20%">
                        <table>
                            <tr>
                                <td>
                                <a href="producto.php?objeto=<?php echo $mostrar['id_producto'];?>"><img src="imagenes/<?php echo $mostrar['imagen'];?>" style='width: 100%;height: auto;'></a>
                                </td>
                            </tr>
                            
                        </table>
                        <table>
                            <tr>
                                <td>
                            <center><font size='1'> <?php echo substr($mostrar['nombre'],0, 30).""; ?>
                                
                                </td>
                            </tr>
                        </table>
                    </td>
                
                
                    <?php if($x!=4){$mostrar= mysql_fetch_array($result);}}}?>
                
                </tr>
                    
                <?php
                    
                    }
                
                ?>
                
                
            </table>
        </td>
    
    
    
        <td></td>
    </tr>
</table>
    
    
        <?php 
        mysql_close($cerrar);
        ?>
</body>
</html>