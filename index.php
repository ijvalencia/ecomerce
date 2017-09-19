<?php
/* Verificar si existe una sesion si no, crearla como invitado*/
session_start();
$_SESSION['nombre']="invitado";
$_SESSION['apellidos']="";//invitado ojo ponerlo cuando marque error en fururo en los comentarios
$_SESSION['id'] = 0;
$_SESSION['correo']="";
header('Location: modulos/inicio/index.php');
?>