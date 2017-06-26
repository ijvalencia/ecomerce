<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicia sesion o registrate en </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Icono de la barra de pestañas -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<h3>INICIAR SESIÓN</h3>
	                            	<p>Ingresa tu correo y contraseña para identificarte</p>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="PHP/ingresar.php" method="post" class="login-form">
				                    	<div class="form-group">
                                            <h5>Correo:</h5>
				                    		<label class="sr-only" for="form-correo">Correo:</label>
				                        	<input type="text" name="correo" placeholder="Ejemplo: mi_correo@gmail.com" class="form-correo form-control" id="form-correo">
				                        </div>
				                        <div class="form-group">
                                            <h5>Contraseña:</h5>
				                        	<label class="sr-only" for="form-password">Contraseña:</label>
				                        	<input type="password" name="contra" class="form-password form-control" id="form-password">
				                        </div>
                                        <div class="col-sm-12">
                                            <input style="width: 26px" type="checkbox" name="check-terminos" required="required" class="col-sm-12" checked="checked" id="check-terminos"/>
                                            <div class="form-group">
                                                <label for="check-terminos" class="form-label">
                                                    Recordarme
                                                </label>
                                            </div>
                                        </div>
				                        <button type="submit" class="btn" style="background: #ffae4b;">Entrar</button>
				                    </form>
			                    </div>
		                    </div>
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
                        
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                               <h3>REGISTRARSE</h3>
	                               <p>Ingresa tus datos para empezar a comprar</p>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="registration-form">
				                    	<h5>Nombre:</h5>
                                        <div class="form-group">
				                    		<label class="sr-only" for="form-nombre">Nombre</label>
				                        	<input type="text" name="form-nombre" placeholder="Ejemplo: Armando" class="form-nombre form-control" id="form-nombre">
				                        </div>
				                        <h5>Apellidos:</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-apellidos">Apellidos</label>
				                        	<input type="text" name="form-apellidos" placeholder="Ejemplo: López González" class="form-apellidos form-control" id="form-apellidos">
				                        </div>
				                        <h5>Correo:</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-correo">Correo</label>
				                        	<input type="text" name="form-correo" placeholder="Ej: mi_correo@gmail.com" class="form-correo form-control" id="form-correo">
				                        </div>
                                        <h5>Contraseña:</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-contra">Contraseña</label>
				                        	<input type="password" name="form-contra" class="form-contra form-control" id="form-contra">
				                        </div>
                                        <h5>Confirmar la contraseña</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-confirmacion">Confirma tu contraseña:</label>
				                        	<input type="password" name="form-confirmacion" class="form-confirmacion form-control" id="form-confirmacion">
				                        </div>
                                        <div class="col-sm-12">
                                            <input style="width: 26px" type="checkbox" name="check-terminos" required="required" class="col-sm-12" checked="checked" id="check-terminos"/>
                                            <div class="form-group">
                                                <label for="check-terminos" class="form-label">
                                                    Acepto los <a href="/pagina/terminos/condiciones">Términos y condiciones</a>
                                                </label>
                                            </div>
                                        </div>
				                        <button type="submit" class="btn" style="background: #ffae4b;">Comenzar a comprar!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
                        <p>© 2017 México.   Todos los derechos reservados.    Precios son expresados en moneda nacional (MXN).</p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>