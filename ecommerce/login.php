<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <?php include 'head.php';?>   
    <script>
        function validacion() {
            var pass1 = document.getElementById("form-contra").value;
            var pass2 = document.getElementById("form-confirmacion").value;
            var ok = true;
            if (pass1 != pass2) {
                alert("Passwords Do not match");
                document.getElementById("pass1").style.borderColor = "#E34234";
                document.getElementById("pass2").style.borderColor = "#E34234";
                ok = false;
            }
            return ok;
        }
    </script>
    <body>
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <!--<a class="navbar-brand" href="#"><img src="IMG/.jpg"></a>-->
                </div>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a  href="#"><img src="imgweb/menu.png" width="30px" height="30px"></a></li>
                        <li><a  href="#"><img src="imgweb/logo.png" width="40px" height="35px"></a></li>
                     <!--   <li><a  href="#"><img src="IMG/.jpg"></a></li>-->
                    </ul>
                    
                    <form class="form-search" id="s" action="/">
                        <div class="input-append">
                           <!--input type="hidden"-->
                           <div class="input-group" style="position: relative; display:block; border-collapse: separate; margin-left: -280px;">
                               
                             <script type="text/javascript">
                              $(".select2-multiple" ).select2({
                                    theme: "bootstrap",
                                    placeholder: "Select a State",
                                    maximumSelectionSize: 6,
                                    containerCssClass: ':all:'});    
                             </script>

                                   <div class="form-group">
                                       <input id="multiple" class="form-control select2-multiple" multiple>
                                           <!--<optgroup label="Alaskan/Hawaiian Time Zone">
                                               <option value="AK">Alaska</option>
                                               <option value="HI" disabled="disabled">Hawaii</option>
                                           </optgroup>
                                           <optgroup label="Pacific Time Zone">
                                               <option value="CA">California</option>
                                               <option value="NV">Nevada</option>
                                               <option value="OR">Oregon</option>
                                               <option value="WA">Washington</option>
                                           </optgroup>
                                           <option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
                                           <option value="TPZ">The Panic Zone</option>
                                           <option value="TTZ">The Twilight Zone</option>
                                       </select>-->
                                   </div>
                                   <span class="input-group-btn">
                                       <button class="btn btn-default" type="button" data-select2-open="multi-append" id="bntid">
                                           <span class="glyphicon glyphicon-search"></span>
                                       </button>
                                   </span>
                               </div>
                           </div>      
                    </form>     
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="pocition" href=""><img src="imgweb/camion.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href="login.php"><img src="imgweb/login.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href="cart.php"><img src="imgweb/carrito.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                    </ul>
                </div>
            <!--</div>-->
        </nav>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                        <div class="col-sm-5">
                        	<!-- Form de login -->
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<h3>INICIAR SESIÓN</h3>
	                            	<p>Ingresa tu correo y contraseña para identificarte</p>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="ingresar.php" method="GET" class="login-form">
				                    	<div class="form-group">
                                            <h5>Correo:</h5>
				                    		<label class="sr-only" for="form-correo">Correo:</label>
				                        	<input type="text" name="correo" placeholder="Ejemplo: mi_correo@gmail.com" class="form-correo form-control" id="form-mail">
				                        </div>
				                        <div class="form-group">
                                            <h5>Contraseña:</h5>
				                        	<label class="sr-only" for="form-password">Contraseña:</label>
				                        	<input type="password" name="contra" class="form-password form-control" id="form-password">
				                        </div>
                                        <div class="col-sm-12">
                                            <input style="width: 26px" type="checkbox" name="check-terminos" class="col-sm-12" checked="checked" id="check-terminos"/>
                                            <div class="form-group">
                                                <label for="check-terminos" class="form-label">
                                                    Recordarme
                                                </label>
                                            </div>
                                        </div>
				                        <button type="submit" class="btn">Entrar</button>
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
	                               <h3>REGISTRARSE</h3>
	                               <p>Ingresa tus datos para empezar a comprar</p>
	                            </div>
	                            <div class="form-bottom">
				                    <form action="registrarUsuario.php" onsubmit="return validacion()" method="post" class="registration-form">
				                    	<h5>Nombre:</h5>
                                        <div class="form-group">
				                    		<label class="sr-only" for="form-nombre">Nombre</label>
				                        	<input type="text" name="nombre" placeholder="Ejemplo: Armando" class="form-nombre form-control" id="form-nombre">
				                        </div>
				                        <h5>Apellidos:</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-apellidos">Apellidos</label>
				                        	<input type="text" name="apellidos" placeholder="Ejemplo: López González" class="form-apellidos form-control" id="form-apellidos">
				                        </div>
				                        <h5>Correo:</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-correo">Correo</label>
				                        	<input type="text" name="correo" placeholder="Ej: mi_correo@gmail.com" class="form-correo form-control" id="form-correo">
				                        </div>
                                        <h5>Contraseña:</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-contra">Contraseña</label>
				                        	<input type="password" name="contra" class="form-contra form-control" id="form-contra">
				                        </div>
                                        <h5>Confirmar la contraseña</h5>
                                        <div class="form-group">
				                        	<label class="sr-only" for="confirmacion">Confirma tu contraseña:</label>
				                        	<input type="password" name="confirmacion" class="form-confirmacion form-control" id="form-confirmacion">
				                        </div>
                                        <div class="col-sm-12">
                                            <input style="width: 26px" type="checkbox" name="check-terminos" required="required" class="col-sm-12" checked="checked" id="check-terminos"/>
                                            <div class="form-group">
                                                <label for="check-terminos" class="form-label">
                                                    Acepto los <a href="/pagina/terminos/condiciones">Términos y condiciones</a>
                                                </label>
                                            </div>
                                        </div>
				                        <button type="submit" class="btn" id="btn-enviar">Comenzar a comprar!</button>
                                        
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include 'footer.php';?>
        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>