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
                                    <input class="form-control" type="text" placeholder="Ejemplo: Juan " id="txtnombre" name="txtnombres"maxlength="30">
                                </div>
                            </div>
                            <br><br>
                            <div class="col-md-12">
                                <label for="ejemplo_email_3" class="col-lg-2 control-label">Apellidos:</label>
                                <div class="col-xs-5">
                                    <!--<label class="form-label required" id="apellidos">Apellidos</label>-->
                                    <input class="form-control" placeholder="Ejemplo: Perez" type="text" id="txtapellido" name="txtapellidos" maxlength="30">
                                </div>
                            </div>
                            <br> <br>
                            <div class="col-md-12">     
                               <div class="row">   
                                 <label class="form-label" id="fechass" >Fecha de<br>nacimiento:</label>
                                      <div class="col-xs-5">
                                       <div class="form-group">
                                           <select class="selectpicker form-control tamaño" id="fechadia" name="cmbfechas">
                                            <option value="0">Selecionar..</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>        
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>        
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>        
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>        
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>        
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>        
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>        
                                            <option value="29">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                           </select>
                                    </div>
                                    
                                       <div class="form-group">
                                           <select class="selectpicker form-control tamaño" id="fechames" name="cbxmes">
                                            <option value="0">Selecionar..</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>        
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>        
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>        
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>        
                                            
                                          </select>
                                        </div>
                                     
                                        <div class="form-group">
                                            <select  class="selectpicker form-control tamaño" id="fechaanio" name="cmbxanio">
                                            <option value="0">Selecionar..</option>
                                            <option value="1">1950</option>
                                            <option value="2">1951</option>
                                            <option value="3">1952</option>        
                                            <option value="4">1953</option>
                                            <option value="5">1954</option>
                                            <option value="6">1955</option>  
                                            <option value="7">1956</option>
                                            <option value="8">1957</option>
                                            <option value="9">1958</option>        
                                            <option value="10">1959</option>
                                            <option value="11">1960</option>
                                            <option value="12">1961</option>
                                            <option value="13">1962</option>        
                                            <option value="14">1963</option>
                                            <option value="15">1964</option>
                                            <option value="16">1965</option>  
                                            <option value="17">1966</option>
                                            <option value="18">1967</option>
                                            <option value="19">1968</option>        
                                            <option value="20">1970</option>
                                            <option value="21">1971</option>
                                            <option value="22">1972</option>
                                            <option value="23">1973</option>        
                                            <option value="24">1974</option>
                                            <option value="25">1975</option>
                                            <option value="26">1976</option>  
                                            <option value="27">1977</option>
                                            <option value="28">1978</option>
                                            <option value="29">1979</option>        
                                            <option value="30">1980</option>
                                            <option value="31">1981</option>
                                            <option value="32">1982</option>        
                                            <option value="33">1983</option>
                                            <option value="34">1984</option>
                                            <option value="35">1985</option>  
                                            <option value="36">1986</option>
                                            <option value="37">1987</option>
                                            <option value="38">1988</option>        
                                            <option value="39">1989</option>
                                            <option value="40">1990</option>
                                            <option value="41">1991</option>
                                            <option value="42">1992</option>
                                            <option value="43">1993</option>        
                                            <option value="44">1994</option>
                                            <option value="45">1995</option>
                                            <option value="46">1996</option>  
                                            <option value="47">1997</option>
                                            <option value="48">1998</option>
                                            <option value="49">1999</option>        
                                            <option value="50">2000</option>
                                            <option value="51">2001</option>
                                            <option value="52">2002</option>        
                                            <option value="53">2003</option>
                                            <option value="54">2004</option>
                                            <option value="55">2005</option>  
                                            <option value="56">2006</option>
                                            <option value="57">2007</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                         </div>
                            
                            
                        <div class="col-md-12">
                            <div class="row">
                                     <label  class="col-lg-2 control-label" id="sexo">Email:</label>
                                    <div class="col-xs-5">
                                        <input  class="form-control" placeholder="ejemplo@correo.com" type="email" id="txtemail" name="txtemail" maxlength="30">
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-12">
                              <div class="row">
                                     <label  class="col-lg-2 control-label" id="sexo">Contraseña:</label>
                                    <div class="col-xs-5">
                                        <input class="form-control" placeholder="Cambiar Contraseña" type="password" id="txtpassw" maxlength="30">
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