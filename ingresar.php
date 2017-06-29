<?php
include 'connectBD.php';

$correo = $_GET['correo'];
$contra = $_GET['contra'];

$conexion = new BD();
$conexion->login($correo, $contra);
$conexion->cerrar();
//header('Location: localhost/ecomerce/Ecommerce1/index.php');
?>