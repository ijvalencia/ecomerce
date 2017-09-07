var bandera=false;

$(document).ready(function (){    
    var txtbuscar = $("input:text[id='entrada_busqueda']").val().trim();
   //Comprobamos la longitud de caracteres
	if (txtbuscar.length>1){
		return true;
	}
	else {
		alert('Minimo 2 caracteres');
		return false;	
	}
    if(txtbuscar===""){
        jAlert("INGRESE TEXTO");
         // $('#form-mail').css({"border": "2px solid red"});
         // $('#form-pass').css({"border": "2px solid red"});
        } else {
            $('#form-mail').css({"border": "2px solid Gainsboro"});
            $('#form-pass').css({"border": "2px solid Gainsboro"});
    }
});

