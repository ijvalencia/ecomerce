var tipo_cambio;
var parametros;
var iva;

$(document).ready(function() {    
    /* SATANAS */
    $.ajax({
        url: "../../bin/ingresar.php?categoria=parametros",
        async: false,
        data: {},
        success: function(resp) {
            resp = JSON.parse(resp);
            tipo_cambio = parseFloat(resp["tipo_cambio"]) + parseFloat(resp["agregado"]);
            iva = (resp.iva/100)+1;
        }       
    });
	var productos_busqueda = [];
	$.getJSON("../../bin/ingresar.php?categoria=productosInicio", function(respuesta){
		$.each(respuesta, function(i, objeto) {
            productos_busqueda.push(objeto);
        });
        var html_imagen = '<div class="col-sm-3" id="mostrar"><a href="../detalles_producto/index.php?categoria=&producto=#id_producto" class="thumbnail inicio"><img src="#imagen" class="img-responsive" width="130" height="130" onerror="this.src=\'../../IMG/error.jpg\'"><p><small>#descripcion</small>#precio</p><div id="mensaje"><h6 id="grupos">des</h6></div></a></div>';
        var tabla_producto='<div class="container-fluid bg-3 text-center" id="tabla_#id_tabla"></div>';
        var id_tabla;
        var t = 0;
        $.each(productos_busqueda, function(i, producto) {
            var imagen = html_imagen;
            var tabla = tabla_producto;
            
            if(i % 4 === 0 || t === 0) {
                id_tabla = "#tabla_" + t;
                $('ttbody').append(tabla.replace("#id_tabla", t));
                t++;
            }
            imagen = imagen.replace("#id_producto", producto["codigo_fabricante"]);
            imagen = imagen.replace("#imagen", producto["imagen"]);
            imagen = imagen.replace("#descripcion",producto["descripcion"].substring(0,30)+"<br>");
            imagen = imagen.replace("des", producto["grupo"].substring(0,19) + "...");
            imagen = imagen.replace("#precio","$"+ formatoMoneda(producto["precio"]*iva));
            $(id_tabla).append(imagen);
        });
        $('.loader').fadeOut("slow");
    });    
    cargarCarousel('#galeria_destacados', "Todo", "0");
    cargarCarousel('#galeria_audio', "AUDIFONOS Y MICRO", "0");
    cargarCarousel('#galeria_computadoras', "portatiles", "0");
});

function cargarCarousel(id_contenedor, busqueda, opc) {
	var contenedor = '<div class="item"><div class="row"><div class="imgcarrusel">#imagenes</div></div></div>';
	var img_carrusel = '<div class="col-md-3"><a href="#link" class="thumbnail" id=sombreado><img src="#imagen_carrusel" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>#descripcion</small><h4>$#precio</h4></p></a></div>';
	var contenedor_aux;
	var img_aux = "";
	$.getJSON("../../bin/ingresar.php?categoria=getCarousel&clave="+busqueda+"&opc="+opc, function(resp) {
		$.each(resp, function(i, producto) {
			img_aux += img_carrusel;
			img_aux = img_aux.replace("#imagen_carrusel", producto['imagen']);
			img_aux = img_aux.replace("#descripcion", producto['descripcion'].substring(0,30));
			img_aux = img_aux.replace("#precio", formatoMoneda(producto['precio']*iva));
			img_aux = img_aux.replace("#link", "../../modulos/detalles_producto/index.php?categoria=&producto=" + producto['codigo_fabricante']);
			switch(i) {
				case 3:
					contenedor_aux = contenedor.replace("item", "item active");
					contenedor_aux = contenedor_aux.replace("#imagenes", img_aux);
					img_aux = "";
					$(id_contenedor).append(contenedor_aux);
					break;
				case 7:
				case 11:
					contenedor_aux = contenedor;
					contenedor_aux = contenedor_aux.replace("#imagenes", img_aux);
					img_aux = "";
					$(id_contenedor).append(contenedor_aux);
					break;
			}
		});
	});
}

function formatoMoneda(numero) {
    numero = numero.toFixed(2).replace(/./g, function(c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
    });
    return numero;
}
