<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carrito</title>
        <?php include 'head.php'; ?>
    
    <body>    
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Agregar bara de navegacion -->
                            
                            <div class="row" style="text-align:left"> 
                                <a href="#">Inicio</a> 
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
                                                </td>
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
                <?php include 'footer.php';?>
                </div>
            </div>
        </div>
        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>