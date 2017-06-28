<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carrito</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets_1/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets_1/css/style.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets_1/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets_1/css/form-elements.css">
        <link rel="stylesheet" href="css/body.css">
        <link rel="stylesheet" href="css/acomodo.css">
        
        
        <link rel="shortcut icon" href="assets_1/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets_1/ico/apple-touch-icon-57-precomposed.png">
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
                        <li><a  href="#"><img src="imgweb/menu.png" width="30px" height="30px"></a></li>
                        <li><a  href="#"><img src="imgweb/logo.png" width="40px" height="35px"></a></li>
                     <!--   <li><a  href="#"><img src="IMG/.jpg"></a></li>-->
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
                        <li><a class="pocition" href="login.html"><img src="imgweb/login.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                        <li><a class="pocition" href="cart.php"><img src="imgweb/carrito.png" width="25px" height="25px"><!--<span class="glyphicon glyphicon-log-in"></span>--></a></li>
                    </ul>
                </div>
            <!--</div>-->
        </nav>
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Agregar bara de navegacion -->
                            
                            <div class="row" style="text-align:left"> 
                                <a href="index.html">Inicio</a> 
                                <span class="divider">/</span>
                                Carrito
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <table id="cart" class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th style="width:50%">Product</th>
                                                <th style="width:10%">Price</th>
                                                <th style="width:8%">Quantity</th>
                                                <th style="width:22%" class="text-center">Subtotal</th>
                                                <th style="width:10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- AQUI CARGAN LOS PRODUCTOS-->
                                            <tr>
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                                        <div class="col-sm-10">
                                                            <h4 class="nomargin">Producto 1</h4>
                                                            <p>Producto bien chido</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">$3000</td>
                                                <td data-th="Quantity">
                                                    <input type="number" class="form-control text-center" value="1">
                                                </td>1
                                                <td data-th="Subtotal" class="text-center">$</td>
                                                <td class="actions" data-th="">
                                                    <a href=""><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                                        <div class="col-sm-10">
                                                            <h4 class="nomargin">Producto 2</h4>
                                                            <p>Producto bien chido 2</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">$200</td>
                                                <td data-th="Quantity">
                                                    <input type="number" class="form-control text-center" value="1">
                                                </td>
                                                <td data-th="Subtotal" class="text-center">$</td>
                                                <td class="actions" data-th="">
                                                    <a href=""><i class="fa fa-trash-o"></i></a>								
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="col-md-3">
                                    <form role="form">
                                        Detalles de tu pedido
                                        <ul style="padding: 0px">
                                            <li>
                                                Subtotal(2)     <a>$3200</a>
                                            </li>
                                            <li>
                                                Envío
                                            </li>
                                            <li>
                                                Cupon/Descuento
                                            </li>
                                            <li>
                                                <h3>Total</h3><a>$3200</a>
                                            </li>
                                        </ul>
                                        <button type="submit" class="btn btn-default" style="background: #ffae4b;">
                                            Confirmar compra
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>        
            <div class="row">
                <div class="col-md-12">
                    <h3>LO MAS VENDIDO EN...</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                 </div>
              </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h3>PRODUCTOS DESTACADOS</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            </div>
            </div>
        </div>
        <!-- Footer  -->
        <footer>
        </footer>
        <!--fin footer-->
        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>