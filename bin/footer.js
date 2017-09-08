var parametros;
var tipo_cambio, iva;

$(document).ready(function() {
    /* Obtiene los datos de la tabla de parametros*/
    $.ajax({
        url: "../../bin/ingresar.php?categoria=parametros",
        async: false,
        success: function (datos) {
            datos = JSON.parse(datos);
            parametros = datos;
            tipo_cambio = parseFloat(datos.tipo_cambio) + parseFloat(datos.agregado);
            iva = parseFloat(datos.iva);
            iva = (iva / 100) + 1;
        }
    });

    cargarCarousel('#galeria_destacados2', $('#carrousel_superior').attr("value"), $('#carrousel_superior').attr("opc"));
    cargarCarousel('#galeria_computadoras2', $('#carrousel_inferior').attr("value"), $('#carrousel_inferior').attr("opc"));
});

function cargarCarousel(id_contenedor, busqueda, opc) {
    var contenedor = '<div class="item"><div class="row"><div class="imgcarrusel">#imagenes</div></div></div>';
    var img_carrusel = '<div class="col-md-3"><a href="#link" class="thumbnail" id=sombreado><img src="#imagen_carrusel" style="width:100%; height:50%;"  onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>#descripcion</small><h4>$#precio</h4></p></a></div>';
    var contenedor_aux;
    var img_aux = "";
    $.getJSON("../../bin/ingresar.php?categoria=getCarousel&clave="+busqueda+"&opc="+opc, function(resp) {
        $.each(resp, function(i, producto) {
	        img_aux += img_carrusel;
	        img_aux = img_aux.replace("#imagen_carrusel", producto['imagen']);
	        img_aux = img_aux.replace("#descripcion", producto['descripcion'].substring(0,30));
	        img_aux = img_aux.replace("#precio", formatoMoneda(producto['precio']*((parametros.iva/100)+1)));
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
