
<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8">
		<?php
			include '../../bin/head.php';
			include '../../bin/navbar.php';
			if(!(isset($_GET['extra'])))
				header('Location: '.$_SERVER["REQUEST_URI"]. "&extra=1");
		?> 
	</head>
	<body>
		<div class="container-fluid">
				<ol class="breadcrumb">
						<li><a href="../../modulos/inicio/index.php">Inicio</a></li>
						<li>Carrito</li>
				</ol>
				<div class="col-sm-2 sidenav">
					
					<nav class="navbar navbar-default sidebar" role="navigation" style="position:fixed">
						<!-- bin/jquery.slider.min.css -->
                                                                                                                                                                                                                        <link rel="stylesheet" href="css/jslider.css" type="text/css">
                                                                                                                                                                                                                        <link rel="stylesheet" href="css/jslider.blue.css" type="text/css">
                                                                                                                                                                                                                        <link rel="stylesheet" href="css/jslider.plastic.css" type="text/css">
                                                                                                                                                                                                                        <link rel="stylesheet" href="css/jslider.round.css" type="text/css">
                                                                                                                                                                                                                        <link rel="stylesheet" href="css/jslider.round.plastic.css" type="text/css">
                                                                                                                                                                                                                  <!-- end -->

                                                                                                                                                                                                                        <script type="text/javascript" src="js/jquery-1.7.1.js"></script>

                                                                                                                                                                                                                        <!-- bin/jquery.slider.min.js -->
                                                                                                                                                                                                                        <script type="text/javascript" src="js/jshashtable-2.1_src.js"></script>
                                                                                                                                                                                                                        <script type="text/javascript" src="js/jquery.numberformatter-1.2.3.js"></script>
                                                                                                                                                                                                                        <script type="text/javascript" src="js/tmpl.js"></script>
                                                                                                                                                                                                                        <script type="text/javascript" src="js/jquery.dependClass-0.1.js"></script>
                                                                                                                                                                                                                        <script type="text/javascript" src="js/draggable-0.1.js"></script>
                                                                                                                                                                                                                        <script type="text/javascript" src="js/jquery.slider.js"></script>
                                                                                                                                                                                                                  <!-- end -->

                                                                                                                                                                                                                        <style type="text/css" media="screen">
                                                                                                                                                                                                                          body { background: #EEF0F7; }
                                                                                                                                                                                                                         .layout { padding: 50px; font-family: Georgia, serif; }
                                                                                                                                                                                                                         .layout-slider { margin-bottom: 60px; width: 100%; }
                                                                                                                                                                                                                         .layout-slider-settings { font-size: 12px; padding-bottom: 10px; }
                                                                                                                                                                                                                         .layout-slider-settings pre { font-family: Courier; }
                                                                                                                                                                                                                        </style>
                                            <form action="filtramela.php?subcategoria=<?php echo $_GET['subcategoria'];?>" method="post">                                                                                                                                                            
                                                Filtros de <a id="AquiGrupo"  type="text" name="grupo"></a>
                                                <select id="marquitas" type="text" name="marcas">
                                                    <option value="totaliti">Todas las marcas</option> 
                                            </select><br>
                                            Envio:
                                            <select type="text" name="envio">
                                                    <option value="Indiferente">Indiferente</option> 
                                                    <option value="Local">Local</option> 
                                                    <option value="Foraneo">Foraneo</option>
                                                    </select>
                                            Rango de precio:                                                                                                                                                            
                                            <div class="layout-slider" style="width: 100%">
                                                <span style="display: inline-block; width: 200px; padding: 0 5px;"><input id="Slider1" type="slider" name="price" value="0.5;250000" /></span>
                                            </div>
                                            <input type="submit" name="submit" value="¡Filtrar!" />
                                            </form>  
                                        </nav>
                                    <script type="text/javascript" charset="utf-8">
                                                jQuery("#Slider1").slider({ from: 0, to: 250000, step: 500, smooth: true, round: 0, dimension: "&nbsp;$", skin: "plastic" });
                                              </script>
					
				</div>
			<div class="col-md-8" >
					<script type="text/javascript" src="producto.js"></script>
						<ttbody>
							<!--<aqui carga esta wea>-->
						</ttbody>
				<script src="Js/select2/anchor.min.js"></script>
<!--				<script src="Js/Libreria_js/Principal.js"></script>-->
			</div>
		</div>
					<a id="catidad"></a>
	</body>
</html>
		