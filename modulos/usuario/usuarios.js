/*global sesion */
$(document).ready(function (){
  //$('#nombre_usuario_nav').append(sesion);        
  //$("#btn-enviar").attr("disabled",true);  
       $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
	sesion = datos;
        alert(sesion);
        var stringB = new String(sesion);
        //var fieldd = stringB.split(",",2);
        var field = stringB.split(",");
        nombre = field[0];
        apellido = field[1];
        number = field[2];
        alert(number);
        console.log(number);
    });
    
    $("#idcuentas").on('click',function (){
       $.ajax({
            type:"POST",
            url: "../../bin/ingresar.php?categoria=MostrarUsuarioId",
            data:{"id":number},
            success: function(sessionmsj){   
           alert("entro"+sessionmsj);
        var datosusuario = sessionmsj.split('||');        
           $("#txtnombre").val(datosusuario[1]);
           $("#txtapellido").val(datosusuario[2]);
           $("#txtemail").val(datosusuario[6]);
           $("#txtpassw").val(datosusuario[7]);
           //$('.loader').fadeOut("slow");
      }
    });
  });
  /*

$("#btnguardar").on('click', function (){
          var id = datosid.split("");
          var ides=id[0];
          var txtnombre = $("input:text[id='txtnombre']").val();
          var txtapellido  = $("input:text[id='txtapellido']").val();  
          var cmbfechadia  = $("#fechadia").val();  
          var cmbfechames  = $("#fechames").val();  
          var cmbfechaanio = $("#fechaanio").val(); 
       
          var txtemai = $("#txtemail").val();                                 
          var txtpassw = $("input:password[id='txtpassw']").val();
        
        $.ajax({type: "POST",
                url: "../../bin/ingresar.php?categoria=UpdateUsuario",
                data:{
                "id_usuario":ides,    
                "nombre":txtnombre,
                "apellido":txtapellido,
                "fechadia":cmbfechadia,
                "fechames":cmbfechames,
                "fechaanio":cmbfechaanio,
               // "sexo":sexo,
                "email": txtemai,
                "passwor":txtpassw
            },       
        success: function(sessionmsj){   
            // var loginobtenido = sessionmsj.split('||');
              alert(sessionmsj);
             // $("#").html(loginobtenido[0]);
             // $("#login").(loginobtenido[1]);
             // $("#").html(loginobtenido[2]);    
             // window.location.href="http://localhost/Ecommerce/modulos/inicio/index.php";
             // window.close();
       //      $.limpiarusuarios();
        }
     });
   }); */
 //  $.limpiarusuarios = function (){
   //           $("input:text[id='txtnombre']").val("");
     //         $("input:text[id='txtapellido']").val("");
       //       $("input:text[id='txtemail']").val("");
         //     $("input:text[id='txtpassw']").val("");
            //$("input:text[id='']").val(""); 
            //$("input:hidden[id='']").val("0");
 // }; 
});