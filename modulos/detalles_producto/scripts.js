var categorias_sin_cantidad = [ 
	"SOFTWARE",
	"categoria de prueba"
];

var articulo;

var iva;
var parametros;
var tipo_cambio;

$.getJSON("../../bin/ingresar.php?categoria=parametros", function(datos) {
    parametros = datos;
    iva = parseFloat(datos.iva);
    iva = (iva/100)+1;
    tipo_cambio = datos.tipo_cambio + datos.agregado;
    $('#numero_comprar').append(datos.no_cva);
});
	
$(document).ready(function() {
    	/* Mostrar producto */
	cargarProducto($('#producto').attr("value"));
	/* Zoom imagen del producto */
	$('#img_producto').click(function() {
		$('#modalZoom').show();
		$('#form_busqueda').hide();
		$('#img_modal').attr('src', $('#img_producto').attr('src'));
	});
	
	$('.close').click(function() { 
		$('#modalZoom').hide();
		$('#form_busqueda').show();
	});
	
	$(document).keypress(function(e) {
		var code = e.keyCode || e.which;
		if(code == 27) { //Enter keycode
			$('#modalZoom').hide();
			$('#form_busqueda').show();
		}
	});
});

function cargarProducto(codigo) {
    if (codigo.length > 3) {
        $.getJSON("../../bin/ingresar.php?categoria=getArticulo&codigo="+codigo, function(datos) {
            if (datos['item'] == undefined || datos['item'][1] != undefined) {
                window.location.replace("../../modulos/error/index.php");
                $('.loader').fadeOut("slow");
                return;
            }
            articulo = datos["item"];
            var disp = parseInt(articulo["disponible"]);
            disp = disp <= 0 ? 0 : disp;
            var dispCD = parseInt(articulo["disponibleCD"]);
            dispCD = dispCD <= 0 ? 0 : dispCD;
            var total_disp = disp + dispCD;
            if (total_disp <= 0) {
                $('#btn_comprar').hide();
                $('#numero_comprar').hide();
            }
            $('#nombre_categoria').append(articulo["grupo"]);
            $('#nombre_categoria').attr("href", "../../modulos/productos/detalles.php?extra=1&marca=undefined&priceMIN=1&priceMAX=250000&envio=undefined&subcategoria="+articulo["grupo"]);
            $('#nombre_marca').append(articulo["marca"]);
            $('#nombre_marca').attr("href", "../../modulos/productos/detalles.php?extra=1&supercategoria=Todo&busqueda=" + articulo["marca"]);
            $('#nombre_producto').append(articulo["clave"]);
            $('#img_producto').attr("src", articulo["imagen"]);
            $('#img_producto').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
            $('#descripcion_producto').append(articulo["descripcion"]);
            $('#precio_producto').append((articulo["moneda"] === "Pesos" ? (articulo["precio"]*iva).toFixed(2) : (articulo["precio"]*articulo['tipocambio']*iva).toFixed(2)));
            $('#cant_disponibles').append(total_disp);
            var ftecnica;
            ftecnica = !jQuery.isEmptyObject(articulo["ficha_tecnica"]) ? articulo["ficha_tecnica"] : "NO EXISTE INFORMACION ADICIONAL";
            $('#descripcion_producto2').append(articulo.ficha_tecnica);
            $('#descripcion_producto2').append("<br>");
            /*var fcomercial = articulo["ficha_comercial"];
            if (!jQuery.isEmptyObject(fcomercial)) {
            fcomercial = fcomercial.replace("/13", "<br>");
            $('#descripcion_producto2').append(fcomercial);
            }*/
            $('#codigo_fabricante').append(articulo["codigo_fabricante"]);
            $('#tiempo_garantia').append(articulo["garantia"].replace("NI", "Ñ"));
            for (var i = 0; i < categorias_sin_cantidad.length; i++) {
                if (articulo["grupo"] === categorias_sin_cantidad[i]) {
                    $('#cant_disponibles').empty().append("SI");
                    break;
                }
            }
            $('.loader').fadeOut("slow");
        });
    } else {
        window.location.replace("../../modulos/error/index.php");
//        $('.loader').fadeOut("slow");
    }
}

$('#btn_comprar').click(function() {
	$.ajax({
	type: "POST",
	url: "../../bin/ingresar.php?categoria=setCarrito",
	data: {"articulo": articulo},
	success: function(resp) {
		console.log(resp);
		if (resp !== "0"){
			jAlert("Agregado al carrito");
			window.location.href = "../../modulos/carrito/index.php";
//			window.close();   
		} else {
			jAlert("No se pudo agregar");
		}
	    }
	});
});
