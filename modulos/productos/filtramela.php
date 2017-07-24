<?php

echo $_POST['price']."<br>";
echo $_POST['envio']."<br>";
echo $_POST['marcas']."<br>";
echo $_GET['subcategoria']."<br>";

$precio= explode(";", $_POST['price']);

echo $precio[0]."<br>";
echo $precio[1]."<br>";
echo "Location: detalles.php?extra=1"."&marca=".$_POST['marcas']."&priceMIN=".$precio[0]."&priceMAX=".$precio[1]."&envio=".$_POST['envio']."&subcategoria=".$_GET['subcategoria'];
header("Location: detalles.php?extra=1"."&marca=".$_POST['marcas']."&priceMIN=".$precio[0]."&priceMAX=".$precio[1]."&envio=".$_POST['envio']."&subcategoria=".$_GET['subcategoria']);