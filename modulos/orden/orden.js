var i=0;
var position=0;

$(document).ready(function () {
    $(function(){
                   $(document).on('click','input[type="button"]',function(event){
                        var id = this.id;
         //                alert("click"+id);
                          codigofabricante=id;
                        $.ajax({
                                type: "POST",
                                url: "../../bin/ingresar.php?categoria=usuarioorden",
                                datajson: "json",
                                data: {"usuario":id},
                        success: function (informacion) {
                                 if(informacion===null){
                                   jAlert("Error");
                                 } else {
                                window.location.href="Detalles_Orden.php?codigofabricante="+codigofabricante;
                                window.close();
                             }
                          }       
                      });
	            //console.log("Se presionó el Boton con Id :"+ id);
                   });
                });
                
    $.getJSON("../../bin/ingresar.php?categoria=sesion", function (datos) {
        sesion = datos;
        var stringB = new String(sesion);
        var fieldd = stringB.split(",", 2);
        var field = stringB.split(",");
        nombre = field[0];
        apellido = field[1];
        number = field[2];
        //alert(number);
        $.ajax({
            type: "POST",
            url: "../../bin/ingresar.php?categoria=usuarioorden",
            datajson: "json",
            data: {"usuario": number},
            success: function (sessionmsj) {
                //alert(sessionmsj);
                //console.log(sessionmsj);
                  sessionmsj = JSON.parse(sessionmsj);
                  for(i in sessionmsj){
                    var panel = "<div class='panel-body row'><div class='container-fluid bg-3 text-center'><button class='btn btn-default' id='btncontacto'>Contacto</button><div class='detallesPro'>descripcion</div><div class='Precios'>precio</div><input type='button' id='btncontacto"+i+","+sessionmsj[i]["codigo_fabricante"]+"' class='btndetalles' value='Ver Detalles'><div class='row'><div class='col-sm-2' id='position'><img src='imagen' id='imagen'></div></div></div></div><hr>";
                    var contenido = panel;
                    
                    datos = panel;        
                    console.log(i);
                    console.log(sessionmsj[i]["nombre"]);
                    console.log(i+sessionmsj[i]["apellidos"]+sessionmsj[i]["descripcion"]+sessionmsj[i]["total"]+sessionmsj[i]["imagen"]);
                    
                    contenido = contenido.replace("descripcion",sessionmsj[i]["descripcion"]);
                    contenido = contenido.replace("precio","$"+sessionmsj[i]["precio"]);
                    contenido = contenido.replace("imagen",sessionmsj[i]['imagen']);     
                 $('#contenido').append(contenido);
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
