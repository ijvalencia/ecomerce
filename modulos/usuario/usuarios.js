var correo = /[-A-Za-z0-9._]+[@][A-Za-z]+[.]{1}[A-Za-z]+/;
var cadena = /[A-Za-z]+/;
var bandera = false;

$(document).ready(function (){
     //$('#nombre_usuario_nav').append(sesion);        
     //$("#btn-enviar").attr("disabled",true); 
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
	sesion = datos;
        //alert(sesion);
        var stringB = new String(sesion);
        //var fieldd = stringB.split(",",2);
        var field = stringB.split(",");
        nombre = field[0];
        apellido = field[1];
        number = field[2];
         //alert(number);
           $.ajax({
            type:"POST",
            url: "../../bin/ingresar.php?categoria=MostrarUsuarioId",
            data:{"id":number},
            success: function(sessionmsj){   

        var datosusuario = sessionmsj.split('||');        
           $("#txtnombre").val(datosusuario[1]);
           $("#txtapellido").val(datosusuario[2]);
           $("#txtemail").val(datosusuario[6]);
           $("#txtpassw").val(datosusuario[7]);
           $('.loader').fadeOut("slow");
      }
    });
 });
    
$("#btnguardar").on('click', function (){
          var id = number;
          //var ides = id[0];
        //  alert(id+"este es el bueno"+number);
          var txtnombre = $("input:text[id='txtnombre']").val();
          var txtapellido  = $("input:text[id='txtapellido']").val();  
          var cmbfechadia  = $("#fechadia").val();  
          var cmbfechames  = $("#fechames").val();  
          var cmbfechaanio = $("#fechaanio").val(); 
       
          var txtemai = $("#txtemail").val();                                 
          var txtpassw = $("input:password[id='txtpassw']").val();
          
          if ((txtnombre === "") || (txtapellido === "") || (txtemai === "") || (txtpassw === "")) {
            $('#txtnombre').css({"border": "2px solid red"});
            $('#txtapellido').css({"border": "2px solid red"});
            $('#txtemail').css({"border": "2px solid red"});
            $('#txtpassw').css({"border": "2px solid red"});
        } else {
            $('#txtnombre').css({"border": "2px solid Gainsboro"});
            $('#txtapellido').css({"border": "2px solid Gainsboro"});
            $('#txtemail').css({"border": "2px solid Gainsboro"});
            $('#txtpassw').css({"border": "2px solid Gainsboro"});    
        
            if (bandera === false) {
                if (cadena.test(txtnombre)) {
                    $('#txtnombre').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtnombre').css({"border": "2px solid red"});
                    //alert("no");
                    bandera = false;
                }
                if (cadena.test(txtapellido)) {
                    $('#txtapellido').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtapellido').css({"border": "2px solid red"});
                    bandera = false;
                }
                if (correo.test(txtemai)) {
                    $('#txtemail').css({"border": "2px solid Gainsboro"});
                } else {
                    $('#txtemail').css({"border": "2px solid red"});
                    bandera = false;
                }

           if ((cadena.test(txtnombre)) && (cadena.test(txtapellido)) && (correo.test(txtemai)) && (txtpassw !== null)) {
                bandera = true;
                if (bandera === true) {
                    //console.log(ides);
          $.ajax({type: "POST",
                url: "../../bin/ingresar.php?categoria=UpdateUsuario",
                data:{
                "id_usuario":number,
                "nombre":txtnombre,
                "apellido":txtapellido,
                "fechadia":cmbfechadia,
                "fechames":cmbfechames,
                "fechaanio":cmbfechaanio,
                "email": txtemai,
                "passwor":txtpassw
        },       
        success: function(sessionmsj){           
             jAlert("GUARDANDO Y CERRANDO SESION PARA ACTUALIZAR LOS DATOS");
                $.ajax({type: "POST",
                url: "../../bin/ingresar.php?categoria=cerrar",
                success: function(sesiones){   
                 window.location.href="../../modulos/inicio/index.php";
                 window.close();
               }
             });
            }
          });
        }
       }
     }
   }
 }); 
});
