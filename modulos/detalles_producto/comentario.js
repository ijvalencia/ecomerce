var calificacion = $('#calificacion').attr("value");
var comentario = $('#comentario').attr("value");
var producto = $('#producto').attr("value");
$.getJSON("../../bin/ingresar.php?categoria=sesion", function (datos) {
    sesion = datos;
    console.log(sesion);
    var stringB = new String(sesion);
    var fieldd = stringB.split(",", 2);

    // $('#nombre_usuario_nav').append(fieldd);
    var field = stringB.split(",");
    nombre = field[0];
    apellido = field[1];
    number = field[2];
    
    //$('body').append(nombre + apellido + number);    
    //alert("../../bin/ingresar.php?categoria=meterComentario&usuario=" + number + "&comentario=" + comentario + "&calificacion=" + calificacion + "&producto=" + producto);
    
    $.get("../../bin/ingresar.php?categoria=meterComentario&usuario=" + number + "&comentario=" + comentario + "&calificacion=" + calificacion + "&producto=" + producto,
            function (resultado) {
                alert(resultado);
                history.back();
            });
});
