<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        include '../../bin/head.php';
        include '../../bin/navbar.php';
        ?>
    </head>
    <body style="background: #f2f2f2;">
        <br>
        <div class="panel panel-default row">
            <div class="panel-heading"> <!--class="panel-title"-->
                <h5>DETALLES DE LA COMPRA</h5>
            </div>
            <div class="panel-body row">
                <div class="container-fluid bg-3 text-center">
                    <div class="panelessde">
                         <p class="detallesPro">Orden de comprar mas detallado </p><br>
                         <p id="cantidad"></p>
                         
                         <p class="precioisquierda" id="precios"></p>
                         <p class="precioisquierda" id="fechasss"></p>
                         <p class="precioisquierda" id="fecha"></p>
                         <p class="precioisquierda" id="preciosenvio"></p> <br><br>
                    </div>
                    
                      <div class="row">
                        <div class="col-sm-1">
                            <div class="panelessiz">
                                <p style="text-align: left; margin-left: 2%;">Paquete</p><br>
                                   <div id="descripcion" class="detallesorden"></div>
                                     <div id="precio" class="Preciosdetalle"></div>
                                       <img src="imagen" width="20%" id="imagen" class="imgderecha">
                                    <br>
                                 <br>
                              <br>
                          </div>
                        </div>    
                      </div>
                    <br> 
                    <div class="row">
                       <div class="panelessde">
                           <div id="pagos">
                                <p class="detallesPros">Metodo de Pago</p>
                                <img src="../../IMG/tarjeta.png" style="width: 30px" class="img-circle">
                          </div>
                       </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="panelessde">
                        <p>Direccion del envio :</p>
                        <div class="col-sm-4" style="background: #EEE">
                          <img src="https://placehold.it/150x80?text=IMAGE" style="width: 230%">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <hr>
           </div>
          <br>         
        <br>
        <script src="detalle_orden.js"></script>
  </body>
</html>