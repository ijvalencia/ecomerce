<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<?php include '../../bin/head.php';?>
	</head>
	<body>
		<?php include'../../bin/navbar.php';?>        
		<div class="line-navbar-left">
			<p class="lnl-nav-title">Categories</p>
			<ul class="lnl-nav">
				<!-- The list will be automatically cloned from mega menu via jQuery -->
			</ul>
		</div>    
		<!-- Top content -->
		<div class="top-content"> 	
			<div class="inner-bg">
				<div class="container">              
					<div class="col-sm-5">
						<!-- Form de login -->
						<div class="form-box">
							<div class="form-top">
								<h5>INICIAR SESIÓN</h5>
								<h6>Ingresa tu correo y contraseña para identificarte</h6>
							</div>
							<div class="form-bottom">
								<form role="form" class="login-form" id="commentForm">
									<div class="form-group">
										<h6>Correo:</h6>
										<label class="sr-only" for="form-correo">Correo:</label>
										<input type="text" name="correo" placeholder="Ejemplo: mi_correo@gmail.com" class="form-correo form-control" id="form-mail">
									</div>
									<div class="form-group">
										<h6>Contraseña:</h6>
										<label class="sr-only" for="form-password">Contraseña:</label>
										<input type="password" name="contra" class="form-password form-control" id="form-pass">
									</div>
									<div class="col-sm-12">
										<input style="width: 26px" type="checkbox" name="check-terminos" class="col-sm-12" id="check-login"/>
										<div class="form-group">
											<label for="check-terminos" class="form-label">
												Recordarme
											</label>
										</div>
									</div>
									<button type="button" class="btn" id="botonsesion">Iniciar Sesión</button>
								</form>
							</div>
						</div>
						<!-- Form login con facebook/google -->
						<div class="social-login">
							<div class="social-login-buttons">
								<a class="btn btn-link-1 btn-link-1-facebook" href="#">
									<i class="fa fa-facebook"></i> Facebook
								</a>
								<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
									<i class="fa fa-google-plus"></i> Google
								</a>
							</div>
						</div>            
					</div>
					
					<div class="col-sm-1 middle-border"></div>
					<div class="col-sm-1"></div>
					<!-- Form registro -->
					<div class="col-sm-5">
						<div class="form-box">
							<div class="form-top">
								<h5>REGISTRARSE</h5>
								
								<h6>Ingresa tus datos para empezar a comprar</h6>
							</div>
							<div class="form-bottom">
								<form  onsubmit="return validacion()" method="post" class="registration-form">
									<h6>Nombre:</h6>
									<div class="form-group">
										<label class="sr-only" for="form-nombre">Nombre</label>
										<input type="text" name="nombre" placeholder="Ejemplo: Armando" class="form-nombre form-control" id="form-nombre">
									</div>
									<h6>Apellidos:</h6>
									<div class="form-group">
										<label class="sr-only" for="form-apellidos">Apellidos</label>
										<input type="text" name="apellidos" placeholder="Ejemplo: López González" class="form-apellidos form-control" id="form-apellidos">
									</div>
									<h6>Correo:</h6>
									<div class="form-group">
										<label class="sr-only" for="form-correo">Correo</label>
										<input type="text" name="correo" placeholder="Ej: mi_correo@gmail.com" class="form-correo form-control" id="form-correo">
									</div>
									<h6>Contraseña:</h6>
									<div class="form-group">
										<label class="sr-only" for="form-contra">Contraseña</label>
										<input type="password" name="contra" class="form-contra form-control" id="form-contra">
									</div>
									<h6>Confirmar la contraseña</h6>
									<div class="form-group">
										<label class="sr-only" for="confirmacion">Confirma tu contraseña:</label>
										<input type="password" name="confirmacion" class="form-confirmacion form-control" id="form-confirmacion">
									</div>
									<div class="col-sm-12">
										<input style="width: 26px" type="checkbox"  class="col-sm-12" id="check-terminos"/>
										<div class="form-group">
											<label for="check-terminos" class="form-label">
												Acepto los <a href="/pagina/terminos/condiciones">Términos y condiciones</a>
											</label>
										</div>
									</div>
									<button type="button" class="btn" id="btn-enviar">Guardar</button>      
								</form>
							</div>
						</div>          	
					</div>
				</div>
			</div>
		</div>
		<script src="Login.js"></script> 
		<?php //include '../../bin/footer.php';?>
		<!--<script> $("#commentForm").validate();</script>-->
	</body>
</html>