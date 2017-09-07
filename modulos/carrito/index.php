<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Carrito</title>

        <?php include '../../bin/head.php'; ?>
        <?php include '../../bin/navbar.php'; ?>

    </head>
    <body>
        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="../../modulos/inicio/index.php">Inicio</a></li>
                            <li>Carrito</li>
                        </ol>
                        <!-- Agregar bara de navegacion -->      
                        <div class="row">
                            <div class="col-md-9">
                                <table id="cart" class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:60%" class="text-center">Producto</th>
                                            <th style="width:20%" class="text-center">Precio (MXN)</th>
                                            <th style="width:8%">Cantidad</th>
                                            <th style="width:12%"></th>
                                        </tr>
                                    </thead>
                                    <tbody> <!-- AQUI CARGAN LOS PRODUCTOS-->
                                    </tbody> <!-- AQUI TERMINAN DE CARGAR-->
                                </table>
                            </div>
                            <div class="col-md-3">
                                <form role="form">
                                    Detalles de tu pedido
                                    <ul style="padding: 0px"> 
                                        <li>
                                            <h3>Subtotal:
                                                $<a id="txt_subtotal"></a>
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Impuestos:
                                                $<a id="txt_iva"></a>
                                            </h3>
                                        </li>
                                        <li>
                                            <h3>Envío:</h3> 
                                            <select id="selector_envio"></select>
                                            <!-- Arega un Modal, reviar para futuras versiones-->
                                            <!--<input type="text" data-toggle="modal" data-target="#modalEnvios" readonly style="width:80px; height: 30px;">
                                            <div id="modalEnvios" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h3>Paqueterias</h3>
                                            </div>
                                            <div class="modal-body">
                                            </div>
                                            <div class="modal-footer"> 
                                            <a href="#" class="btn" data-dismiss="modal">cancel</a>
                                            <a href="#" class="btn btn-primary">Guardar</a>
                                            </div>
                                            </div>
                                            </div>
                                            </div>-->
                                        </li>
                                        <li>
                                            <h2>Total</h2>
                                            <h3>$<a id="txt_total"></a></h3>
                                        </li>
                                    </ul>
                                     <div class="container" style="width: 89%;">
                                       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="abrir_tarjetas" data-backdrop="static" data-keyboard="false">Realizar compra</button>
                                       <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Realizar Compra</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Tipo de tarjeta</p>
                                                        
                                                        <select class="selectpicker" id="selector_envio1">
                                                            <option value="Mastercard">Mastercard</option>
                                                            <option value="American express">American express</option>
                                                            <option value="Visa">Visa</option>
                                                        </select>
                                                    <br>                                              
                                                        <label>Correo: <input type="text" name="txtcorreoss" id="txtemailcompra" class="form-correo form-control" maxlength="30"></label>
                                                        <label>Clave : <input type="password" name="txtclave" id="txtclavescompra" class="form-correo form-control" maxlength="30"></label>
                                                        <label  class="adddirecion">añadir otra Direccion :<input type="checkbox" name="checkbox"  id="addirecion" width="10px" height="10px" style="margin-left: 39px; margin-top: 9px;"></label>              
                                      
                                                        <div class="g-recaptcha" data-sitekey="6Ld_1i0UAAAAAICeMTzxRahb9jFR8HA5IHAE5wmc" id="yorobot"></div>
                                                       <br><br><br><br><br><br>
                                                       <div id="formularios"></div>
                                                 <button type="button" class="btn btn-default" id="btn_confirmar_compra" style="margin-left: 201px; margin-top: -33px; float: left;">Confirmar compra</button>              
                                                 <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar_tarjetas" style="margin-left: 351px; margin-top: -34px; width: 103px; float: left;">Canselar</button>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                     
                                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Registro para Realizar la compra</h4>
                                                </div>
                                                 
                                                <div class="modal-body">
                                                    <!--<h3>Continuar con el registro</h3>-->
                                                    <label>Nombre :<input type="text" name="txtnombre" class="form-control" id="txtnombred" maxlength="20"></label>
                                                    <label>Apellido :<input type="text" name="txtapellido" class="form-control" id="txtapellidod" maxlength="20"></label>
                                                    <label>Telefono :<input type="text" name="txttelefono" class="form-control" id="txttelefonod" maxlength="10"></label><br>
                                                    <label>Telefono 2 :<input type="text" name="txttelefono2" class="form-control" id="txttelefono2d" value="0" maxlength="10"></label><br>
                                                    <label>Calle :<input type="text" name="txtcalle" class="form-control" id="txtcalled" maxlength="50"></label><br>
                                                    <label>Exterior :<input type="text" name="txtexterior" class="form-control" id="txtexteriord" maxlength="4"></label><br>
                                                    <label>Interior :<input type="text" name="txtinterior" class="form-control" id="txtinteriord" value="0" maxlength="4"></label><br>
                                                    <label>CP :<input type="text" name="txtcp" class="form-control" id="txtcpd" maxlength="4"></label><br><br><br><br>        
                                                    <label>Estados :<select class="form-control" id="selectestadosd"  accept-charset="utf-8">
                                                    </select></label>
                                                    <label>Ciudad :<input type="text" name="txtciudad" class="form-control" id="txtciudadd" maxlength="50"></label>
                                                    <label>Colonia :<input type="text" name="txtcolonia" class="form-control" id="txtcolonia" maxlength="50"></label>
                                                    <label>Cruseros :<input type="text" name="txtcrusero" class="form-control" id="txtcruserod" maxlength="50"></label>
                                                    <label>Cruseros 2 :<input type="text" name="txtcrusero2" class="form-control" id="txtcruserod2" maxlength="50"></label><br>
                                                    <label>Referencia :<input type="text" name="txtreferencia" class="form-control" id="txtreferncia" value="0" maxlength="50"></label><br>
                                                    <label>Datos Adicionales :<input type="checkbox" name="checkbox" class="form-control" id="RAcheckbox"></label>              
                                                </div>
                                                <br><br><br><br><br><br><br>
                                                <div class="modal-footer">
                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                                <button type="button" class="btn btn-primary" id="btn-direccion" data-dismiss="modal">Guardar</button>
                                               </div>
                                              </div>
                                             </div>
                                            </div>
                                <div class="row"></div>
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="business" value="you@youremail.com">
                                        <input type="hidden" name="item_name" value="Item Name">
                                        <input type="hidden" name="currency_code" value="MXN">
                                        <input type="hidden" name="amount" value="0.00">
                                        <input type="image" src="http://www.paypal.com/es_ES/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                                    </form>
								</form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <?php include '../../bin/footer.php'; ?>

        <!-- Scripts -->
        <script src="cart.js"></script>
    </body>
</html>
