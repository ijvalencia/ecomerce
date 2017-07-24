var img_error = "http://placehold.it/100x100";
var tabla_producto;

    //var x=getUrlParameter('subcategoria');
var x=0;

$(document).ready(function() {
                         
                      //mostrarArticulos("get[ver]");
                      //console.log("aqui trono");
                      
                        var loc = document.location.href;
                         if(loc.indexOf('?')>0)
                        {
                         var getString = loc.split('?')[1];
                         var GET = getString.split('&');
                         var get = {};
                         for(var i = 0, l = GET.length; i < l; i++){
                             var tmp = GET[i].split('=');
                             get[tmp[0]] = unescape(decodeURI(tmp[1]));
                         }
                        }
                        if(get)
                           {
                            for(var ver in get)
                            {
                                //alert(ver);
                                //alert(get[ver]);
                                if(ver=="extra")
                                    var lugar=get[ver];
                                if(ver=="marca")
                                    var marca=get[ver];
                                if(ver=="envio")
                                    var envio=get[ver];
                                if(ver=="priceMIN")
                                    var min=get[ver];
                                if(ver=="priceMAX")
                                    var max=get[ver];
                                
                                
                                if (ver=="subcategoria")
                                {
                                   
                                mostrarArticulos(get[ver], lugar, marca, envio, min, max);
                                
                            }
                            
                            }
                        }
                        else
                            alert("chaleeeeees");
                         
                        //window.location="../../index.php";
                          
                    });

function mostrarArticulos(crayola, plastilina, marcador, avionpapel, miSalario, McPato) {
        
        /*$.getJSON("../../bin/ingresar.php?extra=1&categoria="+crayola, function(respuesta) {
            console.log("../../bin/ingresar.php?extra=1&categoria="+crayola);
                    });*/
    //alert("../../bin/ingresar.php?categoria=listadocantidad&cantidad="+plastilina+"&marca="+marcador+"&envio="+avionpapel+"&min="+miSalario+"&max="+McPato+"&grupo="+crayola);
    $.get("../../bin/ingresar.php?categoria=marcas&grupo="+crayola, function(respuesta)
    {
        respuesta=respuesta.split(";");
        for(var x=0; x<respuesta.length-1;x++)
        {
            $('#marquitas').append("<option value='"+respuesta[x]+"'>"+respuesta[x]+"</option> ");
        }
    });
    $.get("../../bin/ingresar.php?categoria=listadocantidad&cantidad="+plastilina+"&marca="+marcador+"&envio="+avionpapel+"&min="+miSalario+"&max="+McPato+"&grupo="+crayola, function(cantidad)
    {
        $('#catidad').append(cantidad);
        $('#AquiGrupo').append(crayola);
    });
        $.ajax({
            
			type: "POST",
			url: "../../bin/ingresar.php?extra="+plastilina+"&marca="+marcador+"&envio="+avionpapel+"&min="+miSalario+"&max="+McPato+"&categoria="+crayola,
			data:{},       
			success: function(articulo){
                            //console.log(articulo);
                            var dato=JSON.parse(articulo);
                            //console.log(dato);
                            
                            //alert(dato.item.length);
                            
                            var imprimemela="";
                            
                            for(var y=0; y<dato.item.length;y++)
                    {
                        tabla_producto = '  <div class="col-sm-3"> \n\
                                                    <a href="../detalles_producto/index.php?producto=compa" class="thumbnail"><img src="imagen" class="img-responsive" style="width:100%" alt="Image" onerror="this.src=\'../../IMG/error.jpg\'"><p><small> Texto </small></p></a>\n\
                                                    </div>';
                            
                            if (x==0)
                            {
                                tabla_producto='<div class="container-fluid bg-3 text-center"> \n\
                                             ' + tabla_producto;
                            }
                            if (x==3)
                            {
                                tabla_producto+='</div>';
                                    
                                x=0;
                            }
                            else
                            {
                                x++;   
                            }
                            
                            
				var salida = tabla_producto;
				
				salida = salida.replace("imagen", dato.item[y].imagen);
                                salida = salida.replace("compa", dato.item[y].codigo_fabricante);
				salida = salida.replace("Texto", dato.item[y].descripcion.substring(44,0));
				//salida = salida.replace("precio_producto", "$" + valor['precio']);
                                imprimemela+=salida;
                            if(x==0 || y==dato.item.length-1)
                            {
                                $('ttbody').append(imprimemela);
                                imprimemela="";
                            }
                    };
                            $('.loader').fadeOut("slow");
                        }
		}); 
	
                    
        
        
		/*$.each(dato, function(nombre, valor) {
                    
			$.each(valor, function(i, valor) {
                            
                            tabla_producto = '  <div class="col-sm-3"> \n\
                                                    <a href="#" class="thumbnail"><img src="imagen" class="img-responsive" style="width:100%" alt="Image"><p><small> Textini </small></p></a>\n\
                                                    </div>';
                            
                            if (x=0)
                            {
                                tabla_producto='<div class="container-fluid bg-3 text-center">  ' + tabla_producto;
                            }
                            
				var salida = tabla_producto;
				salida = salida.replace(/#n/g, i);
				salida = salida.replace("imagen", valor['imagen']);
				salida = salida.replace("Textini", valor['descripcion']);
				//salida = salida.replace("precio_producto", "$" + valor['precio']);
				$('tbody').append(salida);
                                
                            if (x=3)
                            {
                                tabla_producto= tabla_producto + "</div>";
                                x=0;
                            }
                            else
                                x++;
			});
		});
//		console.log(tabla_producto.replace(/#n/g, "1"));
//		console.log(tabla_producto);
	}).error(function(){
            alert("mejor suerte la proxima");
        });*/
}

