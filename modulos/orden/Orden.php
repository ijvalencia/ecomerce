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
        <br> <!--class="panel-title"-->
        <div class="panel panel-default row">
            <div class="panel-heading"> 
                <h5 >ORDENES DE COMPRAS</h5>
            </div>
            <div class="panel-body row">
                <div class="container-fluid bg-3 text-center">   
                        <button class="btn btn-default" id="btncontacto">01-800-333CBA</button>
                        <!--<div id="nombre" class="detallesPro"></div>-->
                        <div id="descripcion" class="detallesPro"></div>
                        <div id="precio" class="Precios"></div>
                        <a href="detalles_orden.php" id="btncontacto">Ver Detalles</a>
                <div class="row">
                    <div class="col-sm-2" id="position">
                     <img src="imagen" id="imagen">
                    </div>
                </div>
              </div>
                </div>
               <hr>
        </div>
        <br>
        <br>
        
        <!--class="panel-title"-->
        <!--
    <div class="panel panel-default row">
            <div class="panel-heading"> 
                <h5>ORDENES DE COMPRAS</h5>
            </div>
        </div> 
        -->
        
        <br>
       </body>
       <script src="orden.js"></script>
</html>
