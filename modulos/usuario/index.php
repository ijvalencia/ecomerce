<!DOCTYPE html>
<html>
    <head>
        <?php include '../../bin/head.php' ?>
    </head>
    <body>
        <?php include '../../bin/navbar.php' ?>
     <!--  <div class="loader"></div>-->
        <div class="container">
            <div class="account-container row">
                <br>
                <div class="col-sm-1 middle-border"></div>
                <div class="col-md-8">     
                        <!-- Form actualizacion -->
                        <form id="form-actualizar"> 
                            <div class="col-md-12">
                                <label for="ejemplo_email_3" class="col-lg-2">Nombre:</label>
                                <div class="col-xs-5">
                                    <input class="form-control" type="text" placeholder="Ejemplo: Juan " id="txtnombre" name="txtnombres">
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-12">
                                <label for="ejemplo_email_3" class="col-lg-2 control-label">Apellidos:</label>
                                <div class="col-xs-5">
                                    <!--<label class="form-label required" id="apellidos">Apellidos</label>-->
                                    <input class="form-control" placeholder="Ejemplo: Perez" type="text" id="txtapellido" name="txtapellidos">
                                </div>
                            </div>
                            <br> <br>
                            <div class="col-md-12">     
                               <div class="row">   
                                 <label class="form-label" id="fechass" >Fecha de<br>nacimiento:</label>
                                      <div class="col-xs-5">
                                       <div class="form-group">
                                           <select class="selectpicker form-control tamaño" id="fechadia" name="cmbfechas">
                                            <option value="">Selecionar..</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>        
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>        
                                           </select>
                                    </div>
                                    
                                       <div class="form-group">
                                           <select class="selectpicker form-control tamaño" id="fechames" name="cbxmes">
                                            <option value="">Selecionar..</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>        
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>        
                                          </select>
                                        </div>
                                     
                                        <div class="form-group">
                                            <select  class="selectpicker form-control tamaño" id="fechaanio" name="cmbxanio">
                                            <option value="">Selecionar..</option>
                                            <option value="1">1989</option>
                                            <option value="2">1990</option>
                                            <option value="3">1991</option>        
                                            <option value="4">1992</option>
                                            <option value="5">1993</option>
                                            <option value="6">1994</option>  
                                        </select>
                                    </div>
                                </div>
                            </div>
                         </div>
                            
                         <div class="col-md-12">
                            <div class="row">
                                   <label  class="col-lg-2 control-label" id="sexo">Sexo:</label>
                                   <label class="required">Femenino <input id="check-sexo" name="sexo" value="Feminino"  type="radio" checked=""></label>&nbsp;&nbsp;        
                                   <label class="required">Masculino<input id="check-sexo" name="sexo" value="Masculino" type="radio">&nbsp;&nbsp;</label>  
                            </div>
                        </div>
                            
                        <div class="col-md-12">
                            <div class="row">
                                     <label  class="col-lg-2 control-label" id="sexo">Email:</label>
                                    <div class="col-xs-5">
                                        <input  class="form-control" placeholder="ejemplo@correo.com" type="email" id="txtemail" name="txtemail">
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-12">
                              <div class="row">
                                     <label  class="col-lg-2 control-label" id="sexo">Contraseña:</label>
                                    <div class="col-xs-5">
                                        <input class="form-control" placeholder="Cambiar Contraseña" type="password" id="txtpassw">
                                    </div>
                              </div>    
                                <button type="button" class="btn" id="btnguardar">Guardar</button>
                            <br><br>
                        </div>
                     </form>
                </div>
            </div>
        </div>
     <script src="usuarios.js"></script>
       <!--<script src="../../Js/jqueryValidate/dist/jquery.validate.min.js"></script>
        <script src="../../Js/jqueryValidate/validaciones.js"></script>
        <script src="../../Js/jqueryValidate/mensajesv&v.js"></script>
       <!--<script src="../../Js/Libreria_js/Principal.js"></script>-->
    </body>
</html>