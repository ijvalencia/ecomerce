<?php

$filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000";
$articulo = simplexml_load_file($filename);
//echo $item->clave."<br>";
echo json_encode($articulo);
/*
$filename2 = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000";
$articulo2 = simplexml_load_file($filename2);
//echo $item->clave."<br>";
echo json_encode($articulo2);

$filename3 = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000";
$articulo3 = simplexml_load_file($filename3);
//echo $item->clave."<br>";
echo json_encode($articulo3);

$filename4 = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000";
$articulo4 = simplexml_load_file($filename4);
//echo $item->clave."<br>";
echo json_encode($articulo4);

$filename5 = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000";
$articulo5 = simplexml_load_file($filename5);
//echo $item->clave."<br>";
echo json_encode($articulo5);*/
?>