/* global sesion, datosid */
$(document).ready(function (){ 
	$('#nombre_usuario_nav').append("HOLA");
  /*$("#btn-enviar").attr("disabled",true); 
   //  $(".idcuenta").on('click',function (){
       var res = datosid.split("");
     
       //alert(res);
        var ids = res[0];
          console.log(ids);
    
        $.ajax({type:"POST",
                url: "../../bin/ingresar.php?categoria=MostrarUsuarioId",
            data:{"id":ids},
            success: function(sessionmsj){   
        //   alert("entro"+sessionmsj);
        var datosusuario = sessionmsj.split('||');        
           $("#txtnombre").val(datosusuario[1]);
           $("#txtapellido").val(datosusuario[2]);
           $("#txtemail").val(datosusuario[6]);
           $("#txtpassw").val(datosusuario[7]);
           $('.loader').fadeOut("slow");
    }
  //}); 
 });
 
 $("#btnguardar").on('click', function (){
          var id = datosid.split("");
          var ides=id[0];
          var txtnombre = $("input:text[id='txtnombre']").val();
          var txtapellido  = $("input:text[id='txtapellido']").val();  
          var cmbfechadia  = $("#fechadia").val();  
          var cmbfechames  = $("#fechames").val();  
          var cmbfechaanio = $("#fechaanio").val(); 
       // var sexo = $('#check-sexo:checked').val();/
          var txtemai = $("#txtemail").val();                                 
          var txtpassw = $("input:password[id='txtpassw']").val();
        /*
        alert("Nombre"+txtnombre);  alert("apeliido"+txtapellido);  alert("dia"+cmbfechadia);
        alert("mes"+cmbfechames);  alert("anio"+cmbfechaanio); 
        alert("sexo"+sexo);  alert("email"+txtemai);
        
        alert("hola id"+ides);
        
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
             $.limpiarusuarios();
        }
     });
   }); 
   $.limpiarusuarios = function (){
              $("input:text[id='txtnombre']").val("");
              $("input:text[id='txtapellido']").val("");
              $("input:text[id='txtemail']").val("");
              $("input:text[id='txtpassw']").val("");
            //$("input:text[id='']").val(""); 
            //$("input:hidden[id='']").val("0");
  }; */
});