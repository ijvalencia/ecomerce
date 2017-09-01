<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                                                        <a href="RecuperarContrasena.php"></a>
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
                                    <button type="button" class="btn" id="btn-enviar" data-toggle="modal" data-target="#largeModal" data-backdrop="static" data-keyboard="false">Guardar</button>
                                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Continuar con el registro</h4>
                                                </div>

                                                <div class="modal-body">
                                                    <!--<h3>Continuar con el registro</h3>-->

                                                    <label>Nombre :<input type="text" name="txtnombre" class="form-control" id="txtnombred"></label>
                                                    <label>Apellido :<input type="text" name="txtapellido" class="form-control" id="txtapellidod"></label>
                                                    <label>Telefono :<input type="text" name="txttelefono" class="form-control" id="txttelefonod"></label><br>
                                                    <label>Telefono 2 :<input type="text" name="txttelefono2" class="form-control" id="txttelefono2d" value="0"></label><br>
                                                    <label>Calle :<input type="text" name="txtcalle" class="form-control" id="txtcalled"></label><br>
                                                    <label>Exterior :<input type="text" name="txtexterior" class="form-control" id="txtexteriord"></label><br>
                                                    <label>Interior :<input type="text" name="txtinterior" class="form-control" id="txtinteriord" value="0"></label><br>
                                                    <label>CP :<input type="text" name="txtcp" class="form-control" id="txtcpd"></label><br><br><br><br>
                                                   
                                                    <label>Estados :<select class="form-control" id="selectestadosd"  accept-charset="utf-8">

                                                    </select></label>
                                                    <label>Ciudad :<input type="text" name="txtciudad" class="form-control" id="txtciudadd"></label>
                                                    <label>Colonia :<input type="text" name="txtcolonia" class="form-control" id="txtcolonia"></label>
                                                    <label>Cruseros :<input type="text" name="txtcrusero" class="form-control" id="txtcruserod"></label>
                                                    <label>Cruseros 2 :<input type="text" name="txtcrusero2" class="form-control" id="txtcruserod2"></label><br>
                                                    <label>Referencia :<input type="text" name="txtreferencia" class="form-control" id="txtreferncia" value="0"></label><br>
                                                    <label>Datos Adicionales :<input type="checkbox" name="checkbox" class="form-control" id="RAcheckbox"></label>
                                                    
                                                </div>

                                                <br><br><br><br><br><br><br>
                                                  <div class="modal-footer">
                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                                    <button type="button" class="btn btn-primary" id="btn-direccion" data-dismiss="modal">Guardar</button>
                                                  </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>          	
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <script src="../../modulos/login/Login.js" charset="utf-8"></script>
     <!--<script> $("#commentForm").validate();</script>-->
    </body>
</html>
