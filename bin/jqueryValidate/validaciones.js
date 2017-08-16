$(document).ready(function() {
	$("#form-actualizar").validate({
		errorContainer: "#errores",
		errorLabelContainer: "#errores ul",
		wrapper: "li",
	  	errorElement: "em",              
	 			rules: {
	 				txtnombres:   {required: true, text: true, max: 10, remote:{url: "../../bin/ingresar.php?categoria=UpdateUsuario", type: "post"}},
	 				txtapellidos: {required: true, text:true ,max: 10},
	 				cmbfechas:    {required: true}, 				
	 				cmbxmes:      {required: true},
                                        cmbxanio:     {required: true},
	 				txtemail:     {required: true,  email: true, max: 20},
                                        txtpassword:  {required: true, minlength: 5 , max:20},
                                        sexo: {required:true}
	 				
                                       /*website: {required: false, url: true},
	 				fnac: 	 {required: false, date: true},
	 				antiguedad:  {required: true, number: true, min: 1, max: 50},
	 				numPersonas: {required: true, range: [0, 1000]},
	 				secreto: 	 {basicoCaptcha: 10}*/
	 			},
				messages: {
					login: 	 {
						required: "Campo requerido: Login",
						remote:	  "Ya existe un usuario con ese login"
					},
					email:		 {
						required: "Campo requerido: E-Mail",
						email:	  "Formato no valido: E-Mail"
					},
					secreto: {
						basicoCaptcha: "Introduzca el secreto"
					},
                                        txtnombres: {
                                            
                                        }
	 			}
			});
			$.validator.methods.basicoCaptcha = function(value, element, param) {return value == param;};
			
			$("#manual").click(function() {
				  alert("&iquest;Formulario v&aacute;lido?: " + $("#entityDataForm").validate().form());
				  alert("Existen " + $("#entityDataForm").validate().numberOfInvalids() + " errores.");  
			});
			
			$("#addRule").click(function() {
					$("#campoX").rules("add", {
						required: true, minlength: 3,
					 	messages: {
					   		required: "Ahora el campo es requerido",
					   		minlength: jQuery.format("Son necesarios al menos {0} caracteres")
		 	}
		});
	});	
});