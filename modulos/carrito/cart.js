var parametros;
var tipo_cambio;
var iva;
var sesion = "";
var dato;
var codigofabricante, direcion = 0, numeroorden;
var txtcantidad0 = 0, txtcantidad1 = 0, txtcantidad2 = 0, txtcantidad3 = 0, txtcantidad4 = 0, txtcantidad5 = 0;

var datoss;

$.getJSON("../../bin/ingresar.php?categoria=parametros", function (datos) {
    parametros = datos;
    tipo_cambio = parseFloat(datos["tipo_cambio"]) + parseFloat(datos["agregado"]);
    iva = (datos.iva/100)+1;
});

$(document).ready(function () {
    /*Obtener sesion y otros datos */
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function (datos) {
        sesion = datos;
    });
    /*Muestra los articulos */

    mostrarArticulos();

    /*Carga los envios */
    $.getJSON("../../bin/ingresar.php?categoria=envios", function (dato) {
        /*Inserta los datos si es Modal
         var check_envios = '<label><input type="checkbox" class="radio_modal" value="1" id="radio#n"><b>nombre_paqueteria<b> descripcion_paqueteria<label>';*/
        var check_envios = '<option value="numero">nombre_paqueteria</option>';
        $.each(dato, function (i, valores) {
            var salida = check_envios;
            salida = salida.replace("numero", valores['id_envios']);
            salida = salida.replace("nombre_paqueteria", valores['empresa']);
            /*salida = salida.replace("descripcion_paqueteria", valores['descripcion']);
             alert(salida);
             $('.modal-body').append(salida);*/
            $('#selector_envio').append(salida);
        });
        var stringB = new String(sesion);
        //var fieldd = stringB.split(",",2);
        var field = stringB.split(",");
        nombre = field[0];
        apellido = field[1];
        number = field[2];
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=direccioness",
            data: {"idusuarios": number},
            success: function (mnsdireccion) {
                // console.log(mnsdireccion);
                // Esta madre da indefinido, corregir
                mnsdireccion = JSON.parse(mnsdireccion);
                direcion = String(mnsdireccion[0]["id_direccion"]);
            }
        });
        $('.loader').fadeOut("slow");
    });
    $('#btn_confirmar_compra').on("click", function () {
        //alert("hola"+sesion);
        if (sesion == "" || sesion == "invitado" || sesion == null) {
            jAlert("Registrate para poder seguir con tu compra");
            window.location.href = "../../modulos/login/index.php";
            window.close();
            // Enviar a la pagina de registro
        } else {
            if (parseFloat($('#txt_total').text()) > parametros["compra_maxima"]) {
                jAlert("Para confirmar tu compra comunicate a " + parametros["no_cva"]);
            } else {                
                
                $.ajax({
                    type: "get",
                    url: "../../bin/ingresar.php?categoria=getCarrito",
                    success: function (mns){
                       mns = JSON.parse(mns);
                       codigofabricante = String(mns[0]["codigo_fabricante"]);
                       var txtidconsulta = $("#selector_envio").val();
                       var pago = "mastercard";
                       alert(txtidconsulta+number+direcion);   
                        txtcantidad0 = $("#cantidad0").val();
                          $.ajax({
                            type: "POST",
                            url: "../../bin/ingresar.php?categoria=agregarordenes",
                            data: {"idusuario": number, "direccion":direcion, "idenvio": txtidconsulta, "subtotal": subtotal, "metodo_pago": pago, "codigoF": codigofabricante,"cantidad":txtcantidad0},
                            success: function(mnss){
                                mnss = JSON.parse(mnss);
                                numeroorden = String(mnss[0]["id_ordenes"]);
                                alert("orden"+mnss[0]["id_ordenes"]+"number"+number);
                                
                          
                            }
                         });
                       }
                    });
                    /*$.ajax({
                        type:"POST",
                        url: "../../bin/ingresar.php?categoria=productosordenes",
                        data: {"id_orden":numeroorden,"codigoF": codigofabricante,"cantidad":txtcantidad0},
                            success: function (mns1){
                                jAlert("hola a todos productos orden"+mns1);
                                  if (mns1 !== null) {
                                     jAlert("COMPRA REALIZADA CON EXITO");
                                } else if (mns1 === null){
                                         jAlert("ERROR");
                                    }
                                }
                            });*/  
                 }        
                    //jAlert("entro"+datoss);
              }
            // Enviar a la pag de ordenes
    });
});

function mostrarArticulos() {
var tabla_producto = '<tr id="tabla#n"><td data-th="Product"><div class="col-sm-4"><img src="link_imagen" class="img-responsive"/></div><div class="col-sm-8"><h5 class="nomargin">nombre_producto</h5></div></td><td data-th="Price">$<span class="precios">precio_producto</span><br><b>IVA: </b>$<span class="ivas">precio_iva</span></td><td data-th="Quantity"><input class="numero_cantidad" type="number" value="1" min="1" max="maximo" style="width:60px" onchange="actualizarTotal()" onkeydown="return false" id="cantidad#n"></td><td class="actions" data-th=""><a onclick="borrarArticulo(#n)"><i class="fa fa-trash-o"></i></a></td></tr>';
    $.getJSON("../../bin/ingresar.php?categoria=getCarrito", function (dato) {
        console.log(dato);

        $.each(dato, function (j, valor) {
            var salida = tabla_producto;
            salida = salida.replace(/#n/g, j);
            salida = salida.replace("maximo", parseFloat(valor['disponible']) + parseFloat(valor['disponibleCD']));
            salida = salida.replace("link_imagen", valor['imagen']);
            salida = salida.replace("nombre_producto", valor['descripcion']);
            salida = salida.replace("precio_producto", valor['moneda'] === "Pesos" ? valor["precio"] + " " : (valor["precio"] * tipo_cambio).toFixed(2) + " ");
            salida = salida.replace("precio_iva", valor['moneda'] === "Pesos" ? (valor["precio"]*(iva-1)).toFixed(2) +" " : (valor["precio"] * tipo_cambio *(iva-1)).toFixed(2) + " ");
            $('tbody').append(salida);
            // alert(salida);
        });
        var sub = 0;
        var precios = $(".precios").text().trim().split(" ");
        $.each($('.numero_cantidad'), function (i, valor) {
            sub += valor.value * precios[i];
        });
        var sub_iva = 0;
        var ivas = $('.ivas').text().trim().split(" ");
        $.each($('.numero_cantidad'), function (i, valor) {
            sub_iva += valor.value * ivas[i];
        });
        $('#txt_subtotal').append(sub);
        $('#txt_iva').append(sub_iva.toFixed(2));
        $('#txt_total').append((parseFloat(sub) + parseFloat(sub_iva)).toFixed(2));
        $('.loader').fadeOut("slow");
    });
}

function borrarArticulo(index) {
    $('#tabla' + index).remove();
    $.ajax({
        url: "../../bin/ingresar.php?categoria=borrarCarrito",
        type: "POST",
        data: {"articulo": index},
        success: function () {
            actualizarTotal();
        }
    });
}

function actualizarTotal() {
    $('#txt_subtotal').empty();
    $('#txt_iva').empty();
    $('#txt_total').empty();
    var sub = 0;
    var precios = $(".precios").text().trim().split(" ");
    $.each($('.numero_cantidad'), function (i, valor) {
        sub += valor.value * precios[i];
    });
    var sub_iva = 0;
    var ivas = $('.ivas').text().trim().split(" ");
    $.each($('.numero_cantidad'), function (i, valor) {
        sub_iva += valor.value * ivas[i];
    });
    sub = sub.toFixed(2);
    $('#txt_subtotal').append(sub);
    $('#txt_iva').append(sub_iva.toFixed(2));
    $('#txt_total').append((parseFloat(sub) + parseFloat(sub_iva)).toFixed(2));
}

