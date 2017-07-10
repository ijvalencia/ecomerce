var img_error = "http://placehold.it/100x100";
var tabla_productos = "<div class='col-md-2' id='mostrar'><img id='superior2' src='imgenes' class='img-responsive' style='width: 100%' alt='Image'><div id='mensaje'><p><small>descripcion</small>precio</p></div></div>";
var imagenes;
$(document).ready(function () {   
    $.getJSON("Ofertas.php",function(datos){
          $.each(datos,function(nombre,valorr){
            $.each(valorr,function(i,valorr){
			imagenes = tabla_productos;
			imagenes = imagenes.replace("imgenes",valorr['imagen']);                       
                        imagenes = imagenes.replace("descripcion",valorr['descripcion']);
		        imagenes = imagenes.replace("precio","$",valorr['precio']);
                      // alert("imagenes"+imagenes);  
        		$('.imgg').append(imagenes);
                   });
		});
                imagenes.classList.toggle("show");
		console.log(tabla_productos);
    });
       $(".click2").on('click', function () {
          var btnmenu2 = "accesorios"; //$("#2").html();
             alert("uno2");
             
           var respuesta = $.post("bin/ingresar.php",{categorias:btnmenu2}); 
                respuesta.done(function(msn){          
                    alert(msn);
                });
            });
        $(".click3").on('click', function () {
         var btnmenu3="almacenamiento";
            alert("uno3");
            var respuesta = $.post("bin/ingresar.php",{categorias:btnmenu3}); 
                respuesta.done(function(msn){    
                    alert(msn);
                });
            });
        $(".click4").on('click', function () {
            btnmenu4 = "audio_videos";  // $("#4").html();
             alert("uno4");
            var respuesta = $.post("bin/ingresar.php",{categorias:btnmenu4}); 
                respuesta.done(function(msn){            
                    alert(msn);
            });
        });
   
        $(".click5").on('click', function () {
            btnmenu5 = "computadoras"; //$("#5").html();
             alert("uno5");
         
         var respuesta = $.post("bin/ingresar.php",{categorias:btnmenu5}); 
                respuesta.done(function(msn){    
                   
                alert(msn);            
      });
    });   
 });