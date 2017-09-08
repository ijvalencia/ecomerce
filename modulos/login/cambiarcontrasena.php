<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../../bin/head.php';?>       
        <?php include '../../bin/navbar.php';?>       
    </head>
    <body>
        <div class="top-content"> 	
            <div class="inner-bg">
                <div class="container">              
                    <div class="col-sm-5" id="panels">
                        <!-- Form de login -->
                        <div class="form-box">
                            <div class="form-top">
                                <h5>Cambiar contraseña</h5>
                                <h6></h6>
                            </div>
                            <div class="form-bottom">
                             <form role="form" class="login-form" id="commentForm">
                                  <div class="form-group">
                                        <h6>Introduce tu cuenta:</h6>
                                        <label class="sr-only" for="form-correo">Introdusca tu correo:</label>
                                        <input type="text" name="correo" placeholder="Ejemplo@correo.com " class="form-correo form-control" id="id_emailssss" maxlength="30">
                                    </div>
                               
                                    <div class="form-group">
                                         <h6>Introduce tu Clave</h6>
                                       <label class="sr-only" for="form-password">Introduce tu clave :</label>
                                       <input type="text" name="contra" class="form-password form-control" placeholder="1234" id="id_tuclave" maxlength="4">
                                    </div>
                                 
                                    <div class="form-group">
                                         <h6>Introduce tu nueva Contraseña</h6>
                                        <label class="sr-only" for="form-password">Nueva Contraseña:</label>
                                        <input type="password" name="contra" class="form-password form-control" placeholder="Nueva : c0l3r@" id="id_nuevapass" maxlength="40">
                                    </div>
                            
                                    <div class="form-group">
                                         <h6>Confirma tu Contraseña</h6>
                                        <label class="sr-only" for="form-password">Confirmar Contraseña:</label>
                                        <input type="password" name="contra" class="form-password form-control" placeholder="Nueva : c0l3r@" id="id_confiramciones" maxlength="40">
                                    </div>
                                 
                                  <button type="button" class="btn" id="btncambiar">Guardar</button>
                                 <div id="pswd_info1">
                                            <h4>La contraseña debería cumplir con los siguientes requerimientos:</h4>
                                            <ul>
                                                <li id="letter">Al menos debería tener<strong>una letra</strong></li>
                                                <li id="capital">Al menos debería tener<strong>una letra en mayúsculas</strong></li>
                                                <li id="number">Al menos debería tener<strong>un número</strong></li>
                                                <li id="length">Debería tener <strong>8 carácteres</strong> como mínimo</li>
                                            </ul>
                                      </div>
                                <br>
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
         <script src="cambiocontrasena.js"></script>
    </body>
</html>
