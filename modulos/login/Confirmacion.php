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
                                <h5>Tu cuenta de confirmacion</h5>
                                <h6></h6>
                            </div>
                            <div class="form-bottom">
                             <form role="form" class="login-form" id="commentForm">
                                 
                                  <div class="form-group">
                                        <h6>Introduce tu Clave de Confirmacion :</h6>
                                        <label class="sr-only" for="form-correo">Introdusca tu correo:</label>
                                        <input type="text" name="correo" placeholder="Ejemplo 1234" class="form-correo form-control" id="id_clave" maxlength="10">
                                    </div>   
                                <div class="form-group">
                                        <h6>Introduce tu cuneta :</h6>
                                        <label class="sr-only" for="form-correo">Introdusca tu correo:</label>
                                        <input type="text" name="correo" placeholder="Ejemplo@correo.com " class="form-correo form-control" id="id_correoss" maxlength="30">
                                </div> 
                                  <button type="button" class="btn" id="btnconfirmar">Guardar</button>
                                <br>
                             </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>  
      <script src="Confirmacion.js"></script>
    </body>
</html>