$(document).ready(function (){
	$('.loader').fadeOut("slow");
	$("#btn-enviar").attr("disabled",true); 
	
	//funcion del para iniciar seciones
	$("#botonsesion").on('click', function (){
		var txtusuario = $("input:text[id='form-mail']").val();
		var txtcontra  = $("input:password[id='form-pass']").val();  
//		alert(txtusuario+" "+txtcontra); 
		$.ajax({type: "POST",
				url: "../../bin/ingresar.php?categoria=email",
				data:{
					"correo":txtusuario,
					"contra":txtcontra},       
				success: function(sessionmsj){   
					var loginobtenido = JSON.parse(sessionmsj);
					// $("#").html(loginobtenido[0]);
					// $("#login").(loginobtenido[1]);
					// $("#").html(loginobtenido[2]);    
					window.location.href="../../modulos/inicio/index.php";
//					window.close();
				}
			   });            
	});
	//Validar los terminio de la para guardar
	$("#check-terminos").click(function(){  
		if($("#check-terminos").is(':checked')){  
			$("#btn-enviar").attr("disabled",false);
		} else {
			$("#btn-enviar").attr("disabled",true);
		}  
	});  
	//funcion de insertar 
	$("#btn-enviar").on('click', function (){
		var txtnombre = $("input:text[id='form-nombre']").val();
		var txtapellido = $("input:text[id='form-apellidos']").val();
		var txtcorreo = $("input:text[id='form-correo']").val();
		var txtcontra = $("input:password[id='form-contra']").val();
		var txtconfir = $("input:password[id='form-confirmacion']").val();
		var ckbterminos = $("input:checkbox[id='check-terminos']").val();
		alert(txtnombre+txtcontra+txtapellido);
		
		$.ajax({type: "POST",
				url: "../../bin/ingresar.php?categoria=registro",
				data:{"nombre":txtnombre, 
					  "apellido":txtapellido,
					  "correos":txtcorreo,
					  "contrasena":txtcontra,
					  "confirmacion":txtconfir},       
				success: function(mns) {
					alert(mns);
				}
		});
	});
});