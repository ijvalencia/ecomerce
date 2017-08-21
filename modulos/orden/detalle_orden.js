var codigofabricante;
$(document).ready(function () {
    var paramstr = window.location.search.substr(1);
    var paramarr = paramstr.split("&");
    var params = {};
    
    for(var i = 0; i < paramarr.length; i++) {
        var tmparr = paramarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    
    if (params['codigofabricante']){
        var codigo = String(params['codigofabricante']);
        
        codigofabricante = codigo.substr(13,10);
        //alert(codigofabricante);
        console.log("hola mundo cruel"+codigofabricante,codigo);
        
        console.log('El valor del parámetro variable es:'+params['codigofabricante']);
        
        $.ajax({
             type: "POST",
             url: "../../bin/ingresar.php?categoria=usuariordendetalles",
             //datajson: "json",             
             data:{"usuario":codigofabricante},
             success: function (informacion){
            //    alert(informacion); 
                    //console.log(informacion);
                informacion = JSON.parse(informacion);
                
                  $("#cantidad").html("Numero de Piezas :"+informacion[0]["cantidad"]);
                  $("#descripcion").html("Descripcion del los Productos "+informacion[0]["descripcion"]);
                  $("#precio").html("Precio  :$ "+informacion[0]["precio"]);
                  $("#fechasss").html("Fecha del pedido "+informacion[0]["fecha"]);
                  $("#precios").html("Precio total :$ "+informacion[0]["precio"]);
                  $(".detallesPros").html("Tipo de pago:"+informacion[0]["metodo_pago"]);
                  $("#imagen").attr("src",informacion[0]['imagen']);
               //esta es el otro panel 
                         var suma = parseFloat(5.0)+parseFloat(informacion[0]["precio"]);
                  $("#preciosenvio").html("Cargo por envios :$ "+suma);
                  $("#precioMonto").html("Monto Total de Producto :$ "+suma);

                              
                }
   });
 }     else {
        console.log('No se envió el parámetro variable');
    }
});


/*$.getJSON("../../bin/ingresar.php?categoria=sesion", function(datos) {     
 sesion = datos;   
 var stringB = new String(sesion);
 var fieldd = stringB.split(",",2);
 var field = stringB.split(",");
 nombre = field[0];
 apellido = field[1];
 number = field[2];
 
 $.ajax({
 type: "POST",
 url: "../../bin/ingresar.php?categoria=usuarioorden",              
 data:{"usuario":number},
 success: function(sessionmsj){
 
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
 
 });*/