
/*var img_error = "http://placehold.it/100x100";
var tabla_productos = "<div class='col-md-2' id='mostrar'><img id='superior2' src='imgenes' class='img-responsive' style='width: 100%;' alt='Image'><div id='mensaje'><p><small>descripcion</small>precio</p></div></div>";
var carrusel="<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagen' alt='Image' style='max-width:100%;' alt='Image'><p><small>descripcion</small>precio</p></a></div>";
var carruse2="<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagen' alt='Image' style='max-width:100%;'><p><small>descripcion</small>precio</p></a>";
var carruse3="<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagen' alt='Image' style='max-width:100%;'><p><small>descripcion</small>precio</p></a>";
var imagenes,image,i;
var nombre;*/
var nombre="inv";
var number,apellido;
/* global sesion */

$(document).ready(function(){ 
     if(nombre==="inv"){
      $(".ocultar").css("display","none");
    }
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
	sesion = datos;   
        var stringB = new String(sesion);
        var fieldd = stringB.split(",",2);
        //alert(fieldd);
        
      $('#nombre_usuario_nav').append(fieldd);
         var field = stringB.split(",");
         nombre = field[0];
         apellido = field[1];
         number = field[2];
   
    if(nombre!==null){
      $(".ocultar").css("display","block");  
      }
   });
});

// $('.loader').fadeOut("slow");     
	/*$.getJSON("../../bin/ingresar.php?categoria=marcas&marca=MANHATTAN",function(datoss){
           $.each(datoss,function(nomb,valorrs){
			$.each(valorrs, function(is,valorrs){          
				//alert("entro");
				image = tabla_productos;
				image = image.replace("imgenes",valorrs['imagen']);
				image = image.replace("descripcion",valorrs['descripcion']);
				image = image.replace("marca",valorrs['marca']);
				image = image.replace("precio", "$", valorrs['precio']);      
				
				for(var k in image){
					//alert(k+"cantidad"+image.length);
					if (image.length === 281){ 
						$('.imgg').append(image);
						break;
					}   
					if(image.length === 286){
						$('.imgg').append(image);
						break;
					}
					if(image.length === 264){
						$('.imgg2').append(image);
						break;
					}
					if(image.length === 257){
						$('.imgg2').append(image);
						break;
					}
					if (image.length === 261){
						$('.imgg3').append(image);
						break;
					}                     $('.loader').fadeOut("slow");
				}   
			});
		});
		image.classList.toggle("show");
		console.log(tabla_productos);   
	});
	
	$.getJSON("Ofertas.php",function(datos){
	$.each(datos,function(nombre,valorr){
	$.each(valorr,function(i,valorr){
	imagenes = carrusel;
	imagenes = imagenes.replace("imagen",valorr['imagen']);                      
	imagenes = imagenes.replace("descripcion",valorr['descripcion']);
	imagenes = imagenes.replace("precio","$",valorr['precio']);
	$('.imgcarrusel').append(imagenes);
	$('.imgcarrusel1').append(imagenes);
	$('.imgcarrusel2').append(imagenes);                   
	});
	});
	imagenes.classList.toggle("show");
	});
        
	$.getJSON("../../bin/ingresar.php?categoria=Televicion&Tv=Televisor",function(datos){
		$.each(datos,function(nombre,valorr){
			$.each(valorr,function(i,valorr){    
				imagenes = carrusel;
				imagenes = imagenes.replace("imagen",valorr['imagen']);                       
				imagenes = imagenes.replace("descripcion",valorr['descripcion']);
				imagenes = imagenes.replace("precio",valorr['precio']);      
				$('.imgcarrusel,.imgcarrusel1,.imgcarrusel2').append(imagenes);
			});
		});
		imagenes.classList.toggle("show");
	});*/