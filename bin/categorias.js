var categorias;
var subcategorias = [];
var imagenes = [];

$(document).ready(function() {
});

$.getJSON("../../bin/ingresar.php?categoria=getCategorias", function(respuesta) {
	categorias = respuesta;
	$('#supercategorias').empty();
	$('#categorias_busqueda').empty();
	$('#categorias_busqueda').append('<li><a onclick="busquedaCat(666)">Todo</a></li>');
	var lista = '<li onmouseover="cargarLista(#id_cat)"><a href="link_categoria">nombre_categoria</a></li>';
	$.each(categorias, function(i, datos) {
		var aux = lista;
		aux = aux.replace("#id_cat", datos["id_super"]);
		aux = aux.replace("nombre_categoria", datos["nombre"]);
		
		// AQUI CAMBIAS EL LINK DE LA CATEGORIA
		aux = aux.replace("link_categoria", "../../modulos/productos/detalles.php?extra=1&categoria="+datos["id_super"]);
		
		$('#supercategorias').append(aux);
		$('#categorias_busqueda').append('<li><a onclick="busquedaCat('+i+')">'+datos["nombre"]+"</a></li>");		
	});
	/* Cargar las cubcategorias*/
	for (var i = 0; i < categorias.length; i++) {
		$.getJSON("../../bin/ingresar.php?categoria=getSubcategorias&subcategoria="+categorias[i]["nombre"], function(subrespuesta) {
			subcategorias.push(subrespuesta);
			cargarLista(categorias[0]["id_super"]);
		});
	}
});

function cargarLista(numero) {
	numero = parseInt(numero);
	$('#lista_subcat').empty(); 
	$('#lista_subcat2').empty();
	
	var inicio = '<li><a href="#">';
	var fin = "</a></li>";
	var id_append = '#lista_subcat';
	for (var i = 0; i < categorias.length; i++)
		if (categorias[i]["id_super"] == numero)
			numero = categorias[i]["nombre"];
//	console.log("categoria: " + numero);
	$.each(subcategorias, function(i, subcat) {
		if (subcat[0]["id_supercategoria"] == numero) {
			$.each(subcat, function(j, subs) {
//				console.log(subs);
				var link = inicio;
				if(j >= (subcat.length / 2))
					id_append = '#lista_subcat2';
				link = link.replace("#", "../../modulos/productos/detalles.php?extra=1&subcategoria="+subs["id_categoria"]);
				$(id_append).append(link + subs["id_categoria"] + fin);
			});
			return;
		}
	});
	$('#img_navbar').attr("src", "../../IMG/categorias/icono_"+numero.replace("/", "-")+".png");
}

function busquedaCat(index) {
	$('#categoria_elegida').empty();
	if (index == 666) 
		$('#categoria_elegida').append("Todo");
	else 
		$('#categoria_elegida').append(categorias[index]["nombre"]);
	$('#entrada_categoria').attr("value", $('#categoria_elegida').text());
	console.log($('#categoria_elegida').val);
}
