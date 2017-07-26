$(document).ready(function (){
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
	sesion = datos;   
        var stringB = new String(sesion);
        var fieldd = stringB.split(",",2);
        
        var field = stringB.split(",");
        nombre = field[0];
        apellido = field[1];
        number = field[2];
        
        //alert(number);
    		$.ajax({
                type: "POST",
			url: "../../bin/ingresar.php?categoria=usuarioorden",              
			data:{"usuario":number},
                        success: function(sessionmsj){
                            
                           // alert(sessionmsj
                            sessionmsj = JSON.parse(sessionmsj);
                            console.log(sessionmsj[0]["nombre"]);
                            console.log(sessionmsj[0]["apellidos"]);
                            $("#nombre").html(sessionmsj[0]["nombre"]+" "+sessionmsj[0]["apellidos"]);
                            $("#cantidad").html(sessionmsj[0]["cantidad"]);
                            $("#descripcion").html("Descripcion del los Productos "+sessionmsj[0]["descripcion"]);
                            $("#precio").html("$ "+sessionmsj[0]["precio"]);
                            $("#imagen").attr("src",sessionmsj[0]['imagen']);
                            //esta es el otro panel 
                             $("#precios").html("productos Comprados : $ "+sessionmsj[0]["precio"]);
                              var suma = parseFloat(5.0)+parseFloat(sessionmsj[0]["precio"]);
                             $("#preciosenvio").html("Cargo por envios :$ "+suma);
                             $("#precioMonto").html("Monto Total de Producto :$ "+suma);
               }
	    });
            $.ajax({
                 type:"POST",
		 url: "../../bin/ingresar.php?categoria=usuariordendetalles",              
	         data:{"usuario":number},
                 success: function(sessionmsj){                
                    // alert("2"+sessionmsj);
                 sessionmsj = JSON.parse(sessionmsj);
                 $("#pagos").html("Tarjeta de Dèbito : "+sessionmsj[0]["metodo_pago"]);
                 }
	       });
               
	}); 
});