<?php
include 'connectBD.php';

$correo = $_POST['correo'];
$contra = $_POST['contra'];
$url = "http://localhost/ecomerce/Ecommerce1/index.php";

$conexion = new BD();
$conexion->login($correo, $contra);
$conexion->cerrar();
?>