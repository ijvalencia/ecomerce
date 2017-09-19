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
        <producto>
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="javascript:window.history.back();">&laquo; Volver atrás</a></li>
                <li><a href="../../modulos/inicio/index.php">Inicio</a></li>
                <li><a href="link_categoria" id="nombre_categoria"></a></li>
                <li><a href="link_marcas" id="nombre_marca"></a></li>
                <li><span id="nombre_producto"></span></li>
            </ol>

            <!-- Imagen -->
            <div class="col-md-7">    
                <div class="img-box">
                    <div class="modalZoom">
                        <a data-slide="prev" href="#" class="carousel-control2 fa fa-angle-left"></a>
                        <img id="img_producto">
                        <a data-slide="next" href="#" class="carousel-control2 fa fa-angle-right"></a>
                    </div>
                    <div id="imagenes_secundarias">
                        <slider class="container-fluid">
                        </slider>
                    </div>
                    <!-- The Modal -->
                    <div id="modalZoom" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img_modal">
                    </div>
                </div>
            </div>
            <!-- Datos y compra -->
            <div class="col-md-4">
                <div class="col-md-10">
                    <div class="product-price">
                        <div class="product-price-container option-container">
                            <span id="descripcion_producto"></span>
                            <br>
                            <h4><a id="fav" href="#" title="Favoritos"><i id="icono_fav" class="fa fa-star-o"> Agregar a favoritos</i></a></h4>
                            <h4><a>$<span id="precio_producto"></span></a></h4>
                            <br>
                            Disponibles: <a id="cant_disponibles"></a>
                            <br>
                        </div>
                        <a id="btn_comprar" class="btn btn-lg" data-backdrop="static" data-keyboard="false">Comprar Ahora</a>
                    </div>
                    
                    <!---Anton-->
                    
                    <div class="ec-stars-wrapper" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" id="esconder">
                        <a href="#" data-value="1" title="Votar con 1 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="2" title="Votar con 2 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="3" title="Votar con 3 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="4" title="Votar con 4 estrellas" class="estrellas">&#9733;</a>
                        <a href="#" data-value="5" title="Votar con 5 estrellas" class="estrellas">&#9733;</a>
                    </div>
                    <div id="comentarios" class="ec-stars-wrapper" data-toggle="modal" data-target="#vercomentarios">
                    </div><br>
                    <h4><a id="like" href="#" title="Me gusta ;)"><i id="icono_like" class="fa fa-thumbs-o-up"> Me gusta</i></a></h4>
                    <br>
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
                    <a id="numero_comprar" class="hidden" href="link_contacto">Compra telefónica: </a>
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
                    <div>
                        <a class="img-chat" href="#"><h5 class="txt-chat">Tienes dudas o algún problema?<br>Chatea con nosotros, estamos para atenderte.</h5></a>
                    </div>
                </div>
            </div>
            <script src="scripts.js"></script>
            <link href="calificacion.css" rel="stylesheet" type="text/css"/>
            <br/>
        </div>
        </producto>
        <script>
  $('.estrellas').on("click", function () {
    $('#form_busqueda').hide();     
   });
    
  $('#botonsesion').on("click", function () {
    $('#form_busqueda').show();
  });
        </script>
    </body>
</html>
