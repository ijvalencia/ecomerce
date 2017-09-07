var correo = /[-A-Za-z0-9._]+[@][A-Za-z]+[.]{1}[A-Za-z]+/;
//var expresion = /^[A-Za-záéíóúñüàè]+$/i;
var Cadena = /[A-Za-z]+/;
var bandera = false;
var number = /[0-9]+/;

$(document).ready(function (){
    
    $("#btnconfirmar").on('click', function (){    
        var txtclaves = $("input:text[id='id_clave']").val();
        var txtcorreoss = $("input:text[id='id_correoss']").val();
       if ((txtcorreoss === "") || (txtclaves==="")) {
            $('#id_clave').css({"border": "2px solid red"});
            $('#id_correoss').css({"border": "2px solid red"});
        } else {
            $('#id_clave').css({"border": "2px solid Gainsboro"});
            $('#id_correoss').css({"border": "2px solid Gainsboro"});

            if (correo.test(txtcorreoss)) {
                $('#id_correoss').css({"border": "2px solid Gainsboro"});
            } else {
                $('#id_correoss').css({"border": "2px solid red"});
                bandera2 = false;
            }
             if (number.test(txtclaves)) {
                $('#id_clave').css({"border": "2px solid Gainsboro"});
            } else {
                $('#id_clave').css({"border": "2px solid red"});
                bandera2 = false;
            }
            
            if (correo.test(txtcorreoss) || (number.test(txtclaves))) {
                bandera2 = true;
              if (bandera2 === true) {
      $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=confirmacion",
            data: {"clave":txtclaves,"correosc":txtcorreoss},
            success: function (mns) {
            //jAlert(mns);
             if(mns !== null){
                jAlert("registrando la clave ya puedes usar tu cuenta");
                $("#form-mail").val(mns);
                $.limpiarconfirmacion();
                window.location.href = "http://10.1.0.49/Ecommerce/modulos/inicio/index.php";
                //window.close();
               // history.go(-1);
                
               } else if (mns === 0) {
                jAlert("ERROR");
               }
            }
       });
      }
    }
  }
});
 $.limpiarconfirmacion = function () {
  $("input:text[id='id_clave']").val("");
  $("input:text[id='id_correoss']").val("");   
  };
});