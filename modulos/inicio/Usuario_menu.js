var nombre="invitado";
var number,apellido;
/* global sesion */
num=1;
$(document).ready(function(){
    if(nombre === "invitado"){
        //$(".ocultar").css("display","none");
        $(".ocultar").hide();
        $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {
            sesion = datos;
            var stringB = new String(sesion);
            var fieldd = stringB.split(",",2);
            $('#nombre_usuario_nav').append(fieldd[0] === "invitado" ? "" : fieldd);
            var field = stringB.split(",");
            nombre = field[0];
            apellido = field[1];
            number = field[2];
            if(nombre !== "invitado") {
                $(".ocultar").show();
            }
        });
    }
});
