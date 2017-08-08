<?php

session_start();

include 'connectBD.php';
$conexion = new BD();
$Menu = $_GET['categoria'];

if (isset($_GET['extra'])) {
    $Menu = "aux";
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


    /* Parte hecha por Adrian */
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
            $filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=" . $_GET['codigo'] . "&tc=1&dc=1&dt=1";
            $context = stream_context_create(array('http' => array('timeout' => 3)));
            $data = file_get_contents($filename, false, $context);
            if(!$data){
                echo "{}";
            } else {
                $articulo = simplexml_load_string($data);
                echo json_encode($articulo);
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
    /*     * ********************************* */
    //parte del chuy
    case "ordenes":
          $agregardatos = $_POST["nombres"];
        
        echo $clave[0];
            /*$n1 = array($agregardatos);
            foreach($recolec as $clave=>$agregardatos){
                print_r($clave);
                echo $recolec;
                print_r($agregardatos);
              //echo json_decode($agregardatos);
             //print_r($agregardatos);
          }
           print_r($agregardatos);*/
         break;

    case "usuariordendetalles":
        $id_usuariosdetalles = $_POST["usuario"];
        $conexion->mostrarordenesdetalles($id_usuariosdetalles);
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
        break;

    /*     * ************************ */
    /* Anton */
    case "aux":
        $variable = $_GET['categoria'];
        $posicion = $_GET['extra'];
        //extra=1&marca=undefined&envio=undefined&min=undefined&max=undefined&categoria=OPTICOS;
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
        //echo $variable, $posicion, $marca, $envio, $min, $max, $orden."<br>";
        $conexion->VerSelectivo($variable, $posicion, $marca, $envio, $min, $max, $orden);
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
        //echo $posicion."<br>".$marca."<br>".$envio."<br>".$min."<br>".$max."<br>";

        $conexion->verCantidad($variable, $posicion, $marca, $envio, $min, $max, $orden);
        break;

    case "marcas":
        $grupo = $_GET['grupo'];
        $conexion->verMarcas($grupo);
        break;
}
$conexion->cerrar();
unset($conexion);
//header('Location: localhost/ecomerce/Ecommerce1/index.php');
?>