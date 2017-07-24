<?php
/* Verificar si existe una sesion si no, crearla como invitado */
session_start();
$_SESSION['nombre']="invitado";
$_SESSION['id'] = 0;
header('Location: modulos/inicio/index.php');


/*$username = "desarrollo";
$password = "Pa55w0rd!crm";

$conexion = mysqli_connect("10.1.0.49", $username, $password, "ecommerce");

$sql3 = "SELECT * FROM relacion_categorias WHERE 1";
foreach ($conexion->query($sql3) as $row) {
	$id = $row["id_rel_categoria"];
	$cat = $row["id_categoria"];
	$sup = $row["id_supercategoria"];
	$sql = "update relacion_categorias set id_categoria = (select nombre from categoria where categoria.id_categoria = ".$cat."), id_supercategoria = (select nombre from super_categorias where id_super = ".$sup.") where id_rel_categoria = ".$id;
	$conexion->query($sql);
}*/
?>