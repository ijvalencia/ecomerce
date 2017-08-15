<?php

//AZUL, AMARILLO, BLANCO, GRIS, NEGRO, VERDE, ROJO, PLATA, ROSA
$color = "";
if (isset($_POST['AZUL'])) {
    $color .= $_POST['AZUL'] . "/";
}if (isset($_POST['AMARILLO'])) {
    $color .= $_POST['AMARILLO'] . "/";
}if (isset($_POST['BLANCO'])) {
    $color .= $_POST['BLANCO'] . "/";
}if (isset($_POST['GRIS'])) {
    $color .= $_POST['GRIS'] . "/";
}if (isset($_POST['NEGRO'])) {
    $color .= $_POST['NEGRO'] . "/";
}if (isset($_POST['VERDE'])) {
    $color .= $_POST['VERDE'] . "/";
}if (isset($_POST['ROJO'])) {
    $color .= $_POST['ROJO'] . "/";
}if (isset($_POST['PLATA'])) {
    $color .= $_POST['PLATA'] . "/";
}if (isset($_POST['ROSA'])) {
    $color .= $_POST['ROSA'] . "/";
}
IF($color!=="")
    $color="&color=".$color;


for ($x = 0; $x <= 30; $x++)
    if (isset($_POST['marca' . $x])) {
        $marca[$x] = $_POST['marca' . $x];
    }
    
$busqueda_marca = "";
if (isset($marca)) {
    var_dump($marca);
    foreach ($marca as $aux) {
        $busqueda_marca .= $aux."$";
    }
}
else
    $busqueda_marca="undefined";



for ($x = 0; $x <= 30; $x++)
    if (isset($_POST['TB' . $x])) {
        $memoriaTB[$x] = $_POST['TB' . $x];
    }

for ($x = 0; $x <= 30; $x++)
    if (isset($_POST['GB' . $x])) {
        $memoriaGB[$x] = $_POST['GB' . $x];
    }


$busqueda_memoria = "";
if (isset($memoriaGB)) {
    var_dump($memoriaGB);
    $busqueda_memoria = $busqueda_memoria . "&busqueda_MG=";

    foreach ($memoriaGB as $aux) {
        $busqueda_memoria = $busqueda_memoria . $aux . "$";
    }
}
if (isset($memoriaTB)) {
    var_dump($memoriaTB);
    $busqueda_memoria = $busqueda_memoria . "&busqueda_MT=";

    foreach ($memoriaTB as $aux) {
        $busqueda_memoria = $busqueda_memoria . $aux . "$";
    }
}
echo $busqueda_memoria . "<br>";

$precio[0] = $_POST['min'];
$precio[1] = $_POST['max'];
echo $_POST['orden'] . "<br>";
echo   "Location: detalles.php?extra=1" .$color. $busqueda_memoria . "&marca=" . $busqueda_marca . "&priceMIN=" . $precio[0] . "&priceMAX=" . $precio[1] . "&envio=" . $_POST['envio'] . "&orden=" . $_POST['orden'] . "&subcategoria=" . $_GET['subcategoria'];
header("Location: detalles.php?extra=1" .$color. $busqueda_memoria . "&marca=" . $busqueda_marca . "&priceMIN=" . $precio[0] . "&priceMAX=" . $precio[1] . "&envio=" . $_POST['envio'] . "&orden=" . $_POST['orden'] . "&subcategoria=" . $_GET['subcategoria']);
