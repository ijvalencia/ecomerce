<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Carrito</title>
        
      <?php include '../../bin/head.php';?>
      <?php include '../../bin/navbar.php';?>
        
    </head>
    <body>
        
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb">
								<li><a href="http://localhost/Ecommerce/modulos/inicio/index.php">Inicio</a></li>
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
                                        <button type="submit" class="btn btn-default" id="btn_confirmar_compra">
                                            Confirmar compra
                                        </button>
                                    </form>
                                </div>
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