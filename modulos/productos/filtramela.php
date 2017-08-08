<?php

$precio[0]=$_POST['min'];
$precio[1]=$_POST['max'];
echo $_POST['orden']."<br>";
echo   "Location: detalles.php?extra=1"."&marca=".$_POST['marcas']."&priceMIN=".$precio[0]."&priceMAX=".$precio[1]."&envio=".$_POST['envio']."&orden=".$_POST['orden']."&subcategoria=".$_GET['subcategoria'];
header("Location: detalles.php?extra=1"."&marca=".$_POST['marcas']."&priceMIN=".$precio[0]."&priceMAX=".$precio[1]."&envio=".$_POST['envio']."&orden=".$_POST['orden']."&subcategoria=".$_GET['subcategoria']);