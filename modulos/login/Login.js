/* global sesion */
var correo = /[-A-Za-z0-9._]+[@][A-Za-z]+[.]{1}[A-Za-z]+/;
var Cadena = /[A-Za-z]+/;
var bandera = false;
var bandera2 = false;

$(document).ready(function () {

    $('#link').on("click", function () {
        $('#form_busqueda').hide();
    });

    $('#enviar').on("click", function () {
        $('#form_busqueda').show();
    });

    $("#btn-enviar").attr("disabled", true);
    $("#botonsesion").on('click', function () {
        var txtusuario = $("input:text[id='form-mail']").val();
        var txtcontra = $("input:password[id='form-pass']").val();

        if ((txtusuario === "") || (txtcontra === "")) {
            $('#form-mail').css({"border": "2px solid red"});
            $('#form-pass').css({"border": "2px solid red"});
        } else {
            $('#form-mail').css({"border": "2px solid Gainsboro"});
            $('#form-pass').css({"border": "2px solid Gainsboro"});

            if (bandera === false) {
                if (correo.test(txtusuario)) {
                    $('#form-mail').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-mail').css({"border": "2px solid red"});
                    //alert("no");
                    bandera = false;
                }
                if (txtcontra !== null) {
                    $('#form-pass').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-pass').css({"border": "2px solid red"});
                    bandera = false;
                }
            }

            if ((correo.test(txtusuario)) && (txtcontra !== null)) {
                bandera = true;
                if (bandera === true) {
                    $.ajax({type: "POST",
                        url: "../../bin/ingresar.php?categoria=email",
                        data: {
                            "correo": txtusuario,
                            "contra": txtcontra},
                        success: function (sessionmsj) {
                            if (sessionmsj === "") {
                                jAlert("ERROR DE AUNTENTICACIÒN VERIFICAR EL CORREO O CONTRASEÑA");
                            } else {
                                history.back();
                            }
                        }
                    });
                }
            }
        }
    });

    //Validar los terminio de la para guardar
    $("#check-terminos").click(function () {
        if ($("#check-terminos").is(':checked')) {
            $("#btn-enviar").attr("disabled", false);
        } else {
            $("#btn-enviar").attr("disabled", true);
        }
    });
    //funcion de insertar 
    $("#btn-enviar").on('click', function () {
        var txtnombre = $("input:text[id='form-nombre']").val();
        var txtapellido = $("input:text[id='form-apellidos']").val();
        var txtcorreo = $("input:text[id='form-correo']").val();
        var txtcontra = $("input:password[id='form-contra']").val();
        var txtconfir = $("input:password[id='form-confirmacion']").val();
        //     var ckbterminos = $("input:checkbox[id='check-terminos']").val();
        var norobot = $("#norobot").val();
        if ((txtnombre === "") || (txtapellido === "") || (txtcorreo === "") || (txtcontra === "") || (txtconfir === "") || (norobot === " ")) {
            $('#form-nombre').css({"border": "2px solid red"});
            $('#form-apellidos').css({"border": "2px solid red"});
            $('#form-correo').css({"border": "2px solid red"});
            $('#form-contra').css({"border": "2px solid red"});
            $('#form-confirmacion').css({"border": "2px solid red"});
            $('#norobot').css({"border": "2px solid red"});
        } else {
            $('#form-nombre').css({"border": "2px solid Gainsboro"});
            $('#form-apellidos').css({"border": "2px solid Gainsboro"});
            $('#form-correo').css({"border": "2px solid Gainsboro"});
            $('#form-contra').css({"border": "2px solid Gainsboro"});
            $('#form-confirmacion').css({"border": "2px solid Gainsboro"});
            $("#norobot").css({"border": "2px solid Gainsboro"});

            if (bandera2 === false) {
                if (Cadena.test(txtnombre)) {
                    $('#form-nombre').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-nombre').css({"border": "2px solid red"});
                    bandera2 = false;
                }
                if (Cadena.test(txtapellido)) {
                    $('#form-apellidos').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-apellidos').css({"border": "2px solid red"});
                    bandera2 = false;
                }
                if (correo.test(txtcorreo)) {
                    $('#form-correo').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-correo').css({"border": "2px solid red"});
                    bandera2 = false;
                }
                if (txtcontra !== null) {
                    $('#form-contra').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-contra').css({"border": "2px solid red"});
                    bandera2 = false;
                }
                if (txtconfir !== null) {
                    $('#form-confirmacion').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#form-confirmacion').css({"border": "2px solid red"});
                    bandera2 = false;
                }
                if ((Cadena.test(txtnombre)) && (Cadena.test(txtapellido)) && (correo.test(txtcorreo)) && (txtcontra !== null && (txtconfir !== null))) {
                    bandera2 = true;
                    if (bandera2 === true){
                        $.ajax({type: "POST",
                           // url: "../../bin/ingresar.php?categoria=registro",
                            data: {"nombre": txtnombre, "apellido": txtapellido, "correos": txtcorreo, "contrasena": txtcontra, "confirmacion": txtconfir, "robot": norobot},
                            success: function (mns) {
                                if (mns === "1") {
                                    jAlert("LOS DATO REGISTRADO CON EXITO");
                                    $.limpiartexto();
                                } else if (mns === 0) {
                                    jAlert("ERROR");
                                } else if (mns==="00"){
                                    jAlert("EL CORREO O LA CONTRASEÑA YA ESTA REGISTRADA");
                                }
                            }
                        });
                    }
                }
            }
        }
    });
    $("#btn-enviar").on('click', function () {
        
        var txtnombredire = $("input:text[id='txtnombred']").val();
        var txtapellidodire = $("input:text[id='txtapellidod']").val();
        var txttelefono = $("input:text[id='txttelefonod']").val();
        var txttelefono2d = $("input:text[id='txttelefono2d']").val();
        
        var txtcalled = $("input:text[id='txtcalled']").val();
        var txtexteriord = $("input:text[id='txtexteriord']").val(); 
        var txtinteriord = $("input:text[id='txtinteriord']").val();
        var txtcpd = $("input:text[id='txtcpd']").val();
        var txtselectestadosd = $("selectestadosd").val();
        var txtciudadd = $("input:text[id='txtciudadd']").val();
        var txtcruserod = $("input:text[id='txtcruserod']").val();
        var txtcrusero2 = $("input:text[id='txtcruserod2']").val();
        var txtreferncia = $("input:text[id='txtreferncia']").val();
        
       if ((txttelefono === "") || (txtcalled === "") || (txtexteriord === "") || (txtcpd === "") || (txtselectestadosd === "") || (txtciudadd === " ") ||(txtcruserod === " ") || (txtcrusero2 === " ")){
            $('#txttelefonod').css({"border": "2px solid red"});
            $('#txtcalled').css({"border": "2px solid red"});
            $('#txtexteriord').css({"border": "2px solid red"});
            $('#txtcpd').css({"border": "2px solid red"});
            $('#txtselectestadosd').css({"border": "2px solid red"});
            $('#txtciudadd').css({"border": "2px solid red"});
            $('#txtcruserod').css({"border": "2px solid red"});
            $('#txtcrusero2').css({"border": "2px solid red"});
        } else {
            $('#txttelefonod').css({"border": "2px solid Gainsboro"});
            $('#txtcalled').css({"border": "2px solid Gainsboro"});
            $('#txtexteriord').css({"border": "2px solid Gainsboro"});
            $('#txtcpd').css({"border": "2px solid Gainsboro"});
            $('#txtselectestadosd').css({"border": "2px solid Gainsboro"});
            $('#txtciudadd').css({"border": "2px solid Gainsboro"});
            $('#txtcruserod').css({"border": "2px solid Gainsboro"});
            $('#txtcrusero2').css({"border": "2px solid Gainsboro"});
        }
     });
    
    $.limpiartexto = function () {
        $("input:text[id='form-nombre']").val("");
        $("input:text[id='form-apellidos']").val("");
        $("input:text[id='form-correo']").val("");
        $("input:password[id='form-contra']").val("");
        $("input:password[id='form-confirmacion']").val("");
    };
    
    $("#enviar").on('click', function () {    
        var txtemaill = $("input:text[id='txtemaill']").val();
       // alert("hola"+txtemaill);
       /* var checkrobot = $("#norobot").val(); */
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=olvidecontrasena",
            data: {"emaill":txtemaill},
            success: function (mns){
           //     jAlert(mns);
                if(mns === "1"){
                    jAlert("ACIDO ENVIADO UN LINK");
                    $.limpiartexto();
                } else if (mns === 0){
                    jAlert("ERROR");
                }
            }
        });
    });
    $('.loader').fadeOut("slow");
});