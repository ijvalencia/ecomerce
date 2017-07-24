var panelorden="<div class='panel-body row'><div class='container-fluid bg-3 text-center'><button class='btn btn-default' id='btncontacto'>Contactos</button><p class='detallesPro'>DetallesPro</p><p class='Precios'>cantidad</p><a href='detalles_orden.php' id='btncontacto'>Ver Detalles</a><div class='row'><div class='col-sm-2' id='position'><img src='../../imgweb/210011Q-500x500.jpg'></div></div></div><hr></div>";  


$(document).ready(function(){
        $.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
	sesion = datos;   
        var stringB = new String(sesion);
        var fieldd = stringB.split(",",2);
       
         var field = stringB.split(",");
         nombre = field[0];
         apellido = field[1];
         number = field[2];
         alert(number);
          
    		$.ajax({
                    
                type: "POST",
			url: "../../bin/ingresar.php?categoria=usuarioorden",
			data:{
			"usuario":number
			},
                        success: function(sessionmsj){   
                              alert(sessionmsj); 
          $.each(sessionmsj, function(i, valor){
         image = panelorden;
        // image = image.replace("imgenes",valor['imagen']);
	 //image = image.replace("DetallesPro",valor['descripcion']);
	 //image = image.replace("marca",valor['marca']);
         //image = image.replace("precio","$"+valor['precio']);
         image = image.replace("cantidad"+valor["cantidad"]);
         $('.').append(image);
       });
                            
                        //var loginobtenido = sessionmsj.split('||');
			// $("#").html(loginobtenido[0]);
			// $("#login").(loginobtenido[1]);
			// $("#").html(loginobtenido[2]);    
			//window.location.href="../../modulos/inicio/index.php";
		//	window.close();
	        	}
	     });            
	});
        
   $.getJSON("../../bin/ingresar.php?categoria=orden", function(respuesta) {
         console.log(respuesta);
           $.each(respuesta, function(i, valor){
            image = tabla_productos;
            image = image.replace("imgenes",valor['imagen']);
            image = image.replace("descripcion",valor['descripcion']);
            image = image.replace("marca",valor['marca']);
            image = image.replace("precio","$"+valor['precio']);
            $('.imgg').append(image);
       });
   });
});