$(document).ready(function (){
   $("#btncambiar").on('click', function(){    
     var txtantiguapass = $("input:password[id='id_antiguapass']").val();
     var txtnuevapass = $("input:password[id='id_nuevapass']").val();
           if ((txtantiguapass === "") || (txtnuevapass === "")) {
            $('#id_antiguapass').css({"border": "2px solid red"});
            $('#id_nuevapass').css({"border": "2px solid red"});
//            $('#norobot').css({"border": "2px solid red"});
        } else {
            $('#id_antiguapass').css({"border": "2px solid Gainsboro"});
            $('#id_nuevapass').css({"border": "2px solid Gainsboro"});
    $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=cambiarContraseña",
            data: {"antiguacontrasena":txtantiguapass, "nuevacontrasena": txtnuevapass},
               success: function (mns) {
//                   alert(mns);
                    if (mns === "1") {
                        jAlert("Reguistro guardado");
                         $.limpiartexto();
                    } else if (mns === 0) {
                        jAlert("ERROR");
                }
                /*else {
                    jAlert("Dato vacio");
                }*/ 
         } 
    }); 
  }
   $.limpiartexto = function () {
        $("input:password[id='id_antiguapass']").val("");
        $("input:password[id='id_nuevapass']").val("");
     };
  });
});