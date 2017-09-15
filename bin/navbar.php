<?php session_start(); ?>
<div class="loader"></div>
<!-- Navbar dinamica-->
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
            <a class="navbar-brand" href="#"></a>
            <li><a href="#"></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </li>
            <li><a href="#"></a></li>
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
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="line-navbar-collapse-2">
            <div class="col-md-2">
                <a class="logo" href="../../index.php"><i class="img-logo"></i></a>
                <div class="container-nav">
                    <ul class="nav navbar-nav lnt-nav-mega">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="fa fa-dot-circle-o"></span>
                                Categorias
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <div class="lnt-dropdown-mega-menu">
                                    <!-- Categorias -->
                                    <ul class="lnt-category list-unstyled" id="supercategorias">
                                    </ul>
                                    <!-- Subcategorias -->
                                    <div class="lnt-subcategroy-carousel-wrap container-fluid">
                                        <div id="subcategory-home" class="active">
                                            <div class="lnt-subcategory col-sm-7 col-md-7" id="div_lista_subcat">
                                                <ul class="list-unstyled col-sm-6" id="lista_subcat">
                                                </ul>
                                                <ul class="list-unstyled col-sm-6" id="lista_subcat2">
                                                </ul>
                                            </div>
                                            <div class="lnt-subcategory-img col-md-5 col-sm-5">
                                                <a id="link_banner" href="">
                                                    <img id="img_navbar" src="">
                                                </a>
                                            </div>
                                            <div class="lnt-subcategory-img2 col-md-5 col-sm-5">
                                                <a href="../../modulos/productos/detalles.php?extra=1&marca=undefined&priceMIN=1&priceMAX=250000&envio=undefined&subcategoria=PORTATILES">
                                                    <img id="img_navbar_2" src="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Carousel -->
                                </div>
                            </div> 
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <form id="form_busqueda" class="navbar-form navbar-left lnt-search-form" role="search" action="../../modulos/productos/detalles.php">
                    <input name="extra" value="1" class="hidden">
                    <div class="form-group search-bar">
                        <div class="input-group">
                            <div class="input-group-btn lnt-search-category">
                                <!-- Selector de categoria busqueda -->
                                <a class="btn btn-default dropdown-toggle selected-category-btn" data-toggle="dropdown" aria-expanded="false">
                                    <span class="selected-category-text" id="categoria_elegida">Todo</span>
                                    <span class="caret"></span>
                                </a>
                                <input name="supercategoria" id="entrada_categoria" class="hidden" value="Todo">
                                <!-- categorias barra busqueda-->
                                <ul class="dropdown-menu" role="menu" id="categorias_busqueda">
                                    <li><a>Todo</a></li>
                                    <!-- Aqui se insertan las categorias de busqueda-->
                                </ul>
                            </div>
                            <!--Entrada de busqueda -->
                            <input name="busqueda" id="entrada_busqueda" type="text" class="form-control lnt-search-input" aria-label="Search" placeholder="Buscar" minlength="1" maxlength="40">
                        </div>
                    </div>
                    <!-- boton de busqueda-->
                    <button type="submit" class="btn btn-search" id="btn_enviar"><span class="fa fa-search"></span></button>
                </form>
            </div>
            <div class="col-md-3">
                <ul class="nav navbar-nav navbar-right lnt-shopping-cart">
                    <li class="dropdown">
                        <span id="nombre_usuario_nav"></span>
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default lnt-cart hidden" href="../inicio/index.php" id="hover1">
                                <div class="background_icon_navbar">
                                    <i class="fa fa-truck"></i>
                                </div>
                            </a>
                            <div class="btn-group" role="group">
                                <a class="btn btn-default lnt-cart" dropdown-toggle selected-category-btn data-toggle="dropdown" aria-expanded="false" id="hover2"> 
                                    <div class="background_icon_navbar">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu" role="menu" id="menuloginid">
                                    <li id="navbar-sesion-li"><a href="../login/index.php"><i class="fa fa-user"></i><h5> Iniciar sesion</h5></a></li>
                                    <li class="ocultar" id="idcuentas"><a id="info" href="../usuario/index.php"><i class="fa fa-pencil"></i><h5> Mis Datos Personales</h5></a></li>
                                    <li class="ocultar"><a id="info" href="#"><i class="fa fa-truck"></i><h5> Mis Pedidos</h5></a></li>
                                    <li class="ocultar"><a id="info" href="#"><i class="fa fa-money"></i><h5> Mis Ofertas</h5></a></li>

                                    <li class="ocultar"><a id="info" href="../favoritos/favoritos.php"><i class="fa fa-heart"></i><h5> Mis Favoritos</h5></a></li>
                                    <a href="#" onclick="signOut();">Sign out</a>
                                    <!--<script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
      }
    </script>-->

                                    <li><a href="../../bin/ingresar.php?categoria=cerrar"><i class="fa fa-ban"></i><h5> Cerrar sesion</h5></a></li>
                                </ul>
                            </div>
                            <a id="navbar_icon_carrito" class="btn btn-default lnt-cart" href="../carrito/index.php">
                                <div class="background_icon_navbar">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu" role="menu" id="menuloginid">
                                <li id="navbar-sesion-li"><a href="../login/index.php"><i class="fa fa-user"></i><h5> Iniciar sesion</h5></a></li>
                                <li class="ocultar" id="idcuentas"><a id="info" href="../usuario/index.php"><i class="fa fa-pencil"></i><h5> Mis Datos Personales</h5></a></li>
                                <li class="ocultar"><a id="info" href="#"><i class="fa fa-truck"></i><h5> Mis Pedidos</h5></a></li>
                                <li class="ocultar"><a id="info" href="#"><i class="fa fa-money"></i><h5> Mis Ofertas</h5></a></li>
                                
                                <li class="ocultar"><a id="info" href="../favoritos/favoritos.php"><i class="fa fa-heart"></i><h5> Mis Favoritos</h5></a></li>
<!--                                <a href="#" onclick="signOut();">Sign out</a>
                                <script>
                                    function signOut() {
                                        var auth2 = gapi.auth2.getAuthInstance();
                                        auth2.signOut().then(function () {
                                            console.log('User signed out.');
                                        });
                                    }
                                </script>-->
                                <li><a href="../../bin/ingresar.php?categoria=cerrar"><i class="fa fa-ban"></i><h5> Cerrar sesion</h5></a></li>
                            </ul>

                        </div>
                    </li>
                </ul>
            </div>
        </div> 
    </div>
</nav>
<!-- Barra inferior -->
<script src="../../modulos/inicio/Usuario_menu.js"></script>
<script src="../../modulos/usuario/usuarios.js"></script>
<script src="navbar.js"></script>
<!--<script src="../../modulos/detalles_producto/scripts.js"></script>-->
