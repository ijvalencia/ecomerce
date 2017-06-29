<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    
    
  </head>
  <body>
      
<?php
    
    include "DB.php";
    
    $con=new producto();
    $cerrar=$con->conexion(); 
    
    $mostrar=$con->aleatorios3();
    $mostrando= mysql_fetch_array($mostrar);
    
?>
    <div class="container-fluid">
	<div class="row">
		<div  class="col-md-12">
			<div class="carousel slide" id="carousel-699095">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-699095">
					</li>
					<li data-slide-to="1" data-target="#carousel-699095">
					</li>
					<li data-slide-to="2" data-target="#carousel-699095">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<!--<img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1600-500-1.jpg">-->
						
                                                    <table width="100%" border="0">
                                                        <tr>
                                                            <td width="15%"></td>
                                                            <td width="35%"><img width="100%" height="auto" src="imagenes/<?php echo $mostrando['imagen'];?>"></td>
                                                            <td>
                                                                <table border="0">
                                                                    <tr><td width="50%" colspan="2"><?php echo  $mostrando['nombre'];?></td></tr>
                                                                    <tr><td><br><font color="red"><b><?php echo  "$".$mostrando['precio'];?></td><td><br>Marca:  <?php echo  $mostrando['fabricante'];?></td></tr>
                                                                </table>
                                                            </td>
                                                            <td width="15%"><?php $mostrando= mysql_fetch_array($mostrar); ?></td>
                                                        </tr>
                                                    </table>
						
					</div>
					<div class="item">
						<!--<img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg">-->
						
							<table width="100%" border="0">
                                                        <tr>
                                                            <td width="15%"></td>
                                                            <td width="35%"><img width="100%" height="auto" src="imagenes/<?php echo $mostrando['imagen'];?>"></td>
                                                            <td>
                                                                <table border="0">
                                                                    <tr><td width="50%" colspan="2"><?php echo  $mostrando['nombre'];?></td></tr>
                                                                    <tr><td><br><font color="red"><b><?php echo  "$".$mostrando['precio'];?></td><td><br>Marca:  <?php echo  $mostrando['fabricante'];?></td></tr>
                                                                </table>
                                                            </td>
                                                            <td width="15%"><?php $mostrando= mysql_fetch_array($mostrar); ?></td>
                                                        </tr>
                                                    </table>
						
					</div>
					<div class="item">
						<!--<img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg">-->
						
							<table width="100%" border="0">
                                                        <tr>
                                                            <td width="15%"></td>
                                                            <td width="35%"><img width="100%" height="auto" src="imagenes/<?php echo $mostrando['imagen'];?>"></td>
                                                            <td>
                                                                <table border="0">
                                                                    <tr><td width="50%" colspan="2"><?php echo  $mostrando['nombre'];?></td></tr>
                                                                    <tr><td><br><font color="red"><b><?php echo  "$".$mostrando['precio'];?></td><td><br>Marca:  <?php echo  $mostrando['fabricante'];?></td></tr>
                                                                </table>
                                                            </td>
                                                            <td width="15%"></td>
                                                        </tr>
                                                    </table>
						
					</div>
				</div> <a class="left carousel-control" href="#carousel-699095" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-699095" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			<!--<div class="jumbotron">
				<h2>
					Hello, world!
				</h2>
				<p>
					This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div> -->
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <?php mysql_close($cerrar); ?>
  </body>
</html>