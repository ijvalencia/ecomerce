var banderas = false;
var correos = /[-A-Za-z0-9._]+[@][A-Za-z]+[.]{1}[A-Za-z]+/;
var numericos = /[0-9]/;
var txtnuevapass ,confirmarcontraseña;
var bandera21=false;   

$(document).ready(function () {
    $("#btncambiar").on('click', function () {
        var txtcuneta = $("input:text[id='id_emailssss']").val().toLowerCase();
        var id_tuclave = $("input:text[id='id_tuclave']").val();
            txtnuevapass = $("input:password[id='id_nuevapass']").val();
            confirmarcontraseña = $("input:password[id='id_confiramciones']").val();
            
        if((txtcuneta === "") || (id_tuclave ==="") || (txtnuevapass === "") || (confirmarcontraseña === "")) {
            
            $('#id_emailssss').css({"border": "2px solid red"});
            $('#id_nuevapass').css({"border": "2px solid red"});
            $('#id_tuclave').css({"border": "2px solid red"});
            $('#id_confiramciones').css({"border": "2px solid red"});
            
        } else {
            
            $('#id_emailssss').css({"border": "2px solid Gainsboro"});
            $('#id_tuclave').css({"border": "2px solid Gainsboro"});
            $('#id_nuevapass').css({"border": "2px solid Gainsboro"});
            $('#id_confiramciones').css({"border": "2px solid Gainsboro"});
            
        }
            if (correos.test(txtcuneta)) {
                $('#id_emailssss').css({"border": "2px solid Gainsboro"});
            } else {
                $('#id_emailssss').css({"border": "2px solid red"});
                bandera21 = false;
            }
           
            if(numericos.test(id_tuclave)) {
                $('#id_tuclave').css({"border": "2px solid Gainsboro"});
            } else {
                $('#id_tuclave').css({"border": "2px solid red"});
                bandera21 = false;
            }
            
            if (txtnuevapass !== "") {
                $('#id_nuevapass').css({"border": "2px solid Gainsboro"});
            } else {
                $('#id_nuevapass').css({"border": "2px solid red"});
                bandera21 = false;
            }
            
            if(confirmarcontraseña !== ""){
                $('#id_confiramciones').css({"border": "2px solid Gainsboro"});
            } else {
                $('#id_confiramciones').css({"border": "2px solid red"});
                bandera21 = false;
            }
            if (("" !== txtnuevapass) && (txtnuevapass === confirmarcontraseña)) {
                $('#id_confiramciones').css({"border": "2px solid Gainsboro"});
                 
            } else {
                $('#id_confiramciones').css({"border": "2px solid red"});
                jAlert("Invalida la Confiramcion");
                bandera21 = false;
            }
        
            if ($('#id_nuevapass').val().length < 8) {
                $('#id_nuevapass').css({"border": "2px solid red"});
                jAlert("la contraseña debe tener como mínimo 8 caracteres");
                return false;
            }
        
            if ($('#id_confiramciones').val().length < 8) {
                $('#id_confiramciones').css({"border": "2px solid red"});
                jAlert("la contraseña de confiramcion debe tener como mínimo 8 caracteres");
                return false;
            }
        
            if ((correos.test(txtcuneta)) && (numericos.test(id_tuclave)) && (txtnuevapass !== "") && (txtnuevapass === confirmarcontraseña)){
                bandera21 = true;
                if (bandera21 === true){
                    $.ajax({
                        type: "POST",
                        url: "../../bin/ingresar.php?categoria=cambiarContraseña",
                        data: {"cuenta": txtcuneta, "claves":id_tuclave, "nuevacontrasena": txtnuevapass},
                        success: function (mns) {
                               
                            if (mns === "1") {
                                jAlert("Registro guardado");
                                $.limpiartexto();
                                window.location.href = "http://10.1.0.49/Ecommerce/modulos/inicio/index.php";
                                //window.close();
                            } else if (mns === "0") {
                                jAlert("ERROR");
                            }
                        }
                    });
                }
            }
        
         $.limpiartexto = function () {
         $("input:text[id='id_emailssss']").val("");
         $("input:password[id='id_nuevapass']").val("");
    };
  });
});

$(document).ready(function () {
    $('input:password[id="id_nuevapass"]').keyup(function () {
        // set password variable
        txtnuevapass = $(this).val();
        //validate the length
        if (txtnuevapass.length < 8) {
            $('#length').removeClass('valid1').addClass('invalid1');
        } else {
            $('#length').removeClass('invalid1').addClass('valid1');
        }

        //validate letter
        if (txtnuevapass.match(/[A-z]/)) {
            $('#letter').removeClass('invalid1').addClass('valid1');
        } else {
            $('#letter').removeClass('valid1').addClass('invalid1');
        }

        //validate capital letter
        if (txtnuevapass.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid1').addClass('valid1');
        } else {
            $('#capital').removeClass('valid1').addClass('invalid1');
        }
        //validate number
        if (txtnuevapass.match(/\d/)) {
            $('#number').removeClass('invalid1').addClass('valid1');
        } else {
            $('#number').removeClass('valid1').addClass('invalid1');
        }
    }).focus(function () {
        $('#pswd_info1').show();
    }).blur(function () {
        $('#pswd_info1').hide();
    });
    
    $('input:password[id="id_confiramciones"]').keyup(function () {
        // set password variable
        confirmarcontraseña = $(this).val();
        //validate the length
        if (confirmarcontraseña.length < 8) {
            $('#length').removeClass('valid1').addClass('invalid1');
        } else {
            $('#length').removeClass('invalid1').addClass('valid1');
        }
        //validate letter
        if (confirmarcontraseña.match(/[A-z]/)) {
            $('#letter').removeClass('invalid1').addClass('valid1');
        } else {
           
            $('#letter').removeClass('valid1').addClass('invalid1');
        }
        //validate capital letter
        if (confirmarcontraseña.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid1').addClass('valid1');
        } else {
            $('#capital').removeClass('valid1').addClass('invalid1');
        }
        //validate number
        if (confirmarcontraseña.match(/\d/)) {
            $('#number').removeClass('invalid1').addClass('valid1');
        } else {
            $('#number').removeClass('valid1').addClass('invalid1');
        }
    }).focus(function () {
        $('#pswd_info1').show();
    }).blur(function () {
        $('#pswd_info1').hide();
    });
});