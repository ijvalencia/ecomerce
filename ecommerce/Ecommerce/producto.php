<html><head>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <?php include 'head.php'; ?>
<body>
    
<?php

include ("DB.php");
    $id=$_GET['objeto'];
    
    $con=new producto();
    $cerrar=$con->conexion();
    $consulta=$con->sacarProducto($id);
    $consulta= mysql_fetch_array($consulta);
    
?>

<table border='0' width='65%'>
    <tr>
        <td colspan="7"><center><font size="5>"<b><?php echo $consulta['nombre']; ?></b></center></td>
    </tr>
    
    <tr>
    
        <td><font size='2'>Marca: <?php echo $consulta['fabricante']; ?></td>
        <td><font size='2'>Mas productos <a href=''><?php echo $consulta['fabricante']; ?></a></td>
        <td><font size='2'><?php echo $consulta['existencias']; ?> disponibles</td>
        <td width='5%'><font size='2'><center><?php $calificacion=$con->calificacion($id);?>
            <?php echo  "<P style='COLOR: white; BACKGROUND-COLOR: Green'> ".$calificacion."</p>";?></td>
        <td><font size='2'>(<?php $con->contarCalificantes($id); echo " Valoraciones"; ?>)</td>
        <td><font size='2'><a href="">Rese&ntilde;as</a></td>
        <td width='40%'></td>        
      
    </tr>
</table>

<img src='imagenes/borde.png' style='width: 65%;height: 2px;'>

<br> <br>
<table border='0' width='65%'>
    <tr>
        <td colspan="6">
    
        </td>
    </tr>
    <tr>
        <td width='50%' colspan="3" rowspan="6"><img src='imagenes/<?php echo $consulta['imagen']; ?>' style='width: 100%;height: auto;'></td>
        <td width='20%' rowspan="6">
    <li>Aqui van las caracteristicas del producto </li><br>
            <li>estas pueden variar conforme a lo que tu deseas</li> <br>
            <li>llamense las mejores caracteristicas del producto</li> <br>
            <li>bla bla bla bla</li></td>
            
            
    </tr>   
    <tr>
        
        
        <td>
            <?php  
            $descuento= mt_rand(1,1);
            if ($descuento==1)
            {
                $descuento=-mt_rand(10,90);
            }
            else
            {
                $descuento=0;
            }
            if($descuento!=0)
            {
                echo "<strike>$".number_format($consulta['precio'], 2)."</strike>      ";
                echo $descuento."%"; 
            }
            else
            {
                echo "<font color='red'>$".number_format($consulta['precio'], 2);
            }
            ?>
        </td>
        
        
        <td rowspan="2" width="15%"><center>
            
            Valoracion de articulo:
            
        </td>
        
        <td rowspan="2"  width='5%'>
        <center>
            <?php
            
            echo  "<P style='COLOR: white; BACKGROUND-COLOR: Green'> ".$calificacion."</p>";
            
            
            ?>
        </td>
    </tr> 
        <td><?php 
            
        if ($descuento!=0){
            echo "<font color='red'>"."$".number_format($consulta['precio']*((100+$descuento)/100),2);
        }
        
        ?></td>
        
        
        
    <tr>
        <td width='30%' colspan="3"><br><br><img src='imagenes/comprar.png' style='width: 100%; height: auto;'></td>
    </tr>
    <tr>
        <td colspan="3"><center><img src='imagenes/borde.png' style='width: 100%;height: 2px;'<br><br><br>
        </td>
    
    </tr>
    <tr>
        <td colspan="3"><img src='imagenes/proteccion.png' style='width: 100%;height: auto;'><br><br><br><br><br>
        </td>
    
    </tr>
    
    
   <!-- <tr>
        <td border="1" width='11%'><img src='imagenes/<?php //echo $consulta['imagen']; ?>' style='width: 100%;height: auto;'></td>
        <td width='11%'></td>
        <td width='11%'></td>
        <td></td>
        <td colspan="2"></td>
    </tr>
               
       -->     

    
</table>

<table border="0" width="65%">
    <tr><td></td><td><b><center><font size="5">Recomendaciones<br></td><td></td></tr>
    <tr><td width="10%"></td><td>
        <iframe frameborder="0" src="C_Recomendados.php?objeto=<?php echo $consulta['categoria']; ?>" width="100%" height="300"></iframe>  
    </td><td width="10%"></td></tr> 
    
    <tr><td></td><td><b><center><font size="5">Mas Vendido<br></td><td></td></tr>
    <tr><td width="10%"></td><td>
        <iframe frameborder="0" src="C_random.php" width="100%" height="300"></iframe>  
    </td><td width="10%"></td></tr>     
        
</table>
<?php mysql_close($cerrar); ?>
</body>
</html>