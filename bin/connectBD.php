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
        if (mysqli_connect_errno($this->conexion)) {
            echo "Error al conectar con MySQL: " . mysqli_connect_error();
        }

        /* Conectar a BD Local */
        /*$this->conexion = mysqli_connect("localhost", "root", "", "ecommerce");
        if (mysqli_connect_errno($this->conexion)) {
            echo "Error al conectar con MySQL: " . mysqli_connect_error();
        }*/
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

    public function agregarUsuario($nombre, $apellidos, $correo, $contra) {
        $tipo = 0;  // 0 para usuarios 1 para admin
        $sql = "INSERT INTO usuario(nombre, apellidos, correo, contra, tipo) VALUES ('" . $nombre . "','" . $apellidos . "','" . $correo . "','" . $contra . "'," . $tipo . ")";
        echo $this->conexion->query($sql) ? "1" : "0";
        //echo $sql;
    }

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

    // Imprime el numero de orden

    // Estado = 1 activa, 0 inactiva, -1 o 2 cancelada
    public function agregarOrden($usuario, $direccion, $envio, $total, $metodo_pago, $estado) {
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y H:i:s', time());
        $sql = "INSERT INTO ordenes(id_usuario, id_direccion, id_envio, fecha, total, metodo_pago, estado)
        VALUES ('" . $usuario . "','" . $direccion . "','" . $envio . "',
        STR_TO_DATE('" . $fecha . "', '%d/%m/%Y %H:%i:%s'),'" .
                $total . "','" . $metodo_pago . "'," . $estado . ")";
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito

        $sql = "SELECT id_ordenes FROM ordens
        WHERE id_usuario = '" . $usuario . "' AND fecha = STR_TO_DATE('" . $fecha . "', '%d/%m/%Y %H:%i:%s') AND estado = " . $estado;
        foreach ($this->conexion->query($sql) as $id) {
            echo $id['id_ordenes'];
        }
    }

    public function agregarProductosOrden($orden, $producto, $cantidad) {
        $sql = "INSERT INTO productos_orden (id_orden, producto, cantidad)
        VALUES ('" . $orden . "','" . $producto . "','" . $cantidad . "')";
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

    public function borrarComentario($usuario, $producto) {
        $sql = "DELETE FROM comentarios WHERE id_usuario=" . $usuario . " AND id_producto=" . $producto;
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
		$sql = 'SELECT  id_supercategoria, id_categoria FROM relacion_categorias WHERE id_supercategoria = "'.$categoria.'"';
		$datos = [];		
		foreach ($this->conexion->query($sql) as $row) {
			array_push($datos, $row);
		}
		echo json_encode($datos);
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
				array_push($sql, "SELECT * FROM producto WHERE INSTR(descripcion, ' ".$busqueda." ') OR INSTR(grupo, '".$busqueda."') GROUP BY codigo_fabricante ORDER BY departamento");
			}
		else
			foreach ($palabras as $busqueda) {
				array_push($sql, "SELECT * FROM (SELECT * FROM (SELECT id_categoria FROM relacion_categorias WHERE id_supercategoria = '".$categoria."') AS subcat INNER JOIN producto ON subcat.id_categoria = producto.grupo) AS grupos WHERE INSTR(descripcion, ' ".$busqueda." ') ORDER BY departamento");
			}
		$arr = [];
		foreach ($sql as $consulta) {
			$datos = [];		
			foreach ($this->conexion->query($consulta) as $row) {
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
			$sql = "SELECT * FROM (SELECT * FROM producto WHERE INSTR(departamento, 'A') AND NOT departamento = 'POR SALIR' AND grupo = '".$busqueda."') AS resultados ORDER BY RAND() LIMIT 12";	
		$datos = [];
		foreach ($this->conexion->query($sql) as $row) {
			array_push($datos, $row);
		}
		echo json_encode($datos);  
	}
	/***********/
    /* parte del chuy  */
    public function getcarruselfooter(){
        $sql = "SELECT imagen, descripcion, precio, departamento ,marca FROM producto WHERE departamento='A' order by rand(), precio desc limit 4";
        $arrnewfooter = [];
        foreach ($this->conexion->query($sql) as $rownewfooter) {
            array_push($arrnewfooter, $rownewfooter);
        }
        echo json_encode($arrnewfooter);
    }
    
    public function getcarruselfooter2(){
        $sql = "SELECT imagen, descripcion, precio, departamento ,marca FROM producto WHERE departamento='A' order by rand(), precio desc limit 4";
        $arrnewfooter = [];
        foreach ($this->conexion->query($sql) as $rownewfooter) {
            array_push($arrnewfooter, $rownewfooter);
        }
        echo json_encode($arrnewfooter);
    }
    
    public function getcarruselfooter3(){
        $sql = "SELECT imagen, descripcion, precio, departamento ,marca FROM producto WHERE departamento='A' order by rand(), precio desc limit 4";
        $arrnewfooter = [];
        foreach ($this->conexion->query($sql) as $rownewfooter) {
            array_push($arrnewfooter, $rownewfooter);
        }
        echo json_encode($arrnewfooter);
    }
    
    public function getcarruselfooter4(){
        $sql = "SELECT imagen, descripcion, precio, departamento ,marca FROM producto WHERE departamento='A' order by rand(), precio desc limit 4";
        $arrnewfooter = [];
        foreach ($this->conexion->query($sql) as $rownewfooter) {
            array_push($arrnewfooter, $rownewfooter);
        }
        echo json_encode($arrnewfooter);
    }
    
    public function getcarruselfooter5(){
        $sql = "SELECT imagen, descripcion, precio, departamento ,marca FROM producto WHERE departamento='A' order by rand(), precio desc limit 4";
        $arrnewfooter = [];
        foreach ($this->conexion->query($sql) as $rownewfooter) {
            array_push($arrnewfooter, $rownewfooter);
        }
        echo json_encode($arrnewfooter);
    }
    
    public function getcarruselfooter6(){
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
            foreach ($datos as $row){    
              if ($correo === $row['correo'] || $contra === $row['contra']){
                  echo $row['id_usuario']."||";
                  echo $row['nombre']."||";
                  echo $_SESSION['nombre'] = $row['nombre'];
                  echo $_SESSION['apellidos'] = $row['apellidos'];
                  //echo $_SESSION['Bienvenido'] = "Bienvenido :";
                  echo $_SESSION['id'] = $row['id_usuario'];
                }
            }
        } 
    }
    
    public function mostrarordenes($id_usuariosesion) {
        $sql = "select usuario.id_usuario,usuario.nombre,usuario.apellidos,ordenes.estado,direccion.nombre,productos_orden.cantidad,producto.codigo_fabricante,producto.descripcion,producto.marca,producto.precio,producto.imagen from ordenes, direccion, usuario, productos_orden, producto where ordenes.id_ordenes=productos_orden.id_orden and productos_orden.id_producto=producto.codigo_fabricante and producto.codigo_fabricante=productos_orden.id_producto and direccion.id_direccion=ordenes.id_direccion and ordenes.id_usuario=usuario.id_usuario and usuario.id_usuario='" . $id_usuariosesion . "'";
        $arr = [];
        foreach ($this->conexion->query($sql) as $rowordenar) {
            array_push($arr, $rowordenar);
        }
        echo json_encode($arr);
    }

    public function mostrarordenesdetalles($id_usuariosesiondetalle) {

        $sql = "select usuario.id_usuario,usuario.nombre,usuario.apellidos,ordenes.estado, ordenes.metodo_pago,direccion.nombre,productos_orden.cantidad,producto.codigo_fabricante,producto.descripcion,producto.marca,producto.precio,producto.imagen from ordenes, direccion, usuario, productos_orden, producto where ordenes.id_ordenes=productos_orden.id_orden and productos_orden.id_producto=producto.codigo_fabricante and producto.codigo_fabricante=productos_orden.id_producto and direccion.id_direccion=ordenes.id_direccion and ordenes.id_usuario=usuario.id_usuario and usuario.id_usuario='" . $id_usuariosesiondetalle . "'";
        $arrdetalle = [];
        foreach ($this->conexion->query($sql) as $rowordenardetalle) {
            array_push($arrdetalle, $rowordenardetalle);
        }
        echo json_encode($arrdetalle);
    }

    public function actualizarDatosUsuario($id, $nombre, $apellidos, $dia, $mes, $anio, $correos, $contra) {
        $sql = "UPDATE usuario SET id_usuario='" . $id . "', nombre='" . $nombre . "', apellidos='" . $apellidos . "',dia='" . $dia . "', mes='" . $mes . "',anio='" . $anio . "' ,correo='" . $correos . "',contra='" . $contra . "' WHERE id_usuario='" . $id . "'";
        echo $sql;
        echo $this->conexion->query($sql) ? "1" : "0"; // Imprime 1 si se realiza la consulta con exito
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

    public function VerSelectivo($subcat, $lugar, $marca, $envio, $Pmin, $Pmax, $orden) {
        $min = ($lugar - 1) * 20;
        $max = $min + 20;

        switch ($orden) {
            case "normal":
                $ordenamiento="";
                break;

            case "mayor":
                $ordenamiento="order by precio desc";
                break;

            case "menor":
                $ordenamiento="order by precio asc";
                break;

            case "alfa":
                $ordenamiento="order by descripcion asc";
                break;

            case "invalfa":
                $ordenamiento="order by descripcion desc";
                break;




        }

        if (!($marca == "undefined" || $envio == "undefined" )) {
            if ($marca == "totaliti") {
                if ($envio == "Local") {
                    $sql = 'SELECT * FROM producto WHERE descripcion like "" grupo = "' . $subcat . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND GDL >0 '.$ordenamiento.' limit ' . $min . "," . $max;
                } else
                if ($envio == "Foraneo") {
                    $sql = 'SELECT * FROM producto WHERE grupo = "' . $subcat . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND CDMX >0 '.$ordenamiento.' limit ' . $min . "," . $max;
                } else
                if ($envio == "Indiferente") {
                    $sql = 'SELECT * FROM producto WHERE grupo = "' . $subcat . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' '.$ordenamiento.' limit ' . $min . "," . $max;
                }
            } else {
                if ($envio == "Local") {
                    $sql = 'SELECT * FROM producto WHERE grupo = "' . $subcat . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND GDL >0 AND marca = "' . $marca . '" '.$ordenamiento.' limit ' . $min . "," . $max;
                } else
                if ($envio == "Foraneo") {
                    $sql = 'SELECT * FROM producto WHERE grupo = "' . $subcat . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND CDMX >0 AND marca = "' . $marca . '" '.$ordenamiento.' limit ' . $min . "," . $max;
                } else
                if ($envio == "Indiferente") {
                    $sql = 'SELECT * FROM producto WHERE grupo = "' . $subcat . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND marca = "' . $marca . '" '.$ordenamiento.' limit ' . $min . "," . $max;
                }
            }
        } else {
            $sql = "select * from producto where grupo='" . $subcat . "' ".$ordenamiento." limit " . $min . "," . $max;
        }
        $buscado = $this->conexion->query($sql);

        error_reporting(0);
        for ($x = 0; $x < 20; $x++) {
            $fila = mysqli_fetch_array($buscado);
            if (isset($fila['descripcion'])) {
                $articulos->item[$x]->descripcion = $fila['descripcion'];
                $articulos->item[$x]->imagen = $fila['imagen'];
                $articulos->item[$x]->codigo_fabricante = $fila['codigo_fabricante'];
                $articulos->item[$x]->precio = $fila['precio'];
                /* echo "<br>".$articulos->[$x]->descripcion;
                  echo "<br>".$articulos->item[$x]->imagen;
                  echo "<br>".$articulos->item[$x]->codigo_fabricante."<br>"; */
            }
        }
        echo json_encode($articulos);
    }

    public function verCantidad($grupo, $cantidad, $marca, $envio, $Pmin, $Pmax, $orden) {

        if (!($marca == "undefined" || $envio == "undefined")) {
            if ($marca == "totaliti") {
                if ($envio == "Local") {
                    $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND GDL >0';
                } else
                if ($envio == "Foraneo") {
                    $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND CDMX >0';
                } else
                if ($envio == "Indiferente") {
                    $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax;
                }
            } else {
                if ($envio == "Local") {
                    $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND GDL >0 AND marca = "' . $marca . '"';
                } else
                if ($envio == "Foraneo") {
                    $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND CDMX >0 AND marca = "' . $marca . '"';
                } else
                if ($envio == "Indiferente") {
                    $sql = 'SELECT count(*) FROM producto WHERE grupo = "' . $grupo . '" AND precio >' . $Pmin . ' AND precio <' . $Pmax . ' AND marca = "' . $marca . '"';
                }
            }
        } else {
            $sql = "select count(*) from producto where grupo='" . $grupo . "'";
        }
        $cantidad_productos = $this->conexion->query($sql);
        if ($cantidad != 1) {
            echo "<center><a href='detalles.php?extra=" . ($cantidad - 1) . '&marca=' . $marca . '&priceMIN=' . $Pmin . '&priceMAX=' . $Pmax . '&envio=' . $envio ."&orden=".$orden. "&subcategoria=" . $grupo . "'><img src='../../IMG/izquierda.png' style='width:50px;heigth:auto;'></a>";
        }
        $cantidad_grupo = mysqli_fetch_array($cantidad_productos);
        $cantidad_grupo['count(*)'] /= 20;
        $cantidad_grupo = ceil($cantidad_grupo['count(*)']);
        for ($x = 1; $x <= $cantidad_grupo; $x++) {
            if ($cantidad == $x) {
                echo '<u>';
            }
            echo " <a href='detalles.php?extra=" . $x . '&marca=' . $marca . '&priceMIN=' . $Pmin . '&priceMAX=' . $Pmax . '&envio=' . $envio . "&orden=".$orden."&subcategoria=" . $grupo . "'>" . $x;

            if ($cantidad == $x) {
                echo "</u>";
            }
            echo "</a>  ";
        }
        if ($cantidad < $cantidad_grupo) {
            echo "<a href='detalles.php?extra=" . ($cantidad + 1) . '&marca=' . $marca . '&priceMIN=' . $Pmin . '&priceMAX=' . $Pmax . '&envio=' . $envio . "&orden=".$orden."&subcategoria=" . $grupo . "'><img src='../../IMG/derecha.png' style='width:50px;heigth:auto;'></a>";
        }

        //echo "<br>".$grupo."<br>". $cantidad."<br>". $marca."<br>". $envio."<br>". $Pmin."<br>". $Pmax;
    }

    public function verMarcas($grupo) {
        $sql = 'SELECT DISTINCT(marca) FROM producto WHERE grupo = "' . $grupo . '"';
        $cantidad_marcas = $this->conexion->query($sql);
        $x = 0;
        while ($fila = mysqli_fetch_array($cantidad_marcas)) {
            echo $fila['marca'] . ";";
            $x++;
        }
    }

}
