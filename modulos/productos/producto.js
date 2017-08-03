var tabla_producto;
//var x=getUrlParameter('subcategoria');
var x=0;
var tipo_cambio;

$(document).ready(function() {
	var loc = document.location.href;
	if(loc.indexOf('?') > 0)
	{
		var getString = loc.split('?')[1];
		var GET = getString.split('&');
		var get = {};
		for(var i = 0, l = GET.length; i < l; i++) {
			var tmp = GET[i].split('=');
			get[tmp[0]] = unescape(decodeURI(tmp[1]));
		}
	}
	/* Separa los parametros del get para mostrar los articulos */
	if(get)
	{
		for(var ver in get)
		{
			//jAlert(ver);
			//jAlert(get[ver]);
			if(ver=="extra")
				var lugar=get[ver];
			if(ver=="marca")
				var marca=get[ver];
			if(ver=="envio")
				var envio=get[ver];
			if(ver=="priceMIN")
				var min=get[ver];
			if(ver=="priceMAX")
				var max=get[ver];
                        if(ver=="orden")
                                var orden=get[ver];
			if (ver=="subcategoria")             
				mostrarArticulos(get[ver], lugar, marca, envio, min, max, orden);
		}
	}
	else
		jAlert("Pagina no encontrada.");
	
	/* SATANAS */
	var supercategoria = $('#supercategoria').attr("value");
	var busqueda = $('#busqueda').attr("value");
	if (!jQuery.isEmptyObject(supercategoria) && !jQuery.isEmptyObject(busqueda)) {
		$('.breadcrumb').append("<li><a></a>Busqueda</li>");
		busqueda = busqueda.trim().split(" ");
		var productos_busqueda = [];
		$.getJSON("../../bin/ingresar.php?categoria=parametros", function(datos) {
			var parametros = datos;
			tipo_cambio = parseFloat(datos["tipo_cambio"]) + parseFloat(datos["agregado"]);
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
//					console.log(productos_busqueda);
                    var html_imagen = '<div class="col-md-3"><a href="../detalles_producto/index.php?categoria=#cat&producto=#id_producto" class="thumbnail  container_img_producto" id=sombreado><img  src="#imagen" class="img-responsive" style="width:100%; height: 55%;" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>#descripcion</small></p><h4>$#costo<br>&#9733;&#9733;&#9733;&#9733;&#9733;(0)</h4></a></div>';
					html_imagen = html_imagen.replace("#cat", $('#subcategoria').attr("value"));
//					console.log(html_imagen);
					var tabla_producto='<div class="container-fluid bg-3 text-center" id="tabla_#id_tabla"></div>';
					var id_tabla;
					var t = 0;
					$.each(productos_busqueda, function(i, producto) {
						var imagen = html_imagen;
						var tabla = tabla_producto;
						if(i % 4 == 0 || t == 0) {
							id_tabla = "#tabla_" + t;
							$('ttbody').append(tabla.replace("#id_tabla", t));
							t++;
						}
						imagen = imagen.replace("#id_producto", producto["codigo_fabricante"]);
						imagen = imagen.replace("#imagen", producto["imagen"]);
						imagen = imagen.replace("#descripcion", producto["descripcion"].substring(0,30) + "...<br>");
						imagen = imagen.replace("#costo", producto["moneda"] == "Pesos" ? producto["precio"] : (producto["precio"]*tipo_cambio).toFixed(2));
						$(id_tabla).append(imagen);
					});
					$('.loader').fadeOut("slow");
				}
			});
		});
	}
//	$('.breadcrumb').append("<li>"+$('#subcategoria').attr("value")+"</li>");
	/***********/
});

//grupo/categoria, paginacion/extra, marca, envio/(local/foraneo/indef), precio minimo, precio maximo
function mostrarArticulos(crayola, plastilina, marcador, avionpapel, miSalario, McPato, fascismo) {
	$.get("../../bin/ingresar.php?categoria=marcas&grupo="+crayola, function(respuesta) {
		respuesta=respuesta.split(";");
		for(var x=0; x<respuesta.length-1;x++)
			$('#marquitas').append("<option value='"+respuesta[x]+"'>"+respuesta[x]+"</option> ");
	});
	$.get("../../bin/ingresar.php?categoria=listadocantidad&cantidad="+plastilina+"&marca="+marcador+"&envio="+avionpapel+"&minn="+miSalario+"&maxn="+McPato+"&orden="+fascismo+"&grupo="+crayola, 
	function(cantidad) {
		$('#catidad').append(cantidad);
		$('#AquiGrupo').append(crayola);
	});
	$.ajax({
		type: "POST",
		url: "../../bin/ingresar.php?extra="+plastilina+"&marca="+marcador+"&envio="+avionpapel+"&min="+miSalario+"&max="+McPato+"&orden="+fascismo+"&categoria="+crayola,
		data:{},       
		success: function(articulo) {
			//console.log(articulo);
                        //jAlert("../../bin/ingresar.php?extra="+plastilina+"&marca="+marcador+"&envio="+avionpapel+"&min="+miSalario+"&max="+McPato+"&orden="+fascismo+"&categoria="+crayola);
			var dato=JSON.parse(articulo);
			//console.log(dato);
			//jAlert(dato.item.length);
			var imprimemela="";
			for(var y=0; y < dato.item.length; y++)
			{
                tabla_producto = '<div class="col-md-3"><a href="../detalles_producto/index.php?categoria='+crayola+'&producto=compa" class="thumbnail  container_img_producto" id=sombreado><img  src="imagen" class="img-responsive" style="width:100%; height: 55%;" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><hr><small>Texto...</small></p><h4>precio<br>&#9733;&#9733;&#9733;&#9733;&#9733;(0)</h4></a></div>';
				if (x==0)
					tabla_producto='<div class="container-fluid bg-3 text-center">' + tabla_producto;
				if (x==3) 
				{
					tabla_producto+='</div>';
					x=0;
				} else
					x++;   
				
				var salida = tabla_producto;
				salida = salida.replace("imagen", dato.item[y].imagen);
				salida = salida.replace("compa", dato.item[y].codigo_fabricante);
				salida = salida.replace("Texto", dato.item[y].descripcion.substring(26,0));
                                salida = salida.replace("precio", "$"+dato.item[y].precio);
				//salida = salida.replace("precio_producto", "$" + valor['precio']);
				imprimemela += salida;
				if(x==0 || y==dato.item.length-1)
				{
					$('ttbody').append(imprimemela);
					imprimemela="";
				}
			};
			$('.loader').fadeOut("slow");
		}
	});

}

