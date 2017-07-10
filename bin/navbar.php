<nav class="navbar navbar-static-top line-navbar-one" for="hide" id="content">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#line-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-ellipsis-v"></span>
            </button>
            <a class="lno-cart" href="#">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                <span class="cart-item-quantity"></span>
            </a>
            <button class="lno-btn-toggle">
                <span class="fa fa-bars"></span>
            </button>
            <a class="navbar-brand" href="#">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="line-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </li>
                <li><a href="#"></a></li>
            </ul>
            <form class="navbar-form navbar-left lno-search-form visible-xs" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-search"><span class="fa fa-search"></span></button>
            </form>
        </div>
    </div>
</nav>
<!-- Line secondary navbar -->
<nav class="navbar navbar-static-top line-navbar-two">
    <div class="container">
        <div class="collapse navbar-collapse" id="line-navbar-collapse-2">
            <ul class="nav navbar-nav lnt-nav-mega">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-dot-circle-o"></span>
                        Categorias
                        <!--<img src="imgweb/menu.png" width="30px" height="30px">-->
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <div class="lnt-dropdown-mega-menu">
                            <!-- Categorias -->
                            <script src="bin/categorias.js"></script>
                            <ul class="lnt-category list-unstyled">
                                <li onmouseover="cargarLista(0)"><a href="#">Computo </a></li>
                                <li onmouseover="cargarLista(1)"><a href="#">Electrónica </a></li>
                                <li onmouseover="cargarLista(2)"><a href="#">Almacenamiento </a></li>
                                <li onmouseover="cargarLista(3)"><a href="#">Audio/Video </a></li>
                                <li onmouseover="cargarLista(4)"><a href="#">Software/Juegos </a></li>
                                <li onmouseover="cargarLista(5)"><a href="#">Redes/Telefonia </a></li>
                                <li onmouseover="cargarLista(6)"><a href="#">Impresoras/Escaner </a></li>
                                <li onmouseover="cargarLista(7)"><a href="#">Accesorios/Personal </a></li>
                                <li onmouseover="cargarLista(8)"><a href="#">Hogar/Muebles </a></li>
                                <li onmouseover="cargarLista(9)"><a href="#">Seguridad </a></li>
                                <li onmouseover="cargarLista(10)"><a href="#">Garantias </a></li>
                            </ul>
                            <!-- Se debe cargar con javascript -->
                            <div class="lnt-subcategroy-carousel-wrap container-fluid">
                                <div id="subcategory-home" class="active">
                                    <div class="lnt-subcategory col-sm-8 col-md-8" id="div_lista_subcat">
                                        <ul class="list-unstyled col-sm-6" id="lista_subcat">
                                            <li><a href="#">MOUSE</a></li>
                                            <li><a href="#">BOCINAS</a></li>
                                            <li><a href="#">ALMACENAMIENTO</a></li>
                                            <li><a href="#">MEMORIAS</a></li>
                                            <li><a href="#">GAMES</a></li>
                                            <li><a href="#">CONMUTADORES</a></li>
                                            <li><a href="#">GABINETES</a></li>
                                            <li><a href="#">IMPRESORAS</a></li>
                                            <li><a href="#">KIOSKO</a></li>
                                            <li><a href="#">MONITORES</a></li>
                                            <li><a href="#">MULTIFUNCIONALES</a></li>
                                            <li><a href="#">PIEZAS</a></li>
                                            <li><a href="#">PORTATILES</a></li>
                                        </ul>
                                        <ul class="list-unstyled col-sm-6" id="lista_subcat2">
                                            <li><a href="#">PROCESADORES</a></li>
                                            <li><a href="#">REPRODUCTORES</a></li>
                                            <li><a href="#">SCANNER</a></li>
                                            <li><a href="#">SOFTWARE</a></li>
                                            <li><a href="#">TABLETAS</a></li>
                                            <li><a href="#">TARJETA CONTROLADORA</a></li>
                                            <li><a href="#">TARJETA MADRE</a></li>
                                            <li><a href="#">TECLADO Y MOUSE</a></li>
                                            <li><a href="#">TECLADOS</a></li>
                                            <li><a href="#">VIDEO</a></li>
                                            <li><a href="#">VIDEOCONFERENCIA</a></li>
                                            <li><a href="#">VIDEOPROYECTOR</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </li> 
            </ul>
            <form class="navbar-form navbar-left lnt-search-form" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-btn lnt-search-category">
                            <button type="button" class="btn btn-default dropdown-toggle selected-category-btn" data-toggle="dropdown" aria-expanded="false">
                                <span class="selected-category-text">All </span>
                                <span class="caret"></span>
                            </button>
                            <!-- categorias barra busqueda-->
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Computo </a></li>
                                <li><a href="#">Electrónica </a></li>
                                <li><a href="#">Almacenamiento </a></li>
                                <li><a href="#">Audio/Video </a></li>
                                <li><a href="#">Software/Juegos </a></li>
                                <li><a href="#">Redes/Telefonia </a></li>
                                <li><a href="#">Impresoras/Escaner </a></li>
                                <li><a href="#">Accesorios/Personal </a></li>
                                <li><a href="#">Hogar/Muebles </a></li>
                                <li><a href="#">Seguridad </a></li>
                                <li><a href="#">Garantias </a></li>
                            </ul>
                        </div>
                        <input type="text" class="form-control lnt-search-input" aria-label="Search" placeholder="Search leader">
                    </div>
                </div>
                <div class="lnt-search-suggestion">
                    <!-- Recomendaciones busqueda -->
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Leader mask in <em>entertainment</em></a></li>
                        <li><a href="#">Plain leader bags in <em>fashion</em></a></li>
                        <li><a href="#">Black leader shoes in <em>fashion</em></a></li>
                        <li><a href="#">Covers in <em>electronics</em></a></li>
                        <li><a href="#">Leader overcoat in <em>fashion</em></a></li>
                        <li><a href="#">Hi motor in <em>motors</em></a></li>
                        <li><a href="#">Fake leader bag in <em>Electronics</em></a></li>
                        <li class="lnt-search-bottom-links">
                            <ul class="list-inline">
                                <li><a href="#">All suggestions</a></li>
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Popular products</a></li>
                                <li><a href="#">Discounted products</a></li>
                            </ul>
                        </li>
                     </ul>
                   </div>
                <button type="submit" class="btn btn-search"><span class="fa fa-search"></span></button>
            </form>
            <ul class="nav navbar-nav navbar-right lnt-shopping-cart">
                <li class="dropdown">
                    <div class="btn-group" role="group" aria-label="...">
                        <a class="btn btn-default lnt-cart" href="../inicio/index.php">
                            <img src="../../imgweb/envio.png">
                        </a>
                        
                        <div class="btn-group" role="group">
                            <a class="btn btn-default lnt-cart"  dropdown-toggle selected-category-btn data-toggle="dropdown" aria-expanded="false"> 
                                <img src="../../imgweb/login.png" width="20px" height="20px">
                                <?php echo "<br>" .$_SESSION["nombre"]; ?>
                            </a>
                            <ul class="dropdown-menu" role="menu" id="menuloginid">
                                <li><a href="../login/index.php"><img src="../../imgweb/login.png" width="20px" height="20px" >Iniciar sesion</a></li>
                                <li><a href="#"><img src="../../imgweb/lapis.png" width="20px" height="20px" >Mis Reseñas</a></li>
                                <li><a href="#"><img src="../../imgweb/envio.png" width="20px" height="20px" >Mis Pedidos</a></li>
                                <li><a href="#"><img src="../../imgweb/cupon.png" width="20px" height="20px" >Mis cupones</a></li>
                                <li><a href="#"><img src="../../imgweb/campana.gif" width="20px" height="20px" >Mis suscripciones</a></li>	
                                <li><a href="../../bin/ingresar.php?categoria=cerrar"><img src="../../imgweb/login.png" width="20px" height="20px">Cerrar sesion</a></li>
                            </ul>
                        </div>
                        
  <!--<span class="selected-category-text"></span>
  <span class="caret"></span>-->

                        <!--
                            <a class="btn btn-default lnt-cart" href="../login/index.php">
                                    <img src="../../imgweb/login.png" width="20px" height="20px">
                        <?php //echo "<br>".$_SESSION["nombre"];?>
                            </a>-->
                        <a class="btn btn-default lnt-cart" href="../carrito/index.php">
                            <img src="../../imgweb/carrito.png">
                        </a>
                    </div>
                </li>
            </ul> 
        </div> 
    </div>
</nav>