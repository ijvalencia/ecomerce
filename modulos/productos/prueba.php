<?php

//AZUL, AMARILLO, BLANCO, GRIS, NEGRO, VERDE, ROJO, PLATA, ROSA
$articulos = simplexml_load_file("XML.xml");
$total_articulos = count($articulos->item);
echo $total_articulos . "<br>";

$colores = array(
    "AZUL", "ROJO", "AMARILLO", "GRIS", "NEGRO", "BLANCO", "VERDE", "PURPURA", "ANARANJADO", "ROSA", "ORO", "PLATA", "LIMA", "CAFE");
$num=0;
$objetos = array();
FOREACH ($colores as $color) {
    for ($x = 0; $x <= $total_articulos - 1; $x++) {
        if(!(isset($DB_color[$x])))
        $DB_color[$x]="<br>";
        $num++;
        $posicion = strpos($articulos->item[$x]->descripcion, $color);
        if (!($posicion == null || $posicion == "")) {
            if (isset($objetos[0][$x])) {
                $objetos[0][$x] ++;
                $objetos[1][$x] = $articulos->item[$x]->descripcion;
                $DB_color[$x] = $DB_color[$x]."/".$color;
            } else
            {
                $objetos[0][$x] = 1;
                $objetos[1][$x] = $articulos->item[$x]->descripcion;
                $DB_color[$x] = $DB_color[$x].$color;
            }
        }
    }
}
//var_dump($objetos);
echo $num;

foreach($DB_color as $imprimemela)
{
   if($imprimemela!=="<br>")
    echo $imprimemela; 
}
//print_r($DB_color);