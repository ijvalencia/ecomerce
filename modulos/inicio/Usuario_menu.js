var nombre="invitado";
var number,apellido,correos;
var txtnombre , txtid_gmail;
/* global sesion */
num=1;
$(document).ready(function(){
    if(nombre === "invitado"){
        //$(".ocultar").css("display","none");
        $(".ocultar").hide();
        $('#navbar-sesion-li').show();
        $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {
            sesion = datos;
            nombre = datos[0];
            apellido = datos[1];
            number = datos[2];
            correos=datos[3];
            
//            var stringB = new String(sesion);
//            console.log(datos);
            var fieldd = nombre+"<br>"+apellido+" ";
            $('#nombre_usuario_nav').append(nombre === "invitado" ? "Invitado " : fieldd);
//            var field = stringB.split(",");
            if(nombre !== "invitado") {
                $(".ocultar").show();
                $('#navbar-sesion-li').hide();
            }
            
            if(correos!==""){
                $("#idcuentas").hide();  
            }
        });
    }
});

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  
function onSignIn(googleUser){
  profile = googleUser.getBasicProfile();
  //jAlert(profile.getName());
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  txtnombre = String(profile.getName());
  txtid_gmail = String(profile.getId());
    //console.log(email);
    $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=Gmail",
            data:{"id_gmail":txtid_gmail,"nombregmail":txtnombre},
            success: function(gmailmsj){
            gmailmsj=JSON.parse(gmailmsj);
            datos =gmailmsj;
            number = datos[0];            
            
            //$("#").val(datosusuario[0]);
            //$("#txtapellido").val(datosusuario[2]);
            //datosusuario.substring(0, 26);
            //console.log(datosusuario[0]+datosusuario[1]);
          
            //sesion = datos;
            /*
            apellido = datos[1];
            number = datos[2];*/      
        $('#nombre_usuario_nav').append(nombre);
//          //console.log(gmail);
             jAlert("Acabas de iniciar Session por tu correo personal");
        }
    }); 
  }