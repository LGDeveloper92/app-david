


/**********BOT TELEGRAM*************/

$(document).on("submit", ".form-bottelegram", function(event){

   event.preventDefault();
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    

     var data_form = {
        chatid : $("#chatid").val(),
        tokenbot : $("#tokenbot").val()      
    }

    //var url_php = 'equipo/setEquipo';
    var url_php = 'servidor/ingresarbottelegram';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){
      console.log(res); 

    if(res.servConfig == false){
        Toast.fire({
        type: 'warning',
        title: '&nbsp; Debe configurar el servidor..'
      })
     }else{
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){
            $(".bottelegramssucess").show('slow');
             $("#chatid").removeClass('is-invalid'); 
             $("#tokenbot").removeClass('is-invalid'); 
             Toast.fire({
              type: 'success',
              title: '&nbsp; Datos ingresados correctamente'
            })        
            
            


         }else if(res.statusAdd == false){

             Toast.fire({
                   type: 'error',
                   title: '&nbsp; Error al ingresar los datos.'
                 }) 
             

              if(res.formError == true){
                if($("#chatid").val() == ""){
                   $("#chatid").addClass('is-invalid'); 
                }else{
                   $("#chatid").removeClass('is-invalid'); 
                } 
                if($("#tokenbot").val() == ""){
                    $("#tokenbot").addClass('is-invalid');                   
                }else{
                    $("#licencia").removeClass('is-invalid'); 
                }
              }else{
               
              }
            
             
         }            
            return false;
      }
     } 
      
    })
     .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;    

});



$(document).on("submit", ".form-formcall", function(event){

   event.preventDefault();
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

           var data_form = {
            
            accountsidtwilio : $("#accountsidtwilio").val(),
            tokenauthtwilio  : $("#tokenauthtwilio").val(), 
            numerotwilio     : $("#numerotwilio").val(),
            costo            : $("#costo").val()
           }


    
              var url_php = 'servidor/ingresarcallcenter';
              $.ajax({
                  type:'POST',
                  url: url_php,
                  data: data_form,
                  dataType: 'json',
                  async: true,
              }).done(function ajaxDone(res){
                 
                 if(res.statusAdd == true){

                    Toast.fire({
                      type: 'success',
                      title: '&nbsp; Datos ingresados correctamente'
                    })    

                 }else{

                   Toast.fire({
                     type: 'error',
                     title: '&nbsp; Error al ingresar los datos.'
                   }) 
                 }

          
               }).fail(function ajaxError(e){
                 console.log(e);
               }).always(function ajaxSiempre(){
            // console.log('Final de la llamada ajax.');
               })
               return false;  

 
});








