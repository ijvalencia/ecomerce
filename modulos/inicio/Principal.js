var img_error = "http://placehold.it/100x100";
//var tabla_productos = "<div class='col-md-2' id='mostrar'><img id='superior2' src='imgenes' class='img-responsive' style='width: 100%;' alt='Image'><div id='mensaje'><p><small>descripcion</small>precio</p></div></div>";
var carrusel =  "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel' alt='Image'><p><hr><small>descripcion</small>precio</p></a></div>";
var carrusel2 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel2' alt='Image'><p><hr><small>descripcion2</small>precio2</p></a></div>";
var carrusel3 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel3' alt='Image'><p><hr><small>descripcion3</small>precio3</p></a></div>";
var carrusel4 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel4' alt='Image'><p><hr><small>descripcion4</small>precio4</p></a></div>";
var carrusel5 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel5' alt='Image'><p><hr><small>descripcion5</small>precio5</p></a></div>";
var carrusel6 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel6' alt='Image'><p><hr><small>descripcion6</small>precio6</p></a></div>";
var carrusel7 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel7' alt='Image'><p><hr><small>descripcion7</small>precio7</p></a></div>";
var carrusel8 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel8' alt='Image'><p><hr><small>descripcion8</small>precio8</p></a></div>";
var carrusel9 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel9' alt='Image'><p><hr><small>descripcion9</small>precio9</p></a></div>";


var image,images,images2,images3,images4,images5,images6,images7,images8,imagen9;

$(document).ready(function() {    
    /* SATANAS */
	var productos_busqueda = [];
	$.getJSON("../../bin/ingresar.php?categoria=productosInicio", function(respuesta){
		$.each(respuesta, function(i, objeto) {
			productos_busqueda.push(objeto);
		});
		var html_imagen = '<div class="col-sm-3 container_img_producto " id="mostrar"><a href="../detalles_producto/index.php?categoria=&producto=#id_producto" class="thumbnail"><img src="#imagen" class="img-responsive" style="width:100%" onerror="this.src=\'../../IMG/error.jpg\'"><p class="cortar"><small>#descripcion</small>#precio</p><div id="mensaje"><h6 id="grupos">des</h6></div></a></div>';
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
			imagen = imagen.replace("#descripcion", producto["descripcion"] + "<br>");
                        imagen = imagen.replace("des",producto["grupo"]);
                        imagen = imagen.replace("#precio","$"+producto["precio"]+"<br>");
			$(id_tabla).append(imagen);
		});
		$('.loader').fadeOut("slow");
	});
    /* $.getJSON("../../bin/ingresar.php?categoria=informa", function(respuesta) {
//         console.log(respuesta);
         $.each(respuesta, function(i, valor){
         image = tabla_productos;
         image = image.replace("imgenes",valor['imagen']);
	 image = image.replace("descripcion",valor['descripcion']);
	 image = image.replace("marca",valor['marca']);
         image = image.replace("precio","$"+valor['precio']);
         $('.imgg').append(image);
       });
   });
  */
  /* $.getJSON("../../bin/ingresar.php?categoria=carrusel", function(respuestacarrusel) {
//         console.log(respuestacarrusel);
         $.each(respuestacarrusel, function(i, valor){
         images=carrusel; 
         images = images.replace("imagecarrusel",valor['imagen']);
	 images = images.replace("descripcion",valor['descripcion']);
         images = images.replace("precio","$"+valor['precio']);
//         console.log(images);
         $(".imgcarrusel").append(images);
      });
   });*/
   
   $.getJSON("../../bin/ingresar.php?categoria=carrusel2", function(respuestacarrusel2) {
//         console.log(respuestacarrusel2);
         $.each(respuestacarrusel2, function(i, valor2){
         images2=carrusel2; 
         images2 = images2.replace("imagecarrusel2",valor2['imagen']);
	 images2 = images2.replace("descripcion2",valor2['descripcion']);
         images2 = images2.replace("precio2","$"+valor2['precio']);
//         console.log(images2);
         $(".imgcarrusel2").append(images2);
      });
   });

$.getJSON("../../bin/ingresar.php?categoria=carrusel3", function(respuestacarrusel3) {
//         console.log(respuestacarrusel3);
         $.each(respuestacarrusel3, function(i, valor3){
         images3=carrusel3; 
         images3 = images3.replace("imagecarrusel3",valor3['imagen']);
	 images3 = images3.replace("descripcion3",valor3['descripcion']);
         images3 = images3.replace("precio3","$"+valor3['precio']);
//         console.log(images3);
         $(".imgcarrusel3").append(images3);
      });
   });
  
  
   /*fin de lo nuevo */
   /*carrusel TV */
   
$.getJSON("../../bin/ingresar.php?categoria=carruselTv1", function(respuestacarrusel4) {
//         console.log(respuestacarrusel4);
         $.each(respuestacarrusel4, function(i, valor4){
         images4=carrusel4; 
         images4 = images4.replace("imagecarrusel4",valor4['imagen']);
	 images4 = images4.replace("descripcion4",valor4['descripcion']);
         images4 = images4.replace("precio4","$"+valor4['precio']);
//         console.log(images4);
         
         $(".imgcarrusel4").append(images4);
      });
   });
   $.getJSON("../../bin/ingresar.php?categoria=carruselTv2", function(respuestacarrusel5) {
//         console.log(respuestacarrusel5);
         $.each(respuestacarrusel5, function(i, valor5){
         images5=carrusel5; 
         images5 = images5.replace("imagecarrusel5",valor5['imagen']);
	 images5 = images5.replace("descripcion5",valor5['descripcion']);
         images5 = images5.replace("precio5","$"+valor5['precio']);
//         console.log(images5);
         //alert(images5);
        $(".imgcarrusel5").append(images5);
      });
   });
   
   $.getJSON("../../bin/ingresar.php?categoria=carruselTv3", function(respuestacarrusel6) {
//         console.log(respuestacarrusel6);
         $.each(respuestacarrusel6, function(i, valor6){
         images6=carrusel6; 
         images6 = images6.replace("imagecarrusel6",valor6['imagen']);
	 images6 = images6.replace("descripcion6",valor6['descripcion']);
         images6 = images6.replace("precio6","$"+valor6['precio']);
//         console.log(images6);
         $(".imgcarrusel6").append(images6);
      });
   }); /*fin carrusel TV */
}); 

/*carrusel del  computadoras*/
$(document).ready(function (){    
    $.getJSON("../../bin/ingresar.php?categoria=carruselPC1", function(Rescarrusel7) {
//           //   console.log(Rescarrusel7);
         //alert(Rescarrusel7);
         $.each(Rescarrusel7, function(i, valor7){
         images7=carrusel7; 
         images7 = images7.replace("imagecarrusel7",valor7['imagen']);
	 images7 = images7.replace("descripcion7",valor7['descripcion']);
         images7 = images7.replace("precio7","$"+valor7['precio']);
//         console.log(images7);
         $(".imgcarrusel7").append(images7);
      });
   });
   
   $.getJSON("../../bin/ingresar.php?categoria=carruselPC2", function(Rescarrusel8) {
//        // console.log(Rescarrusel8);
       //  alert(Rescarrusel8);
         $.each(Rescarrusel8, function(i, valor8){
         images8=carrusel8; 
         images8 = images8.replace("imagecarrusel8",valor8['imagen']);
	 images8 = images8.replace("descripcion8",valor8['descripcion']);
         images8 = images8.replace("precio8","$"+valor8['precio']);
//         console.log(images8);
         $(".imgcarrusel8").append(images8);
      });
   });
    $.getJSON("../../bin/ingresar.php?categoria=carruselPC3", function(Rescarrusel9) {
//     //    console.log(Rescarrusel9);
       //  alert(Rescarrusel9);
         $.each(Rescarrusel9, function(i, valor9){
         images9=carrusel9; 
         images9 = images9.replace("imagecarrusel9",valor9['imagen']);
	 images9 = images9.replace("descripcion9",valor9['descripcion']);
         images9 = images9.replace("precio9","$"+valor9['precio']);
//         console.log(images9);
         $(".imgcarrusel9").append(images9);
      });
   });





/* SATANAS */

	var contenedor = '<div class="item"><div class="row"><div class="imgcarrusel#n">#imagenes</div></div></div>';
	var img_carrusel = '<div class="col-md-3"><a href="#" class="thumbnail" id=sombreado><img src="#imagen_carrusel"><p><hr><small>#descripcion</small>#precio</p></a></div>';
	
	var contenedor_aux;
	var img_aux = "";
	
	$.getJSON("../../bin/ingresar.php?categoria=productosInicio", function(resp) {
		$.each(resp, function(i, producto) {
			img_aux += img_carrusel;
			img_aux = img_aux.replace("#imagen_carrusel", producto['imagen']);
			img_aux = img_aux.replace("#descripcion", producto['descripcion']);
			img_aux = img_aux.replace("#precio", producto['precio']);
			switch(i) {
				case 3:
					contenedor_aux = contenedor.replace("item", "item active");
					contenedor_aux = contenedor_aux.replace("#imagenes", img_aux);
					img_aux = "";
					$('#carrusel_satan').append(contenedor_aux);
					break;
				case 7:
				case 11:
					contenedor_aux = contenedor;
					contenedor_aux = contenedor_aux.replace("#imagenes", img_aux);
					img_aux = "";
					$('#carrusel_satan').append(contenedor_aux);
					break;
			}
		});
	});

});















