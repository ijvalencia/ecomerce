<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Favoritos</title>

        <?php include '../../bin/head.php'; ?>
        <?php include '../../bin/navbar.php'; ?>

    </head>
    <body>

        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="../../modulos/inicio/index.php">Inicio</a></li>
                            <li>Favoritos</li>
                        </ol>
                        <!-- Agregar bara de navegacion -->      
                        <div class="row">
                            <div class="col-md-12">
                                <table id="cart" class="table table-hover table-condensed">
                                    <thead border="2">
                                        <tr>
                                            <th style="width:60%" class="text-center">Tus Productos Favoritos.</th>
                                            <th style="width:20%" class="text-center"></th>
                                            <th style="width:8%"></th>
                                            <th style="width:12%"></th>
                                        </tr>
                                    </thead>
                                    <tbody> <!-- AQUI CARGAN LOS PRODUCTOS-->
                                    </tbody> <!-- AQUI TERMINAN DE CARGAR-->
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <?php include '../../bin/footer.php'; ?>

        <!-- Scripts -->
        <script src="favoritos.js"></script>
    </body>
</html>
