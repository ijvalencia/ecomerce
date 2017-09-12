var parametros;
var tipo_cambio;
var iva;
var sesion = "";
var dato,txtcantidad;
var direcion = 0, numeroorden, subtotal;
var txtcantidad0 = 0;
var sub = 0;
var sub_iva = 0;
var Cadena1 = /[A-Za-z]+/;
var bandera31 =false;
var numerico1 = /[0-9]+/;
var boton = "<button type='button' class='btn btn-default' id='btn_continuar_tu_registro' data-toggle='modal' data-target='#largeModal' data-backdrop='static' data-keyboard='false'>Registra la direccion</button>";

$(document).ready(function (){
    /*Obtener sesion y otros datos */
    $("#txtnombred").attr("disabled", true);
    $("#txtapellidod").attr("disabled", true);
    $("#txttelefono2d").attr("disabled", true);
    $("#txtinteriord").attr("disabled", true);
    $("#txtreferncia").attr("disabled", true);
    
     $.ajax({
        url: "../../bin/ingresar.php?categoria=parametros",
        async: false,
        data: {},
        success: function(resp){
            resp = JSON.parse(resp);
            parametros=resp;
            tipo_cambio = parseFloat(resp["tipo_cambio"]) + parseFloat(resp["agregado"]);
            iva = (resp.iva/100)+1;
        }       
    });
     $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=estados",
         success: function (mns) {       
            $("#selectestadosd").html(mns);
            }
        });
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function (datos) {
        sesion = datos;
    });
    /*Muestra los articulos */
    mostrarArticulos();
    
    /* Todo esto se puede hacer diferente
     * esta hecho de la manera mas ineficiente posible
     */
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

        $('.loader').fadeOut("slow");
    });

    $('#abrir_tarjetas').on("click", function () {
        $('#form_busqueda').hide();
        $(".line-navbar-two").css("display", "none");
	//     alert("dato en blanco :"+number);
        alert(number+nombre);
        if((number === "") || (nombre === "invitado") || (number === undefined) || (number === "0")) {
            jAlert("Favor de iniciar sesion");
            window.location.href = "../../modulos/login/index.php";
            window.close();
            
        }else if(nombre !== null){
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
            
         $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=direccioness",
            data: {"idusuarios": number},
            success: function (mnsdireccion){
            //alert(mnsdireccion);
          
        if(mnsdireccion==="[]"){                 
        $("#formularios").html(boton); 
        //$("#formularios").css("display", "block");
        $("#addirecion").css("display", "none");
        $(".adddirecion").css("display", "none");
        
            $("#txtemailcompra").attr("disabled", true);
            $("#txtclavescompra").attr("disabled", true);
            $("#btn_confirmar_compra").attr("disabled", true);  
            $("#txtnombred").val(nombre);              
            $("#txtapellidod").val(apellido);              
          
      $('#btn-direccion').on("click",function(){
           var txtnombredire = $("input:text[id='txtnombred']").val();
           var txtapellidodire = $("input:text[id='txtapellidod']").val();
           var txttelefono = $("input:text[id='txttelefonod']").val();
           var txttelefono2d = $("input:text[id='txttelefono2d']").val();   
           var txtcalled = $("input:text[id='txtcalled']").val();
           var txtexteriord = $("input:text[id='txtexteriord']").val(); 
           var txtinteriord = $("input:text[id='txtinteriord']").val(); 
           var txtcpd = $("input:text[id='txtcpd']").val();
           var txtselectestadosd = $("#selectestadosd").val();
           var txtciudadd = $("input:text[id='txtciudadd']").val();
           var txtcolonia = $("input:text[id='txtcolonia']").val();
           var txtcruserod = $("input:text[id='txtcruserod']").val();
           var txtcrusero2 = $("input:text[id='txtcruserod2']").val();
           var txtreferncia = $("input:text[id='txtreferncia']").val();
     
        if ((txttelefono2d==="") || (txtinteriord==="")||(txtreferncia==="")){
            $('#txttelefono2d').css({"border": "2px solid red"});
            $('#txtinteriord').css({"border": "2px solid red"});
            $('#txtreferncia').css({"border": "2px solid red"});
            jAlert("DATOS OBLIGATORIOS CUANDO ESCOJISTES EL DATOS ADICIONALES");
            /* NO SE ENTIENDE */
        }else{
            $('#txttelefono2d').css({"border": "2px solid Gainsboro"});
            $('#txtinteriord').css({"border": "2px solid Gainsboro"});
            $('#txtreferncia').css({"border": "2px solid Gainsboro"});   
        }
       if ((txttelefono === "") || (txtcalled === "") || (txtexteriord === "") || (txtcpd === "") || (txtselectestadosd === "") || (txtciudadd === "") || (txtcolonia==="") || (txtcruserod === "") || (txtcrusero2 === "")){
            $('#txttelefonod').css({"border": "2px solid red"});
            $('#txtcalled').css({"border": "2px solid red"});
            $('#txtexteriord').css({"border": "2px solid red"});
            $('#txtcpd').css({"border": "2px solid red"});
            $('#selectestadosd').css({"border": "2px solid red"});
            $('#txtciudadd').css({"border": "2px solid red"});
            $('#txtcolonia').css({"border": "2px solid red"});
            $('#txtcruserod').css({"border": "2px solid red"});
            $('#txtcruserod2').css({"border": "2px solid red"});
        }
        else {
            $('#txttelefonod').css({"border": "2px solid Gainsboro"});
            $('#txtcalled').css({"border": "2px solid Gainsboro"});
            $('#txtexteriord').css({"border": "2px solid Gainsboro"});
            $('#txtcpd').css({"border": "2px solid Gainsboro"});
            $('#selectestadosd').css({"border": "2px solid Gainsboro"});
            $('#txtciudadd').css({"border": "2px solid Gainsboro"});
            $('#txtcolonia').css({"border": "2px solid Gainsboro"});
            $('#txtcruserod').css({"border": "2px solid Gainsboro"});
            $('#txtcruserod2').css({"border": "2px solid Gainsboro"});
        
            if(bandera31===false){
                if (numerico1.test(txttelefono)) {
                    $('#txttelefonod').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txttelefonod').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                
                if (Cadena1.test(txtcalled)) {
                    $('#txtcalled').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcalled').css({"border": "2px solid red"});
                    bandera31 = false;
                }  
                if (numerico1.test(txtexteriord)) {
                    $('#txtexteriord').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtexteriord').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (numerico1.test(txtcpd)) {
                    $('#txtcpd').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcpd').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                
                if (numerico1.test(txtselectestadosd)) {
                    $('#selectestadosd').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#selectestadosd').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtciudadd)) {
                    $('#txtciudadd').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtciudadd').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtcolonia)) {
                    $('#txtcruserod2').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcruserod2').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtcruserod)) {
                    $('#txtcruserod').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcruserod').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtcrusero2)) {
                    $('#txtcruserod2').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcruserod2').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                
            if ((numerico1.test(txttelefono)) || (Cadena1.test(txtcalled)) || (numerico1.text(txtexteriord)) || (numerico1.text(txtcpd)) || (numerico1.text(txtselectestadosd)) || (Cadena1.test(txtciudadd)) || (Cadena1.test(txtcolonia)) || (Cadena1.test(txtcruserod)) || (Cadena1.test(txtcrusero2))){    
                    bandera31 = true;
                     if (bandera31 === true){
                         
                   $.ajax({
                    type: "POST",
                    url: "../../bin/ingresar.php?categoria=registrodirecion",
                    data: {"usuario":number,"nombredire":txtnombredire ,"apellidodire":txtapellidodire, "telefono":txttelefono, "telefono2":txttelefono2d, "calle":txtcalled , "exterior":txtexteriord, "interior":txtinteriord, "codigopostal":txtcpd, "selectestado":txtselectestadosd ,"ciudad":txtciudadd,"colonia":txtcolonia, "cruseros":txtcruserod, "crusero2":txtcrusero2, "referencia":txtreferncia},
                        success: function (mns) {
                            if (mns === "1"){
                           jAlert("LOS DATO REGISTRADO CON EXITO");
                           $("#btn_confirmar_compra").attr("disabled",false);
                           $("#txtclavescompra").attr("disabled",false);
                           
                           $("#btn_continuar_tu_registro").css("display", "none");              
                            $.limpiardirecion();
                             $.activar();
                        } else if (mns === 0) {
                           jAlert("ERROR");
                        } 
                    }
                });
             }
           }
         }
       }         
    });     
       // mnsdireccion = JSON.parse(mnsdireccion);
       // direcion = String(mnsdireccion[0]["id_direccion"]);                    
        } else {
            $("#addirecion").click(function () {
          if ($("#addirecion").is(':checked')) {
                  $("#formularios").css("display", "block");        
                  $("#formularios").html(boton); 
                  $("#txtnombred").val(nombre);              
                  $("#txtapellidod").val(apellido); 
                  $('#btn-direccion').on("click",function(){
           var txtnombredire = $("input:text[id='txtnombred']").val();
           var txtapellidodire = $("input:text[id='txtapellidod']").val();
           var txttelefono = $("input:text[id='txttelefonod']").val();
           var txttelefono2d = $("input:text[id='txttelefono2d']").val();   
           var txtcalled = $("input:text[id='txtcalled']").val();
           var txtexteriord = $("input:text[id='txtexteriord']").val(); 
           var txtinteriord = $("input:text[id='txtinteriord']").val(); 
           var txtcpd = $("input:text[id='txtcpd']").val();
           var txtselectestadosd = $("#selectestadosd").val();
           var txtciudadd = $("input:text[id='txtciudadd']").val();
           var txtcolonia = $("input:text[id='txtcolonia']").val();
           var txtcruserod = $("input:text[id='txtcruserod']").val();
           var txtcrusero2 = $("input:text[id='txtcruserod2']").val();
           var txtreferncia = $("input:text[id='txtreferncia']").val();
     
        if ((txttelefono2d==="") || (txtinteriord==="")||(txtreferncia==="")){
            $('#txttelefono2d').css({"border": "2px solid red"});
            $('#txtinteriord').css({"border": "2px solid red"});
            $('#txtreferncia').css({"border": "2px solid red"});
            jAlert("DATOS OBLIGATORIOS CUANDO ESCOJISTES EL DATOS ADICIONALES");
        }else{
            $('#txttelefono2d').css({"border": "2px solid Gainsboro"});
            $('#txtinteriord').css({"border": "2px solid Gainsboro"});
            $('#txtreferncia').css({"border": "2px solid Gainsboro"});   
        }
       if ((txttelefono === "") || (txtcalled === "") || (txtexteriord === "") || (txtcpd === "") || (txtselectestadosd === "") || (txtciudadd === "") || (txtcolonia==="") || (txtcruserod === "") || (txtcrusero2 === "")){
            $('#txttelefonod').css({"border": "2px solid red"});
            $('#txtcalled').css({"border": "2px solid red"});
            $('#txtexteriord').css({"border": "2px solid red"});
            $('#txtcpd').css({"border": "2px solid red"});
            $('#selectestadosd').css({"border": "2px solid red"});
            $('#txtciudadd').css({"border": "2px solid red"});
            $('#txtcolonia').css({"border": "2px solid red"});
            $('#txtcruserod').css({"border": "2px solid red"});
            $('#txtcruserod2').css({"border": "2px solid red"});
        }
        else {
            $('#txttelefonod').css({"border": "2px solid Gainsboro"});
            $('#txtcalled').css({"border": "2px solid Gainsboro"});
            $('#txtexteriord').css({"border": "2px solid Gainsboro"});
            $('#txtcpd').css({"border": "2px solid Gainsboro"});
            $('#selectestadosd').css({"border": "2px solid Gainsboro"});
            $('#txtciudadd').css({"border": "2px solid Gainsboro"});
            $('#txtcolonia').css({"border": "2px solid Gainsboro"});
            $('#txtcruserod').css({"border": "2px solid Gainsboro"});
            $('#txtcruserod2').css({"border": "2px solid Gainsboro"});
        
            if(bandera31===false){
                if (numerico1.test(txttelefono)) {
                    $('#txttelefonod').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txttelefonod').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                
                if (Cadena1.test(txtcalled)) {
                    $('#txtcalled').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcalled').css({"border": "2px solid red"});
                    bandera31 = false;
                }  
                if (numerico1.test(txtexteriord)) {
                    $('#txtexteriord').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtexteriord').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (numerico1.test(txtcpd)) {
                    $('#txtcpd').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcpd').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                
                if (numerico1.test(txtselectestadosd)) {
                    $('#selectestadosd').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#selectestadosd').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtciudadd)) {
                    $('#txtciudadd').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtciudadd').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtcolonia)) {
                    $('#txtcruserod2').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcruserod2').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtcruserod)) {
                    $('#txtcruserod').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcruserod').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                if (Cadena1.test(txtcrusero2)) {
                    $('#txtcruserod2').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtcruserod2').css({"border": "2px solid red"});
                    bandera31 = false;
                }
                
            if ((numerico1.test(txttelefono)) || (Cadena1.test(txtcalled)) || (numerico1.text(txtexteriord)) || (numerico1.text(txtcpd)) || (numerico1.text(txtselectestadosd)) || (Cadena1.test(txtciudadd)) || (Cadena1.test(txtcolonia)) || (Cadena1.test(txtcruserod)) || (Cadena1.test(txtcrusero2))){    
                    bandera31 = true;
                     if (bandera31 === true){
                         
                   $.ajax({
                    type: "POST",
                    url: "../../bin/ingresar.php?categoria=registrodirecion",
                    data: {"usuario":number,"nombredire":txtnombredire ,"apellidodire":txtapellidodire, "telefono":txttelefono, "telefono2":txttelefono2d, "calle":txtcalled , "exterior":txtexteriord, "interior":txtinteriord, "codigopostal":txtcpd, "selectestado":txtselectestadosd ,"ciudad":txtciudadd,"colonia":txtcolonia, "cruseros":txtcruserod, "crusero2":txtcrusero2, "referencia":txtreferncia},
                    success: function (mns) {
                            if (mns === "1"){
                           jAlert("LOS DATO REGISTRADO CON EXITO");
                           $("#btn_confirmar_compra").attr("disabled",false);
                           $("#txtclavescompra").attr("disabled",false);
                           
                           $("#btn_continuar_tu_registro").css("display", "none");              
                            $.limpiardirecion();
                             $.activar();
                        } else if (mns === 0) {
                           jAlert("ERROR");
                        } 
                    }
                });
             }
           }
         }
       }         
    });  
           } else {
                    $("#formularios").css("display", "none");
        }
    });   
           
            }
          }
       });
     }
 });
   
    
    $('#cerrar_tarjetas').on("click", function () {
        $('#form_busqueda').show();        
    });

    $('#btn_confirmar_compra').on("click", function (){
        //alert(sesion);
        //if(sesion === "invitado,,0"){
              $(".line-navbar-two").css("display", "block");
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=direccioness",
            data: {"idusuarios": number},
            success: function (mnsdireccion) {
                // console.log(mnsdireccion);
                // Esta madre da indefinido, corregir
                mnsdireccion = JSON.parse(mnsdireccion);
                direcion = String(mnsdireccion[0]["id_direccion"]);
                alert(direcion);
            }
        });
        
        if((sesion === "") || (sesion === "invitado") || (sesion === null)){
            jAlert("Registrate para poder seguir con tu compra");
            window.location.href = "../../modulos/login/index.php";
            window.close();
            console.log("no loguiado");
            // Enviar a la pagina de registro
        } else {
          if(parseFloat($('#txt_total').text()) > parametros["compra_maxima"]) {
              jAlert("Para confirmar tu compra comunicate a " + parametros["no_cva"]);
              console.log("parametro");
          } else {
                console.log("ya loguiados");
                //no borrar  se ocupan
               var cuentacorreos = $("input:text[id='txtemailcompra']").val();
               var cuentaclave = $("input:password[id='txtclavescompra']").val();
               var checkrobot = $("#norobot").val();
               
               alert(cuentacorreos+cuentaclave);
               
                $.ajax({
                    type: "POST",
                    url: "../../bin/ingresar.php?categoria=compararcuentass",
                    data: {"usuariocorreo": cuentacorreos, "usuarioclave": cuentaclave, "usuariorobot": checkrobot},
                    success: function (mnscompara) {
                    //   alert("hola" + mnscompara);
                    }
                });
                $.ajax({
                    type: "get",
                    url: "../../bin/ingresar.php?categoria=getCarrito",
                    success: function (mns){
                        //console.log(mns);    
                        mns = JSON.parse(mns);         
                    //codigofabricante = String(mns[0]["codigo_fabricante"]);
                    var txtidconsulta = $("#selector_envio").val();
                    var pago = $("#selector_envio1").val();
                        //var ivas = $('.ivas').text().replace(/,/g, "").trim().split(" ");
                        
                        $.ajax({
                            type: "POST",
                            async:true,  
                            url: "../../bin/ingresar.php?categoria=agregarordenes",
                            data: {"idusuario": number, "direccion": direcion, "idenvio": txtidconsulta, "subtotal": formatoMoneda(parseFloat(sub) + parseFloat(sub_iva)), "metodo_pago": pago},
                            success: function(mnss){
                               console.log("todo"+mnss);
                               
                            $.each($('.numero_cantidad'),function(i,valor){
                               sub_iva += valor.value;// * ivas[i];
                               txtcantidad=valor.value;
                               console.log(txtcantidad);
                           });
                           for(var m in mns){
                               $.ajax({
                                    type: "POST",
                                    async: true, 
                                    url: "../../bin/ingresar.php?categoria=productos_Odenes",
                                    data:{"id_orden": mnss, "codigoF":mns[m]["codigo_fabricante"],"cantidad":txtcantidad},
                                    success: function(ordenesproductos){
                                     console.log("orden :"+ordenesproductos);
                                     console.log("idorden"+mnss+"codigoF"+mns[m]+"Cantidad"+txtcantidad);
                                     alert("datos"+ordenesproductos);
                                    if(numeroorden !== null) {
                                          window.location.href = "../../modulos/orden/Orden.php";
                                          borrarArticulo("0");
                                      jAlert("COMPRA REALIZADA");
                                     }else {
                                      jAlert("Compra no Realizada");
                                 }
                                //alert("orden"+mnss[0]["id_ordenes"]+"number"+number);                       
                              }
                            });
                           }   
                         }
                        });                        
                       }
                    });
                  }            
                }
              });
              
$("#RAcheckbox").click(function () {
        if ($("#RAcheckbox").is(':checked')) {     
            $("#txtinteriord").attr("disabled", false);
            $("#txtreferncia").attr("disabled", false);
            $("#txttelefono2d").attr("disabled", false);
 
           } else {
            $("#txtinteriord").attr("disabled", true);
            $("#txtreferncia").attr("disabled", true);
            $("#txttelefono2d").attr("disabled",true); 
            $("input:text[id='txtinteriord']").val("0");   
            $("input:text[id='txtreferncia']").val("0");
            $("input:text[id='txttelefono2d']").val("0");
        }
});
    
$.limpiardirecion = function(){
        $("input:text[id='txtnombred']").val("");
        $("input:text[id='txtapellidod']").val("");
        $("input:text[id='txttelefonod']").val("");
        $("input:text[id='txttelefono2d']").val("");   
        $("input:text[id='txtcalled']").val("");
        $("input:text[id='txtexteriord']").val(""); 
        $("input:text[id='txtinteriord']").val("");
        $("input:text[id='txtcpd']").val("");
        $("#selectestadosd").val("");
        $("input:text[id='txtciudadd']").val("");
        $("input:text[id='txtcolonia']").val("");
        $("input:text[id='txtcruserod']").val("");
        $("input:text[id='txtcruserod2']").val("");
        $("input:text[id='txtreferncia']").val("");
};

$.activar = function () {
    $("#txttelefonod").attr("disabled", true);
   // $("#txttelefono2d").attr("disabled", true);
    $("#txtcalled").attr("disabled", true);
    $("#txtexteriord").attr("disabled", true);
   // $("#txtinteriord").attr("disabled", true);
    $("#txtcpd").attr("disabled", true);
    $("#selectestadosd").attr("disabled", true);
    $("#txtciudadd").attr("disabled", true);
    $("#txtcolonia").attr("disabled", true);
    $("#txtcruserod").attr("disabled", true);
    $("#txtcruserod2").attr("disabled", true);
   // $("#txtreferncia").attr("disabled", true);
    $("#btn-direccion").attr("disabled", true);
};

$.desactivar = function () {
    $("#txttelefonod").attr("disabled", false);
   // $("#txttelefono2d").attr("disabled", false);
    $("#txtcalled").attr("disabled", false);
    $("#txtexteriord").attr("disabled", false);
   // $("#txtinteriord").attr("disabled", false);
    $("#txtcpd").attr("disabled", false);
    $("#selectestadosd").attr("disabled", false);
    $("#txtciudadd").attr("disabled", false);
    $("#txtcolonia").attr("disabled", false);
    $("#txtcruserod").attr("disabled", false);
    $("#txtcruserod2").attr("disabled", false);
   // $("#txtreferncia").attr("disabled", false);
    $("#btn-direccion").attr("disabled", false);
   };
});

function mostrarArticulos(){
    var tabla_producto = '<tr id="tabla#n"><td data-th="Product"><div class="col-sm-4"><img src="link_imagen" class="img-responsive" onerror="this.src=\'../../IMG/error.jpg\'"></div><div class="col-sm-8"><h5 class="nomargin">nombre_producto</h5></div></td><td data-th="Price">$<span class="precios">precio_producto</span><br><b>IVA: </b>$<span class="ivas">precio_iva</span></td><td data-th="Quantity"><input class="numero_cantidad" value="1" type="number" min="1" max="maximo" style="width:60px" onchange="actualizarTotal();" onkeydown="return false"></td><td class="actions" data-th=""><a onclick="borrarArticulo(#n)"><i class="fa fa-trash-o"></i></a></td></tr>';
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
    });
    sub = sub.toFixed(2);
    sub_iva = sub_iva.toFixed(2);
    $('#txt_subtotal').append(sub);
    $('#txt_iva').append(sub_iva);
    $('#txt_total').append((parseFloat(sub) + parseFloat(sub_iva)).toFixed(2));
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
