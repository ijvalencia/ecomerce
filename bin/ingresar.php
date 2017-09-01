<?php

session_start();

include 'connectBD.php';
$conexion = new BD();
$Menu = $_GET['categoria'];

if (isset($_GET['extra'])) {
    $Menu = "aux";
}
if ((isset($_GET['capacidadg'])) || (isset($_GET['capacidadt']))) {
    $Menu = "GB_TB";
}

switch ($Menu) {
// registro de para login
    case "registro":
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correos'];
        $contrasena = $_POST['contrasena'];
        $conexion->agregarUsuario($nombre, $apellido, $correo, $contrasena);
        break;

//inicio de sesionen
    case "email":
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];
        $conexion->login($correo, $contra);
        break;

    /* SATANAS */
    case "envios":
        $conexion->getEnvios();
        break;

    case "agregarOrden":
        $usuario = $_POST['usuario'];
        $direccion = $_POST['direccion'];
        $envio = $_POST['envio'];
        $total = $_POST['total'];
        $metodo_pago = $_POST['metodo_pago'];
        $conexion->agregarOrden($usuario, $direccion, $envio, $total, $metodo_pago, 1);
        break;

    case "sesion":
        if (!(isset($_SESSION['apellidos'])))
            $_SESSION['apellidos'] = "invitado";
        $usuario = array($_SESSION['nombre'], $_SESSION['apellidos'], $_SESSION['id'],);
        echo json_encode($usuario);
        break;

    case "getCarrito":
        $carrito = $_SESSION['carrito'];
        echo json_encode($carrito);
        break;

    case "setCarrito":
        if (isset($_POST['articulo'])) {
            $nuevo = $_POST['articulo'];
            if (isset($_SESSION['carrito'])) {
                $aux = true;
                $carrito = $_SESSION['carrito'];
                foreach ($carrito as $row) {
                    if ($row['codigo_fabricante'] === $nuevo['codigo_fabricante']) {
                        $aux = false;
                        break;
                    }
                }
                if ($aux) {
                    array_push($carrito, $nuevo);
                    $_SESSION['carrito'] = $carrito;
                    echo json_encode($carrito);
                }
            } else {
                $carrito = [];
                array_push($carrito, $nuevo);
                $_SESSION['carrito'] = $carrito;
            }
        } else
            echo "0";
        break;

    case "getArticulo":
        if (isset($_GET['codigo'])) {
            $resp = $conexion->getExcepciones($_GET['codigo']);
            if($resp === "1") {
                $filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&clave=".$_GET['codigo']."&tc=1&dc=1&dt=1";
            } else {
                $filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=".$_GET['codigo']."&tc=1&dc=1&dt=1";
            }
            try {
                $context = stream_context_create(array('http' => array('timeout' => 3)));
                $data = file_get_contents($filename, false, $context);
            } catch (Exception $e) {
                $filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&clave=".$_GET['codigo']."&tc=1&dc=1&dt=1";
                $context = stream_context_create(array('http' => array('timeout' => 3)));
                $data = file_get_contents($filename, false, $context);
            }
            if (!$data) {
                echo "{}";
            } else {
                $articulo = simplexml_load_string($data);
                if (sizeof($articulo) > 1) {
                    foreach ($articulo->item as $objeto) {
                        if (strcmp($objeto->codigo_fabricante, $_GET['codigo']) == 0) {
                            echo '{"item":' . json_encode($objeto) . '}';
                            break;
                        }
                    }
                } else {
                    echo json_encode($articulo);
                }
            }
        }
        break;

    case "articulos":
        //$filename= ("http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&marca=%&grupo=%&clave=%&codigo=%".$producto."&tc=1&promos=1&porcentaje=0");
        //$filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&marca=%25&grupo=%25&clave=%25&codigo=WD5000AZLX&tc=1&promos=1&porcentaje=0";
        $filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000&tc=1";
        $articulo = simplexml_load_file($filename);
        echo json_encode($articulo);
        break;
    
    case "cerrar":
        session_destroy();
        header('Location: ../index.php');
        break;
    case "getCategorias":
        $conexion->getCategorias();
        break;
    case "getSubcategorias":
        $conexion->getSubcategorias($_GET["subcategoria"]);
        break;
    case "getEstadoCategoria":
        $conexion->getEstadoCategoria($_GET["subcategoria"]);
        break;
    case "parametros":
        $conexion->setTipoCambio();
        $conexion->getParametros();
        break;
    case "buscar":
        $conexion->busqueda($_POST["categoria"], $_POST["palabras"]);
        break;
    case "productosInicio":
        $conexion->productosInicio();
        break;

    case "borrarCarrito":
        $carrito = $_SESSION['carrito'];
        array_splice($carrito, $_POST['articulo']);
        $_SESSION['carrito'] = $carrito;
        break;

    case "getCarousel":
        $conexion->getCarousel($_GET['clave']);
        break;
    /*     * ******** */
    //parte del chuy
    case "registrodirecion":
        $txtnombredire = $_POST['nombredire'];
        $txtapellidodire = $_POST['apellidodire'];
        $txttelefonodire = $_POST['telefono'];
        $txttelefono2dire = $_POST['telefono2'];
        $txtcalledire = $_POST['calle'];
        $txtexteriordire = $_POST['exterior'];
        $txtinteriordire = $_POST['interior'];
        $txtcodigopostaldire = $_POST['codigopostal'];
        $txtselectestado = $_POST['selectestado'];
        $txtciudad = $_POST['ciudad'];
        $colonia =$_POST["colonia"];
        $txtcruseros = $_POST['cruseros'];
        $txtcrusero2 = $_POST['crusero2'];
        $txtreferencia = $_POST['referencia'];
       
        $conexion->agregardirecciones($txtnombredire,$txtapellidodire,$txttelefonodire,$txttelefono2dire,$txtcalledire,$txtexteriordire,$txtinteriordire,$txtcodigopostaldire,$txtselectestado,$txtciudad,$colonia,$txtcruseros,$txtcrusero2 ,$txtreferencia);
    break;

    case "cambiarContraseña":
        $txtantiguoscontra = $_POST['antiguacontrasena'];
        $txtnuevocontra = $_POST['nuevacontrasena'];
        $conexion->cambio_de_contrasena($txtantiguoscontra, $txtnuevocontra);
        break;

    case "olvidecontrasena":
        //correo para enviar a gimail
        $correos_Email = $_POST['emaill'];
        $conexion->revicioncorreos($correos_Email);
        break;

    case "extraerCorreo":
        $idusuarioss = $_POST['idusuariocompras'];
        $conexion->validarContrasena($idusuarioss);
        break;

    case "compararcuentass":
        $cuentacorreos = $_POST['usuariocorreo'];
        $cuentaclave = $_POST['usuarioclave'];
        //$conexion->cuenta($cuentacorreos,$cuentaclave);        
        $checkrobot = $_POST["checkrobot"];

        if (!$checkrobot) {
            echo '<h2>Please check the the captcha form.</h2>';
            exit;
        }
        $secretKeyy = "";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKeyy . "&6Ld_1i0UAAAAABnfcJxUVLcQYlQmSQkcpe6KGNlX" . $checkrobot . "&remoteip=" . $ip);
        $responseKeyss = json_decode($response, true);
        if (intval($responseKeyss["success"]) !== 1) {

            echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else {

            echo '<h2>Thanks for posting comment.</h2>';
        }
        break;

    case "direccioness":
        $idusuario = $_POST['idusuarios'];
        $conexion->getdireccionesusuario($idusuario);
        break;

    case "agregarordenes":
        $usuario = $_POST['idusuario'];
        $direccion = $_POST['direccion'];
        $envio = $_POST['idenvio'];
        $total = $_POST['subtotal'];
        $metodo_pago = $_POST['metodo_pago'];
        //echo json_encode('50');
        $conexion->agregarOrden($usuario, $direccion, $envio, $total, $metodo_pago, 1);
        break;

    case "productos_Odenes":
        $id_codigo = $_POST['id_orden'];
        $codigoF = $_POST['codigoF'];
        $cantidad = $_POST['cantidad'];
        $conexion->producto_orden($id_codigo, $codigoF, $cantidad);
        break;


    case "usuariordendetalles":
        $id_ordenproductodetalle = $_POST["usuario"];
        $conexion->mostrarordenesdetalles($id_ordenproductodetalle);
        break;

    case "usuarioorden":
        $id_usuario = $_POST["usuario"];
        $conexion->mostrarordenes($id_usuario);
        break;

    case "orden":
        $conexion->getOrdenes();
        break;

    case "UpdateUsuario":
        $id = $_POST["id_usuario"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechadia = $_POST["fechadia"];
        $fechames = $_POST["fechames"];
        $fechaanio = $_POST["fechaanio"];
        // $sexo = $_POST["sexo"];
        $email = $_POST["email"];
        $pass = $_POST["passwor"];
        $conexion->actualizarDatosUsuario($id, $nombre, $apellido, $fechadia, $fechames, $fechaanio, $email, $pass);
        break;
    
    case "MostrarUsuarioId":
        $id = $_POST["id"];
        echo $id;
        $conexion->getUsuario($id, $correo = null);
        break;

    case "email":
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];
        $conexion->login($correo, $contra);
        break;

    case "registro":
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correos'];
        $contrasena = $_POST['contrasena'];
        $conexion->agregarUsuario($nombre, $apellido, $correo, $contrasena);
        $captcha = $_POST['robot'];

        if (!$captcha) {
            echo '<h2>Please check the the captcha form.</h2>';
            exit;
        }
	   	$secretKey = "";
	   	$ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&6Ld_1i0UAAAAABnfcJxUVLcQYlQmSQkcpe6KGNlX".$captcha."&remoteip=".$ip);
	   	$responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else {
            echo '<h2>Thanks for posting comment.</h2>';
        }
        break;

    /*     * ******* */
    /* Anton */
    case "aux":
        $variable = $_GET['categoria'];
        $posicion = $_GET['extra'];
        $marca = $_GET['marca'] or die("undefined");
        $envio = $_GET['envio'] or die("undefined");
        $min = $_GET['min'] + 1 or die("undefined");
        $max = $_GET['max'] + 1 or die("undefined");
        if (isset($_GET['orden']))
            if ($_GET['orden'] == "undefined")
                $orden = "normal";
            else
                $orden = $_GET['orden'];
        else
            $orden = "normal";

        if (isset($_GET['color'])) {
            $color = $_GET['color'];
        } else
            $color = "";
        if (empty($_GET['marca']))
            $marca = "undefined";
        //echo $variable, $posicion, $marca, $envio, $min, $max, $orden."<br>";
        $conexion->VerSelectivo($variable, $posicion, $marca, $envio, $min, $max, $orden, $color);
        break;

    case "listadocantidad":
        $variable = $_GET['grupo'];

        $posicion = $_GET['cantidad'] or die(1);
        if ($posicion == "") {
            $posicion = 1;
        }

        $marca = $_GET['marca'] or die("undefined");
        if ($marca == "") {
            $marca = "undefined";
        }

        $envio = $_GET['envio'] or die("undefined");
        if ($envio == "") {
            $envio = "undefined";
        }

        /* @var $_GET pe */
        $min = (isset($_GET['minn']) ? $_GET['minn'] : 0) + 1 or die("undefined");
        if ($min == "") {
            $min = "undefined";
        }

        $max = (isset($_GET['maxn']) ? $_GET['maxn'] : 0) + 1 or die("undefined");
        if ($max == "") {
            $max = "undefined";
        }

        if (isset($_GET['orden']))
            if ($_GET['orden'] == "undefined")
                $orden = "normal";
            else
                $orden = $_GET['orden'];
        else
            $orden = "normal";

        if ($min > 1) {
            $min--;
        }
        if ($max < 1) {
            $max = 250000;
        }
        if ($max == "undefined") {
            $max = 250000;
        }
        if ($min == "undefined") {
            $min = 1;
        }

        if (isset($_GET['color'])) {
            $color = $_GET['color'];
        } else
            $color = "";

        //echo $posicion."<br>".$marca."<br>".$envio."<br>".$min."<br>".$max."<br>";
        $conexion->verCantidad($variable, $posicion, $marca, $envio, $min, $max, $orden, $color);
        break;

    case "marcas":
        $grupo = $_GET['grupo'];
        $conexion->verMarcas($grupo);
        break;

    case "GB_TB":
        $capacidad[0] = $_GET['capacidadg'];
        $capacidad[1] = $_GET['capacidadt'];
        $categoria = $_GET['categoria'];
        $posicion = $_GET['extra'];
        $marca = $_GET['marca'];
        $envio = $_GET['envio'];
        $min = $_GET['min'] + 1;
        $max = $_GET['max'] + 1;
        if (isset($_GET['orden']))
            if ($_GET['orden'] == "undefined")
                $orden = "normal";
            else
                $orden = $_GET['orden'];
        else
            $orden = "normal";

        if (isset($_GET['color'])) {
            $color = $_GET['color'];
        } else
            $color = "";

        $conexion->verCapacidad($capacidad, $categoria, $posicion, $marca, $envio, $min, $max, $orden, $color);
        break;

    case "memoria":
        $categoria = $_GET['categoria'];
        $grupo = $_GET['grupo'];
        $conexion->verMemorias($categoria, $grupo);
        break;

    case "cantidad_memoria":
        if (isset($_GET['TB'])) {
            $TB = $_GET['TB'];
            $conexion->verNumeroMemoria("TB", $TB, $_GET['grupo']);
        }
        if (isset($_GET['GB'])) {
            $GB = $_GET['GB'];
            $conexion->verNumeroMemoria("GB", $GB, $_GET['grupo']);
        }
        break;

    case "contarColor":
        $categoria = $_GET['categoria'];
        $color = $_GET['color'];
        $grupo = $_GET['grupo'];
        $conexion->verCantidadColor($grupo, $color);
        break;

    case "contarMarca":
        $marca = $_GET['marca'];
        $grupo = $_GET['grupo'];
        $conexion->verCantidadMarca($grupo, $marca);
        break;

    case "meterComentario":
        header("Content-Type: text/html;charset=utf-8");
        $comentario = $_GET['comentario'];
        $calificacion = $_GET['calificacion'];
        $usuario = $_GET['usuario'];
        $producto = $_GET['producto'];
        $conexion->verMeterComentario($usuario, $calificacion, $comentario, $producto);
        break;
    case "verNumeroComentarios":
        $producto = $_GET['producto'];
        $conexion->verNumeroComentarios($producto);
        break;
    case "verComentarios":
        header("Content-Type: text/html;charset=utf-8");
        $producto = $_GET['producto'];
        $conexion->verComentarios($producto);
        break;
    case "verSoloCalificacionC":
        $producto = $_GET['producto'];
        $conexion->verSoloCalificacionC($producto);
        break;
    case "verlike":
        $producto = $_GET['producto'];
        $usuario = $_GET['usuario'];
        $conexion->verlike($producto, $usuario);
        break;
}
$conexion->cerrar();
unset($conexion);
//header('Location: localhost/ecomerce/Ecommerce1/index.php');
?>
