<?php
//$filename= ("http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&marca=%&grupo=%&clave=%&codigo=%".$producto."&tc=1&promos=1&porcentaje=0");
//$filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&marca=%25&grupo=%25&clave=%25&codigo=WD5000AZLX&tc=1&promos=1&porcentaje=0";
$filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&codigo=WD5000&tc=1";
$articulo= simplexml_load_file($filename);

//	echo $item->clave."<br>";
echo json_encode($articulo);

?>