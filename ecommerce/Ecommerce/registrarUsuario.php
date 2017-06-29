<?php
include 'connectBD.php';

$nombre = $GET['nombre'];
$apellidos = $GET['apellidos'];
$correo = $_GET['correo'];
$contra = $_GET['contra'];

$conexion = new BD();
$conexion->cerrar();
$conexion->cerrar();
?>