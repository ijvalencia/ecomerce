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
    $.get("../../bin/ingresar.php?categoria=meterComentario&usuario=" + number + "&comentario=" + comentario + "&calificacion=" + calificacion + "&producto=" + producto,
            function (resultado) {
                var avan = 0;
                if (resultado !== "Ya comentaste el producto")
                {
                    alert(resultado);
                } else {
                    if (confirm("Ya tienes comentario en este producto, presiona OK para eliminarlo."))
                    {
                        avan = 1;
                        $.get("../../bin/ingresar.php?categoria=eliminarComentario&usuario=" + number + "&producto=" + producto,
                                function (eliminar)
                                {
                                    alert(eliminar);
                                    history.back();
                                })
                    }
                }
                if (avan == 0)
                    history.back();
            });
});
