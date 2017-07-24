var categorias_sin_cantidad = [ 
	"SOFTWARE",
	"categoria de prueba"
];

var articulo;

$(document).ready(function() {
	/* Mostrar producto */
	cargarProducto($('#producto').attr("value"));
	
	/* Zoom imagen del producto */
	$('#img_producto').click(function() {
		$('#modalZoom').show();
		$('#img_modal').attr('src', $('#img_producto').attr('src'));
	});
	
	$('.close').click(function() { 
		$('#modalZoom').hide();
	});
	
	$(document).keypress(function(e) {
		var code = e.keyCode || e.which;
		if(code == 27) { //Enter keycode
			$('#modalZoom').hide();
		}
	});
});

function cargarProducto(codigo) {
	$.getJSON("../../bin/ingresar.php?categoria=getArticulo&codigo="+codigo, function(datos) {
		articulo = datos["item"];
		var disp = parseInt(articulo["disponible"]);
		var dispCD = parseInt(articulo["disponibleCD"]);
		var total_disp = disp + dispCD;
		if (total_disp <= 0) {
			$('#btn_comprar').hide();
			$('#numero_comprar').hide();
		}
		$('#nombre_marca').append(articulo["marca"]);
		$('#nombre_producto').append(articulo["clave"]);
		$('#img_producto').attr("src", articulo["imagen"]);
		$('#descripcion_producto').append(articulo["descripcion"]);
		$('#precio_producto').append((articulo["moneda"] === "Pesos" ? articulo["precio"] : (articulo["precio"]*articulo['tipocambio']).toFixed(2)));
		$('#cant_disponibles').append(total_disp);
		$('#descripcion_producto2').append(articulo["descripcion"]);
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
}

$('#btn_comprar').click(function() {
	$.ajax({
		type: "POST",
		url: "../../bin/ingresar.php?categoria=setCarrito",
		data: {"articulo": articulo},
		success: function(resp) {
			console.log(resp);
			if (resp != "0")
				alert("Agregado al carrito");
			else
				alert("No se pudo agregar");
		}
	});
});