var nombre="invitado";
var number,apellido;
/* global sesion */
num=1;
$(document).ready(function(){
    if(nombre === "invitado"){
        //$(".ocultar").css("display","none");
        $(".ocultar").hide();
        $('#navbar-sesion-li').show();
        $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {
            sesion = datos;
            nombre = datos[0];
            apellido = datos[1];
            number = datos[2];
//            var stringB = new String(sesion);
//            console.log(datos);
            var fieldd = nombre+" "+apellido+" ";
            $('#nombre_usuario_nav').append(nombre === "invitado" ? "Invitado " : fieldd);
//            var field = stringB.split(",");
            if(nombre !== "invitado") {
                $(".ocultar").show();
                $('#navbar-sesion-li').hide();
            }
        });
    }
});
