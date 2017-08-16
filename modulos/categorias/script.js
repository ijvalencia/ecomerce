$(document).ready(function() {	
	var btn_base = '<a class="populares" href="#link_cat">#nombre</a>';
	var link_subcat = "../../modulos/productos/detalles.php?extra=1&marca=undefined&priceMIN=1&priceMAX=250000&envio=undefined&subcategoria=";
	
	$.getJSON("../../bin/ingresar.php?categoria=getSubcategorias&subcategoria=" + $('#supercategoria').attr("value"), function(respuesta) {
		$.each(respuesta, function(i, subcat) {
			var link = link_subcat + subcat["id_categoria"];
			var btn = btn_base.replace("#link_cat", link);
			btn = btn.replace("#nombre", subcat["id_categoria"]);
			$('#recuadro_subcat').append(btn);
		});
		$('.loader').fadeOut("slow");
	});
	
	$('#bread_categoria').empty().append($('#supercategoria').attr("value").replace("/", " y "));
});