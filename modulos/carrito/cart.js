var parametros;
var tipo_cambio;
var iva;
var sesion = "";
var dato, txtcantidad;
var direcion = 0, numeroorden, subtotal;
var txtcantidad0 = 0;
var sub = 0;
var sub_iva = 0;

$(document).ready(function () {

    /*Obtener sesion y otros datos */
    $.ajax({
        url: "../../bin/ingresar.php?categoria=parametros",
        async: false,
        data: {},
        success: function (resp) {
            resp = JSON.parse(resp);
            parametros = resp;
            tipo_cambio = parseFloat(resp["tipo_cambio"]) + parseFloat(resp["agregado"]);
            iva = (resp.iva / 100) + 1;
        }
    });
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
        
        //alert(number);
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=direccioness",
            data: {"idusuarios": number},
            success: function (mnsdireccion){
            console.log(mnsdireccion);
                // Esta madre da indefinido,corregir
            mnsdireccion = JSON.parse(mnsdireccion);
            direcion = String(mnsdireccion[0]["id_direccion"]);
            }
        });
        
        $('.loader').fadeOut("slow");
    });
    
    $('#abrir_tarjetas').on("click", function () {
        $('#form_busqueda').hide();
            alert("dato en blanco :"+number);
            
        if((number === "")||(nombre === "invitado") || (number === undefined)) {
            jAlert("Favor de iniciar sesion");
            window.location.href = "../../modulos/login/index.php";
            window.close();
        }
        else {
            $.ajax({
                type: "POST",
                url: "../../bin/ingresar.php?categoria=extraerCorreo",
                data: {"idusuariocompras": number},
                success: function (mnscorreo) {
                    console.log(mnscorreo);
                    mnscorreo = JSON.parse(mnscorreo);
                    var correo = String(mnscorreo[0]["correo"]);
                    $("#txtemailcompra").val(correo);
               }
            });
        }
    });
    
    $('#cerrar_tarjetas').on("click", function () {
        $('#form_busqueda').show();
    });

    $('#btn_confirmar_compra').on("click", function () {
        var res = String(sesion);
       //alert(res);
        var resesion = res.substring(0,8);
        //alert(resesion);
        if ((resesion === "") || (resesion === "invitado") || (resesion === null)) {
            jAlert("Registrate para poder seguir con tu compra");
            window.location.href = "../../modulos/login/index.php";
            window.close();
            console.log("no loguiado");
            //Enviar a la pagina de registro
        } else {
            if(parseFloat($('#txt_total').text()) > parametros["compra_maxima"]) {
                jAlert("Para confirmar tu compra comunicate a " + parametros["no_cva"]);
                console.log("parametro");
            } else {
                console.log("ya loguiados");
         /*     var cuentacorreos = $("input:text[id='txtemailcompra']").val();
                var cuentaclave = $("input:password[id='txtclavescompra']").val();
               alert(cuentacorreos + cuentaclave);
                $.ajax({
                    type: "POST",
                    url: "../../bin/ingresar.php?categoria=compararcuentass",
                    data: {"usuariocorreo": cuentacorreos, "usuarioclave": cuentaclave},
                    success: function (mnscompara) {
                       alert("hola" + mnscompara);
                    }
                });
         */
                $.ajax({
                    type: "get",
                    url: "../../bin/ingresar.php?categoria=getCarrito",
                    success: function (mns) {
                        console.log("getCarrito"+mns);    
                        mns = JSON.parse(mns);
                        var txtidconsulta = $("#selector_envio").val();
                        var pago = $("#selector_envio1").val();
             
                        $.ajax({
                            type: "POST",
                            async: true,
                            url: "../../bin/ingresar.php?categoria=agregarordenes",
                            data: {"idusuario": number,"direccion": direcion, "idenvio": txtidconsulta, "subtotal": formatoMoneda(parseFloat(sub) + parseFloat(sub_iva)), "metodo_pago": pago},
                            success: function (mnss){
                                console.log("agregar orden"+mnss);
                                $.each($('.numero_cantidad'), function (i, valor) {
                                    sub_iva += valor.value; //* ivas[i];
                                    txtcantidad = valor.value;

                                    //    alert(txtcantidad);
                                    for (var m in mns){
                                        console.log("codigofabricante"+mns[m]["codigo_fabricante"]);
                                        $.ajax({
                                            type: "POST",
                                            async: true,
                                            url: "../../bin/ingresar.php?categoria=productos_Odenes",
                                            data: {"id_orden": mnss, "codigoF": mns[m]["codigo_fabricante"], "cantidad": txtcantidad},
                                            success: function (ordenesproductos) {
                                              //  jAlert("prdoductos ordenes"+ordenesproductos);
                                                console.log("productos_orden :" + ordenesproductos);
                                                if (numeroorden !== null) {
                                                    window.location.href = "../../modulos/orden/Orden.php";            
                                                
                                                    jAlert("COMPRA REALIZADA");
                                                } else {
                                                    jAlert("Compra no Realizada");
                                                }
                                                //alert("orden"+mnss[0]["id_ordenes"]+"number"+number);          
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            }
        }
    });
});

function mostrarArticulos() {//esta ba en el input id="cantidad"
    var tabla_producto = '<tr id="tabla#n"><td data-th="Product"><div class="col-sm-4"><img src="link_imagen" class="img-responsive" onerror="this.src=\'../../IMG/error.jpg\'"></div><div class="col-sm-8"><h5 class="nomargin">nombre_producto</h5></div></td><td data-th="Price">$<span class="precios">precio_producto</span><br><b>IVA: </b>$<span class="ivas">precio_iva</span></td><td data-th="Quantity"><input class="numero_cantidad" value="1" type="number" min="1" max="maximo" style="width:60px" onchange="actualizarTotal()" onkeydown="return false"></td><td class="actions" data-th=""><a onclick="borrarArticulo(#n)"><i class="fa fa-trash-o"></i></a></td></tr>';
    $.getJSON("../../bin/ingresar.php?categoria=getCarrito", function (dato) {
        // console.log(dato);
        $.each(dato, function (j, valor) {
            var salida = tabla_producto;
            salida = salida.replace(/#n/g, j);
            salida = salida.replace("maximo", parseFloat(valor['disponible']) + parseFloat(valor['disponibleCD']));
            salida = salida.replace("link_imagen", valor['imagen']);
            salida = salida.replace("nombre_producto", valor['descripcion']);
            salida = salida.replace("precio_producto", valor['moneda'] === "Pesos" ? formatoMoneda(parseFloat(valor["precio"])) + " " : formatoMoneda(valor["precio"] * tipo_cambio) + " ");
            salida = salida.replace("precio_iva", valor['moneda'] === "Pesos" ? formatoMoneda(valor["precio"] * (iva - 1)) + " " : formatoMoneda(valor["precio"] * tipo_cambio * (iva - 1)) + " ");

            //salida = salida.replace("cantidad#n", valor['cantidad']);

            $('tbody').append(salida);
            imgs = valor['imagen'];
            descri = valor['descripcion'];

            presios = valor['moneda'] === "Pesos" ? parseFloat(valor["precio"]) + "" : valor["precio"] * tipo_cambio + "";
            //  alert("IMG\n"+imgs+"DESCRIPCION\n"+descri+"PRESIOS\n"+presios+"cantidad"+txtcantidad0);
            //children = $("tr td")[0].innerHTML;     
        });
        //document.getElementById("campo1").value = campo1;

        //   var sub=0;
        var precios = $(".precios").text().replace(/,/g, "").trim().split(" ");
        $.each($('.numero_cantidad'), function (i, valor) {
            sub += valor.value * precios[i];
        });
        // var sub_iva=0;
        var ivas = $('.ivas').text().replace(/,/g, "").trim().split(" ");
        $.each($('.numero_cantidad'), function (i, valor) {
            sub_iva += valor.value * ivas[i];
        });
        $('#txt_subtotal').append(formatoMoneda(sub));
        $('#txt_iva').append(formatoMoneda(sub_iva));
        $('#txt_total').append(formatoMoneda(parseFloat(sub) + parseFloat(sub_iva)));
        $('.loader').fadeOut("slow");
    });
}

function actualizarTotal() {
    $('#txt_subtotal').empty();
    $('#txt_iva').empty();
    $('#txt_total').empty();
    var sub = 0;
    var precios = $('.precios').text().replace(/,/g, "").trim().split(" ");
    $.each($('.numero_cantidad'), function (i, valor) {
        sub += valor.value * precios[i];
    });
    var sub_iva = 0;
    var ivas = $('.ivas').text().replace(/,/g, "").trim().split(" ");

    $.each($('.numero_cantidad'), function (i, valor) {
        sub_iva += valor.value * ivas[i];
        uno = $(".numero_cantidad").val();
        console.log("Actualizar valor 1" + valor.value + "valor final" + uno);
    });
    sub = sub.toFixed(2);
    //alert(sub);
    $('#txt_subtotal').append(sub);//formatoMoneda();
    $('#txt_iva').append(sub_iva); //formatoMoneda();
    $('#txt_total').append(parseFloat(sub) + parseFloat(sub_iva)); //formatoMoneda();
}

function borrarArticulo(index) {
    console.log(index);
    $('#tabla' + index).remove();
    $.ajax({
        url: "../../bin/ingresar.php?categoria=borrarCarrito",
        type: "POST",
        data: {"articulo": index},
        success: function (hola) {
            actualizarTotal();
        }
    });
}
function formatoMoneda(numero) {
    numero = numero.toFixed(2).replace(/./g, function (c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
    });
    return numero;
}