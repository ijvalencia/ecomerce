<!DOCTYPE html>
<html>
	<head>
		<?php include '../../bin/head.php'?>
	</head>
	<body>
		<?php 
			$codigo = $_GET['producto'];
			$categoria = $_GET['categoria'];
			echo '<span class="hidden" id="producto" value="'.$codigo.'"></span>';
			echo '<span class="hidden" id="categoria" value="'.$categoria.'"></span>';
		?>
		<?php include '../../bin/navbar.php'?>
		
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="http://localhost/Ecommerce/modulos/inicio/index.php">Inicio</a></li>
				<li><a href="link-productos"></a>Productos</li>
				<li><a href="link-marcas"></a><span id="nombre_marca"></span></li>
				<li><span id="nombre_producto"></span></li>
			</ol>
		</div>
		<!-- Imagen -->
		<div class="col-md-6">
			<img id="img_producto">
			<!-- The Modal -->
			<div id="modalZoom" class="modal">
				<span class="close">&times;</span>
				<img class="modal-content" id="img_modal">
			</div>
		</div>
		<!-- Datos y compra -->
		<div class="col-md-6">
			<div class="col-md-6">
				<div class="product-price">
					<div class="product-price-container option-container">
						<span id="descripcion_producto"></span>
						<br>
						<a>$<span id="precio_producto"></span></a>
						<br>
						Disponibles: <a id="cant_disponibles"></a>
						<br><br>
					</div>
					<a id="btn_comprar" class="btn btn-lg">Comprar Ahora</a>
				</div>
				<br>
				<a id="numero_comprar" href="link_contacto">Compra telefónica: 01-800 CVA</a>
			</div>
		</div>
		<!-- Descripcion y detalles -->
		<div class="row">
			<div class="col-md-6 col-lg-8">
				<h2>Detalle del Producto</h2>
				<span id="descripcion_producto2"></span>
			</div>
			<div class="col-md-6 col-lg-4">
				<h2>Características</h2>
				<table class="table">
					<tbody>
						<tr>
							<td>Codigo del fabricante</td>
							<td id="codigo_fabricante"></td>
						</tr>
						<tr>
							<td>Garantia</td>
							<td id="tiempo_garantia"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>