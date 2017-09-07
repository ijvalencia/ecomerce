var tabla_producto = '<tr id="tabla#n"><td data-th="Product"><div class="col-sm-4">AaA<img src="link_imagen" class="img-responsive" onerror="this.src=\'../../IMG/error.jpg\'">A/A</div><div class="col-sm-8"><h5 class="nomargin">nombre_producto</h5></div></td><td data-th="Price">$<span class="precios">precio_producto</span><br><b>IVA: </b>$<span class="ivas">precio_iva</span></td><td>brincalatablita</td></tr>';
var almacen = [];
$.ajax({
    url: "../../bin/ingresar.php?categoria=parametros",
    async: false,
    success: function (datos) {
        datos = JSON.parse(datos);
        tipo_cambio = parseFloat(datos.tipo_cambio) + parseFloat(datos.agregado);
        iva = parseFloat(datos.iva);
        iva = (iva / 100) + 1;
    }
});
$.getJSON("../../bin/ingresar.php?categoria=verfavoritos", function (dato) {
    if (dato === null || dato == "")
    {
        $('tbody').append("<br>No tienes ningun producto favorito, te invitamos a agregar los que quieras :)<br><br><br><br>");
    }
    $.each(dato, function (j, valor) {
        var salida = tabla_producto;
        almacen[j] = valor;
        console.log(almacen[j]);
        salida = salida.replace(/#n/g, j);
        salida = salida.replace("brincalatablita", "<button onclick='metercarrito(\"" + j + "\")'>Agregar al carrito.</button><br><br><a href='#'><i onclick='borrarfavorito(\"" + valor['codigo_fabricante'] + "\",\"" + j + "\")' id='icono_fav' class='fa fa-star-o'>Eliminar de favoritos.</i></a> ");
        salida = salida.replace("link_imagen", valor['imagen']);
        salida = salida.replace("AaA", "<a target='_blank' href='../../modulos/detalles_producto/index.php?categoria=&producto=" + valor['codigo_fabricante'] + "'>");
        salida = salida.replace("A/A", "</a>");
        salida = salida.replace("nombre_producto", valor['descripcion']);
        salida = salida.replace("precio_producto", formatoMoneda(valor['precio']));
        salida = salida.replace("precio_iva", formatoMoneda((iva - 1) * valor['precio']));
        $('tbody').append(salida);
    });
});

function borrarfavorito(producto) {

    $.get("../../bin/ingresar.php?categoria=vermeterfavorito&producto=" + producto,
            function () {
                location.reload(true);
            });
}

function formatoMoneda(numero) {
//    numero = numero.toFixed(2).replace(/./g, function (c, i, a) {
//        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
//    });
    return numero;
}

function metercarrito(numero) {
    //var articulo=JSON.stringify(almacen[numero]);
    var articulo = (almacen[numero]);
    
    $.ajax({
        type: "POST",
        url: "../../bin/ingresar.php?categoria=setCarrito",
        data: {"articulo": articulo},
        success: function (resp) {
            alert(resp);
            console.log(resp);
            if (resp !== "0") {
                jAlert("Agregado al carrito");
                window.location.href = "../../modulos/carrito/index.php";
//			window.close();   
            } else {
                jAlert("No se pudo agregar");
            }
        }
    });
}
