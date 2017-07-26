var tabla_productos = "<div class='col-md-2' id='mostrar'><img id='superior2' src='imgenes' class='img-responsive' style='width: 100%;' alt='Image'><div id='mensaje'><p><small>descripcion</small>precio</p></div></div>";
var carrusel = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarrusel' alt='Image'><p><hr><small>descripcion</small>precio</p></a></div>";
var image,images;

$(document).ready(function() {    
   $.getJSON("../../bin/ingresar.php?categoria=informa", function(respuesta) {
         console.log(respuesta);
         $.each(respuesta, function(i, valor){
         image = tabla_productos;
         image = image.replace("imgenes",valor['imagen']);
	 image = image.replace("descripcion",valor['descripcion']);
	 image = image.replace("marca",valor['marca']);
         image = image.replace("precio","$"+valor['precio']);
         $('.imgg').append(image);
       });
   });
   
   $.getJSON("../../bin/ingresar.php?categoria=carrusel", function(respuestacarrusel) {
         console.log(respuestacarrusel);
         $.each(respuestacarrusel, function(i, valor){
         images=carrusel;
         
         images = images.replace("imagecarrusel",valor['imagen']);
	 images = images.replace("descripcion",valor['descripcion']);
         images = images.replace("precio","$"+valor['precio']);
         for(var i = 0; images<=3; i++){
             if (i)
             var div=" <div class='row'></div>";
         }
         console.log(images);
         
         //alert(images);
         //$('.proresientes').append(images);
         
         $(".proresientes").append(images);
      });
   });
});

/*var uno1 = tabla_productos[0];
            var uno2 = tabla_productos[1];
            var uno3 = tabla_productos[2];
            var uno4 = tabla_productos[3];        
            var uno5 = tabla_productos[4];
            $(".imgg").html(uno1);
            $(".imgg").html(uno2);
            $(".imgg2").html(uno3);
            $(".imgg3").html(uno4);
            $(".imgg4").html(uno5);
           */
        // apellido = field[1];
        //         
 	    //image = image.replace("imgenes",mng['imagen']);
	    //image = image.replace("descripcion",mng['descripcion']);
	    //image = image.replace("marca",mng['marca']);
	    //image = image.replace("precio", "$",mng['precio']);      