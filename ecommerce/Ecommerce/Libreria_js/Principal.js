var btnmenu;
$(document).ready(function () {
 //$.registrosLogin = function () { 
      $("#datosmenu,.click").on('click', function () {      
          
         btnmenu1 = $("#1").html();
         btnmenu2 = $("#2").html();
         btnmenu3 = $("#3").html();
         btnmenu4 = $("#4").html();
         btnmenu5 = $("#5").html();
         
        alert("hola"+btnmenu1+btnmenu2+btnmenu3+btnmenu4+btnmenu5);
        
        switch(btnmenu1) {
               case 1:
                console.log("hola" + btnmenu);
                alert("hola otra ves" + btnmenu);
               /* $.ajax({
                    dataType: "json",
                    url: "bin/conectBD.php",
                    data: btnmenu,
                    success: function (data) {
                        $('#1').html(data);
                         $("#").modal("show");
                    }
                });*/
                // var categoria = $.post("bin/conectBD.php", {coche: "", modelo: ""});
                //   categoria.done(function(msns){
                break;
            
            case 2:
                $.ajax({
                    dataType: "json",
                    url: "bin/conectBD.php",
                    data: btnmenu,
                    success: function (data) {
                        $('#1').html(data);
                    }
                });
                break;
                
            case 3:
                $.ajax({
                    dataType: "json",
                    url: "bin/conectBD.php",
                    data: btnmenu,
                    success: function (data) {
                        $('#1').html(data);
                    }
                });
                break;
            case 4:
                $.ajax({
                    dataType: "json",
                    url: "bin/conectBD.php",
                    data: btnmenu,
                    success: function (data) {
                        $('#1').html(data);
                    }
                });

                break;
            case 5:
                $.ajax({
                    dataType: "json",
                    url: "bin/conectBD.php",
                    data: btnmenu,
                    success: function (data) {
                        $('#1').html(data);
                    }
                });
                break;
            case 6:
                $.ajax({
                    dataType: "json",
                    url: "bin/conectBD.php",
                    data: btnmenu,
                    success: function (data) {
                        $('#1').html(data);
                    }
                });
                break;
          }   
      });    
   });