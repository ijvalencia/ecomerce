var banderas=false;
var correos = /[-A-Za-z0-9._]+[@][A-Za-z]+[.]{1}[A-Za-z]+/;
$(document).ready(function (){
   $("#btncambiar").on('click', function(){    
     var txtcuneta = $("input:text[id='id_emailssss']").val(); 
     var txtnuevapass = $("input:password[id='id_nuevapass']").val();
           if ((txtnuevapass === "") || (txtcuneta==="")){
            $('#id_emailssss').css({"border": "2px solid red"});
            $('#id_nuevapass').css({"border": "2px solid red"});
            
//            $('#norobot').css({"border": "2px solid red"});
        } else {
            $('#id_emailssss').css({"border": "2px solid Gainsboro"});
            $('#id_nuevapass').css({"border": "2px solid Gainsboro"});
           if (banderas === false) {
                if (correos.test(txtcuneta)) {
                    $('#id_emailssss').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#id_emailssss').css({"border": "2px solid red"});
                    //alert("no");
                    bandera = false;
                }
                if (txtnuevapass !== null) {
                    $('#id_nuevapass').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#id_nuevapass').css({"border": "2px solid red"});
                    bandera = false;
                }
            }

            if ((correos.test(txtcuneta)) && (txtnuevapass !== null)) {
                bandera = true;
              if (bandera === true) {                
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=cambiarContraseña",
            data: {"cuenta":txtcuneta ,"nuevacontrasena": txtnuevapass},
            success: function (mns){
//                   alert(mns);
                    if (mns === "1"){
                        jAlert("Registro guardado");
                         $.limpiartexto();
                          window.location.href="http://10.1.0.49/Ecommerce/modulos/login/index.php";
                          window.close();
                    } else if (mns === "0") {
                        jAlert("ERROR");
              }
            }
         });
      }
    }
  }
  
$.limpiartexto = function () {
        $("input:text[id='id_emailssss']").val("");
        $("input:password[id='id_nuevapass']").val("");
     };
  });
});