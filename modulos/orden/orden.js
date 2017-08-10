var panelorden="<div class='panel-body row'><div class='container-fluid bg-3 text-center'><button class='btn btn-default' id='btncontacto'>Contactos</button><p class='detallesPro'><div id='detalles'></div></p><p class='Precios'><div class='presio'></div></p><a href='detalles_orden.php' id='btncontacto'>Ver Detalles</a><div class='row'><div class='col-sm-2' id='position'><img src='imagen' ></div></div></div><hr></div>";  

$(document).ready(function(){
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
                        datajson: "json",
			data:{"usuario":number},
                        success: function(sessionmsj){
                            alert(sessionmsj);
                            console.log(sessionmsj);
                            for (var i=0 ; i<10 ;i++){
                            sessionmsj = JSON.parse(sessionmsj);
                            console.log(sessionmsj[i]["nombre"]);
                            console.log(sessionmsj[i]["apellidos"]);
                            $("#nombre").html(sessionmsj[i]["nombre"]+"-"+sessionmsj[i]["apellidos"]);
                            $("#cantidad").html(sessionmsj[i]["cantidad"]);
                            $("#descripcion").html("Descrpicion del producto es:"+sessionmsj[i]["descripcion"]);
                            $("#precio").html("$ "+sessionmsj[i]["precio"]+" ºº");
                            //$("#imagen").html(sessionmsj[0]["imagen"]);
                           $("#imagen").attr("src",sessionmsj[i]['imagen']);
                       }
                    }
	      });            
	 });
        /*
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
   });*/
});