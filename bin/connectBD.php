<?php

class BD {

    protected $conexion;
    public $url_cva;
    public $str_codigo;
    public $str_marca;
    public $str_grupo;
    public $str_clave;
    public $str_tc; // tipo de cambio 1 USD
    public $str_promos;
    public $str_porcentaje;
    public $str_dc;
    public $str_dt;

    // Procedimiento para conectar 
    public function conectar() {
        $username = "desarrollo";
        $password = "Pa55w0rd!crm";

        $this->conexion = mysqli_connect("10.1.0.49", $username, $password, "ecommerce");
        /* Conectar a BD Local */
        // $this->conexion = mysqli_connect("localhost", "root", "", "ecommerce");

        if (mysqli_connect_errno($this->conexion)) {
            echo "Error al conectar con MySQL: " . mysqli_connect_error();
        }
    }

    // Procedimiento para cerrar conexion
    public function cerrar() {
        $this->conexion = NULL;
    }

    // Constructor Conecta a la BD
    function __construct() {
        $this->conectar();
        $this->url_cva = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813";
        $this->str_codigo = "&codigo=%";
        $this->str_marca = "&marca=%";
        $this->str_grupo = "&grupo=%";
        $this->str_clave = "&clave=%";
        $this->str_tc = "&tc=1"; // tipo de cambio 1 USD
        $this->str_promos = "&promos=";
        $this->str_porcentaje = "&porcentaje=";
        $this->str_dc = "&dc=";
        $this->str_dt = "&dt=";
    }

    // Destructor
    function __destruct() {
        $this->cerrar();
    }

    //	Procedimiento Login
    // Agregar encriptacion, buscar manual passwords php
    public function validarContra($usuario, $contra) {
        $sql = "SELECT contra FROM usuario WHERE id_usuario=" . $usuario;
        $pass = $this->conexion->query($sql);
        echo strcmp($pass['contra'], $contra); // 0 si son iguales
    }

    /* Agregar datos */

    // telefono, inerior, colonia, cruce 1 y 2, referencia pueden ser NULL
    public function agregarDireccion($direccion, $usuario, $nombre, $apellidos, $celular, $telefono, $calle, $exterior, $interior, $cp, $ciudad, $colonia, $cruce1, $cruce2) {
        $sql = "INSERT INTO direccion (id_usuario, nombre, apellidos, celular, telefono,
        calle, exterior, interior, cp, ciudad, colonia, cruce1, cruce2, referencia) 
        VALUES ('" . $usuario . "','"
                . $nombre . "','"
                . $apellidos . "','"
                . $celular . "',"
                . !is_null($telefono) ? "'" . $telefono . "','" : "NULL,'"
                . $calle . "','"
                . $exterior . "',"
                . !is_null($interior) ? "'" . $interior . "','" : "NULL,'"
                . $cp . "','"
                . $ciudad . "',"
                . !is_null($colonia) ? "'" . $colonia . "'," : "NULL,"
                . !is_null($cruce1) ? "'" . $cruce1 . "'," : "NULL,"
                . !is_null($cruce2) ? "'" . $cruce2 . "'," : "NULL,"
                . !is_null($referencia) ? "'" . $referencia . "'" : "NULL"
                . ")";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    public function agregarProducto($nombre, $imagen, $precio, $categoria, $descripcion, $fabricante, $existencias) {
        $sql = "INSERT INTO producto (nombre, imagen, precio, categoria, descripcion, fabricante, existencias)
        VALUES ('" . $nombre . "','" . $imagen . "','" . $precio . "','" . $categoria . "','" . $descripcion . "','" . $fabricante . "','" . $existencias . "')";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    public function agregarComentario($usuario, $producto, $comentario, $calificacion) {
        $sql = "INSERT INTO comentario (id_usuario, id_producto, comentario, calificacion)
        VALUES ('" . $usuario . "','" . $producto . "','" . $comentariio . "','" . $calificacion . "')";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    public function agregarEnvio($metodo, $descripcion, $empresa) {
        $sql = "INSERT INTO envios (metodo, descripcion, empresa)
        VALUES ('" . $metodo . "','" . $descripcion . "','" . $empresa . "')";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    public function agregarFavorito($usuario, $producto) {
        $sql = "INSERT INTO favoritos (id_usuario, id_producto)
        VALUES ('" . $usuario . "','" . $producto . "')";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    // Comentario puede ser NULL
    public function agregarLike($usuario, $producto, $megusta, $comentario) {
        $sql = "INSERT INTO gustar (id_nombre, id_producto, comentario, megusta)
        VALUES ('" . $usuario . "','" . $producto . "',"
                . !is_null($comentario) ? "'" . $comentario . "'" : "NULL"
                . ",'" . $megusta . "')";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    // Agrega numero de guia
    public function agregarGuiaOrden($orden, $guia) {
        $sql = "UPDATE ordenes SET guia='" . $guia . "' WHERE id_ordenes='" . $orden . "'";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    // Comentario puede ser NULL
    public function agregarValoracion($usuario, $ordenes, $envio, $concordancia, $experiencia, $promedio, $comentario) {
        $sql = "INSERT INTO valoraciones (id_usuario, id_orden, envio, concordancia, experiencia, promedio, comentario)
		VALUES ('" . $usuario . "','" . $ordenes . "','" . $envio . "','" . $concordancia . "','" . $experiencia . "','" . $promedio . "'," .
                (!is_null($comentario) ? "'" . $comentario . "'" : "NULL") . ")";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    /* Obtner datos */

    public function getDireccion($usuario) {
        $sql = "SELECT * FROM direccion WHERE id_usuario = " . $id;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_direccion'] . "||";
            echo $row['nombre'] . "||";
            echo $row['apellidos'] . "||";
            echo $row['celular'] . "||";
            echo $row['telefono'] . "||";
            echo $row['calle'] . "||";
            echo $row['exterior'] . "||";
            echo $row['interior'] . "||";
            echo $row['cp'] . "||";
            echo $row['estado'] . "||";
            echo $row['ciudad'] . "||";
            echo $row['colonia'] . "||";
            echo $row['cruce1'] . "||";
            echo $row['cruce2'] . "||";
            echo $row['refrencia'] . "||";
        }
    }

    // Solo necesita un parametro, los demas a NULL
    public function getProducto($id, $nombre, $categoria) {
        if (!is_null($id)) {
            $sql = "SELECT * FROM producto WHERE id_producto = " . $id;
        } else if (!is_null($nombre)) {
            $sql = "SELECT * FROM producto WHERE nombre = '" . $nombre . "'";
        } else if (!is_null($categoria)) {
            $sql = "SELECT * FROM producto WHERE categoria = '" . $categoria . "'";
        } else {
            echo "NOPE";
        }
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_producto'] . "||";
            echo $row['nombre'] . "||";
            echo $row['imagen'] . "||";
            echo $row['precio'] . "||";
            echo $row['categoria'] . "||";
            echo $row['descripcion'] . "||";
            echo $row['fabricante'] . "||";
            echo $row['existencias'] . "||";
        }
    }

    public function getComentario($usuario, $producto) {
        $sql = "SELECT comentario, calificacion FROM comentario WHERE id_usuario=" . $usuario . " AND id_producto=" . $producto;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['comentario'] . "||";
            echo $row['calificacion'] . "||";
        }
    }

    // regresa todos los tipos de envios
    public function getEnvios() {
        $sql = "SELECT * FROM envios";
        $datos = array();
        foreach ($this->conexion->query($sql) as $row) {
            array_push($datos, $row);
        }
        echo json_encode($datos);
    }

    public function getDatosEnvio($envio) {
        $sql = "SELECT metodo, empresa FROM envios WHERE id_envios=" . $envio;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['metodo'] . "||";
            echo $row['empresa'] . "||";
        }
    }

    public function getFavoritos($usuario) {
        $sql = "SELECT id_producto FROM favoritos WHERE id_usuario=" . $usuario;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_producto'] . "||";
        }
    }

    // Muestra la cantidad y luego todos los comentarios
    public function getLikesProducto($producto) {
        $aux = true;
        $sql = "SELECT COUNT(megusta) AS cantidad, comentario FROM gustar WHERE id_producto=" . $producto;
        foreach ($this->conexion->query($sql) as $row) {
            if ($aux) {
                echo $row['cantidad'] . "||";
                $aux = false;
            }
            echo $row['comentario'] . "||";
        }
    }

    public function getLikesUsuario($usuario, $producto) {
        $sql = "SELECT megusta FROM gustar WHERE id_usuario=" . $usuario . " AND id_producto=" . $producto;
        $valor = $this->conexion->query($sql);
        echo $valor['megusta'];
    }

    public function getOrdenes($usuario) {
        $sql = "SELECT id_ordenes, id_direccion, id_envio, fecha, total, metodo_pago, estado, guia FROM ordenes WHERE id_usuario=" . $usuario;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_ordenes'] . "||";
            echo $row['id_direccion'] . "||";
            echo $row['id_envio'] . "||";
            echo $row['fecha'] . "||";
            echo $row['total'] . "||";
            echo $row['metodo_pago'] . "||";
            echo $row['estado'] . "||";
            echo $row['guia'] . "||";
        }
    }

    public function getProductosOrden($orden) {
        $sql = "SELECT id_producto, cantidad, subtotal FROM productos_orden WHERE id_orden=" . $orden;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_producto'] . "||";
            echo $row['cantidad'] . "||";
            echo $row['subtotal'] . "||";
        }
    }

    public function getValoraciones($usuario, $orden) {
        $sql = "SELECT envio, concordancia, experiencia, promedio, comentario
		FROM valoraciones WHERE id_usuario=" . $usuario . " AND id_orden=" . $orden;
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['envio'] . "||";
            echo $row['concordancia'] . "||";
            echo $row['experiencia'] . "||";
            echo $row['promedio'] . "||";
            echo $row['comentario'] . "||";
        }
    }

    /* Actualizar datos */

    public function cambiarEstadoOrden($orden, $estado) {
        $sql = "UPDATE ordenes SET estado = " . estado . " WHERE id_ordenes=" . $orden;
        // 1 se realizo consulta con exito, 0 no se realizo
        echo $this->conexion->query($sql) ? "1" : "0";
    }

    /* Eliminar datos */

    public function borrarDireccion($direccion) {
        $sql = "DELETE FROM direccion WHERE id_direccion=" . $direccion;
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    public function borrarFavoritos($usuario, $producto) {
        $sql = "DELETE FROM favoritos WHERE id_usuario=" . $usuario . " AND id_producto=" . $producto;
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    public function borrarLike($usuario, $producto) {
        $sql = "DELETE FROM gustar WHERE id_usuario=" . $usuario . " AND id_producto=" . $producto;
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
    }

    /*     * ***************** NO USAR PELIGRUS!!! ****************** */

    function verTodosProductos() {
        $filename = $url_cva . "&marca=%&grupo=%&clave=%&codigo=%";
        set_time_limit(5000);
        $articulos = simplexml_load_file($filename);
        echo json_encode($articulo);
    }

    /*     * ****************** FIN DEL PELIGRUS ******************** */


    /* SATANAS */

    public function getCategorias() {
        $sql = "SELECT * FROM super_categorias";
        $datos = [];
        foreach ($this->conexion->query($sql) as $row) {
            array_push($datos, $row);
        }
        echo json_encode($datos);
    }

    public function getSubcategorias($categoria) {
        $sql = 'SELECT * FROM relacion_categorias WHERE id_supercategoria = "' . $categoria . '"';
        if ($categoria === "666")
            $sql = 'SELECT * FROM relacion_categorias WHERE 1';
        $datos = [];
        foreach ($this->conexion->query($sql) as $row) {
            array_push($datos, $row);
        }
        echo json_encode($datos);
    }

    public function getEstadoCategoria($categoria) {
        $sql = 'SELECT * FROM categoria WHERE nombre = "' . $categoria . '"';
        if ($categoria === "666")
            $sql = 'SELECT * FROM categoria';
        $datos = [];
        foreach ($this->conexion->query($sql) as $row) {
            array_push($datos, $row);
        }
        echo json_encode($datos);
    }

    public function eliminarCategoriasRepetidas() {
        $sql = 'DELETE FROM categoria WHERE id_categoria IN (SELECT id_categoria FROM (SELECT * FROM categoria LEFT JOIN (SELECT MIN(id_categoria) AS id FROM categoria GROUP BY nombre) AS mantener ON mantener.id = categoria.id_categoria) AS res WHERE id IS NULL)';
        echo $con->query($sql) ? "Borradas categorias duplicadas" : "Imposible borrar";
    }

    public function getParametros() {
        $sql = "SELECT * FROM parametros WHERE 1";
        foreach ($this->conexion->query($sql) as $row)
            echo json_encode($row);
    }

    public function setTipoCambio() {
        $sql = "SELECT * FROM producto ORDER BY RAND() LIMIT 1";
        foreach ($this->conexion->query($sql) as $res)
            $filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=" . $res["codigo_fabricante"] . "&tc=1";
        $articulo = simplexml_load_file($filename);
        $valor = $articulo->item->tipocambio;
        $sql = "UPDATE parametros SET tipo_cambio=" . $valor . " WHERE 1";
        $this->conexion->query($sql);
    }

    public function setCompraMaxima($valor) {
        $sql = "UPDATE parametros SET compra_maxima=" . $valor . " WHERE 1";
        $this->conexion->query($sql);
    }

    public function setValorAgregado($valor) {
        $sql = "UPDATE parametros SET agregado=" . $valor . " WHERE 1";
        $this->conexion->query($sql);
    }

    public function busqueda($categoria, $palabras) {
        $sql = [];
        if ($categoria === "Todo")
            foreach ($palabras as $busqueda) {
                if (substr($busqueda, -1) == 'S')
                    $busqueda = substr($busqueda, strlen($busqueda) - 1);
                array_push($sql, "SELECT * FROM producto WHERE descripcion LIKE '%" . $busqueda . "%' OR grupo LIKE '%" . $busqueda . "%' GROUP BY codigo_fabricante ORDER BY departamento");
            } else
            foreach ($palabras as $busqueda) {
                if (substr($busqueda, -1) == 'S')
                    $busqueda = substr($busqueda, strlen($busqueda) - 1);
                array_push($sql, "SELECT * FROM (SELECT * FROM producto WHERE producto.grupo IN (SELECT id_categoria FROM relacion_categorias WHERE id_supercategoria='" . $categoria . "')) AS res WHERE descripcion LIKE '%" . $busqueda . "%' OR grupo LIKE '%" . $busqueda . "%' ORDER BY departamento");
            }
        $arr = [];
        foreach ($sql as $consulta) {
            $datos = [];
            foreach ($this->conexion->query($consulta) as $row) {
                // if(sizeof($datos) >= 100)
                //     break;
                array_push($datos, $row);
            }
            array_push($arr, $datos);
        }
        echo json_encode($arr);
    }

    public function productosInicio() {
        $sql = "SELECT * FROM (SELECT * FROM producto WHERE INSTR(departamento, 'A') AND NOT departamento = 'POR SALIR') AS resultados ORDER BY RAND() LIMIT 12";
        $datos = [];
        foreach ($this->conexion->query($sql) as $row) {
            array_push($datos, $row);
        }
        echo json_encode($datos);
    }

    public function getCarousel($busqueda) {
        if ($busqueda == "Todo")
            $sql = "SELECT * FROM (SELECT * FROM producto WHERE INSTR(departamento, 'A') AND NOT departamento = 'POR SALIR') AS resultados ORDER BY RAND() LIMIT 12";
        else
            $sql = "SELECT * FROM (SELECT * FROM producto WHERE INSTR(departamento, 'A') AND NOT departamento = 'POR SALIR' AND grupo = '" . $busqueda . "') AS resultados ORDER BY RAND() LIMIT 12";
        $datos = [];
        foreach ($this->conexion->query($sql) as $row) {
            array_push($datos, $row);
        }
        echo json_encode($datos);
    }

    public function getExcepciones($codigo) {
        $sql = "SELECT marca FROM producto WHERE codigo_fabricante = '" . $codigo . "'";
        $sql_excepcion = "SELECT marca FROM excepciones_marcas WHERE 1";
        foreach ($this->conexion->query($sql) as $res)
            $aux = $res['marca'];
        foreach ($this->conexion->query($sql_excepcion) as $res)
            if ($res['marca'] == $aux)
                return "1";
        return "0";
    }

    /*     * ******** */
    /* parte del chuy */
    /* Agregar datos */

    public function agregarUsuario($nombre, $apellidos, $correo, $contra) {
        // $add=rand(10,3000);
        $tipo = 0;  // 0 para usuarios 1 para admin
        $sql = "INSERT INTO usuario(nombre, apellidos, correo, contra, tipo) VALUES ('" . $nombre . "','" . $apellidos . "','" . $correo . "','" . $contra . "'," . $tipo . ")";
        echo $this->conexion->query($sql) ? "1" : "0";
        //echo $add;    
    }

    public function agregardirecciones($txtnombredire, $txtapellidodire, $txttelefonodire, $txttelefono2dire, $txtcalledire, $txtexteriordire, $txtinteriordire, $txtcodigopostaldire, $txtselectestado, $txtciudad, $colonia, $txtcruseros, $txtcrusero2, $txtreferencia) {
        $sql = "SELECT id_usuario FROM usuario";
        foreach ($this->conexion->query($sql) as $row) {
            $row['id_usuario'];
        }
        $sqlInser = "INSERT INTO direccion(id_usuario, nombre, apellidos, celular, telefono, calle, exterior, interior, cp, estado, ciudad, colonia, cruce1, cruce2, refrencia) VALUES (" . $row['id_usuario'] . ",'" . $txtnombredire . "','" . $txtapellidodire . "'," . $txttelefonodire . "," . $txttelefono2dire . ",'" . $txtcalledire . "'," . $txtexteriordire . "," . $txtinteriordire . "," . $txtcodigopostaldire . "," . $txtselectestado . ",'" . $txtciudad . "','" . $colonia . "','" . $txtcruseros . "','" . $txtcrusero2 . "','" . $txtreferencia . "')";
        // echo $sqlInser;
        echo $this->conexion->query($sqlInser) ? "1" : "0";
    }

    /*
      public function confirmacion() {

      } */

    public function estado() {
        $sql = "SELECT estado_id, estado from estados";
        $estados = $this->conexion->query($sql);
        foreach ($estados as $rowestados) {
            echo utf8_encode("<option value='" . $rowestados['estado_id'] . "'>" . $rowestados['estado'] . "</option>");
        }
    }

    public function cambio_de_contrasena($txtantiguoscontra, $txtnuevocontra) {
        $sql = "UPDATE usuario SET contra='" . $txtnuevocontra . "' WHERE contra='" . $txtantiguoscontra . "'";
        echo $this->conexion->query($sql) ? "1" : "0";
    }

    public function revicioncorreos($correos_Email) {
        require 'PHPMailer/PHPMailerAutoload.php';
        $titulo = "Recordar contraseña";
        $d = rand(10, 3000);
        $message = "Tu password es :" . $d;

        $mail = new PHPMailer();
        $mail->setFrom('jesusvalenciatrejo7@gmail.com', 'Mensaje de prueba');
        $mail->addAddress($correos_Email, $message);
        $mail->Subject = $titulo;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $body = '
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Soporte Softernium</title>       
    </head>
    <body>
        <div id="cuerpo">
            <a href="http://127.0.0.1/Ecommerce/modulos/login/cambiarcontrasena.php">Recuperar Mi Contraseña</a>                                          
             ' . $message . '
        </div>
    <div id="pie">
        Este mensaje fue dirigido a &lt;
        ' . $correos_Email . '&gt;Este correo es enviado de forma automáticamente para validar su cuneta de confirmacion o de cambio de contraseña.
    </div>
    </body>
    </html>';
        $mail->Body = $body;
        if (!$mail->send()) {
            echo "<p class='text-danger'>.Mensaje no enviado.</p>";
        } else {
            //echo $body;

            echo '1';
        }
    }

    public function cuenta($cuentacorreos, $cuentaclave) {
        $sql = "select correo , contra from usuario where correo='" . $cuentacorreos . "'";
        $datoss = $this->conexion->query($sql);
        foreach ($datoss as $row) {
            if (($cuentacorreos == $row['correo']) && ($cuentaclave == $row['contra'])) {
                echo $row['correo'] . "||";
                echo $row['contra'] . "||";
            }
        }
    }

    public function validarContrasena($idusuarioss) {
        $sql = "select correo from usuario where id_usuario=" . $idusuarioss;
        $correo = [];
        foreach ($this->conexion->query($sql) as $rowcorreo) {
            array_push($correo, $rowcorreo);
        }
        echo json_encode($correo);
    }

    public function agregarOrden($usuario, $direccion, $envio, $total, $metodo_pago, $estado) {
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y H:i:s', time());
        $sql = "INSERT INTO ordenes(id_usuario, id_direccion, id_envio, fecha, total, metodo_pago, estado)
           VALUES ('" . $usuario . "','" . $direccion . "','" . $envio . "',
           STR_TO_DATE('" . $fecha . "', '%d/%m/%Y %H:%i:%s'),'" .
                $total . "','" . $metodo_pago . "'," . $estado . ")";
        $this->conexion->query($sql) ? "1" : "0";
        $sql = "select id_ordenes from ordenes where id_usuario='" . $usuario . "' and estado='" . $estado . "' and fecha=STR_TO_DATE('" . $fecha . "','%d/%m/%Y %H:%i:%s')";
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_ordenes'];
        }
    }

    public function producto_orden($id_codigo, $codigoF, $cantidad) {
        $sql = "INSERT INTO productos_orden (id_orden, id_producto, cantidad)VALUES('" . $id_codigo . "','" . $codigoF . "','" . $cantidad . "')";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito           
    }

    public function getdireccionesusuario($idusuario) {
        $sql = "select id_usuario, id_direccion from direccion  where id_usuario='" . $idusuario . "'";
        $usuarioDireciones = [];
        foreach ($this->conexion->query($sql) as $rowusuario) {

            array_push($usuarioDireciones, $rowusuario);
        }
        echo json_encode($usuarioDireciones);
    }

    public function getcarruselfooter() {
        $sql = "SELECT imagen, descripcion, precio, departamento ,marca FROM producto WHERE departamento='A' order by rand(), precio desc limit 4";
        $arrnewfooter = [];
        foreach ($this->conexion->query($sql) as $rownewfooter) {
            array_push($arrnewfooter, $rownewfooter);
        }
        echo json_encode($arrnewfooter);
    }

    public function login($correo, $contra) {

        $sql = "SELECT id_usuario, nombre, apellidos, correo, contra FROM usuario WHERE correo = '" . $correo . "' AND contra = '" . $contra . "'";
        $datos = $this->conexion->query($sql);
        if ($datos != false) {//Si la consulta funciona imprime los datos
            foreach ($datos as $row) {
                if ($correo === $row['correo'] || $contra === $row['contra']) {
                    echo $row['id_usuario'] . "||";
                    echo $row['nombre'] . "||";
                    echo $_SESSION['nombre'] = $row['nombre'];
                    echo $_SESSION['apellidos'] = $row['apellidos'];
                    //echo $_SESSION['Bienvenido'] = "Bienvenido :";
                    echo $_SESSION['id'] = $row['id_usuario'];
                }
            }
        }
    }

    public function mostrarordenes($id_usuariosesion) {
        $sql = "select usuario.id_usuario,usuario.nombre,usuario.apellidos,ordenes.estado,ordenes.fecha,direccion.nombre,productos_orden.cantidad,producto.codigo_fabricante,producto.descripcion,producto.precio,producto.marca,ordenes.total,producto.imagen from ordenes, direccion, usuario, productos_orden, producto where ordenes.id_ordenes=productos_orden.id_orden and productos_orden.id_producto=producto.codigo_fabricante and producto.codigo_fabricante=productos_orden.id_producto and direccion.id_direccion=ordenes.id_direccion and  ordenes.id_usuario=usuario.id_usuario and usuario.id_usuario='" . $id_usuariosesion . "' order by ordenes.fecha DESC";
        $arr = [];
        foreach ($this->conexion->query($sql) as $rowordenar) {
            array_push($arr, $rowordenar);
        }
        echo json_encode($arr);
    }

    public function mostrarordenesdetalles($id_ordenproductodetalle) {
        $sql = "select producto.codigo_fabricante,producto.descripcion,producto.precio,producto.grupo, producto.marca, producto.imagen, ordenes.total,ordenes.fecha,ordenes.metodo_pago, productos_orden.cantidad from ordenes, productos_orden, producto where ordenes.id_ordenes=productos_orden.id_orden and productos_orden.id_producto=producto.codigo_fabricante and producto.codigo_fabricante LIKE'" . $id_ordenproductodetalle . "%'";
        $arraydetalles = [];
        foreach ($this->conexion->query($sql) as $rowordenardetalle) {
            array_push($arraydetalles, $rowordenardetalle);
        }
        echo json_encode($arraydetalles);
    }

    public function actualizarDatosUsuario($id, $nombre, $apellidos, $dia, $mes, $anio, $correos, $contra) {
        $sql = "UPDATE usuario SET id_usuario='" . $id . "', nombre='" . $nombre . "', apellidos='" . $apellidos . "',dia='" . $dia . "', mes='" . $mes . "',anio='" . $anio . "' ,correo='" . $correos . "',contra='" . $contra . "' WHERE id_usuario='" . $id . "'";
        $sqld = "UPDATE direccion SET id_usuario='" . $id . "', nombre='" . $nombre . "', apellidos='" . $apellidos . "' WHERE id_usuario='" . $id . "'";
        //echo $sql;

        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
        echo $this->conexion->query($sqld) ? "1" : "0";
    }

    public function getUsuario($id, $correo) {
        if (!is_null($id)) {
            $sql = "SELECT * FROM usuario WHERE id_usuario = " . $id;
        } else if (!is_null($correo)) {
            $sql = "SELECT * FROM usuario WHERE nombre = '" . $nombre . "'";
        } else {
            echo "NOPE";
        }
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_usuario'] . "||";
            echo $row['nombre'] . "||";
            echo $row['apellidos'] . "||";
            echo $row['dia'] . "||";
            echo $row['mes'] . "||";
            echo $row['anio'] . "||";
            echo $row['correo'] . "||";
            echo $row['contra'] . "||";
            echo $row['tipo'] . "||";
        }
    }

    /* Anton */

    public function VerSelectivo($subcat, $lugar, $marca, $envio, $Pmin, $Pmax, $orden, $color) {
        $min = ($lugar - 1) * 20;
        $max = $min + 20;
        if ($color !== "") {
            $colores = explode("/", $color);
            $color = "";
            foreach ($colores as $col) {
                if ($col !== "") {
                    if ($color == "")
                        $color = " color like '%" . $col . "%' ";
                    else
                        $color = $color . " or color like '%" . $col . "%' ";
                }
            }
            $color = " and (" . $color . ") ";
        }

        switch ($orden) {
            case "normal":
                $ordenamiento = "";
                break;

            case "mayor":
                $ordenamiento = "order by precio desc";
                break;

            case "menor":
                $ordenamiento = "order by precio asc";
                break;

            case "alfa":
                $ordenamiento = "order by descripcion asc";
                break;

            case "invalfa":
                $ordenamiento = "order by descripcion desc";
                break;
        }

        $ordenamiento = $color . $ordenamiento;

        $filtros = ' AND precio >' . $Pmin . ' AND precio <' . $Pmax . '  ';

        switch ($envio) {
            case "Local":
                $filtros .= " AND GDL >0 ";
                break;

            case "Foraneo":
                $filtros .= " AND CDMX >0 ";
                break;
        }

        if ($marca == "undefined")
            $marca = "";

        if ($marca !== "" || $marca == "totaliti") {
            $marca_unica = explode("$", $marca);
            $marca = "";
            foreach ($marca_unica as $mar) {
                if ($mar !== "") {
                    if ($marca == "")
                        $marca = " marca like '%" . $mar . "%' ";
                    else
                        $marca = $marca . " or marca like '%" . $mar . "%' ";
                }
            }
            $marca = " and (" . $marca . ") ";
        } else
            $marca = "";


        $filtros .= $marca . $ordenamiento;


        $sql = "select * from producto where grupo='" . $subcat . "' " . $filtros . " limit " . $min . "," . $max;

        $buscado = $this->conexion->query($sql);
        error_reporting(0);
        for ($x = 0; $x < 20; $x++) {
            $fila = mysqli_fetch_array($buscado);
            if (isset($fila['descripcion'])) {
                $articulos->item[$x]->descripcion = $fila['descripcion'];
                $articulos->item[$x]->imagen = $fila['imagen'];
                $articulos->item[$x]->codigo_fabricante = $fila['codigo_fabricante'];
                $articulos->item[$x]->precio = $fila['precio'];
            }
        }
        echo json_encode($articulos);
    }

    public function verCantidad($grupo, $cantidad, $marca, $envio, $Pmin, $Pmax, $orden, $color) {
        error_reporting(0);
        $aux = $color;
        if ($color !== "") {
            $colores = explode("/", $color);
            $color = "";
            foreach ($colores as $col) {
                if ($col !== "") {
                    if ($color == "")
                        $color = " color like '%" . $col . "%' ";
                    else
                        $color = $color . " or color like '%" . $col . "%' ";
                }
            }
            $color = " and (" . $color . ") ";
        }



        $filtros = ' AND precio >' . $Pmin . ' AND precio <' . $Pmax . '  ';

        switch ($envio) {
            case "Local":
                $filtros .= " AND GDL >0 ";
                break;

            case "Foraneo":
                $filtros .= " AND CDMX >0 ";
                break;
        }

        if ($marca == "undefined")
            $marca = "";

        if ($marca !== "" || $marca == "totaliti") {
            $marca_unica = explode("$", $marca);
            $marca = "";
            foreach ($marca_unica as $mar) {
                if ($mar !== "") {
                    if ($marca == "")
                        $marca = " marca='" . $mar . "' ";
                    else
                        $marca = $marca . " or marca='" . $mar . "'";
                }
            }
            $marca = " and (" . $marca . ") ";
        } else
            $marca = "";


        $filtros .= $marca . $ordenamiento;

        $sql = "select count(*) from producto where grupo='" . $grupo . "'" . $color . $filtros;

        if ($aux !== "" || $aux !== null)
            $color = "&color=" . $aux;
        else
            $color = "";

        $cantidad_productos = $this->conexion->query($sql);
        $cantidad_grupo = mysqli_fetch_array($cantidad_productos);
        echo $cantidad_grupo['count(*)'];
    }

    public function verMarcas($grupo) {
        error_reporting(0);
        $sql = 'SELECT DISTINCT(marca) FROM producto WHERE grupo = "' . $grupo . '"';
        $cantidad_marcas = $this->conexion->query($sql);
        $x = 0;
        while ($fila = mysqli_fetch_array($cantidad_marcas)) {
            $marca[$x] = $fila['marca'];
            $x++;
        }
        $x = 0;
        foreach ($marca as $numero_m) {
            $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" and marca="' . $numero_m . '"';
            $cantidad_marcas = $this->conexion->query($sql);
            $fila = mysqli_fetch_array($cantidad_marcas);
            $marca[$x] .= "%" . $fila['count(*)'];
            $x++;
        }
        foreach ($marca as $verMarca) {
            echo $verMarca . ";";
        }
    }

    public function verCapacidad($capacidad, $categoria, $posicion, $marca, $envio, $min, $max, $orden, $color) {
        if ($color !== "") {
            $colores = explode("/", $color);
            $color = "";
            foreach ($colores as $col) {
                if ($col !== "") {
                    if ($color == "")
                        $color = " color like '%" . $col . "%' ";
                    else
                        $color = $color . " or color like '%" . $col . "%' ";
                }
            }
            $color = " and (" . $color . ") ";
        }

        $sql_extra = "";
        if ($marca == "undefined")
            $marca = "";

        if ($marca !== "" || $marca == "totaliti") {
            $marca_unica = explode("$", $marca);
            $marca = "";
            foreach ($marca_unica as $mar) {
                if ($mar !== "") {
                    if ($marca == "")
                        $marca = " marca like '%" . $mar . "%' ";
                    else
                        $marca = $marca . " or marca like '%" . $mar . "%' ";
                }
            }
            $marca = " and (" . $marca . ") ";
        } else
            $marca = "";

        $sql_extra = $marca;


        switch ($envio) {
            case "Foraneo":
                $sql_extra += " and CDMX>0 ";
                break;

            case "Local":
                $sql_extra += " and GDL>0 ";
                break;
        }
        switch ($orden) {
            case "normal":
                $ordenamiento = "";
                break;

            case "mayor":
                $ordenamiento = "order by precio desc";
                break;

            case "menor":
                $ordenamiento = "order by precio asc";
                break;

            case "alfa":
                $ordenamiento = "order by descripcion asc";
                break;

            case "invalfa":
                $ordenamiento = "order by descripcion desc";
                break;
        }
        $sql_extra = $sql_extra . $color . " " . $ordenamiento;
        error_reporting(0);


        $capacidades = explode("$", $capacidad[0]);
        $x = 0;
        foreach ($capacidades as $busqueda) {
            $sql = "select * from producto where grupo='" . $categoria . "' and GB=" . $busqueda . $sql_extra;
            $resultado = $this->conexion->query($sql);
            while ($recorrido = mysqli_fetch_array($resultado)) {
                $articulos->item[$x]->descripcion = $recorrido['descripcion'];
                $articulos->item[$x]->precio = $recorrido['precio'];
                $articulos->item[$x]->imagen = $recorrido['imagen'];
                $articulos->item[$x]->codigo_fabricante = $recorrido['codigo_fabricante'];
                $x++;
            }
        }


        $y = 0;
        $capacidades = explode("$", $capacidad[1]);
        foreach ($capacidades as $busqueda) {

            $sql = "select * from producto where grupo='" . $categoria . "' and TB=" . $busqueda . $sql_extra;
            $resultado = $this->conexion->query($sql);
            while ($recorrido = mysqli_fetch_array($resultado)) {
                $item[$y]->descripcion = $recorrido['descripcion'];
                $item[$y]->precio = $recorrido['precio'];
                $item[$y]->imagen = $recorrido['imagen'];
                $item[$y]->codigo_fabricante = $recorrido['codigo_fabricante'];
                if (!(in_array($item, $articulos->item[$y]))) {
                    $articulos->item[$x] = $item[$y];
                    $y++;
                    $x++;
                }
            }
        }
        //$articulos= array_unique($articulos->item);
        echo json_encode($articulos);
    }

    public function verMemorias($categoria, $grupo) {
        error_reporting(0);
        $sql = "select distinct(TB) from producto where not tb='' and grupo='" . $grupo . "' order by TB asc";
        $resultado = $this->conexion->query($sql);
        while ($corrida = mysqli_fetch_array($resultado)) {
            echo $corrida['TB'] . "$";
        }
        echo "/";
        $sql = "select distinct(GB) from producto where not gb='' and grupo='" . $grupo . "' order by GB asc";
        $resultado = $this->conexion->query($sql);
        while ($corrida = mysqli_fetch_array($resultado)) {
            echo $corrida['GB'] . "$";
        }
    }

    public function verNumeroMemoria($tipo, $busqueda, $grupo) {
        error_reporting(0);

        $sql = "select count(" . $tipo . ") from producto where " . $tipo . "=" . $busqueda . " and grupo='" . $grupo . "'";
        $resultado = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($resultado);
        echo $corrida[0];
    }

    public function verCantidadColor($grupo, $color) {
        $sql = "SELECT count( * )FROM `producto` WHERE grupo='" . $grupo . "' and color LIKE '%" . $color . "%'";
        $resultado = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($resultado);
        echo $corrida[0];
    }

    public function verCantidadMarca($grupo, $marca) {
        $sql = "select count(*) from `producto` where grupo='" . $grupo . "' and marca='" . $marca . "'";
        $resultado = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($resultado);
        echo $corrida[0];
    }

    public function verMeterComentario($usuario, $calificacion, $comentario, $producto) {
        header("Content-Type: text/html;charset=utf-8");
        $sql = "select * from `usuario` where id_usuario='" . $usuario . "'";
        $resultado = $this->conexion->query($sql);
        if ($corrida = mysqli_fetch_array($resultado)) {
            $veces_comprado = 0;
            $sql = "select * from `ordenes` where id_usuario='" . $usuario . "'";
            $resultado = $this->conexion->query($sql);
            //recorre todas las ordenes del usuario y busca cuales coinciden con el producto
            while ($corrida = mysqli_fetch_array($resultado)) {
                $sql_orden = "select * from `productos_orden` where id_orden='" . $corrida['id_ordenes'] . "' and id_producto='" . $producto . "'";
                $resultado_orden = $this->conexion->query($sql_orden);
                if ($corrida_orden = mysqli_fetch_array($resultado_orden)) {
                    $veces_comprado++;
                }
            }
            $sql = "select count(*) from `comentarios` where id_usuario='" . $usuario . "' and codigo_fabricante='" . $producto . "'";
            $resultado = $this->conexion->query($sql);
            $corrida = mysqli_fetch_array($resultado);
            if ($corrida['count(*)'] < $veces_comprado) {
                $sql = "INSERT INTO `comentarios`("
                        . " `id_usuario`, `codigo_fabricante`, `comentario`, `calificacion`) "
                        . "VALUES ('" . $usuario . "','" . $producto . "','" . $comentario . "','" . $calificacion . "')";
                echo $this->conexion->query($sql) ? "Se ingreso el comentario con exito" : "Problemas al ingresar el comentario";
            } elseif ($corrida['count(*)'] !== "0") {
                echo "Ha pasado el limite de comentarios permitidos, para poder hacer mas comentarios lo invitamos a realizar otra compra.";
            } else
                echo "Debe comprar este producto para poder comentarlo";
        } else {
            echo "Inicia sesion para poder comentar";
        }
    }

    function verNumeroComentarios($producto) {
        $sql = "SELECT count(*) FROM `comentarios` WHERE codigo_fabricante ='" . $producto . "'";
        $resultado = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($resultado);
        if ($corrida[0] !== "0")
            echo "(<u>" . $corrida[0] . "</u>)";
        else {
            echo "";
        }
    }

    function verSoloCalificacionC($producto) {
        $sql = "SELECT AVG(calificacion) FROM `comentarios` WHERE codigo_fabricante ='" . $producto . "'";
        $resultado = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($resultado);
        echo ceil($corrida[0]);
    }

    function verComentarios($producto) {
        header("Content-Type: text/html;charset=utf-8");
        $sql = "SELECT * FROM `comentarios` WHERE codigo_fabricante ='" . $producto . "'";
        $resultado = $this->conexion->query($sql);
        while ($corrida = mysqli_fetch_array($resultado)) {
            $sql = "SELECT * FROM `usuario` WHERE id_usuario='" . $corrida[1] . "'";
            $usuario = $this->conexion->query($sql);
            $usuario = mysqli_fetch_array($usuario);
            $corrida[5] = $corrida[1];
            $corrida[1] = $usuario[1] . " " . $usuario[2];
            echo $corrida[1] . " --- ";
            echo $corrida[2] . " --- ";
            $corrida[3] = wordwrap($corrida[3], 26, "\n", true);
            echo $corrida[3] . " --- ";
            for ($y = 0; $y < $corrida[4]; $y++)
                echo "&#9733;";
            echo " --- ";
            echo $corrida[5];
            echo "////";
        }
    }

    function verlike($producto, $usuario) {
        if ($usuario !== "0") {
            $sql = "SELECT count(*) FROM `like_usuario_producto` WHERE codigo_fabricante ='" . $producto . "' and id_usuario='" . $usuario . "'";
        } else {
            $direccion = verdireccion_ip();
            $sql = "SELECT count(*) FROM `like_usuario_producto` WHERE codigo_fabricante ='" . $producto . "' and direccion_ip='" . $direccion . "'";
        }
        $consulta = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($consulta);
        if ($corrida[0] > 0)
            echo "like";
        else
            echo "nolike";
    }

    function vermeterlike($producto, $usuario) {
        if ($usuario !== "0") {
            $sql = "SELECT count(*) FROM `like_usuario_producto` WHERE codigo_fabricante ='" . $producto . "' and id_usuario='" . $usuario . "'";
        } else {
            $direccion = verdireccion_ip();
            $sql = "SELECT count(*) FROM `like_usuario_producto` WHERE codigo_fabricante ='" . $producto . "' and direccion_ip='" . $direccion . "'";
        }

        $consulta = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($consulta);
        if ($corrida[0] > 0) {
            if ($usuario !== "0") {
                $sql = "delete FROM `like_usuario_producto` WHERE codigo_fabricante ='" . $producto . "' and id_usuario='" . $usuario . "'";
            } else {
                $direccion = verdireccion_ip();
                $sql = "delete FROM `like_usuario_producto` WHERE codigo_fabricante ='" . $producto . "' and direccion_ip='" . $direccion . "'";
            }
            echo $consulta = $this->conexion->query($sql) ? "nolike" : "like";
        } else {
            if ($usuario !== "0") {
                $sql = "insert into `like_usuario_producto`(`id_usuario`, `codigo_fabricante`) values ('" . $usuario . "','" . $producto . "')";
            } else {
                $direccion = verdireccion_ip();
                $sql = "insert into `like_usuario_producto`(`direccion_ip`, `codigo_fabricante`) values ('" . $direccion . "','" . $producto . "')";
            }
            echo $consulta = $this->conexion->query($sql) ? "like" : "nolike";
        }
    }

    function vernumerolike($producto) {
        $sql = "select count(*) from `like_usuario_producto` where codigo_fabricante='" . $producto . "'";
        $consulta = $this->conexion->query($sql);
        $corrida = mysqli_fetch_array($consulta);
        if ($corrida[0] > 0) {
            echo "(" . $corrida[0] . ")";
        } else
            echo "";
    }

    function vermeterfavorito($producto, $usuario) {
        $sql = "select * from `usuario` where id_usuario='" . $usuario . "'";
        $resultado = $this->conexion->query($sql);
        if ($corrida = mysqli_fetch_array($resultado)) {
            $sql = "select count(*) from `favoritos` where id_usuario='" . $usuario . "' and codigo_fabricante='" . $producto . "'";
            $resultado = $this->conexion->query($sql);
            $corrida = mysqli_fetch_array($resultado);
            if ($corrida[0] > 0) {
                $sql = "delete FROM `favoritos` WHERE codigo_fabricante ='" . $producto . "' and id_usuario='" . $usuario . "'";
                echo $consulta = $this->conexion->query($sql) ? "ausente" : "presente";
            } else {
                $sql = "insert into `favoritos`(`id_usuario`, `codigo_fabricante`) values ('" . $usuario . "','" . $producto . "')";
                echo $consulta = $this->conexion->query($sql) ? "presente" : "ausente";
            }
        } else {
            echo "Inicia sesion para agregar el producto a favoritos";
        }
    }

    function verfavorito($producto, $usuario) {
        if ($usuario !== "0") {
            $sql = "select * from `usuario` where id_usuario='" . $usuario . "'";
            $resultado = $this->conexion->query($sql);
            if ($corrida = mysqli_fetch_array($resultado)) {
                $sql = "select count(*) from `favoritos` where id_usuario='" . $usuario . "' and codigo_fabricante='" . $producto . "'";
                $resultado = $this->conexion->query($sql);
                $corrida = mysqli_fetch_array($resultado);
                if ($corrida[0] > 0) {
                    echo "presente";
                } else {
                    echo "ausente";
                }
            } else {
                echo "Inicia sesion para agregar el producto a favoritos";
            }
        } else
            echo "";
    }

    function verfavoritos($usuario) {
        $sql = "select * from `favoritos` where id_usuario='" . $usuario . "'";
        $resultado = $this->conexion->query($sql);
        $salida = array();
        $x = 0;
        while ($corrida = mysqli_fetch_array($resultado)) {
            $sql = "SELECT * FROM `producto` WHERE codigo_fabricante='" . $corrida[2] . "'";
            $producto = $this->conexion->query($sql);
            $producto = mysqli_fetch_array($producto);
            if($producto!==null) {
                $salida[$x] = $producto; //codigo
                $x++;
            }
        }
        echo json_encode($salida);
    }

}

function verdireccion_ip() {
    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
        return $_SERVER["HTTP_X_FORWARDED"];
    } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
        return $_SERVER["HTTP_FORWARDED"];
    } else {
        return $_SERVER["REMOTE_ADDR"];
    }
}
