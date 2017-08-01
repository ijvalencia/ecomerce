var nombre="inv";
var number,apellido;
/* global sesion */
num=1;
$(document).ready(function(){ 
     if(nombre==="inv"){
      $(".ocultar").css("display","none");
    }
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
	sesion = datos;   
        var stringB = new String(sesion);
        var fieldd = stringB.split(",",2);
   
        
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
	