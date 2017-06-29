<?php

class BD {
    protected $conexion;
    
    // Procedimiento para conectar 
    public function conectar() {
        $username = "desarrollo";
        $password = "Pa55w0rd!crm";
		//$username = "root";
		//$password = "1234";
		
        try{
            $this->conexion = new PDO("mysql:host=10.1.0.49;dbname=ecommerce", $username, $password);
			//$this->conexion = new PDO("mysql:host=localhost;dbname=ecommerce", $username, $password);
           	$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    
    // Procedimiento para cerrar conexion
    public function cerrar() {
        $this->conexion = NULL;
    }
    
    // Constructor Conecta a la BD
    function __construct() {
        $this->conectar();
    }
	
	//	Procedimiento Login
	public function login($correo, $contra) {
        $sql = "SELECT id_usuario, nombre FROM usuario WHERE correo = '".$correo."' AND contra = '".$contra."'";
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_usuario']."||";
            echo $row['nombre']."||";
        }
    }
    
    /*	Inicio de los procedimietnos de agregar	*/
    
    public function agregarUsuario($nombre, $apellidos, $correo, $contra) {
        $tipo = 0;  // 0 para usuarios 1 para admin
		$sql = "INSERT INTO usuario (nombre, apellidos, correo, contra, tipo) 
        VALUES ('".$nombre."','".$apellidos."','".$correo."','".$contra."','".$tipo."')";
 		$this->conexion->exec($sql);
	}
    
	// telefono, inerior, colonia, cruce 1 y 2, referencia pueden ser NULL
    public function agregarDireccion($direccion, $usuario, $nombre, $apellidos, $celular, $telefono, $calle, $exterior, $interior, $cp, $ciudad, $colonia, $cruce1, $cruce2) {
		$sql = "INSERT INTO direccion (id_usuario, nombre, apellidos, celular, telefono,
        calle, exterior, interior, cp, ciudad, colonia, cruce1, cruce2, referencia) 
        VALUES ('".$usuario."','"
            .$nombre."','"
            .$apellidos."','"
            .$celular."',"
            .!is_null($telefono) ? "'".$telefono."','" : "NULL,'"
            .$calle."','"
            .$exterior."',"
            .!is_null($interior) ? "'".$interior."','" : "NULL,'"
            .$cp."','"
            .$ciudad."',"
            .!is_null($colonia) ? "'".$colonia."'," : "NULL,"
            .!is_null($cruce1) ? "'".$cruce1."'," : "NULL,"
            .!is_null($cruce2) ? "'".$cruce2."'," : "NULL,"
            .!is_null($referencia) ? "'".$referencia."'" : "NULL"
			.")";
 		$this->conexion->exec($sql);
	}
    
    public function agregarProducto($nombre, $imagen, $precio, $categoria, $descripcion, $fabricante, $existencias) {				
        $sql = "INSERT INTO producto (nombre, imagen, precio, categoria, descripcion, fabricante, existencias) 
        VALUES ('".$nombre."','".$imagen."','".$precio."','".$categoria."','".$descripcion."','".$fabricante."','".$existencias."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarComentario($usuario, $producto, $comentario, $calificacion) {	
        $sql = "INSERT INTO comentario (id_usuario, id_producto, comentario, calificacion) 
        VALUES ('".$usuario."','".$producto."','".$comentariio."','".$calificacion."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarEnvio($metodo, $descripcion, $empresa) {
        $sql = "INSERT INTO envios (metodo, descripcion, empresa) 
        VALUES ('".$metodo."','".$descripcion."','".$empresa."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarFavorito($usuario, $producto) {
        $sql = "INSERT INTO favoritos (id_usuario, id_producto) 
        VALUES ('".$usuario."','".$producto."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarLike($usuario, $producto, $megusta) {
        $sql = "INSERT INTO gustar (id_nombre, id_producto, comentario, megusta) 
        VALUES ('".$usuario."','".$producto."',"
            .!is_null($comentario) ? "'".$comentario."'" : "NULL"
            .",'".$megusta."')";
 		$this->conexion->exec($sql);
    }
    
	// Imprime el numero de orden
    public function agregarOrden($usuario, $direccion, $envio, $total, $metodo_pago) {
        $estado = 1;	// Activa
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y H:i:s', time());
        $sql = "INSERT INTO ordenes(id_usuario, id_direccion, id_envio, fecha, total, metodo_pago, estado)
        VALUES ('".$usuario."','".$direccion."','".$envio."',
        STR_TO_DATE('".$fecha."', '%d/%m/%Y %H:%i:%s'),'".
        $total."','".$metodo_pago."',".$estado.")";
		$this->conexion->exec($sql);
			
		$sql = "SELECT id_ordenes FROM ordenes
        WHERE id_usuario = '".$usuario."' AND fecha = STR_TO_DATE('".$fecha."', '%d/%m/%Y %H:%i:%s') AND estado = ".$estado;
        foreach ($this->conexion->query($sql) as $id) {
            echo $id['id_ordenes'];
        }
    }
    
    public function agregarProductosOrden($orden, $producto, $cantidad) {
        $sql = "INSERT INTO productos_orden (id_orden, producto, cantidad) 
        VALUES ('".$orden."','".$producto."','".$cantidad."')";
 		$this->conexion->exec($sql);
    }
    
	// Agrega numero de guia
    public function agregarGuiaOrden($orden, $guia) {
        $sql = "UPDATE ordenes SET guia='".$guia."' WHERE id_ordenes='".$orden."'";
        $this->conexion->exec($sql);
    }
    
	// Comentario puede ser NULL
    public function agregarValoracion($usuario, $ordenes, $envio, $concordancia, $experiencia, $promedio, $comentario) {
        $sql = "INSERT INTO valoracion (id_usuario, id_ordenes, envio, concordancia, experiencia, promedio, comentario) 
		VALUES ('".$usuario."','".$ordenes."','".$envio."','".$concordancia."','".$experiencia."','".$promedio."',".
			(!is_null($comentario) ? "'".$comentario."'" : "NULL") .")";
 		$this->conexion->exec($sql);
    } 
    
	// Solo necesita un parametro, los demas a NULL
    public function getDatosProducto($id, $nombre, $categoria) {
        if (!is_null($id)) {
            $sql = "SELECT * FROM producto WHERE id_producto = ".$id;
        } else if (!is_null($nombre)) {
            $sql = "SELECT * FROM producto WHERE nombre = '".$nombre."'";	
        } else if (!is_null($categoria)) {
            $sql = "SELECT * FROM producto WHERE categoria = '".$categoria."'";
        } else {
			echo "NOPE";
        }
		
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_producto']."||";
			echo $row['nombre']."||";
			echo $row['imagen']."||";
			echo $row['precio']."||";
			echo $row['categoria']."||";
			echo $row['descripcion']."||";
			echo $row['fabricante']."||";
			echo $row['existencias']."||"; 
		}
    }
	
	// Solo necesita un parametro
	public function getDatosUsuario($id, $correo) {
		if (!is_null($id)) {
            $sql = "SELECT * FROM usuario WHERE id_usuario = ".$id;
        } else if (!is_null($correo)) {
            $sql = "SELECT * FROM usuario WHERE nombre = '".$nombre."'";	
        } else {
			echo "NOPE";
        }
		
        foreach ($this->conexion->query($sql) as $row) {
            echo $row['id_usuario']."||";
			echo $row['nombre']."||";
			echo $row['apellidos']."||";
			echo $row['dia']."||";
			echo $row['mes']."||";
			echo $row['anio']."||";
			echo $row['correo']."||";
			echo $row['contra']."||";
			echo $row['tipo']."||";
		}
	}
	
	public function getDatosDireccion($usuario) {
        $sql = "SELECT * FROM direccion WHERE id_usuario = ".$id;
        foreach ($this->conexion->query($sql) as $row) {
           	echo $row['id_direccion']."||";
			echo $row['nombre']."||";
			echo $row['apellidos']."||";
			echo $row['celular']."||";
			echo $row['telefono']."||";
			echo $row['calle']."||";
			echo $row['exterior']."||";
			echo $row['interior']."||";
			echo $row['cp']."||";
			echo $row['estado']."||";
			echo $row['ciudad']."||";
			echo $row['colonia']."||";
			echo $row['cruce1']."||";
			echo $row['cruce2']."||";
			echo $row['refrencia']."||";
		}
	}
	
	//public function getDatos
	
}
?>
