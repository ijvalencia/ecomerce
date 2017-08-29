<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <?php include '../../bin/head.php'; ?>   
    <body>
        <script>var num;</script>
        <?php include'../../bin/navbar.php'; ?>        
        <!--<div class="line-navbar-left">
          <p class="lnl-nav-title">Categories</p>
          <ul class="lnl-nav">
          </ul>
        </div>-->   
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
                                    <button type="button" class="btn" id="botonsesion">Iniciar Sesiòn</button>
                                    <br>
                                    <div class="container" >
                                        <!-- Trigger the modal with a button -->
                                        <!--<button type="button" class="btn btn-info btn-lg" >Open Modal</button>-->
                                        <a href="#" class="contrasena" id="link" style="float:left;" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Olvidaste tu contraseña?</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Restableser Contraseña</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label>correo :<input type="text" name="txtemail" id="txtemaill" pattern="Correo@gmail.com" class="form-control" style="margin-left: 73px; margin-top: -31px;"></label>
                                                        <a href="RecuperarContrasena.php">Recuperar Mi Contraseña</a>
                                                        <br>                                       
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal" id="enviar">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
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
                                        <input type="password" name="confirmacion" class="form-confirmacion form-control" id="form-confirmacion"><br>
                                        <div class="g-recaptcha" data-sitekey="6Ld_1i0UAAAAAICeMTzxRahb9jFR8HA5IHAE5wmc" id="norobot"></div>
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
        <!-- Footer -->
        <script src="../../modulos/login/Login.js"></script> 

     <!--<script> $("#commentForm").validate();</script>-->
    </body>
</html>
