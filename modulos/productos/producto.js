var tabla_producto;
//var x=getUrlParameter('subcategoria');
var x = 0;
var tipo_cambio;
var productos_busqueda = [];
var iva;

/* Obtiene los datos de la tabla de parametros*/
$.getJSON("../../bin/ingresar.php?categoria=parametros", function (datos) {
    tipo_cambio = parseFloat(datos["tipo_cambio"]) + parseFloat(datos["agregado"]);
    iva = parseFloat(datos["iva"]);
    iva = (iva / 100) + 1;
    //console.log(iva);
});

$(document).ready(function () {
    var loc = document.location.href;
    if (loc.indexOf('?') > 0)
    {
        var getString = loc.split('?')[1];
        var GET = getString.split('&');
        var get = {};
        for (var i = 0, l = GET.length; i < l; i++) {
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
    }
    /* Separa los parametros del get para mostrar los articulos */
    if (get)
    {
        for (var ver in get)
        {
            //alert(ver);
            //alert(get[ver]);
            if (ver == "busqueda_MG")
                var memoriag = get[ver];
            if (ver == "busqueda_MT")
                var memoriat = get[ver];
            if (ver == "extra")
                var lugar = get[ver];
            if (ver == "marca")
                var marca = get[ver];
            if (ver == "envio")
                var envio = get[ver];
            if (ver == "priceMIN")
                var min = get[ver];
            if (ver == "priceMAX")
                var max = get[ver];
            if (ver == "orden")
                var orden = get[ver];
            if (ver == "color")
            {
                var color = get[ver];
                if (color !== "")
                {
                    color = "&color=" + color;
                }
            }
            if (ver == "subcategoria")
                if (memoriag || memoriat)
                    mostrarArticulos(get[ver], lugar, marca, envio, min, max, orden, "&capacidadg=" + memoriag + "&capacidadt=" + memoriat, color);
                else
                    mostrarArticulos(get[ver], lugar, marca, envio, min, max, orden, "", color);
        }
    } else
        $('.loader').fadeOut("slow");
    
    /* SATANAS */
    var supercategoria = $('#supercategoria').attr("value");
    var busqueda = $('#busqueda').attr("value");
    if (!jQuery.isEmptyObject(supercategoria) && !jQuery.isEmptyObject(busqueda)) {
        $('#AquiGrupo').append("busqueda");
        $('.breadcrumb').empty().append('<li><a href="../../modulos/inicio/index.php">Inicio</a></li><li>Productos</li><li><a></a>Busqueda</li>');
        $('#memorama').hide();
        $('#coloreamela').hide();
        busqueda = busqueda.trim().split(" ");
        var marcas = [];
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=buscar",
            data: {"categoria":supercategoria, "palabras":busqueda},
            success: function(respuesta) {
                respuesta = JSON.parse(respuesta);
                $.each(respuesta, function(i, objeto) {
                    $.each(objeto, function(j, producto) {
                        productos_busqueda.push(producto);
                    });
                });
                cargarBusqueda(productos_busqueda);
                $.each(productos_busqueda, function(i, producto) {
                    marcas.push(producto.marca);
                });
                marcas.sort();
                for (var i = 0; i < marcas.length - 1; i++) 
                    if (marcas[i] == marcas[i+1]) {
                        marcas.splice(i+1, 1);
                        i--;
                    }
                var auxMarca = "";
                for (var i = 0; i < marcas.length; i++) {
                    // $('#marquitas').append('<option value="'+marcas[i]+'">'+marcas[i]+"</option>");
                    $('#marquitas').append('<li><input type="checkbox" value="'+ marcas[i] +'">'+ marcas[i] +'</li>');
                } 
                $('.loader').fadeOut("slow");
            }
        });
        /* Agrega filtro a busqueda */
        $('#btn_filtramela').click(function(event) {
            event.preventDefault();
            var productos_filtro = productos_busqueda.slice();
            /* Agregar marcas */
            if ($('#filtro_disponibilidad').val() != "Indiferente") {
                switch ($('#filtro_disponibilidad').val()) {
                    case "Local":
                        for (var i = 0; i < productos_filtro.length; i++) 
                            if (productos_filtro[i].GDL == "0") {
                                productos_filtro.splice(i, 1);
                                i--;
                            }
                        break;
                    case "Foraneo":
                        for (var i = 0; i < productos_filtro.length; i++) 
                            if (productos_filtro[i].CDMX == "0") {
                                productos_filtro.splice(i, 1);
                                i--;
                            }
                        break;
                                                         }
            }
            if ($('#filtro_miSalario').val() != "0" || $('#filtro_miExpectativa').val() != "250000") {
                var min = parseFloat($('#filtro_miSalario').val());
                var max = parseFloat($('#filtro_miExpectativa').val());
                for (var i = 0; i < productos_filtro.length; i++) 
                    if (parseFloat(productos_filtro[i].precio) < min || parseFloat(productos_filtro[i].precio) > max) {
                        productos_filtro.splice(i, 1);
                        i--;
                    }
            }
            if ($('input[name=orden]:checked').val() != "normal") {
                switch($('input[name=orden]:checked').val()) {
                    case "mayor":
                        productos_filtro = productos_filtro.sort(function(a, b) {return b.precio - a.precio});
                        break;
                    case "menor":
                        productos_filtro = productos_filtro.sort(function(a, b) {return a.precio - b.precio});
                        break;
                    case "alfa":
                        productos_filtro = productos_filtro.sort(function(a, b) {return ((a.descripcion < b.descripcion) ? -1 : ((a.descripcion > b.descripcion) ? 1 : 0));});
                        break;
                    case "invalfa":
                        productos_filtro = productos_filtro.sort(function(a, b) {return ((a.descripcion < b.descripcion) ? 1 : ((a.descripcion > b.descripcion) ? -1 : 0));});
                        break;
                                                           }
                /* TERMINAR ORDENAMIENTO A->Z Y VICEVERSA */
            }
            cargarBusqueda(productos_filtro);
        });
        $.ajax({
            url: "../../modulos/productos/sidebar.js",
            dataType: "script",
            success: function () {
            }
        });
    }
    /***********/
});

function cargarBusqueda(arr_productos) {
    $('ttbody').empty();
    var html_imagen = '<div class="col-md-3"><a href="../detalles_producto/index.php?categoria=#cat&producto=#id_producto" class="thumbnail  container_img_producto" id=sombreado><img  src="#imagen" class="img-responsive" style="width:100%; height: 55%;" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>#descripcion</small></p><h4>$#costo<br>&#9733;&#9733;&#9733;&#9733;&#9733;(0)</h4></a></div>';
    html_imagen = html_imagen.replace("#cat", $('#subcategoria').attr("value"));
    //					console.log(html_imagen);
    var tabla_producto='<div class="container-fluid bg-3 text-center" id="tabla_#id_tabla"></div>';
    var id_tabla;
    var t = 0;
    $.each(arr_productos, function(i, producto) {
        var imagen = html_imagen;
        var tabla = tabla_producto;
        if(i % 4 == 0 || t == 0) {
            id_tabla = "#tabla_" + t;
            $('ttbody').append(tabla.replace("#id_tabla", t));
            t++;
        }
        imagen = imagen.replace("#id_producto", producto["codigo_fabricante"]);
        imagen = imagen.replace("#imagen", producto["imagen"]);
        imagen = imagen.replace("#descripcion", producto["descripcion"].substring(0, 26) + "...<br>");
        imagen = imagen.replace("#costo", producto["moneda"] == "Pesos" ? formatoMoneda(producto["precio"]*iva) : formatoMoneda(producto["precio"]*tipo_cambio*iva));
        $(id_tabla).append(imagen);
    });
}

function formatoMoneda(numero) {
    numero = numero.toFixed(2).replace(/./g, function(c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
    });
    return numero;
}

//grupo/categoria, paginacion/extra, marca, envio/(local/foraneo/indef), precio minimo, precio maximo, orden, filtro memoria, color
function mostrarArticulos(crayola, plastilina, marcador, avionpapel, miSalario, McPato, fascismo, vino, arcoiris) {

    if (!arcoiris)
        arcoiris = "";


    $('#AquiGrupo').append(crayola);


    //filtro de marcas
    //alert("../../bin/ingresar.php?categoria=marcas&grupo=" + crayola);
    $.get("../../bin/ingresar.php?categoria=marcas&grupo=" + crayola, function (respuesta) {
        respuesta = respuesta.split(";");
        auxMarca = ""
        for (var x = 0; x < respuesta.length - 1; x++)
        {
            var informacion = respuesta[x].split("%")
            $('#marquitas').append('<li><input type="checkbox" name="marca' + x + '" value="' +
                    informacion[0] + '"> ' + informacion[0].substr(0, 8) + ' <u>(' + informacion[1] + ')</u></li>');
        }

    });



    //filtro color
    var auxColor = "";
    var color = ["AZUL", "AMARILLO", "BLANCO", "GRIS", "NEGRO", "VERDE", "ROJO", "PLATA", "ROSA"];
    for (var x = 0; x < 9; x++)
    {
        $.ajax({
            url: "../../bin/ingresar.php?categoria=contarColor&color=" + color[x] + "&grupo=" + crayola,
            async: false,
            success: function (respuesta)
            {
                if (respuesta !== "0")
                {
                    auxColor += '<li><input type="checkbox" name="' + color[x] + '" value="' + color[x] + '"> ' + color[x] + ' <u>(' + respuesta + ')</u></li>';
                }
            }
        });
    }
    if (auxColor == "")
        $('#lista_color').hide();
    else
        $('#lista_color').append(auxColor);




    //filtro de memoria
    $.get("../../bin/ingresar.php?categoria=memoria&grupo=" + crayola, function (respuesta)
    {
        respuesta = respuesta.split("/");
        var TB = respuesta[0].split("$");
        var GB = respuesta[1].split("$");
        console.log(TB, GB);
        var texto2 = "";
        var contenido = "";
        if (!(GB[0] == "")) {
            //for (var x = 0; x < TB.length - 1; x++)
            var x = 0;
            var salir = false;
            while (!salir) {
                if (GB[x] !== "")
                    $.ajax({
                        url: "../../bin/ingresar.php?categoria=cantidad_memoria&GB=" + GB[x] + "&grupo=" + crayola,
                        async: false,
                        success: function (respuesta)
                        {
                            contenido += '<li><input type="checkbox" name="GB' + x + '" value="' + GB[x] + '"> ' + GB[x] + ' GB  <u>(' + respuesta + ')</u>' + '</li>';
                            x++;
                            if (x === GB.length - 1) {
                                salir = true;
                            }
                        }});
                for (var aux = 0; aux <= 100; aux++)
                    aux = aux;
            }
        }
        var contenido1 = "";
        if (!(TB[0] == "")) {
            var x = 0;
            var salir = false;
            while (!salir) {
                $.ajax({
                    url: "../../bin/ingresar.php?categoria=cantidad_memoria&TB=" + TB[x] + "&grupo=" + crayola,
                    async: false,
                    success: function (respuesta)
                    {
                        contenido1 += '<li><input type="checkbox" name="TB' + x + '" value="' + TB[x] + '"> ' + TB[x] + ' TB  <u>(' + respuesta + ')</u>' + '</li>';
                        x++;
                        if (x === TB.length - 1) {
                            texto2 += contenido1 + contenido;
                            $('#lista_memoria').append(texto2);
                            salir = true;
                        }
                    }});
            }
        }
    });






    //paginacion
    if (vino == "")
        $.get("../../bin/ingresar.php?categoria=listadocantidad&cantidad=" + plastilina + "&marca=" + marcador + "&envio=" + avionpapel + "&minn=" + miSalario + "&maxn=" + McPato + "&orden=" + fascismo + "&grupo=" + crayola + arcoiris,
                function (cantidad) {
                    $('#catidad').append(cantidad);
                });






    //productos
    $.ajax({
        type: "POST",
        url: "../../bin/ingresar.php?extra=" + plastilina + "&marca=" + marcador + "&envio=" + avionpapel + "&min=" + miSalario + "&max=" + McPato + "&orden=" + fascismo + "&categoria=" + crayola + vino + arcoiris,
        async: false,
        data: {},
        success: function (articulo) {
            //console.log(articulo);
            //alert("../../bin/ingresar.php?extra=" + plastilina + "&marca=" + marcador + "&envio=" + avionpapel + "&min=" + miSalario + "&max=" + McPato + "&orden=" + fascismo + "&categoria=" + crayola + vino + arcoiris);
            try {
                var dato = JSON.parse(articulo);
            } catch (err) {
                $('.loader').fadeOut("slow");
                return;
            }
            //console.log(dato);
            //alert(dato.item.length);
            var imprimemela = "";
            if (dato == null) {
                $('.loader').fadeOut("slow");
                return;
            }
            for (var y = 0; y < dato.item.length; y++)
            {
                tabla_producto = '<div class="col-md-3"><a href="../detalles_producto/index.php?categoria=' + crayola + '&producto=compa" class="thumbnail  container_img_producto" id=sombreado><img  src="imagen" class="img-responsive" style="width:100%; height: 55%;" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>Texto...</small></p><h4>precio<br>&#9733;&#9733;&#9733;&#9733;&#9733;(0)</h4></a></div>';
                if (x == 0)
                    tabla_producto = '<div class="container-fluid bg-3 text-center">' + tabla_producto;
                if (x == 3)
                {
                    tabla_producto += '</div>';
                    x = 0;
                } else
                    x++;
                var salida = tabla_producto;
                salida = salida.replace("imagen", dato.item[y].imagen);
                salida = salida.replace("compa", dato.item[y].codigo_fabricante);
                salida = salida.replace("Texto", dato.item[y].descripcion.substring(26, 0));
                salida = salida.replace("precio", "$" + formatoMoneda(parseFloat(dato.item[y].precio)) + "<br>");
                //salida = salida.replace("precio_producto", "$" + valor['precio']);
                imprimemela += salida;
                if (x == 0 || y == dato.item.length - 1)
                {
                    $('ttbody').append(imprimemela);
                    imprimemela = "";
                }

            }
        }
    });


            $('.loader').fadeOut("slow");
            $.ajax({
                url: "sidebar.js",
                dataType: "script",
                success: function () {}});

}
