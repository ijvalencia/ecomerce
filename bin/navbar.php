<?php session_start(); ?>
<!--<div class="loader"></div>-->
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
                                    <div class="lnt-subcategory col-sm-8 col-md-8" id="div_lista_subcat">
                                        <ul class="list-unstyled col-sm-6" id="lista_subcat">
                                        </ul>
                                        <ul class="list-unstyled col-sm-6" id="lista_subcat2">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Carousel -->
                            <div class="col-md-4">
                                <img id="img_navbar" height="30%">     
                            </div>			
                        </div>
                    </div> 
                </li> 
            </ul>
            <form id="form_busqueda" class="navbar-form navbar-left lnt-search-form" role="search" action="../../modulos/productos/detalles.php">
				<input name="extra" value="1" class="hidden">
				<div class="form-group">
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
						<input name="busqueda" type="text" class="form-control lnt-search-input" aria-label="Search" placeholder="Buscar" minlength="3" maxlength="20">
					</div>
				</div>
				<!-- boton de busqueda-->
				<button type="submit" class="btn btn-search" id="btn_enviar"><span class="fa fa-search"></span></button>
			</form>
            <ul class="nav navbar-nav navbar-right lnt-shopping-cart">
                <li class="dropdown">
                    <span id="nombre_usuario_nav"></span>
                    <div class="btn-group" role="group" aria-label="...">
                        <a class="btn btn-default lnt-cart" href="../inicio/index.php">
                            <img src="../../imgweb/envio.png">
                        </a>

                        <div class="btn-group" role="group">
                            <a class="btn btn-default lnt-cart"  dropdown-toggle selected-category-btn data-toggle="dropdown" aria-expanded="false"> 
                                <img src="../../imgweb/login.png" width="20px" height="20px">
                            </a>
                            <ul class="dropdown-menu" role="menu" id="menuloginid">
                                <li><a href="../login/index.php"><img src="../../imgweb/login.png" width="20px" height="20px" >Iniciar sesion</a></li>
                                <li class="ocultar" id="idcuentas"><a id="info" href="../usuario/index.php"><img src="../../imgweb/lapis.png" width="20px" height="20px" >Mis Perfil</a></li>
                                <li class="ocultar"><a id="info" href="#"><img src="../../imgweb/envio.png" width="20px" height="20px" >Mis Pedidos</a></li>
                                <li class="ocultar"><a id="info" href="#"><img src="../../imgweb/cupon.png" width="20px" height="20px" >Mis Ofertas</a></li>				
                                <li class="ocultar"><a id="info" href="../orden/Orden.php"><img src="../../imgweb/cupon.png" width="20px" height="20px" >Mis Ordenes</a></li>
                                <li><a href="../../bin/ingresar.php?categoria=cerrar"><img src="../../imgweb/login.png" width="20px" height="20px">Cerrar sesion</a></li>
                            </ul>
                        </div>
                        <a class="btn btn-default lnt-cart" href="../carrito/index.php">
                            <img src="../../imgweb/carrito.png">
                        </a>
                    </div>
                </li>
            </ul> 
        </div> 
    </div>
</nav>
<!-- Barra inferior -->
<script src="../../modulos/inicio/Usuario_menu.js"></script>
 <script src="../../modulos/usuario/usuarios.js"></script>
