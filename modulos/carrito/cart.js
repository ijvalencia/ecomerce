var img_error = "http://placehold.it/100x100";
var parametros
var tipo_cambio;
var sesion="";

$(document).ready(function() {
	/*Obtener sesion y otros datos */
	$.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {
		sesion = datos;
	});
	$.getJSON("../../bin/ingresar.php?categoria=parametros", function(datos) {
		parametros = datos;
		tipo_cambio = parseFloat(datos["tipo_cambio"]) + parseFloat(datos["agregado"]);
	});
	
	/* Muestra los articulos */
	mostrarArticulos();
	
	/* Carga los envios */
	$.getJSON("../../bin/ingresar.php?categoria=envios", function(dato) {
		/*Inserta los datos si es Modal
		var check_envios = '<label><input type="checkbox" class="radio_modal" value="1" id="radio#n"><b>nombre_paqueteria<b> descripcion_paqueteria<label>';*/
		var check_envios = '<option>nombre_paqueteria</option>';
		$.each(dato, function(i, valores) {
			var salida = check_envios;
			//			salida = salida.replace("#n", valores['id_envios']);
			salida = salida.replace("nombre_paqueteria", valores['empresa']);
			/*salida = salida.replace("descripcion_paqueteria", valores['descripcion']);
			alert(salida);
			$('.modal-body').append(salida);*/
			$('#selector_envio').append(salida);
		});
	});
	
	
	$('#btn_confirmar_compra').on("click",function() { 
		//alert("hola"+sesion);
		if(sesion == "" || sesion == "invitado" || sesion == null){
			alert("Registrate para poder seguir con tu compra");
			window.location.href = "../../modulos/login/index.php";
			window.close();
			// Enviar a la pagina de registro
		} else {
			if (parseFloat($('#txt_total').text()) > parametros["compra_maxima"]){
				alert("Para confirmar tu compra comunicate a " + parametros["no_cva"]);
				// Mandar correo con el numero de orden y telefono de confirmacion
			} else {
				// Ir a metodos de pago 
			}
			// Enviar a la pag de ordenes
		}
	});     
});

function mostrarArticulos() {
	var tabla_producto = '<tr id="tabla#n"><td data-th="Product"><div class="col-sm-4"><img src="link_imagen" class="img-responsive"/></div><div class="col-sm-8"><h5 class="nomargin">nombre_producto</h5></div></td><td data-th="Price"><span class="precios">precio_producto</span></td><td data-th="Quantity"><input class="numero_cantidad" type="number" value="1" min="1" max="99" style="width:60px" onchange="actualizarTotal()" onkeydown="return false"></td><td class="actions" data-th=""><a onclick="borrarArticulo(#n)"><i class="fa fa-trash-o"></i></a></td></tr>';
	$.getJSON("../../bin/ingresar.php?categoria=getCarrito", function(dato) {
		console.log(dato);
		$.each(dato, function(j, valor) {
			var salida = tabla_producto;
			salida = salida.replace(/#n/g, j);
			salida = salida.replace("link_imagen", valor['imagen']);
			salida = salida.replace("nombre_producto", valor['descripcion']);
			salida = salida.replace("precio_producto", valor['moneda'] === "Pesos" ? valor["precio"] + " " : (valor["precio"]*tipo_cambio).toFixed(2) + " ");
			$('tbody').append(salida);
		});
		var sub = 0;
		var precios = $(".precios").text().split(" ");
		$.each($('.numero_cantidad'), function(i, valor) {
			sub += valor.value * precios[i];
		});
		sub = sub.toFixed(2);
		$('#txt_subtotal').append(sub);
		$('#txt_total').append(sub);
		$('.loader').fadeOut("slow");
	});
}

function borrarArticulo(index) {
	$('#tabla'+index).remove();
	$.ajax({
		url: "../../bin/ingresar.php?categoria=borrarCarrito",
		type: "POST",
		data: {"articulo": index},
		success: function() {
			actualizarTotal();
		}
	});
}

function actualizarTotal() {
	$('#txt_subtotal').empty();
	$('#txt_total').empty();
	var sub = 0;
	var precios = $(".precios").text().split(" ");
	$.each($('.numero_cantidad'), function(i, valor) {
		sub += valor.value * precios[i];
	});
	sub = sub.toFixed(2);
	$('#txt_subtotal').append(sub);
	$('#txt_total').append(sub);
}

