<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php 
		include '../../bin/head.php';
		include '../../bin/navbar.php';
		echo '<span class="hidden" id="supercategoria" value="'.$_GET['categoria'].'"></span>';
		?>
	</head>
	<body>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="../../modulos/inicio/index.php">Inicio</a></li>
				<li id="bread_categoria">Categoria</li>
			</ol>
		</div>
		<!-- Recomendaciones de busqueda -->
		<br><br><br><br>
		<div class="container">
			<div class="container" id="centrados">    
				<div class="row">
					<div class="col-md-7" id="recuadro_subcat">
						<p class="titulo">Categorias relacionadas</p>
					</div>
					<div class="col-md-4">
						<p class="titulo">COMPRAS 100% SEGURAS</p>
						<img src="../../IMG/escudo.jpg" class="img-responsive" style="width:20px; height:20px; "alt="Image">
						<ul>
							<li class="contList1">° Paga online o al recibir tu producto</li>
							<li class="contList2">° Envíos a todo México</li><br>
							<li class="contList3">° Devoluciones fáciles y sin costo</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php include '../../bin/footer.php'?>
		<script src="script.js"	></script>
	</body>
</html>
