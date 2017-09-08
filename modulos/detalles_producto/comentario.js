var calificacion = $('#calificacion').attr("value");
var comentario = $('#comentario').attr("value");
var producto = $('#producto').attr("value");
$.getJSON("../../bin/ingresar.php?categoria=sesion", function (sesion) {
    var nombre = sesion[0];
    var apellido = sesion[1];
    var number = sesion[2];

    //$('body').append(nombre + apellido + number);
    $.get("../../bin/ingresar.php?categoria=meterComentario&usuario=" + number + "&comentario=" + comentario + "&calificacion=" + calificacion + "&producto=" + producto,
            function (resultado) {
                var avan = 0;
                if (resultado !== "Ya comentaste el producto")
                {
                    alert(resultado);
                } else {
                    alert("Ya comento este producto, si desea agregar mas comentarios realice otra compra.");
                    history.back();
                }
                if (avan == 0)
                    history.back();
            });
});
