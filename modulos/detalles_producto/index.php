<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <?php include '../../bin/head.php' ?>
    </head>
    <body>
        <?php
        header('Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7');
        echo '<span class="hidden" id="producto" value="' . $_GET['producto'] . '"></span>';
        echo '<span class="hidden" id="categoria" value="' . $_GET['categoria'] . '"></span>';
        ?>
        <?php include '../../bin/navbar.php' ?>

        <div class="container">
            <ol class="breadcrumb">
                <li><a href="../../modulos/inicio/index.php">Inicio</a></li>
                <li><a href="link_categoria" id="nombre_categoria"></a></li>
                <li><a href="link_marcas" id="nombre_marca"></a></li>
                <li><span id="nombre_producto"></span></li>
            </ol>

            <!-- Imagen -->
            <div class="col-md-7">    
                <div class="modalZoom">
                    <img id="img_producto">
                </div>
                <!-- The Modal -->
                <div id="modalZoom" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img_modal">
                </div>


            </div>
            <!-- Datos y compra -->
            <div class="col-md-4">
                <div class="col-md-10">
                    <div class="product-price">
                        <div class="product-price-container option-container">
                            <span id="descripcion_producto"></span>
                            <br>
                            <h4><a>$<span id="precio_producto"></span></a></h4>
                            <br>
                            Disponibles: <a id="cant_disponibles"></a>
                            <br><br>
                        </div>
                        <a id="btn_comprar" class="btn btn-lg">Comprar Ahora</a>
                    </div>
                    
                    <!---Anton-->
                    
                    <div class="ec-stars-wrapper" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">
                        <a href="#" data-value="1" title="Votar con 1 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="2" title="Votar con 2 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="3" title="Votar con 3 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="4" title="Votar con 4 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="5" title="Votar con 5 estrellas" class="estrellas">&#9733;</a>
                    </div>
                    <div id="comentarios" class="ec-stars-wrapper" data-toggle="modal" data-target="#vercomentarios">

                    </div>
                    <div class="container">
                        <div class="modal fade" id="vercomentarios" role="dialog">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Comentarios del producto</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div id="comentarios-de-usuarios" class="modal-body">
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                        <h4 class="modal-title">Calificar Producto</h4><button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="comentario.php?producto=<?php echo $_GET['producto'] ?>" method="post" role="form" class="login-form" id="commentForm">
                                            <div class="form-group">
                                                <h6>Calificacion:
                                                    <label class="sr-only" for="form-correo">Correo:</label>
                                                    <select  name="calificacion">
                                                        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option> 
                                                        <option value="4">&#9733;&#9733;&#9733;&#9733;</option> 
                                                        <option value="3">&#9733;&#9733;&#9733;</option> 
                                                        <option value="2">&#9733;&#9733;</option> 
                                                        <option value="1">&#9733;</option> 
                                                    </select></h6>
                                            </div>
                                            <div class="form-group">
                                                <h6>Comentario:</h6>
                                                <label class="sr-only" for="form-password">Contraseña:</label>
                                                <textarea maxlength="250" name="comentario" placeholder="Max. 250 caracteres."></textarea>
                                            </div>
                                            <center><input type="submit" class="btn" id="botonsesion" value="Enviar Comentario"></center>
                                            <!--<div class="modal-footer">
                                                <center><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button></center>
                                            </div>-->
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!---acabo--->
                    <br>
                    <a id="numero_comprar" href="link_contacto">Compra telefónica: </a>
                </div>
            </div>
        </div>
        <!-- Descripcion y detalles -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <h2>Detalle del Producto</h2>
                    <div class="inner-container">
                        <span id="descripcion_producto2"></span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h2>Características</h2>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Codigo del fabricante</td>
                                <td id="codigo_fabricante"></td>
                            </tr>
                            <tr>
                                <td>Garantia</td>
                                <td id="tiempo_garantia"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="scripts.js"></script>
            <link href="calificacion.css" rel="stylesheet" type="text/css"/>
            <br/>
        </div>
        
        <script>
  $('.estrellas').on("click", function () {
    $('#form_busqueda').hide();     
   });
    
  $('#botonsesion').on("click", function () {
    $('#form_busqueda').show();
  });
        </script>
        <?php include '../../bin/footer.php' ?>
    </body>
</html>
