<!DOCTYPE html>
<html>
	<head>
		<?php include '../../bin/head.php' ?>
	</head>
	<body>
		<?php include '../../bin/navbar.php' ?>
		<div class="container">
			<div class="account-container row">
				
				<ol class="breadcrumb">
					<li><a href="http://localhost/Ecommerce/modulos/inicio/index.php">Inicio</a></li>
					<li>Mi cuenta</li>
				</ol>
				<h1>Mis datos personales</h1>
				<!-- Menu -->
				<div class="col-md-3">
					<h4>Mi cuenta</h4>
					<ul>
						<li><a href="/account/profile-edit">Mis datos</a></li>
						<li><a href="/account/address-book">Mis direcciones</a></li>
						<li><a href="/account/reviews">Mis reseñas</a></li>
						<li><a href="/account/order/list">Mis pedidos</a></li>
					</ul>
				</div>
				<div class="col-sm-1 middle-border"></div>
				<div class="col-md-8">
					<div>
						<!-- Form actualizacion -->
						<form id="form-actualizar">
							<div class="col-md-6"><label class="form-label required">Nombre</label>
								<input id="actualizacion_nombre" required="required" class="form-control" type="text"></div>
							<div class="col-md-6"><label class="form-label required">Apellidos</label>
								<input id="actualizacion_apellido" required="required" class="form-control" type="text"></div>
							<div class="col-md-6">
								<label class="form-label">Fecha de nacimiento</label>
								<div> <!--Fecha nacimiento -->
									<div class="col-md-4">
										<select id="actualizacion_dia" class="form-control"></select>
									</div>
									<div class="col-md-4">
										<select id="actualizacion_mes" class="form-control"></select>
									</div>
									<div class="col-md-4">
										<select id="actualizacion_anio" class="form-control"></select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<label class="form-label">Sexo</label>
								<div class="row">
									<input id="check-sexo" value="f" type="radio">
									<label class="required">Femenino</label>
									<input id="check-sexo" value="m"  type="radio">
									<label class="required">Masculino</label>
								</div>
							</div>
							<div class="row"></div>
							<div>
								<div class="col-md-6"><label class="form-label required">Email</label>
									<input id="actualizar_correo" readonly="readonly" class="form-control" value="aqui_va_tu_correo@correo.com" type="email">
								</div>
								<div class="col-md-6">
									<a class="btn">Cambiar e-mail</a>
								</div>
							</div>
							<div class="row"></div>
							<div class="row">
								<div class="col-md-6">
									<label class="form-label">Contraseña actual</label>
									<input disabled="disabled" required="required" placeholder="**********" class="form-control" type="password">
								</div>
								<div class="col-md-6">
									<a class="btn">Cambia tu contraseña</a>
								</div>
							</div>
							<button type="submit" class="btn">Guardar Cambios</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>