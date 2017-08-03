$(document).ready(function() {
    $('.dropdown-toggle').click(function() {
//        console.log($(this).attr("id"));
        switch($(this).attr("id")) {
            case "btn_marca":
                mostrar('#sub_marca');
                break;
            case "btn_disponible":
                mostrar('#sub_disponible');
                break;
            case "btn_precio":
                mostrar('#sub_precio');
                break;
            case "btn_orden":
                mostrar('#sub_orden');
                break;
        }
    });
});

function mostrar(id_contenedor) {
    if ($(id_contenedor).attr("class").indexOf("hidden") != -1)
        $(id_contenedor).removeClass("hidden");
    else
        $(id_contenedor).addClass("hidden");
}