<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../../bin/head.php';?>   
        
    </head>
    <body>
        
        <div class="top-content"> 	
            <div class="inner-bg">
                <div class="container">              
                    <div class="col-sm-5" id="panels">
                        <!-- Form de login -->
                        <div class="form-box">
                            <div class="form-top">
                                <h5>CAMBIAR CONTRASEÑA</h5>
                                <h6></h6>
                            </div>
                            <div class="form-bottom">
                             <form role="form" class="login-form" id="commentForm">
                                    <div class="form-group">
                                        <h6>Contraseña Actual</h6>
                                        <label class="sr-only" for="form-correo">Contraseña Actual</label>
                                        <input type="password" name="correo" placeholder="Ejemplo : B@rB@C0@" class="form-correo form-control" id="id_antiguapass">
                                    </div>
                                    <div class="form-group">
                                         <h6>Contraseña Nueva Contraseña</h6>
                                        <label class="sr-only" for="form-password">Nueva Contraseña:</label>
                                        <input type="password" name="contra" class="form-password form-control" placeholder="Nueva : c0l3r@" id="id_nuevapass">
                                    </div>
                                  <button type="button" class="btn" id="btncambiar">Guardar</button>
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
