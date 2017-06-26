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
 
<frameset cols="20%,*" frameborder="no">
<iframe></iframe>
<iframe>
                <table border='3' width='100%' align="right">
                <tr><td valign="top" align="right"><a href="lista_producto.php">Categorias</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=accesorios">Accesorios</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=almacenamiento">Almacenamiento</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=audio y Video">Audio y Video</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=computadoras">Computadoras</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=videojuegos">Videojuegos</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=pantallas">Pantallas</a></td></tr>
                <tr><td><a href="lista_producto.php?objeto=energia">Energia</a></td></tr>
                
                
                </table>
</iframe>
</frameset>
<table border="2" width="100%">
    <tr>
        <td align='right' width="20%">
    
            
            
        </td>
            
        <td width='60%'>
            <table border="2" width="100%">
                <?php 
                

                while($mostrar= mysql_fetch_array($result)){
                        ?>
                <tr>
                    <?php
                    for ($x=0;$x<=4;$x++){
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
                
                
                    <?php $mostrar= mysql_fetch_array($result);}?>
                
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