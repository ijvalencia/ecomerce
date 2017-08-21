<?php
echo "Empezo
";
/* BD Server */
$username = "desarrollo";
$password = "Pa55w0rd!crm";

/* BD LOCAL */
$con = mysqli_connect("127.0.0.1", "root", "", "ecommerce");

// $con = mysqli_connect("10.1.0.49", $username, $password, "ecommerce");
if (mysqli_connect_errno($con)) {
    echo "Error al conectar con MySQL: " . mysqli_connect_error();
    exit();
}

$filename = "http://www.grupocva.com/catalogo_clientes_xml/lista_precios.xml?cliente=26813&marca=%&grupo=%&clave=%&codigo=%&tc=1&promos=1&porcentaje=0&dc=1&dt=1&depto=1&exist=4&TipoProducto=1";
$articulos = simplexml_load_file($filename);
$total_articulos = count($articulos->item);
echo $total_articulos."
";
echo $con->query("delete FROM producto") ? "Borrado con exito
" : exit("Error en borrado");
for ($x = 0; $x <= $total_articulos - 1; $x++) {
    $cadenaP = str_replace(" ", "_", $articulos->item[$x]->descripcion);
    $cadenaP = str_replace("/", "-", $cadenaP);
    $buscar = 'TB';
    $posicion = strpos($cadenaP, $buscar);
    $TB = "";
    if (!($posicion == null || $posicion == "")) {
        if (!(ctype_digit($cadenaP[$posicion - 1])))
            $cadenaP[$posicion - 1] = " ";
        if (!(ctype_digit($cadenaP[$posicion - 2])) && $cadenaP[$posicion - 2] != ".")
            $cadenaP[$posicion - 2] = " ";
        if (!(ctype_digit($cadenaP[$posicion - 3])) && $cadenaP[$posicion - 3] != ".")
            $cadenaP[$posicion - 3] = " ";
        if (!(ctype_digit($cadenaP[$posicion - 4])))
            $cadenaP[$posicion - 4] = " ";
        //echo "<br>".$cadenaP[$posicion - 4] . $cadenaP[$posicion - 3] . $cadenaP[$posicion - 2] . $cadenaP[$posicion - 1];
        if (ctype_digit($cadenaP[$posicion - 1])) {
            $TB = $cadenaP[$posicion - 1];
        }
        if (ctype_digit($cadenaP[$posicion - 2]) || $cadenaP[$posicion - 2] == ".") {
            $TB = $cadenaP[$posicion - 2] . $TB;
            if (ctype_digit($cadenaP[$posicion - 3]) || $cadenaP[$posicion - 3] == ".") {
                $TB = $cadenaP[$posicion - 3] . $TB;
                if (ctype_digit($cadenaP[$posicion - 4])) {
                    $TB = $cadenaP[$posicion - 4] . $TB;
                }
            }
        }
        //echo "-" .$TB;
    }
    $cadenaP = str_replace(" ", "_", $articulos->item[$x]->descripcion);
    $cadenaP = str_replace("/", "-", $cadenaP);
    $buscar = 'GB';
    $posicion = strpos($cadenaP, $buscar);
    $GB = "";
    if (!($posicion == null || $posicion == "")) {
        if (!(ctype_digit($cadenaP[$posicion - 1])))
            $cadenaP[$posicion - 1] = " ";
        if (!(ctype_digit($cadenaP[$posicion - 2])) && $cadenaP[$posicion - 2] != ".")
            $cadenaP[$posicion - 2] = " ";
        if (!(ctype_digit($cadenaP[$posicion - 3])) && $cadenaP[$posicion - 3] != ".")
            $cadenaP[$posicion - 3] = " ";
        if (!(ctype_digit($cadenaP[$posicion - 4])))
            $cadenaP[$posicion - 4] = " ";
        //echo "<br>".$cadenaP[$posicion - 4] . $cadenaP[$posicion - 3] . $cadenaP[$posicion - 2] . $cadenaP[$posicion - 1];
        if (ctype_digit($cadenaP[$posicion - 1])) {
            $GB = $cadenaP[$posicion - 1];
        }
        if (ctype_digit($cadenaP[$posicion - 2]) || $cadenaP[$posicion - 2] == ".") {
            $GB = $cadenaP[$posicion - 2] . $GB;
            if (ctype_digit($cadenaP[$posicion - 3]) || $cadenaP[$posicion - 3] == ".") {
                $GB = $cadenaP[$posicion - 3] . $GB;
                if (ctype_digit($cadenaP[$posicion - 4])) {
                    $GB = $cadenaP[$posicion - 4] . $GB;
                }
            }
        }
        //echo "-" .$TB;
        //echo "<br>" . $GB . "--" . $TB;
    }
    //$cadenaP[$posicion - 4] . $cadenaP[$posicion - 3] . $cadenaP[$posicion - 2] . $cadenaP[$posicion - 1];

    if($articulos->item[$x]->moneda=="Dolares")
    {
        $articulos->item[$x]->precio*=$articulos->item[$x]->tipocambio;
        $articulos->item[$x]->moneda="Pesos";

    }
    if ($articulos->item[$x]->disponible < 0)
        $articulos->item[$x]->disponible = 0;
    if ($articulos->item[$x]->disponibleCD < 0)
        $articulos->item[$x]->disponibleCD = 0;
    if ($articulos->item[$x]->disponible != 0 || $articulos->item[$x]->disponibleCD != 0)
        $sql = "INSERT INTO producto VALUES ('" . $articulos->item[$x]->codigo_fabricante . "','" . $articulos->item[$x]->descripcion . "','" . $articulos->item[$x]->grupo . "','" . $articulos->item[$x]->marca . "','" . $articulos->item[$x]->Departamento . "','" . $articulos->item[$x]->precio . "','" . $articulos->item[$x]->moneda . "','" . $articulos->item[$x]->imagen . "','" . $articulos->item[$x]->tipocambio . "','" . $articulos->item[$x]->disponible . "','" . $articulos->item[$x]->disponibleCD . "','" . $GB . "','" . $TB . "', '')";
    //echo $sql."<br>";
    echo $con->query($sql) ? "ingresado ".$articulos->item[$x]->codigo_fabricante."
    " : "no ingresado ".$articulos->item[$x]->codigo_fabricante."
    ";
    //echo "<br>" . $articulos->item[$x]->codigo_fabricante . "---------" . $articulos->item[$x]->descripcion . "-------" . $articulos->item[$x]->grupo . "----------" . $articulos->item[$x]->marca . "----------" . $articulos->item[$x]->Departamento . "-------------" . $articulos->item[$x]->precio . "---------------" . $articulos->item[$x]->moneda . "---------" . $articulos->item[$x]->imagen . "-------------" . $articulos->item[$x]->tipocambio . "----------" . $articulos->item[$x]->disponible . "----" . $articulos->item[$x]->disponibleCD . "-------" . $GB . "------" . $TB . "<br>";
}

/* SATANAS */

$sql_nuevas = "SELECT grupo FROM (SELECT * FROM producto GROUP BY grupo) AS cat WHERE cat.grupo NOT IN (SELECT id_categoria FROM relacion_categorias GROUP BY id_categoria) AND grupo != ''";
$sql_borradas = "SELECT * FROM (SELECT id_categoria FROM relacion_categorias GROUP BY id_categoria) AS cat WHERE cat.id_categoria NOT IN (SELECT grupo FROM producto GROUP BY grupo)";

foreach($con->query($sql_nuevas) as $n) {
    $sql = "INSERT INTO relacion_categorias (id_categoria, id_supercategoria) VALUES ('".$n['grupo']."','Miscelaneo')";
    echo ($con->query($sql) ? "ingresado ".$n['grupo'] : "no ingresado ".$n['grupo']) . "
    ";
}
foreach($con->query($sql_borradas) as $b) {
    $sql = "DELETE FROM relacion_categorias WHERE id_categoria = '".$b['id_categoria']."'";
    echo ($con->query($sql) ? "Borrado ".$b['id_categoria'] : "Error" ). "
    ";
}

$colores = ["ROJO","ROSA","NEGRO","AMARILLO","AZUL","MORADO","PLATA","GRIS","VERDE","BLANCO","CAFE"];
foreach ($colores as $col) {
	$sql_colores = "UPDATE producto SET color='".$col."' WHERE descripcion LIKE '%".$col."%' AND color=''";
	$con->query($sql_colores);
}
/***********/

echo "
Acabo";

mysqli_close($con);
