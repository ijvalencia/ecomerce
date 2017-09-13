/* global sesion */
var correo = /[-A-Za-z0-9._]+[@][A-Za-z]+[.]{1}[A-Za-z]+/;
var Cadena = /[A-Za-z]+/;
var bandera = false;
var bandera2 = false;
var bandera3 = false;
var numerico = /[0-9]+/;
var txtcontra, txtconfir;
 var contador = 0;
$(document).ready(function (){

    /*
     $('#link').on("click", function () {
     $('#form_busqueda').hide();
     });     
     $('#enviar').on("click", function () {
     $('#form_busqueda').show();
     });*/


    $('#link').on("click", function () {
//        $('#form_busqueda').hide();
    });

    $('#enviar').on("click", function () {
//        $('#form_busqueda').show();
    });

    $("#btn-enviar").attr("disabled", true);

    $("#botonsesion").on('click', function () {             
        contador += 1;
       $("#contador").text(contador);
               // $("#botonsesion").text(contador);
        var txtusuario = $("input:text[id='form-mail']").val().toLowerCase();
        var txtcontra = $("input:password[id='form-pass']").val();

        if ((txtusuario === "") || (txtcontra === "")) {
            $('#form-mail').css({"border": "2px solid red"});
            $('#form-pass').css({"border": "2px solid red"});
        } else {
            $('#form-mail').css({"border": "2px solid Gainsboro"});
            $('#form-pass').css({"border": "2px solid Gainsboro"});
        }
        
    
        // if (bandera === false) {
        if (correo.test(txtusuario)) {
            $('#form-mail').css({"border": "2px solid Gainsboro"});
        } else {
            $('#form-mail').css({"border": "2px solid red"});
            //alert("no");
            bandera = false;
        }
        if (txtcontra !== "") {
            $('#form-pass').css({"border": "2px solid Gainsboro"});
        } else {
            $('#form-pass').css({"border": "2px solid red"});
            bandera = false;
        }
        //}

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
                           if(contador === 4){
                              jAlert('Tiempo limite ocupas reguistrarse o cambiar contraseña');
                              window.location.href = "http://10.1.0.49/Ecommerce/modulos/inicio/index.php";
                               //window.close();    
                            }
                        } else if (sessionmsj === "1"){
                            jAlert("Falta Su Clave de Confirmacion");
                        } else if (sessionmsj === "3") {
                            jAlert("los tres intentos ");
                            window.location.href = "http://10.1.0.49/Ecommerce/modulos/inicio/index.php";
                            //window.close(); ojo no borrar
                        }
                        else {
                            //window.location.href = "http://10.1.0.49/Ecommerce/modulos/inicio/index.php";
                            //window.close(); ojo no borrar
                            history.back();
                        }
                    }

                });
            }
        }
    });
    
    $("#contador").text(contador);
    

    //Validar los terminio de la para guardar
    $("#check-terminos").click(function () {
        if ($("#check-terminos").is(':checked')) {
            $("#btn-enviar").attr("disabled", false);
            // $.activar();
        } else {
            $("#btn-enviar").attr("disabled", true);
        }
    });
    //funcion de insertar 
    $("#btn-enviar").on('click', function () {
        var txtnombre = $("input:text[id='form-nombre']").val().toLowerCase();
        var txtapellido = $("input:text[id='form-apellidos']").val().toLowerCase();
        var txtcorreo = $("input:text[id='form-correo']").val().toLowerCase();
        txtcontra = $("input:password[id='form-contra']").val();
        txtconfir = $("input:password[id='form-confirmacion']").val();
        //     var ckbterminos = $("input:checkbox[id='check-terminos']").val();
        var norobot = $("#g-recaptcha-response").val();
        //alert(norobot);

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
        }
        //if (bandera2 === false) {
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
        if (txtcontra !== "") {
            $('#form-contra').css({"border": "2px solid Gainsboro"});
        } else {
            $('#form-contra').css({"border": "2px solid red"});
            bandera2 = false;
        }
        if (txtconfir !== "") {
            $('#form-confirmacion').css({"border": "2px solid Gainsboro"});
        } else {
            $('#form-confirmacion').css({"border": "2px solid red"});
            bandera2 = false;
        }
        if (("" !== txtcontra) && (txtcontra === txtconfir)) {
            $('#form-confirmacion').css({"border": "2px solid Gainsboro"});

        } else {
            $('#form-confirmacion').css({"border": "2px solid red"});
            jAlert("Invalida la comparacion");
            bandera2 = false;
        }
        if ($("#form-contra").val().length < 8) {
            $('#form-contra').css({"border": "2px solid red"});
            jAlert("la contraseña debe tener como mínimo 8 caracteres");
            return false;
        }
        if ($("#form-confirmacion").val().length < 8) {
            $('#form-confirmacion').css({"border": "2px solid red"});
            jAlert("la confirmaciones invalida como mínimo 8 caracteres");
            return false;
        }
        //}
        if ((Cadena.test(txtnombre)) && (Cadena.test(txtapellido)) && (correo.test(txtcorreo)) && (txtcontra !== "") && (txtconfir !== "") && (txtcontra === txtconfir)) {
            bandera2 = true;
            if (bandera2 === true) {
                $.ajax({type: "POST",
                    url: "../../bin/ingresar.php?categoria=registro",
                    data: {"nombre": txtnombre, "apellido": txtapellido, "correos": txtcorreo, "contrasena": txtcontra, "confirmacion": txtconfir, "robot": norobot},
                    success: function (mns) {
                        //  alert(mns);
                        switch (mns) {
                            case "SI":
                                jAlert("El correo y contraseña ya esta registrada");
                                break;
                            case "1":
                                jAlert("Se mando un correo de confirmacion a la direccion que proporcionaste, por favor verificalo");
                                $.limpiartexto();
                                break;
                            case "c":
                                jAlert("Por favor verifica que no eres un robot");
                                break;

                            default:
                                jAlert("Algo salio mal, intentalo de nuevo");
                                break;
                        }
                    }
                });
            }
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
        var txtemaill = $("input:text[id='txtemaill']").val().toLowerCase();
        // alert("hola"+txtemaill);
        /* var checkrobot = $("#norobot").val(); */
        if (txtemaill === "") {
            $('#txtemaill').css({"border": "2px solid red"});
        } else {
            $('#txtemaill').css({"border": "2px solid Gainsboro"});

            if (correo.test(txtemaill)) {
                $('#txtemaill').css({"border": "2px solid Gainsboro"});
            } else {
                $('#txtemaill').css({"border": "2px solid red"});
                bandera2 = false;
            }
            if (correo.test(txtemaill)) {
                bandera2 = true;
                if (bandera2 === true) {

                    $.ajax({
                        type: "POST",
                        url: "../../bin/ingresar.php?categoria=olvidecontrasena",
                        data: {"emaill": txtemaill},
                        success: function (mns) {
                            //     jAlert(mns);
                            if (mns === "1") {
                                jAlert("ACIDO ENVIADO UN LINK");
                                $("input:text[id='txtemaill']").val("");
                                $.limpiartexto();
                            } else if (mns === 0) {
                                jAlert("ERROR");
                            }
                        }
                    });
                }
            }
        }
    });
    $('.loader').fadeOut("slow");
});


$.incrementar = function () {
   
};


$(document).ready(function () {
    $('input:password[id="form-contra"]').keyup(function () {
        // set password variable
        txtcontra = $(this).val();
        //validate the length
        if (txtcontra.length < 8) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }

        //validate letter
        if (txtcontra.match(/[A-z]/)) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }

        //validate capital letter
        if (txtcontra.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        //validate number
        if (txtcontra.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }

    }).focus(function () {
        $('#pswd_info').show();
    }).blur(function () {
        $('#pswd_info').hide();
    });

    $('.close').on("click", function () {
        $('#form_busqueda').show();
        $(".line-navbar-two").css("display", "block");

    });

    $('#link').on("click", function () {
        $('#form_busqueda').hide();
        $(".line-navbar-two").css("display", "none");
    });

    $('input:password[id="form-confirmacion"]').keyup(function () {
        // set password variable
        txtconfir = $(this).val();
        //validate the length
        if (txtconfir.length < 8) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }
        //validate letter
        if (txtconfir.match(/[A-z]/)) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {

            $('#letter').removeClass('valid').addClass('invalid');
        }

        //validate capital letter
        if (txtconfir.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        //validate number
        if (txtconfir.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }

    }).focus(function () {
        $('#pswd_info').show();
        $('#pswd_info').clearQueue();
    }).blur(function () {
        $('#pswd_info').clearQueue();
        $('#pswd_info').hide();
    });
});
function onSignIn(googleUser){
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
