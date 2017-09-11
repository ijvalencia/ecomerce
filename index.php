<?php
/* Verificar si existe una sesion si no, crearla como invitado*/
session_start();
$_SESSION['nombre']="invitado";
$_SESSION['apellidos']="invitado";
$_SESSION['id'] = 0;

header('Location: modulos/inicio/index.php');
?>