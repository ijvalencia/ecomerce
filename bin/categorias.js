var categorias;
var subcategorias = [];
var imagenes = [];
var extra = "marca=undefined&priceMIN=1&priceMAX=250000&envio=undefined";

$(document).ready(function() {
});

$.getJSON("../../bin/ingresar.php?categoria=getCategorias", function(respuesta) {
	categorias = respuesta;
	$('#supercategorias').empty();
	$('#categorias_busqueda').empty();
	$('#categorias_busqueda').append('<li><a onclick="busquedaCat(666)">Todo</a></li>');
	var lista = '<li onmouseover="cargarLista(#id_cat)"><a href="link_categoria"><img class="icon_navbar" src="#link_img">nombre_categoria</a></li>';
	var link_img = "../../IMG/categorias/icono_";
	$.each(categorias, function(i, datos) {
		var aux = lista;
		aux = aux.replace("#id_cat", datos["id_super"]);
		aux = aux.replace("nombre_categoria", datos["nombre"]);
		var img = link_img;
		img =  link_img + datos["nombre"].replace("/", "-") + ".png";
		aux = aux.replace("#link_img", img);
		
		// AQUI CAMBIAS EL LINK DE LA CATEGORIA
		aux = aux.replace("link_categoria", "../../modulos/categorias/index.php?categoria="+datos["nombre"]);
		
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
	
    var inicio = '<li><a class="btn-subcategoria" href="#">';
    var fin = "</a></li>";
	var id_append = '#lista_subcat';
	for (var i = 0; i < categorias.length; i++)
		if (categorias[i]["id_super"] == numero)
			numero = categorias[i]["nombre"];
//	console.log("categoria: " + numero);
    $('#img_navbar').attr("src", "../../IMG/navbar/banner_" + numero.replace("/", "_") + ".jpg");
    if (numero == "Equipo de computo")
        $('#img_navbar_2').attr("src", "../../IMG/laptop.gif");
     else
        $('#img_navbar_2').attr("src", "../../IMG/navbar/banner_laptops.jpg");
	$.each(subcategorias, function(i, subcat) {
		if (subcat[0]["id_supercategoria"] == numero) {
            $('#link_banner').attr("href", "../../modulos/productos/detalles.php?extra=1&marca=undefined&priceMIN=1&priceMAX=250000&envio=undefined&subcategoria=" + subcat[0]["id_categoria"]);
			$.each(subcat, function(j, subs) {
//				console.log(subs);
				var link = inicio;
				if(j > (subcat.length / 2))
					id_append = '#lista_subcat2';
				link = link.replace("#", "../../modulos/productos/detalles.php?extra=1&"+extra+"&subcategoria="+subs["id_categoria"]);
				$(id_append).append(link + subs["id_categoria"] + fin);
			});
			return;
		}
	});
}

function busquedaCat(index) {
	$('#categoria_elegida').empty();
	if (index == 666) 
	    $('#categoria_elegida').append("Todo");
	else 
	    $('#categoria_elegida').append(categorias[index]["nombre"]);
	$('#entrada_categoria').attr("value", $('#categoria_elegida').text());
//	console.log($('#categoria_elegida').text());
}

/* terminar de probar */
$('#btn_enviar').click(function(e) {
    e.preventDefault();
    var busqueda = $('#entrada_busqueda').val().toUpperCase();
    $.each(subcategorias, function(i, subcat) {
        $.each(subcat, function(j, subs) {
    	    if (busqueda.indexOf(subs["id_categoria"]) != -1) {
    	        window.location.replace("../../modulos/productos/detalles.php?extra=1&marca=undefined&priceMIN=1&priceMAX=250000&envio=undefined&subcategoria="+subs["id_categoria"]);
    	    }
        });
    });
});

