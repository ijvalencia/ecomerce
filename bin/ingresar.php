<?php
session_start();
include 'connectBD.php';
$conexion = new BD();
$Menu = $_GET['categoria'];

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
        echo json_encode($_SESSION);
        break;
	case "cerrar":
        session_destroy();
		header('Location: http://localhost/Ecommerce/index.php');
        break;
    /************************* */
}
$conexion->cerrar();
unset($conexion);
//header('Location: localhost/ecomerce/Ecommerce1/index.php');
?>