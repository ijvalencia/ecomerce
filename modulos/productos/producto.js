var tabla_producto;
//var x=getUrlParameter('subcategoria');
var x = 0;
var tipo_cambio;
var productos_busqueda = [];
var iva;

$(document).ready(function () {
    /* Obtiene los datos de la tabla de parametros*/
    $('#mas_marcas').hide();
    $('#mas_memorias').hide();
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
                    mostrarArticulos(get[ver], lugar, marca, envio, min, max, orden, "&capacidadg=" + memoriag, "&capacidadt=" + memoriat, color);
                else
                    mostrarArticulos(get[ver], lugar, marca, envio, min, max, orden, "", "", color);
        }
    } else
        $('.loader').fadeOut("slow");

    /* SATANAS */
    var supercategoria = $('#supercategoria').attr("value");
    $('#categoria_elegida').text(supercategoria);
    $('#entrada_categoria').attr("value", supercategoria);
    var busqueda = $('#busqueda').attr("value");
    busqueda = busqueda.trim();
    if (!jQuery.isEmptyObject(supercategoria) && !jQuery.isEmptyObject(busqueda) && busqueda.length != 0) {
        $('#AquiGrupo').append(busqueda);
        $('.breadcrumb').empty().append('<li><a href="../../modulos/inicio/index.php">Inicio</a></li><li>Productos</li><li><a></a>Busqueda</li>');
        $('#drop_color').hide();
        $('#drop_memoria').hide();
        $('#filtro_miSalario').val("1");
        $('#filtro_miExpectativa').val("250000");
        busqueda = busqueda.toUpperCase().split(" ");
        if(busqueda.length >= 1) {
            $.ajax({
                type: "POST",
                url: "../../bin/ingresar.php?categoria=buscar",
                data: {"categoria": supercategoria, "palabras": busqueda},
                success: function(respuesta) {
//                    console.log(respuesta);
                    respuesta = JSON.parse(respuesta);
                    if(respuesta.length > 0) {
                        $.each(respuesta, function (j, producto) {
                            productos_busqueda.push(producto);
                        });
                        cargarBusqueda(productos_busqueda);
                        cargarMarcas(productos_busqueda);
                        cargarColores(productos_busqueda);
                        cargarCapacidad(productos_busqueda);
                    } else
                        $('ttbody').append('<h2><center>Ningun producto encontrado<br>Por favor verifica tu busqueda</center></h2>');
                    $('.loader').fadeOut("slow");
                }
            });
            
            /* Agrega filtro a busqueda */
            $('#btn_filtramela').click(function (event) {
                event.preventDefault();
                var productos_filtro = productos_busqueda.slice();

                /* Filtro de marcas */
                var marcas_filtro = [];
                $.each($('#marquitas li input'), function (i, objeto) {
                    if (objeto.checked)
                        marcas_filtro.push(objeto.value);
                });
                var aux = false;
                if (marcas_filtro.length < 1)
                    productos_filtro = productos_busqueda.slice();
                else {
                    for (var i = 0; i < productos_filtro.length; i++) {
                        aux = false;
                        for (var j = 0; j < marcas_filtro.length; j++) {
                            if (productos_filtro[i].marca == marcas_filtro[j]) {
                                aux = true;
                                break;
                            }
                        }
                        if (!aux) {
                            productos_filtro.splice(i, 1);
                            i--;
                        }
                    }
                }
                /* Filtro de diponibilidad */
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
                /* Filtro precio */
                if ($('#filtro_miSalario').val() != "0" || $('#filtro_miExpectativa').val() != "250000") {
                    var min = parseFloat($('#filtro_miSalario').val());
                    var max = parseFloat($('#filtro_miExpectativa').val());
                    for (var i = 0; i < productos_filtro.length; i++) {
                        var precio_aux = parseFloat(productos_filtro[i].precio * iva);
                        if (precio_aux < min || precio_aux > max) {
                            productos_filtro.splice(i, 1);
                            i--;
                        }
                    }
                }
                /* Ordenamientos */
                if ($('#filtro_orden').val() != "normal") {
                    switch ($('#filtro_orden').val()) {
                        case "mayor":
                            productos_filtro = productos_filtro.sort(function (a, b) {
                                return b.precio - a.precio
                            });
                            break;
                        case "menor":
                            productos_filtro = productos_filtro.sort(function (a, b) {
                                return a.precio - b.precio
                            });
                            break;
                        case "alfa":
                            productos_filtro = productos_filtro.sort(function (a, b) {
                                return ((a.descripcion < b.descripcion) ? -1 : ((a.descripcion > b.descripcion) ? 1 : 0));
                            });
                            break;
                        case "invalfa":
                            productos_filtro = productos_filtro.sort(function (a, b) {
                                return ((a.descripcion < b.descripcion) ? 1 : ((a.descripcion > b.descripcion) ? -1 : 0));
                            });
                            break;
                    }
                }
                /* Filtro memoria */
                var aux_gb = [], aux_tb = [];
                $.each($('#memorama li input:checked'), function(i, objeto) {
                    var opc = objeto.value.indexOf("TB") == -1 ? "GB" : "TB";
                    switch(opc) {
                        case "GB":
                            aux_gb.push(parseInt(objeto.value));
                            break;
                        case "TB":
                            aux_tb.push(parseInt(objeto.value));
                            break;
                    }
                });
                for(var i = 0; (aux_gb.length != 0 || aux_tb.length) && i < productos_filtro.length; i++) {
                    aux = false;
                    for(var j = 0; productos_filtro[i].GB != "0" && j < aux_gb.length; j++)
                        if(parseInt(productos_filtro[i].GB) == aux_gb[j]) {
                            aux = true;
                            break;
                        }
                    for(var j = 0; productos_filtro[i].TB != "0" && j < aux_tb.length; j++)
                        if(parseInt(productos_filtro[i].TB) == aux_tb[j]) {
                            aux = true;
                            break;
                        }
                    if (!aux) {
                        productos_filtro.splice(i, 1);
                        i--;
                    }
                }
                /* Filtro color */
                var filtro_colores = [];
                $.each($('#coloreamela li input:checked'), function(i, objeto) {
                    filtro_colores.push(objeto.value);
                });
                for(var i = 0; filtro_colores.length != 0 && i < productos_filtro.length; i++) {
                    aux = false;
                    for(var j = 0; productos_filtro[i].color != null && j < filtro_colores.length; j++)
                        if(productos_filtro[i].color == filtro_colores[j]) {
                            aux = true;
                            break;
                        }
                    if (!aux) {
                        productos_filtro.splice(i, 1);
                        i--;
                    }
                }
                /****************/
                cargarBusqueda(productos_filtro);
                $("html, body").animate({ scrollTop: 0 }, "slow");
            });
            $.ajax({
                url: "../../modulos/productos/sidebar.js",
                dataType: "script",
                success: function () {
                }
            });
            $('#mas_marcas').click(function() {
                mostrarMasMenos('#icono_marcas', '#txt_marcas', 'separador');
            });
            $('#mas_memorias').click(function() {
                mostrarMasMenos('#icono_memorias', '#txt_memorias', 'separador1');
            });
        } else
            $('ttbody').append('<h2><center>Ningun producto encontrado<br>Por favor verifica tu busqueda</center></h2>');
    } else
        $('ttbody').append('<h2><center>Ningun producto encontrado<br>Por favor verifica tu busqueda</center></h2>');
    $('.loader').fadeOut("slow");
    /***********/
});

/* SATANAS */
function cargarBusqueda(arr_productos) {
    $('ttbody').empty();
    var html_imagen = '<div class="col-md-3"><a href="../detalles_producto/index.php?categoria=#cat&producto=#id_producto" class="thumbnail  container_img_producto" id=sombreado><img src="#imagen" class="img-responsive" style="width:100%; height: 55%;" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>#descripcion</small></p><h4>$#costo<br>#calificacion</h4></a></div>';
    html_imagen = html_imagen.replace("#cat", $('#subcategoria').attr("value"));

    var tabla_producto = '<div class="container-fluid bg-3 text-center" id="tabla_#id_tabla"></div>';
    var id_tabla;
    var t = 0;
    $.each(arr_productos, function (i, producto) {
        var imagen = html_imagen;
        var tabla = tabla_producto;
        if (i % 4 == 0 || t == 0) {
            id_tabla = "#tabla_" + t;
            $('ttbody').append(tabla.replace("#id_tabla", t));
            t++;
        }
        var aux_calificacion = "";
        $.ajax({
            url: "../../bin/ingresar.php?categoria=verNumeroComentarios&producto=" + producto.codigo_fabricante,
            async: false,
            success: function(numerocalificacion) {
                $.ajax({
                    url: "../../bin/ingresar.php?categoria=verSoloCalificacionC&producto=" + producto.codigo_fabricante,
                    async: false,
                    success: function(cantidadcalificacion) {
                        for (var x = 0; x < cantidadcalificacion; x++)
                            aux_calificacion += "&#9733;";
                        aux_calificacion += numerocalificacion;
                    }
                });
            }
        });
        imagen = imagen.replace("#calificacion", aux_calificacion);
        imagen = imagen.replace("#id_producto", producto["codigo_fabricante"]);
        imagen = imagen.replace("#imagen", producto["imagen"]);
        imagen = imagen.replace("#descripcion", producto["descripcion"].substring(0, 26) + "...<br>");
        imagen = imagen.replace("#costo", formatoMoneda(parseFloat(producto["precio"]) * iva));
        $(id_tabla).append(imagen);
    });
}

function formatoMoneda(numero) {
    numero = numero.toFixed(2).replace(/./g, function (c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
    });
    return numero;
}

function cargarMarcas(productos_busqueda) {
    var marcas = [];
    $.each(productos_busqueda, function (i, producto) {
        marcas.push(producto.marca);
    });
    marcas.sort();
    for (var i = 0; i < marcas.length - 1; i++)
        if (marcas[i] == marcas[i + 1]) {
            marcas.splice(i + 1, 1);
            i--;
        }
    var id_marcas = '#marquitas';
    for (var i = 0; i < marcas.length; i++) {
        if(i == 10 && marcas.length > 10) {
            $(id_marcas).append("<separador></separador>");
            id_marcas = 'separador';
            $(id_marcas).hide();
            $('#mas_marcas').show();
        }
        $(id_marcas).append('<li class="checkbox"><input type="checkbox" value="'+ marcas[i] +'">'+ marcas[i] +'</li>');
    }
    // $(id_marcas).append('<li><a id="mas_marcas_bottom" style="color:#999">Ver menos <i class="fa fa-minus"></i></a></li>');
}

function cargarCapacidad(productos_busqueda) {
    var TB = [];
    var GB = [];
    $.each(productos_busqueda, function(i, producto) {
        if (producto.GB != 0 && producto.GB != "")
            GB.push(producto.GB);
        if (producto.TB != 0 && producto.TB != "")
            TB.push(producto.TB);
    });
    GB.sort();
    TB.sort();
    for (var i = 0; i < GB.length - 1; i++) 
        if (GB[i] == GB[i+1]) {
            GB.splice(i+1, 1);
            i--;
        }
    for (var i = 0; i < TB.length - 1; i++) 
        if (TB[i] == TB[i+1]) {
            TB.splice(i+1, 1);
            i--;
        }
    var id_capacidad = "#memorama";
    var aux = true, i = 0;
    for (; i < GB.length; i++) {
        if(aux && i == 10 && GB.length > 10) {
            $(id_capacidad).append("<separador1></separador1>");
            id_capacidad = 'separador1';
            $(id_capacidad).hide();
            $('#mas_memorias').show();
            aux = false;
        }
        $(id_capacidad).append('<li><input type="checkbox" value="'+ GB[i] +'GB">'+ GB[i] +' GB</li>');
    }
    for (var j = 0; j < TB.length; j++, i++) {
        if(aux && i == 10) {
            $(id_capacidad).append("<separador1></separador1>");
            id_capacidad = 'separador1';
            $(id_capacidad).hide();
            $('#mas_memorias').show();
            aux = false;
        }
        $(id_capacidad).append('<li><input type="checkbox" value="'+ TB[j] +'TB">'+ TB[j] +' TB</li>');
    }
    if(GB.length != 0 && TB.length != 0)
        $('#drop_memoria').show();
}

function cargarColores(productos_busqueda) {
    var colores = [];
    $.each(productos_busqueda, function(i, producto) {
        colores.push(producto.color);
    });
    colores.sort();
    if(colores.length != 1)
        for (var i = 0; i < colores.length - 1; i++) {
            if (colores[i] == colores[i+1] || colores[i] == null) {
                colores.splice(i+1, 1);
                i--;
            }
        }
    if(colores.length == 1 && colores[0] == null)
        colores = [];
    for (var i = 0; i < colores.length; i++) {
        if (colores[i] != null)
            $('#coloreamela').append('<li class="checkbox"><input type="checkbox" value="'+ colores[i] +'">'+ colores[i] +'</li>');
    }
    if(colores.length != 0)
        $('#drop_color').show();
}

function mostrarMasMenos(icono, txt, separador) {
    if($(icono).attr("class").indexOf("plus") != -1) {
        $(icono).attr("class", "fa fa-minus");
        $(txt).text("  menos");
        $(separador).show();
    } else {
        $(icono).attr("class", "fa fa-plus");
        $(txt).text("ver más");
        $(separador).hide();
        // $.each($('#marquitas li input:checked'),function(i, objeto) {
        //     // objeto.prependTo('#marquitas');
        //     console.log(objeto.parent());
        // });
    }
}
/***********/

//grupo/categoria, paginacion/extra, marca, envio/(local/foraneo/indef), precio minimo, precio maximo, orden, filtro memoria, color
function mostrarArticulos(crayola, plastilina, marcador, avionpapel, miSalario, McPato, fascismo, vino1, vino2, arcoiris) {
    if (crayola == "" || jQuery.isEmptyObject(crayola) || crayola == "undefined") {
        $('ttbody').append('<h2><center>Ningun producto encontrado<br>Por favor verifica tu busqueda</center></h2>');
        $('.loader').fadeOut("slow");
        return;
    }
    var vino = vino1 + vino2;
    if (!arcoiris)
        arcoiris = "";
    $('#AquiGrupo').append(crayola.substr(0, 40));
    if (avionpapel == "undefined")
        $('#filtro_disponibilidad').val("Indiferente");
    else
        $('#filtro_disponibilidad').val(avionpapel);
    if (!fascismo)
        $('#filtro_orden').val("normal");
    else
        $('#filtro_orden').val(fascismo);
    
    //filtro de marcas
    $.get("../../bin/ingresar.php?categoria=marcas&grupo=" + crayola, function (respuesta) {
        respuesta = respuesta.split(";");
        auxMarca = "#marquitas";
        for (var x = 0; x < respuesta.length - 1; x++)
        {
            if(x == 10 && respuesta.length > 10) {
                $(auxMarca).append("<separador></separador>");
                auxMarca = 'separador';
                $(auxMarca).hide();
               $('#mas_marcas').show();
            }
            var informacion = respuesta[x].split("%");
            if (-1 !== marcador.indexOf(informacion[0]))
                var check = "checked";
            else
                var check = "";
            $(auxMarca).append('<li><input type="checkbox" name="marca' + x + '" ' + check + ' value="' +informacion[0] + '"> ' + informacion[0].substr(0, 8) + ' <u>(' + informacion[1] + ')</u></li>');
        }
    });

    //filtro color
    var auxColor = "";
    var color = ["AZUL", "AMARILLO", "BLANCO", "GRIS", "NEGRO", "VERDE", "ROJO", "PLATA", "ROSA"];
    for (var x = 0; x < 9; x++) {
        $.ajax({
            url: "../../bin/ingresar.php?categoria=contarColor&color=" + color[x] + "&grupo=" + crayola,
            async: false,
            success: function(respuesta) {
                if (respuesta !== "0") {
                    if (-1 !== arcoiris.indexOf(color[x]))
                        var check = "checked";
                    else
                        var check = "";
                    auxColor += '<li><input type="checkbox" name="' + color[x] + '" value="' + color[x] + '"' + check + '> ' + color[x] + ' <u>(' + respuesta + ')</u></li>';
                }
            }
        });
    }
    if (auxColor !== "")
        $('#coloreamela').append(auxColor);
    else
        $('#drop_color').hide();

    //filtro de memoria
    $.get("../../bin/ingresar.php?categoria=memoria&grupo=" + crayola, function(respuesta) {
        respuesta = respuesta.split("/");
        var TB = respuesta[0].split("$");
        var GB = respuesta[1].split("$");
        // console.log(TB, GB);
        var texto2 = "";
        var contenido = "";
        var aux_separador = false;
        var cont = 0;
        if (!(GB[0] == "")) {
            //for (var x = 0; x < TB.length - 1; x++)
            var x = 0;
            var salir = false;
            while (!salir) {
                if (GB[x] !== "")
                    $.ajax({
                        url: "../../bin/ingresar.php?categoria=cantidad_memoria&GB=" + GB[x] + "&grupo=" + crayola,
                        async: false,
                        success: function (respuesta) {//vino1 GB, vino2 TB
                            if (!aux_separador && x == 10) {
                                contenido += '<separador1>';
                                $('#mas_memorias').show();
                                aux_separador = true;
                                cont = x;
                            }
                            if (-1 !== vino1.indexOf(GB[x]))
                                var check = "checked";
                            else
                                var check = "";
                            contenido += '<li><input type="checkbox"' + " " + check + ' name="GB' + x + '" value="' + GB[x] + '"> ' + GB[x] + ' GB  <u>(' + respuesta + ')</u>' + '</li>';
                            x++;
                            if (x === GB.length - 1)
                                salir = true;
                        }
                    });
                for (var aux = 0; aux <= 100; aux++)
                    aux = aux;
            }
        }
        if (!(TB[0] == "")) {
            var x = 0;
            var salir = false;
            while (!salir) {
                $.ajax({
                    url: "../../bin/ingresar.php?categoria=cantidad_memoria&TB=" + TB[x] + "&grupo=" + crayola,
                    async: false,
                    success: function(respuesta) {
                        if (!aux_separador && x + cont == 10) {
                            contenido += '<separador1>';
                            $('#mas_memorias').show();
                            aux_separador = true;
                        }
                        if (-1 !== vino2.indexOf(TB[x]))
                            var check = "checked";
                        else
                            var check = "";
                        contenido += '<li><input type="checkbox"' + " " + check + ' name="TB' + x + '" value="' + TB[x] + '"> ' + TB[x] + ' TB  <u>(' + respuesta + ')</u>' + '</li>';
                        x++;
                        if (x === TB.length - 1)
                            salir = true;
                    }
                });
            }
        }
        texto2 += contenido + (aux_separador ? '</separador1>' : "");
        $('#memorama').append(texto2);
        if(contenido.length < 1)
            $('#drop_memoria').hide();
        if (aux_separador)
            $('separador1').hide();
    });

    //paginacion
    if (vino == "") {
        $.get("../../bin/ingresar.php?categoria=listadocantidad&cantidad=" + plastilina + "&marca=" + marcador + "&envio=" + avionpapel + "&minn=" + miSalario + "&maxn=" + McPato + "&orden=" + fascismo + "&grupo=" + crayola + arcoiris,
                function (cantidad) {
                    var URLactual = window.location + "";
                    var extra = URLactual.indexOf("extra=");
                    var amperson = URLactual.indexOf("&");
                    var T1 = URLactual.substring(0, extra);
                    var T2 = URLactual.substring(amperson, URLactual.length);
                    paginacion = Math.ceil(cantidad / 20);
                    var x = 1;
                    var aux = 1;
                    if (plastilina !== "1")
                        $('#catidad').append(" <a href='" + T1 + "extra=" + (plastilina - 1) + T2 + "'>" + '<i class="fa fa-arrow-left" aria-hidden="true"></i>' + "</a>");
                    while (paginacion !== 0) {
                        aux = x;
                        if (x == plastilina) {
                            var y = x;
                            x = "<u>" + x + "</u>";
                        }
                        $('#catidad').append(" <a class='txt_pag' href='" + T1 + "extra=" + aux + T2 + "'>" + x + "</a> ");
                        if (y) {
                            x = y + 0;
                            y = null;
                        }
                        x++;
                        paginacion--;
                    }
                    if (plastilina < Math.ceil(cantidad / 20) + "") {
                        plastilina++;
                        $('#catidad').append(" <a href='" + T1 + "extra=" + plastilina + T2 + "'>" + '<i class="fa fa-arrow-right" aria-hidden="true"></i>' + "</a>");
                        plastilina--;
                    }
                }
        );
    }
//"<a href='detalles.php?extra=" . $x . $color . '&marca=' . $marca . '&priceMIN=' . $Pmin . '&priceMAX=' . $Pmax . '&envio=' . $envio . "&orden=" . $orden . "&subcategoria=" . $grupo . "'>" . $x


    //productos
    $.ajax({
        type: "POST",
        url: "../../bin/ingresar.php?extra=" + plastilina + "&marca=" + marcador + "&envio=" + avionpapel + "&min=" + miSalario + "&max=" + McPato + "&orden=" + fascismo + "&categoria=" + crayola + vino + arcoiris,
        async: false, 
        data: {}, 
        success: function (articulo) {
            try {
                var dato = JSON.parse(articulo);
            } catch (err) {
                $('.loader').fadeOut("slow");
                return;
            }
            //console.log(dato);
            var imprimemela = "";
            if (dato == null) {
                $('.loader').fadeOut("slow");
                return;
            }
            for (var y = 0; y < dato.item.length; y++) {
                var aux = "";
                $.ajax({
                    url: "../../bin/ingresar.php?categoria=verNumeroComentarios&producto=" + dato.item[y].codigo_fabricante,
                    async: false,
                    success: function(numerocalificacion) {
                        $.ajax({
                            url: "../../bin/ingresar.php?categoria=verSoloCalificacionC&producto=" + dato.item[y].codigo_fabricante,
                            async: false,
                            success: function(cantidadcalificacion) {
                                for (var x = 0; x < cantidadcalificacion; x++)
                                    aux += "&#9733;";
                                aux += numerocalificacion;
                                //&#9733;&#9733;&#9733;&#9733;&#9733;(0)
                            }
                        });
                    }
                });
                tabla_producto = '<div class="col-md-3"><a href="../detalles_producto/index.php?categoria=' + crayola + '&producto=compa" class="thumbnail  container_img_producto" id=sombreado><img src="imagen" class="img-responsive" style="width:100%; height: 55%;" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>Texto...</small></p><h4>precio<br>calishi</h4></a></div>';
                if (x == 0)
                    tabla_producto = '<div class="container-fluid bg-3 text-center">' + tabla_producto;
                if (x == 3) {
                    tabla_producto += '</div>';
                    x = 0;
                } else
                    x++;
                var salida = tabla_producto;
                salida = salida.replace("calishi", aux);
                salida = salida.replace("imagen", dato.item[y].imagen);
                salida = salida.replace("compa", dato.item[y].codigo_fabricante);
                salida = salida.replace("Texto", dato.item[y].descripcion.substring(26, 0));
                // console.log(iva);
                salida = salida.replace("precio", "$" + formatoMoneda(parseFloat(dato.item[y].precio) * iva) + "<br>");
                // salida = salida.replace("precio", "$" + dato.item[y].precio + "<br>");
                imprimemela += salida;
                if (x == 0 || y == dato.item.length - 1) {
                    $('ttbody').append(imprimemela);
                    imprimemela = "";
                }

            }
            $('.loader').fadeOut("slow");

            window.setTimeout(
                $.ajax({
                url: "../../modulos/productos/sidebar.js",
                dataType: "script",
                success: function() {
                }
                }),3000
            );
            $('#mas_marcas').click(function() {
                mostrarMasMenos('#icono_marcas', '#txt_marcas', 'separador');
            });
            $('#mas_memorias').click(function() {
                mostrarMasMenos('#icono_memorias', '#txt_memorias', 'separador1');
            });
        }
    });
}
