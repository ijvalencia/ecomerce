var carruselfooter  = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarruselfooter' alt='Image' class='imegs'><p><hr><small>descripcionfooter</small>preciofooter</p></a></div>";
var carruselfooter2 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarruselfooter2' alt='Image' class='imegs'><p><hr><small>descripcionfooter2</small>preciofooter2</p></a></div>";
var carruselfooter3 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarruselfooter3' alt='Image' class='imegs'><p><hr><small>descripcionfooter3</small>preciofooter3</p></a></div>";
var carruselfooter4 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarruselfooter4' alt='Image' class='imegs'><p><hr><small>descripcionfooter4</small>preciofooter4</p></a></div>";
var carruselfooter5 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarruselfooter5' alt='Image' class='imegs'><p><hr><small>descripcionfooter5</small>preciofooter5</p></a></div>";
var carruselfooter6 = "<div class='col-md-3'><a href='#' class='thumbnail' id='sombreado'><img src='imagecarruselfooter6' alt='Image' class='imegs'><p><hr><small>descripcionfooter6</small>preciofooter6</p></a></div>";

var imagefooter,imagefooter2,imagefooter3,imagefooter4,imagefooter5,imagefooter6;

$(document).ready(function(){
    $.getJSON("../../bin/ingresar.php?categoria=carruselfooter", function(respuestacarruselfooter){
//         console.log(respuestacarruselfooter);
    
         $.each(respuestacarruselfooter, function(i, valorfooter){
         imagefooter = carruselfooter; 
         imagefooter = imagefooter.replace("imagecarruselfooter",valorfooter['imagen']);
	 imagefooter = imagefooter.replace("descripcionfooter",valorfooter['descripcion']);
         imagefooter = imagefooter.replace("preciofooter"," $"+valorfooter['precio']);
          $('.imegs').attr("imagecarruselfooter",valorfooter['imagen']);
	  $('.imegs').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
         
//         console.log(imagefooter);
         $(".caruselfooter1").append(imagefooter);
      });
   });
   
    $.getJSON("../../bin/ingresar.php?categoria=carruselfooter2", function(respuestacarruselfooter2){
//         console.log(respuestacarruselfooter2);
         $.each(respuestacarruselfooter2, function(i, valorfooter2){
         imagefooter2 = carruselfooter2; 
         imagefooter2 = imagefooter2.replace("imagecarruselfooter2",valorfooter2['imagen']);
	 imagefooter2 = imagefooter2.replace("descripcionfooter2",valorfooter2['descripcion']);
         imagefooter2 = imagefooter2.replace("preciofooter2","$"+valorfooter2['precio']);
         $('.imegs').attr("imagecarruselfooter2",valorfooter2['imagen']);
	 $('.imegs').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
	
//         console.log(imagefooter2);
         $(".caruselfooter2").append(imagefooter2);
      });
   });
   
    $.getJSON("../../bin/ingresar.php?categoria=carruselfooter3", function(respuestacarruselfooter3){
//         console.log(respuestacarruselfooter3);
         $.each(respuestacarruselfooter3, function(i, valorfooter3){
         imagefooter3 = carruselfooter3; 
         imagefooter3 = imagefooter3.replace("imagecarruselfooter3",valorfooter3['imagen']);
	 imagefooter3 = imagefooter3.replace("descripcionfooter3",valorfooter3['descripcion']);
         imagefooter3 = imagefooter3.replace("preciofooter3","$"+valorfooter3['precio']);
         $('.imegs').attr("imagecarruselfooter3",valorfooter3['imagen']);
	 $('.imegs').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
//         console.log(imagefooter3);
         $(".caruselfooter3").append(imagefooter3);
      });
   });
/*fin de los mas vendidos*/

/*los mejotres productos mas descatados */
    $.getJSON("../../bin/ingresar.php?categoria=carruselfooter4", function(respuestacarruselfooter4){
//         console.log(respuestacarruselfooter4);
         $.each(respuestacarruselfooter4, function(i, valorfooter4){
         imagefooter4 = carruselfooter4; 
         imagefooter4 = imagefooter4.replace("imagecarruselfooter4",valorfooter4['imagen']);
	 imagefooter4 = imagefooter4.replace("descripcionfooter4",valorfooter4['descripcion']);
         imagefooter4 = imagefooter4.replace("preciofooter4","$"+valorfooter4['precio']);
         $('.imegs').attr("imagecarruselfooter4",valorfooter4['imagen']);
	 $('.imegs').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
//         console.log(imagefooter4);
         $(".caruselfooter4").append(imagefooter4);
      });
   });

    $.getJSON("../../bin/ingresar.php?categoria=carruselfooter5", function(respuestacarruselfooter5){
//         console.log(respuestacarruselfooter5);
         $.each(respuestacarruselfooter5, function(i, valorfooter5){
         imagefooter5 = carruselfooter5; 
         imagefooter5 = imagefooter5.replace("imagecarruselfooter5",valorfooter5['imagen']);
	 imagefooter5 = imagefooter5.replace("descripcionfooter5",valorfooter5['descripcion']);
         imagefooter5 = imagefooter5.replace("preciofooter5","$"+valorfooter5['precio']);
//         console.log(imagefooter5);
         $('.imegs').attr("imagecarruselfooter5",valorfooter5['imagen']);
	 $('.imegs').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
         $(".caruselfooter5").append(imagefooter5);
      });
   });
   
   $.getJSON("../../bin/ingresar.php?categoria=carruselfooter6", function(respuestacarruselfooter6){
//         console.log(respuestacarruselfooter6);
         $.each(respuestacarruselfooter6, function(i, valorfooter6){
         imagefooter6 = carruselfooter6; 
         imagefooter6 = imagefooter6.replace("imagecarruselfooter6",valorfooter6['imagen']);
	 imagefooter6 = imagefooter6.replace("descripcionfooter6",valorfooter6['descripcion']);
         imagefooter6 = imagefooter6.replace("preciofooter6","$"+valorfooter6['precio']);
//         console.log(imagefooter6);
         $('.imegs').attr("imagecarruselfooter6",valorfooter6['imagen']);
	 $('.imegs').attr("onerror", 'this.src="\../../IMG/error2.jpg\"');
         $(".caruselfooter6").append(imagefooter6);
      });
   });
});