<!DOCTYPE html>
<html lang="en" >
    <meta charset="utf-8">
    
<!--  <head>
        <title>Ecommerce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/body.css">
        <link rel="stylesheet" href="css/acomodo.css">
        <link rel="stylesheet" href="css/carrusel.css">
        <link rel="stylesheet" href="assets_1/css/style.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.full.js"></script>
-->

<?php
include 'head.php';
?>  
        <!--<link rel="stylesheet" href="css2/carrusel1.css">-->
        <!--<link rel="stylesheet" href="select2/select2.min.css">-->
        <!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">    
        <link rel="stylesheet" href="select2/select2.min.css">-->
<!--    <link rel="stylesheet" href="select2/select2-bootstrap.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">-->
        <!--<link rel="stylesheet" href="select2/gh-pages.css">-->
        
        <!--<script src="select2/anchor.js"></script>
        <script src="select2/select.js"></script>
        <script type="text/javascript" src="select2/select2.min.js"></script>
        -->
        
        <script type="text/javascript" src="Js/carousel.js"></script><!--<script type="text/javascript" src="Js2/carousel1.js"></script>-->
        <script type="text/javascript" src="Js/carrusel.js"></script><!--<script type="text/javascript" src="Js2/carrusel1.js"></script>-->
    </head>
    <body>
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <!--<a class="navbar-brand" href="#"><img src="IMG/.jpg"></a>-->
                </div>
            </div>
               
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><img src="imgweb/logo.png" width="40px" height="35px"></a></li>
				<!--	<label for="select2-button-addons-single-input-group" class="control-label"></label>
					<div class="input-group">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="datosmenu">
				1			    <img src="imgweb/menu.png" width="30px" height="30px"><!--<span class="caret"></span>
							</button>

							<ul class="dropdown-menu">
                                                            
								<li><a href="lista_producto.php">Categorias</a></li>
                                                                <li><a href="lista_producto.php"></a>Productos</li>
								<li><a href=""></a>Celulares</li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>                 
						<!--<select id="select2-button-addons-single-input-group" class="form-control js-data-example-ajax">
							<option value="3620194" selected="selected">select2/select2</option>
						</select> </div>-->
					
                        <li><a href="lista_producto.php"><img src="imgweb/menu.png" width="30px" height="30px"></a></li>
                         <!--<li><a  href="#"><img src="IMG/.jpg"></a></li>-->
                    </ul>
                    
                    <form class="form-search" id="s" action="/">
                        <div class="input-append">
                           <!--input type="hidden"-->
                           <div class="input-group" style="position: relative; display:block; border-collapse: separate; margin-left: -280px;">
                               
                             <script type="text/javascript">
                              $(".select2-multiple" ).select2({
                                    theme: "bootstrap",
                                    placeholder: "Select a State",
                                    maximumSelectionSize: 6,
                                    containerCssClass: ':all:'});    
                             </script>

                                   <div class="form-group">
                                       <input id="multiple" class="form-control select2-multiple" multiple>
                                           <!--<optgroup label="Alaskan/Hawaiian Time Zone">
                                               <option value="AK">Alaska</option>
                                               <option value="HI" disabled="disabled">Hawaii</option>
                                           </optgroup>
                                           <optgroup label="Pacific Time Zone">
                                               <option value="CA">California</option>
                                               <option value="NV">Nevada</option>
                                               <option value="OR">Oregon</option>
                                               <option value="WA">Washington</option>
                                           </optgroup>
                                           <option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
                                           <option value="TPZ">The Panic Zone</option>
                                           <option value="TTZ">The Twilight Zone</option>
                                       </select>-->
                                   </div>
                                   <span class="input-group-btn">
                                       <button class="btn btn-default" type="button" data-select2-open="multi-append" id="bntid">
                                           <span class="glyphicon glyphicon-search"></span>
                                       </button>
                                   </span>
                               </div>
                           </div>      
                    </form>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="pocition" href=""><img src="imgweb/camion.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href="login.php"><img src="imgweb/login.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href="cart.php"><img src="imgweb/carrito.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                    </ul>
                </div>
            <!--</div>-->
        </nav>
        <nav class="navbarmenu navbar-inverse">
            <div class="container-fluid1">
               <div class="navbar-header">
               </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav"> 
                       
                    <li><a id="info" href="#">Solo Hoy</a></li>
                    <li><a id="info" href="#">Promociones</a></li>
                    <li><a id="info" href="#">Ofertas</a></li>
                    <li><a id="info" href="#">cancelaciones</a></li>
                    <li><a id="info" href="#">Descuentos</a></li>
                    <li><a id="info" href="#">Promociones</a></li>
                    <li><a id="info" href="#">presios Bajos</a></li>
                    <li><a id="info" href="#">Ganga</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container-fluid bg-3 text-center">
            <h3></h3><br>
            <div class="row">
                <div class="col-md-8"> 
                    <img id="superior1" src="IMG/fondo.jpg" class="img-responsive" style="width: 100%"  alt="Image">
                    <!--.col-md-8-->
                    </div>
                
                    <div class="col-md-4">
                       <img id="superior2" src="IMG/fondo.jpg" class="img-responsive" style="width: 100%" alt="Image">
                      <!--.col-md-4-->
                    </div>    
                </div>
            
                <div class="row">
                    <div class="col-md-4">
                     <p></p>
                      <img src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">
                    </div>
                    
                    <div class="col-md-4">
                    <p></p>
                      <img src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image"> 
                        <!--.col-md-4-->
                    </div>
                    
                    <div class="col-md-4">  
                        <p></p>
                         <img src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">
                        <!--.col-md-4-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                        <img id="inferior1" src="IMG/fondo.jpg" class="img-responsive" style="width: 100%"  alt="Image">
                     <!--.col-md-8-->
                    </div>
                
                    <div class="col-md-6">
                       <img id="inferior2" src="IMG/fondo.jpg" class="img-responsive" style="width: 100%" alt="Image">
                      <!--.col-md-4-->
                    </div>
                </div>
        </div>
        <br><br><br><br><br>
        <div class="container-fluid bg-3 text-center" id="centrados">    
             <h3></h3><br>
            <div class="row">
                <div class="col-md-8">
                       <p class="titulo">BÚSQUEDA POPULARES</p>             
                       <a class="populares" >celulares</a>
                       <a class="populares" >televiciones</a>
                       <a class="populares" >radios</a>
                       <a class="populares" >computadoras</a>
                       <a class="populares" >pilas</a>
                       <a class="populares" >accesorios</a>
                       <a class="populares" >refacciones</a>
                       <a class="populares" >electronicas</a>
                       <a class="populares" >cables</a>
                       <a class="populares" >impresoras</a>
                      <!--<img id="favoritos1" src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">-->                      
                </div>
                <!--<div id="vertical-bar">   
                </div>-->
                
                <div class="col-md-4">
                  <p class="titulo">COMPRAS 100% SEGURAS</p>
                    <img id="favoritos2" src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">
                  <!--.col-md-6-->
                </div>
            </div>
        </div>
        <br>     
                   
        <div class="jumbotron">
            <p class="titulo">PRODUCTOS QUE HAS VISTO RESIENTEMENTE</p>  
            <div class="container text-center">
                <div class="row1">
                    <!--carrusel de 1-->
               <div id="Carousel" class="carousel slide">
                                    
                                    <ol class="carousel-indicators">
                                        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#Carousel" data-slide-to="1"></li>
                                        <li data-target="#Carousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                                </div>   
                      
  <!--fin-->     
                    <!--<h1>My Portfolio</h1>      
                      <p>Some text that represents "Me"...</p>
                    -->
                    <!-- fincarrusel -->
                </div>
            </div>
        </div>
       <br>  
     <br>
        <!--carrusedel etiquetas los mas recomendados-->
        <!--<div class="row">
            <div class="col-sm-3">
                
            </div>
        </div>
        <!--fin de los etiquetas los mas recomendados-->
        
        <!--carrusel para abajo-->
        <div class="jumbotron">
            <div class="container text-center">
                <div class="row">
                    <!--inicio--> 
     <div id="Carousel" class="carousel slide">                     
                                    <ol class="carousel-indicators">
                                        <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#Carousel" data-slide-to="1"></li>
                                        <li data-target="#Carousel" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                                <div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                                    <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                                </div>   
     <!--fin-->     
                    <!--
       <div class="button-next">
            <a href="javascript:stepcarousel.stepBy('carousel', 1)">
              <img src="IMG/arrow_right.png" />
            </a>
        </div>

        <div class="button-prev">
            <a href="javascript:stepcarousel.stepBy('carousel', -1)">
              <img src="IMG/arrow_left.png" />
            </a>
        </div>

        <div id="carousel" class="stepcarousel">
            <div class="belt">
                <div class="panel">
                    <img src="IMG/fondo.jpg" width="100px" height="100px"/>
                    <div class="panel-text">
                        <p>Este carousel es una demostraci&oacute;n</p>
                    </div>
                </div>
                
                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px" />
                    <br>
                    <div class="panel-text">
                        <p>de un tutorial de <a href="http://sumolari.com">Sumolari.com</a>.</p>
                    </div>
                </div>

                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px" />
                    <div class="panel-text">
                        <p>Puedes ver el tutorial en cuesti&oacute;n</p>
                    </div>
                </div>

                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px" />
                    <div class="panel-text">
                        <p>en <a href="http://sumolari.com/?p=1708">este art&iacute;culo</a> del blog.</p>
                    </div>
                </div>

                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px"/>
                    <div class="panel-text">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px" />
                    <div class="panel-text">
                        <p>Amet sit dolor ipsum lorem.</p>
                    </div>
                </div>

                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px" />
                    <div class="panel-text">
                        <p>Bla bla bla bla bla bla bla</p>
                    </div>
                </div>

                <div class="panel">
                    <img src="IMG/img.jpg" width="100px" height="100px" />
                    <div class="panel-text">
                        <p>Ble ble ble ble ble ble ble</p>
                    </div>
                </div>
            </div>
        </div>-->
               </div>
            </div>
        </div>
        <!--fin del carrusel-->
        <div class="container-fluid bg-3 text-center">    
            <!--<h3>Some of my Work</h3><br>-->
            <div class="row">
                <div class="col-md-1"><img src="IMG/escudo.jpg" width="10%" height="10%" ><a href="" class="" style="color: black">PROTECCIÓN AL COMPRADOR</a></div>
                <div class="col-md-1"><img src="IMG/escudo.jpg" width="10%" height="10%" ><a href="" class="tipoletra">PAGA AL RECIBIR O EN OXXO</a></div>
                <div class="col-md-1"><img src="IMG/escudo.jpg" width="10%" height="10%" ><a href="" class="tipoletra">COMPRA POR TELÉFONO</a></div>
                <div class="col-md-1"><img src="IMG/escudo.jpg" width="10%" height="10%" ><a href="" class="tipoletra">ENVIOS A TODO MÉXICO</a></div>
                <div class="col-md-1"><img src="IMG/escudo.jpg" width="10%" height="10%" ><a href="" class="tipoletra">COMPRA EN LA APP</a></div>
                <!--<div class="col-sm-3"> 
                    <p>Some text..</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                </div>
                <div class="col-sm-3"> 
                    <p>Some text..</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                </div>
                <div class="col-sm-3">
                    <p>Some text..</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                </div>-->
            </div>
        </div>
      <br>

        <div class="container-fluid bg-3 text-center">    
            <div class="row">
                <div class="col-sm-4">
                    
                    <p class="titulo">BIENVENIDO A "" MÉXICO</p><p class="fuente">
                    " " México es la tienda online con el catálogo más grande de marcas y productos para todos los gustos y para todas las necesidades. Con tan sólo un clic puedes adquirir en internet el artículo que quieras y recibirlo en la comodidad de tu hogar.
En " " el cliente es primero, por eso, puedes encontrar varias facilidades de pago. Desde meses sin intereses con tarjetas de crédito hasta pagos al recibir tu paquete. Siempre estamos pensando en proteger tus datos personales, es por eso que para que te sientas cómodo comprando online en Linio te damos la opción de pagar tu pedido en el momento en el que llegue un mensajero a tocar a tu puerta.
Somos uno de los más grandes e-commerce en América Latina y tenemos presencia en Colombia, Perú, Panamá, Chile y Venezuela. Contamos con una gran experiencia en ventas por internet y puedes tener la certeza de recibir tus paquetes de manera rápida, segura y en perfectas condiciones. Somos los encargados de brindarte la mejor experiencia en compras en línea y de que adquieras exactamente los que estabas buscando.
Todo el año puedes aprovechar de las distintas ofertas y promociones en cada uno de nuestros departamentos, en éstos encontrarás</p>
                    <!--<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">-->
                </div>
        
                <div class="col-sm-4"> 
                    <p> </p>
                    <p class="fuente">artículos de excelente calidad y gran variedad de marcas. Además, aprovecha de grandiosas temporadas del año como Hot Sale, Buen Fin, Día del niño, Navidad y más para comprar lo que siempre has soñado, pero con promociones y descuentos increíbles.
Lo que busques lo puedes encontrar aquí. Tenemos lo último en aparatos y accesorios de tecnología, podrás encontrar preventas y lanzamientos de celulares. De la moda no no olvidamos, también podrás comprar online cada pieza de ropa que necesites para que tu outfit quede perfecto para el día que tú quieras.
Si estás pensando en renovar tu hogar, estás en la tienda online correcta. Encuentra los muebles que necesitas para armar la decoración que más te guste, cada uno de los cuartos de tu hogar podrá tener todo lo que necesitas para que sean acogedores y disfrutes de cada minuto que pases en ellos.
Ahora, si eres súper deportista, en Linio podrás encontrar desde aparatos para ejercicio, ropa deportiva, tenis especializados y ¡claro! Audífonos bluetooth para disfrutar de tu música favorita sin tener que estar al pendiente de nada más. Siempre es importante cuidar tu cuerpo, haciendo ejercicio, peor también con los productos de salud y belleza que te ayudarán a mantenerte saludable por dentro y por fuera.  </p>
                </div>
                <div class="col-sm-4">
                  <p></p>
                    <p class="fuente">Contamos con más departamentos que tienen lo más completo en artículos para mascotas, ferretería, automotriz, instrumentos músicales y la mejor selección de libros, música, películas y juguetes.
                    El modo de pago lo eliges tú, con tarjeta de débito, crédito o en efectivo. Puedes comprar desde cualquier sitio donde te encuentres a través de tu teléfono celular y accediendo con la aplicación móvil. Olvídate de las largas filas y únete al mundo de las satisfactorias y placenteras compras en internet con " ".
                    No dejes pasar un día más para poder aprovechar los beneficios que te puede dar Linio, comprar online es súper divertido. Si te encanta ir con tu celular a todas partes, eso no es excusa, puedes comprar exacto lo que necesitas con la App de la tienda. ¡No hay pretextos! Compra desde donde estés y paga de la manera que tu quieras. No olvides mantenerte al pendiente de los cupones de descuentos que tenemos cada semana en algunas de las categorías de la tienda. Ahorra cada vez más y compra online los artículos con los que siempre soñaste. </p>
                    <p class="tamaño">Estás a un clic de comprar lo que siempre has querido con Linio ¡Bienvenido a las compras online seguras!</p>                    
                </div>
            </div>
        </div><br><br>
        <div class="container-fluid bg-3 text-center">    
            <div class="row">
                <div class="col-sm-4">
                    <p>Anuncios</p>
                  <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                </div>
                <div class="col-sm-4"> 
                    <p>Anuncios</p>
                     <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                </div>
                
                <div class="col-sm-4">
                  <p>Anuncios</p>
                    <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                </div>
                
            </div>
        </div><br><br>
      <!--  <div class="container-fluid bg-3 text-center">    -->
          <ul class="pagination">
                 <li class="disabled">
                   <span>&laquo;</span>
                </li>
                <li class="">
                    <a href="index.html">A <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">B <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">C <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">D <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">F <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">G <span class="sr-only"></span></a>
                </li>
                <li class="">
                    <a href="index.html">H <span class="sr-only"></span></a>
                </li>
                <li class="">
                    <a href="index.html">I <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">J <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">K <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">L <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">M <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">N <span class="sr-only"></span></a>
                </li>
                <li class="">
                    <a href="index.html">O <span class="sr-only"></span></a>
                </li>
                <li class="">
                    <a href="index.html">P <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">Q <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">R <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">S <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">T <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">U <span class="sr-only"></span></a>
                </li>
                <li class="">
                    <a href="index.html">V <span class="sr-only"></span></a>
                </li>
                <li class="">
                    <a href="index.html">W <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">X <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">Y <span class="sr-only">(página actual)</span></a>
                </li>
                <li class="">
                    <a href="index.html">Z <span class="sr-only">(página actual)</span></a>
                </li>
                 
                <li class="disabled">
                    <span>&raquo;</span>
                </li>
            </ul>   
      
      <!-- </div> -->
    <footer class="container-fluid text-center">
        <div class="container-fluid bg-3 text-center" id="centrados">    
             <h3></h3><br><br><br><br><br><br>
            <div class="row">      
                    <form class="form-inline" role="form">
                        !SUSCRÍBETE A NUESTRO NEW¡ 
                         <div class="form-group">
                           <input type="email" class="form-control" id="ejemplo_email_2" placeholder="Suscribete con tu email">
                        </div>
                        
                        <input type="button" class="btn btn-default" id="botondesid" value="OFFERTA PARA HOMBRE">
                        <input type="button" class="btn btn-default" id="botondesid" value="OFFERTA PARA MUJER"><br>
                        
                        <div class="checkbox" id="checar">
                          <input type="checkbox"><label>Accepto los </label><label style="color:red"> Terminos y condiciones</label>
                        </div>
                    </form>
            </div>
        </div>
            <hr class="separadores">
            <div class="container-fluid bg-3 text-center">    
                <!--<h3>Some of my Work</h3><br>-->
            <div class="row">
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Pago contra entrega</p></div>
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Tarjeta Visa</p></div>
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Tarjetas Mastercard</p></div>
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Tarjetas American Express</p></div>
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Pago en OXXO</p></div>
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Paypal</p></div>
                <div class="col-md-1" id="iconos"><img src="IMG/.jpg" width="20%" height="20%"><p class="popular">Tarjetas bancarias</p></div>
            </div>
        </div>
            <hr>
                <div class="container-fluid bg-3 text-center">    
                <!--<h3>Some of my Work</h3><br>-->
              <div class="row">
                  <div class="col-md-2">
                       <p class="">ACERCA DE</p>             
                       <a class="claseizquierda">Vender en...</a><br>
                       <a class="claseizquierda">¿Quienes somos?</a><br>
                       <a class="claseizquierda">Trabaja Con nosotros</a><br>
                       <a class="claseizquierda">Terminos de Uso</a><br>
                       <a class="claseizquierda">Procteccion de Propiedad Intelectual</a><br>
                       <a class="claseizquierda">Programas de Lealtad</a><br>
                       <a class="claseizquierda">Vuelvete un Afiliado</a><br>
                       <br><a class="claseizquierda">Cupones..</a><br>
                       <a class="claseizquierda">Legales</a><br>
                       <a class="claseizquierda">Direcctorio</a><br>
                       <a class="claseizquierda">Glosario</a><br>
                       <a class="claseizquierda">Login</a><br>
                        <!--<img id="favoritos1" src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">-->                      
                </div>
                  
                <div class="col-md-2">
                       <p class="">SERVICIOS AL CLIENTE</p>             
                       <a class="claseizquierda" >Preguntas frecuentes</a><br>
                       <a class="claseizquierda" >Contacto</a><br>
                       <a class="claseizquierda" >Formato de Pago</a><br>
                       <a class="claseizquierda" >Politicas de Privacidad</a><br>
                       <a class="claseizquierda" >Politicas de Envios Devoluciones y Cancelaciones</a><br>
                       <a class="claseizquierda" >Terminos y Condiciones Generales</a><br>
                       <a class="claseizquierda" >Terminos y Condiciones de Venta para productos Marketplace</a><br>
                       <a class="claseizquierda" >Politica de venta de productos</a><br>
                       <a class="claseizquierda" >internacionales</a><br>
                      <!--<img id="favoritos1" src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">-->                      
                </div>
                  <div class="col-md-2">
                       <p class="">.... LATINOAMÉRICA</p>
                       <div class="panelizquierda">
                           <a class="claseizquierda">Argentina</a><br>
                           <a class="claseizquierda">Colombia</a><br>
                           <a class="claseizquierda">Chile</a><br>
                           <a class="claseizquierda">México</a><br>
                       </div>
                       <div class="panelderecha">
                           <a class="claseizquierda">peru</a><br>
                           <a class="claseizquierda">Venezuela</a><br>
                           <a class="claseizquierda">Ecuador</a><br>
                           <a class="claseizquierda">Panama</a><br>
                       </div>
                      <!--<img id="favoritos1" src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">-->                      
                </div> 
                 <div class="col-md-2">
                       <p class="">NOVEDADES</p>             
                       <a class="claseizquierda">Hot Sale 2017</a><br>
                       <a class="claseizquierda">Blog ....</a><br>
                       <a class="claseizquierda">Ofertas a menos de 399</a><br>
                       <a class="claseizquierda">Consola y videojuegos</a><br>
                       <a class="claseizquierda">Computacion</a><br>
                       <a class="claseizquierda">Calendario Dias Festivos</a><br>
                      <!--<img id="favoritos1" src="IMG/fondo.jpg" class="img-responsive" style="width:100%" alt="Image">-->                      
                </div>   
                <div class="col-md-4" >
                      <p class="titulo"> Siguenos : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      
                     <ul class="nav navbar-nav navbar-right">
                        <li><a class="pocition" href=""><img src="imgweb/face.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href=""><img src="imgweb/googlemas.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href=""><img src="imgweb/in.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                     </ul>
                      
                  <!--.col-md-6-->
                  <div id="vertical-bar">   
                    <hr>
                </div>
                </div>
            </div>
        </div>
       </footer>
      	<script src="select2/anchor.min.js"></script>
      <script>
          
          	anchors.options.placement = 'left';
			anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');

			// Set the "bootstrap" theme as the default theme for all Select2
			// widgets.
			//
			// @see https://github.com/select2/select2/issues/2927
			$.fn.select2.defaults.set( "theme", "bootstrap" );

			var placeholder = "Select a State";

			$( ".select2-single, .select2-multiple" ).select2( {
				placeholder: placeholder,
				width: null,
				containerCssClass: ':all:'
			} );

			$( ".select2-allow-clear" ).select2( {
				allowClear: true,
				placeholder: placeholder,
				width: null,
				containerCssClass: ':all:'
			} );

			// @see https://select2.github.io/examples.html#data-ajax
			function formatRepo( repo ) {
				if (repo.loading) return repo.text;

				var markup = "<div class='select2-result-repository clearfix'>" +
					"<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
					"<div class='select2-result-repository__meta'>" +
						"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

				if ( repo.description ) {
					markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
				}

				markup += "<div class='select2-result-repository__statistics'>" +
							"<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
							"<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
							"<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
						"</div>" +
					"</div></div>";

				return markup;
			}

			function formatRepoSelection( repo ) {
				return repo.full_name || repo.text;
			}

			$( ".js-data-example-ajax" ).select2({
				width : null,
				containerCssClass: ':all:',
				ajax: {
					url: "https://api.github.com/search/repositories",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: params.term, // search term
							page: params.page
						};
					},
					processResults: function (data, params) {
						// parse the results into the format expected by Select2
						// since we are using custom formatting functions we do not need to
						// alter the remote JSON data, except to indicate that infinite
						// scrolling can be used
						params.page = params.page || 1;

						return {
							results: data.items,
							pagination: {
								more: (params.page * 30) < data.total_count
							}
						};
					},
					cache: true
				},
				escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
				minimumInputLength: 1,
				templateResult: formatRepo,
				templateSelection: formatRepoSelection
			});

			$( "button[data-select2-open]" ).click( function() {
				$( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
			});

			$( ":checkbox" ).on( "click", function() {
				$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
			});

			// copy Bootstrap validation states to Select2 dropdown
			//
			// add .has-waring, .has-error, .has-succes to the Select2 dropdown
			// (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
			// body > .select2-container) if _any_ of the opened Select2's parents
			// has one of these forementioned classes (YUCK! ;-))
			$( ".select2-single, .select2-multiple, .select2-allow-clear, .js-data-example-ajax" ).on( "select2:open", function() {
				if ( $( this ).parents( "[class*='has-']" ).length ) {
					var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );

					for ( var i = 0; i < classNames.length; ++i ) {
						if ( classNames[ i ].match( "has-" ) ) {
							$( "body > .select2-container" ).addClass( classNames[ i ] );
						}
					}
				}
			});
    </script>
    </body>
</html>
