<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8">
        <?php
        include '../../bin/head.php';
        error_reporting(0);
        if (isset($_GET['supercategoria']))
            echo '<span class="hidden" id="supercategoria" value="' . $_GET['supercategoria'] . '"></span>';
        if (isset($_GET['busqueda']))
            echo '<span class="hidden" id="busqueda" value="' . $_GET['busqueda'] . '"></span>';
        if (isset($_GET['subcategoria']))
            echo '<span class="hidden" id="subcategoria" value="' . $_GET['subcategoria'] . '"></span>';
        ?> 
    </head>
    <body>
        <?php include '../../bin/navbar.php'; ?>
        <div class="container-fluid">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="../../modulos/inicio/index.php">Inicio</a></li>
                    <li>Productos</li>
                    <li><?php echo $_GET['subcategoria'] ?></li>
                </ol>
            </div>
            <div class="col-sm-2 sidenav">
                <nav class="navbar navbar-default sidebar" role="navigation">
                    <form id="formulario" action="filtramela.php?subcategoria=<?php echo $_GET['subcategoria']; ?>&busqueda=<?php echo $_GET['busqueda'] ?>&supercategoria=<?php echo $_GET['supercategoria'] ?>" method="post"> 
                        <div class="row"></div>
                        <div class="container-fluid">
                            Filtros de <a id="AquiGrupo" name="grupo"></a>
                            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" id="btn_marca">Por Marca:</a>
                                        <span class="separador"></span>
                                        <a id="mas_marcas"><span id="txt_marcas">ver más</span><i id="icono_marcas" class="fa fa-plus"></i></a>
                                        <ul class="menu" role="menu" id="sub_marca"><center id="marquitas"></center></ul>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" id="btn_disponible">Disponibilidad:</a>
                                        <ul class="menu" role="menu" id="sub_disponible">
                                            <center>
                                                <li>
                                                    <select id="filtro_disponibilidad" type="text" name="envio">
                                                        <option value="Indiferente">Indiferente</option> 
                                                        <option value="Local">Local</option> 
                                                        <option value="Foraneo">Foraneo</option>
                                                    </select>
                                                </li>
                                            </center>
                                        </ul>   
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" id="btn_precio">Rango de precio:</a>
                                        <ul class="menu" role="menu" id="sub_precio">
                                            <center>
                                                <li>
                                                    <input id="filtro_miSalario" value="<?php echo $_GET['priceMIN'];?>" name="min" type="number" min="1" max="250000">
                                                    <span class="separator"></span>
                                                    <input id="filtro_miExpectativa" value="<?php echo $_GET['priceMAX'];?>" name="max" type="number" min="1" max="250000">
                                                </li>
                                            </center>
                                        </ul>   
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" id="btn_orden">Ordenar por:</a>
                                        <ul class="menu" role="menu" id="sub_orden">
                                            <li><select id="filtro_orden" type="text" name="orden">
                                                    <option value="normal"> Indiferente</option>
                                                    <option value="mayor"> Precio(mayor a menor)</option>
                                                    <option value="menor"> Precio(menor a mayor)</option>
                                                    <option value="alfa"> A->Z </option>
                                                    <option value="invalfa"> Z->A </option>
                                                </select>
                                            </li>
                                        </ul>   
                                    </li>
                                    <li class="dropdown" id="drop_memoria">
                                        <a class="dropdown-toggle" id="btn_memoria">Por Memoria:</a>
                                        <ul class="menu hidden" role="menu" id="sub_memoria"><span id="memorama"></span></ul>
                                    </li>
                                    <li class="dropdown" id="drop_color">
                                        <a class="dropdown-toggle" id="btn_color">Por Color:</a>
                                        <ul class="menu" role="menu" id="sub_color"><span id="coloreamela"></span></ul> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row"></div>
                        <input id="btn_filtramela" type="submit" name="submit" value="¡Filtrar!"/>
                        <div class="row"></div>
                    </form>  
                </nav>
            </div>
            <div class="col-md-8" >
                <ttbody>
                    <!--<aqui carga esta wea>-->
                </ttbody>
            </div>
        </div>
        <a id="catidad"></a>
        <a id="AquiGrupo"></a>
        <footer style="background: #f2f2f2">
            <div class="row">			
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="footer-border"></div>
                    <p>© 2017 México.   Todos los derechos reservados.
                        <br/>Precios son expresados en moneda nacional (MXN).
                        <br/>Los precios mostrados son unicamente referencias y pueden cambiar sin previo aviso.</p>
                </div>			
            </div>
        </footer>
        <script type="text/javascript" src="producto.js"></script>
<!--        <script type="text/javascript" src="sidebar.js"></script>-->
    </body>
</html>
