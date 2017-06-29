<?php
include 'connectBD.php';

$NumeroMenu = $_POST['numero'];

switch ($Numero){
    case 1: 
        
    break;
    
    case 2: 
    break;
    
    case 3: 
    break;
    
    case 4: 
    break;

    case 5: 
    break;
     
    case 6: 
    break;
    
    case 7: 
    break;
    
    case 8: 
    break;
    
    case 9: 
    break;
    
}

$correo = $_GET['correo'];
$contra = $_GET['contra'];

$conexion = new BD();
$conexion->login($correo, $contra);
$conexion->cerrar();
//header('Location: localhost/ecomerce/Ecommerce1/index.php');
?>