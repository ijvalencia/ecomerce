<?php

for ($x = 0; $x<=30 ; $x++)
    if (isset($_POST['TB' . $x])) {
        $memoriaTB[$x] = $_POST['TB' . $x];
    }

for ($x = 0; $x<=30; $x++)
    if (isset($_POST['GB' . $x])) {
        $memoriaGB[$x] = $_POST['GB' . $x];
    }


$busqueda_memoria = "";
if (isset($memoriaGB)) {
    var_dump($memoriaGB);
    $busqueda_memoria = $busqueda_memoria."&busqueda_MG=";

    foreach ($memoriaGB as $aux) {
        $busqueda_memoria =$busqueda_memoria. $aux . "$";
    }
}
if (isset($memoriaTB)) {
    var_dump($memoriaTB);
    $busqueda_memoria = $busqueda_memoria."&busqueda_MT=";

    foreach ($memoriaTB as $aux) {
        $busqueda_memoria =$busqueda_memoria. $aux . "$";
    }
}
echo $busqueda_memoria . "<br>";

$precio[0] = $_POST['min'];
$precio[1] = $_POST['max'];
echo $_POST['orden'] . "<br>";
echo   "Location: detalles.php?extra=1".$busqueda_memoria."&marca=".$_POST['marcas']."&priceMIN=".$precio[0]."&priceMAX=".$precio[1]."&envio=".$_POST['envio']."&orden=".$_POST['orden']."&subcategoria=".$_GET['subcategoria'];
header("Location: detalles.php?extra=1".$busqueda_memoria."&marca=".$_POST['marcas']."&priceMIN=".$precio[0]."&priceMAX=".$precio[1]."&envio=".$_POST['envio']."&orden=".$_POST['orden']."&subcategoria=".$_GET['subcategoria']);
