$(document).ready(function() {
	$("#btn-enviar").attr("disabled", true);
	
	//funcion del para iniciar seciones
	$("#botonsesion").on('click', function() {
		var txtusuario = $("#form-mail").val();
		var txtcontra  = $("#form-pass").val();  
//		alert(txtusuario+txtcontra); 
		$.ajax({
			type: "POST",
			url: "../../bin/ingresar.php?categoria=email",
			data:{
				"correo":txtusuario,
				"contra":txtcontra},       
			success: function(sessionmsj){   
				var loginobtenido = sessionmsj.split('||');
				// $("#").html(loginobtenido[0]);
				// $("#login").(loginobtenido[1]);
				// $("#").html(loginobtenido[2]);    
				window.location.href="http://localhost/Ecommerce/modulos/inicio/index.php";
				window.close();
			}
		});            
	});
	 
	//funcion de insertar 
	$("#btn-enviar").on('click', function() {
		var txtnombre = $("input:text[id='form-nombre']").val();
		var txtapellido = $("input:text[id='form-apellidos']").val();
		var txtcorreo = $("input:text[id='form-correo']").val();
		var txtcontra = $("input:password[id='form-contra']").val();
		var txtconfir = $("input:password[id='form-confirmacion']").val();
		var ckbterminos = $("input:checkbox[id='check-terminos']").val();
		//alert(txtnombre+txtcontra+txtapellido);
		
		$.ajax({
			type: "POST",
			url: "../../bin/ingresar.php?categoria=registro",
			data:{"nombre":txtnombre, 
				  "apellido":txtapellido,
				  "correos":txtcorreo,
				  "contrasena":txtcontra,
				  "confirmacion":txtconfir},       
			success: function(mns) {
				//alert(mns);
				window.location.href="http://localhost/Ecommerce/modulos/inicio/index.php";
				window.close();
				// Enviar correo de confirmacion
			}
		});
	});
	
	/*Parte agregada Adrian */
	var aux = false;
	$('#form-contra, #form-confirmacion').keyup(function() {
		console.log($('#form-contra').val() === $('#form-confirmacion').val());
		if($('#form-contra').val() === $('#form-confirmacion').val()){   
			if($("#check-terminos").is(':checked')) {  
				$("#btn-enviar").attr("disabled", false);
			}
			aux = true;
		} else {
			aux = false;
			$("#btn-enviar").attr("disabled", true);
		}
	});
	
	$('#check-terminos').change(function() {
		if($("#check-terminos").is(':checked') && aux)  
			$("#btn-enviar").attr("disabled", false);
		else
			$("#btn-enviar").attr("disabled", true); 
	});
	
});