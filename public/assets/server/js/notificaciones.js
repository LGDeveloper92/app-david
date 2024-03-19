$(document).ready(function(){
      
          
          total();

 });

setInterval(total,1000); 


 function total(){

 	 $.ajax({

          url:"totalcountnoti",
          type:"POST",
          data:"",
          dataType: 'json',
          async: true,
          success:function(response){

          	 var notificaciones = eval(response);

          	 for(var i = 0; i < notificaciones.length; i++) {

          	 }



          	 

         
          }
     })   
       
 	
 }