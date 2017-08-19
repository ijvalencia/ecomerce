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
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="abrir_tarjetas">Realizar compra</button>
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
                                                        <button type="button" class="btn btn-default" id="btn_confirmar_compra">
                                                            Confirmar compra
                                                        </button>  
                                                      </div>
                                                    <div class="modal-footer">
                                                   <button type="button" class="btn btn-default" data-dismiss="modal"id="cerrar_tarjetas">Close</button>
                                                </div>
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
