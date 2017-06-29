<?php
// session_start();

class BD {
    protected $conexion;
    
    function __construct() {
        $username = "root";
        $password = "1234";
        try{
            $this->conexion = new PDO("mysql:host=localhost;dbname=ecommerce", $username, $password);
            //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    
    public function conectar() {
        $username = "root";
        $password = "1234";
        try{
            $this->conexion = new PDO("mysql:host=localhost;dbname=ecommerce", $username, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    
    public function cerrar() {
        $this->conexion = NULL;
    }
    
    public function agregarUsuario($datos) {
		$nombre = $datos['nombre'];
		$apellidos = $datos['apellidos'];
		$correo = $datos['correo'];
		$contra = $datos['contra'];
        $tipo = 0;  // 0 para usuarios 1 para admin
        
		$sql = "INSERT INTO usuario (nombre, apellidos, correo, contra, tipo) 
        VALUES ('".$nombre."','".$apellidos."','".$correo."','".$contra."','".$tipo."')";
 		$this->conexion->exec($sql);
	}
    
    public function agregarDireccion($datos) {
        $direccion = $datos['direccion'];
        $usuario = $datos['usuario'];       
        $nombre = $datos['nombre'];          		
        $apellidos = $datos['apellidos'];
        $celular = $datos['celular'];         
        $telefono = $datos['telefono'];            
        $calle = $datos['calle'];           		
        $exterior = $datos['exterior'];
        $interior = $datos['interior'];
        $cp = $datos['cp'];
        $ciudad = $datos['ciudad'];
        $colonia = $datos['colonia'];
        $cruce1 = $datos['cruce1'];
        $cruce2 = $datos['cruce2'];
        
		$sql = "INSERT INTO direccion (id_usuario, nombre, apellidos, celular, telefono,
        calle, exterior, interior, cp, ciudad, colonia, cruce1, cruce2, referencia) 
        VALUES ('".$usuario."','"
            .$nombre."','"
            .$apellidos."','"
            .$celular."',"
            .isset($datos['telefono']) ? "'".$datos['telefono']."','" : "NULL,'"
            .$calle."','"
            .$exterior."',"
            .isset($datos['interior']) ? "'".$datos['interior']."','" : "NULL,'"
            .$cp."','"
            .$ciudad."',"
            .isset($datos['colonia']) ? "'".$datos['colonia']."'," : "NULL,"
            .isset($datos['cruce1']) ? "'".$datos['cruce1']."'," : "NULL,"
            .isset($datos['cruce2']) ? "'".$datos['cruce2']."'," : "NULL,"
            .isset($datos['referencia']) ? "'".$datos['referencia']."'" : "NULL" .")";
 		$this->conexion->exec($sql);
	}
    
    public function agregarProducto($datos) {
        $nombre = $datos['nombre'];	
        $imagen = $datos['imagen'];	
        $precio = $datos['precio'];
        $categoria = $datos['categoria'];	
        $descripcion = $datos['descripcion'];	
        $fabricante = $datos['fabricante'];
        $existencias = $datos['existencias'];
        
        $sql = "INSERT INTO producto (nombre, imagen, precio, categoria, descripcion, fabricante, existencias) 
        VALUES ('".$nombre."','".$imagen."','".$precio."','".$categoria."','".$descripcion."','".$fabricante."','".$existencias."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarComentario($datos) {
        $usuario = $datos['usuario'];
        $producto = $datos['producto'];	
        $comentario = $datos['comentario'];
        $calificacion = $datos['calificacion'];
        
        $sql = "INSERT INTO comentario (id_usuario, id_producto, comentario, calificacion) 
        VALUES ('".$usuario."','".$producto."','".$comentariio."','".$calificacion."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarEnvio($datos) {
        $metodo = $datos['metodo'];
        $descripcion = $datos['descripcion'];
        $empresa = $datos['empresa'];
        
        $sql = "INSERT INTO envios (metodo, descripcion, empresa) 
        VALUES ('".$metodo."','".$descripcion."','".$empresa."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarFavorito($datos) {
        $usuario = $datos['usuario'];
        $producto = $datos['producto'];
        
        $sql = "INSERT INTO favoritos (id_usuario, id_producto) 
        VALUES ('".$usuario."','".$producto."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarLike($datos) {
        $usuario = $datos['usuario'];
        $producto = $datos['producto'];
        $megusta = $datos['megusta'];
        
        $sql = "INSERT INTO gustar (id_nombre, id_producto, comentario, megusta) 
        VALUES ('".$usuario."','".$producto."',"
            .isset($datos['comentario']) ? "'".$datos['comentario']."'" : "NULL"
            .",'".$megusta."')";
 		$this->conexion->exec($sql);
    }
    
    public function agergarOrden($datos) {
        $usuario = $datos['usuario'];
        $direccion = $datos['direccion'];
        $envio = $datos['envio'];
        $total = $datos['total'];
        $metodo_pago = $datos['metodo_pago'];
        $estado = 1;
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d/m/Y H:i:s', time());
        $sql = "INSERT INTO ordenes(id_usuario, id_direccion, id_envio, fecha, total, metodo_pago, estado)
        VALUES ('".$usuario."','".$direccion."','".$envio."',
        STR_TO_DATE('".$fecha."', '%d/%m/%Y %H:%i:%s'),'".
        $total."','".$metodo_pago."',".$estado.");
        SELECT LAST_INSERT_ID();";
 		$id = $this->conexion->exec($sql);
        return $id;     // regresa el ID de la ultima orden agregada
    }
    
    public function agergarProductosOrden($datos) {
        $orden = $datos['orden'];
        $producto = $datos['producto'];
        $cantidad = $datos['cantidad'];
        
        $sql = "INSERT INTO productos_orden (id_orden, producto, cantidad) 
        VALUES ('".$orden."','".$producto."','".$cantidad."')";
 		$this->conexion->exec($sql);
    }
    
    public function agregarGuiaOrden($datos) {
        $orden = $datos['orden'];
        $guia = $datos['guia'];
        
        $sql = "UPDATE ordenes SET guia='".$guia."' WHERE id_ordenes='".$orden."'";
        $this->conexion->exec($sql);
    }
    
    public function agregarValoracion($datos) {
        $usuario = $datos['usuario'];
        $ordenes = $datos['ordenes'];
        $envio = roud($datos['envio'], 2);      // redondea a 2 decimales
        $concordancia = roud($datos['concordancia'], 2);
        $experiencia = roud($datos['experiencia'], 2);
        $promedio = roud(($envio + $concordancia + $experiencia) / 3 , 2);
        $comentario = isset($datos['comentario']) ? $datos['comentario'] : " ";
        
        $sql = "INSERT INTO valoracion (id_usuario, id_ordenes, envio, concordancia, experiencia, promedio, comentario) 
        VALUES ('".$usuario."','".$ordenes."','".$envio."','".$concordancia."','".$experiencia."','".$promedio."','".$comentario."')";
 		$this->conexion->exec($sql);
    }
    
    public function getDatosProducto($datos) {
        if (isset($datos['id'])) {
            $sql = "SELECT * FROM producto WHERE id_producto = ".$datos['id'];
        } else if (isset($datos['nombre'])) {
            $sql = "SELECT * FROM producto WHERE nombre = '".$datos['nombre']."'";
        } else if (isset($datos['categoria'])) {
            $sql = "SELECT * FROM producto WHERE categoria = '".$datos['categoria']."'";
        } else {
            return 0;
        }
        return $this->conexion->exec($sql);
    }
    
    public function login($correo, $contra) {
        $sql = "SELECT nombre FROM usuario WHERE correo = '".$correo."' AND contra = '".$contra."'";
        $nombre = $this->conexion->exec($sql);
        echo $nombre;
    }
}
?>
