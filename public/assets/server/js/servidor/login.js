$(document).on("submit", ".form-signin", function(event){
    
    event.preventDefault();

    $("#imgloaderlogin").html('<img src="assets/server/img/loading.gif" />')



    event.preventDefault();
    

   var $form = $(this);
   
   var data_form = {
        email: $("#user").val(),
        password: $("#password").val() 
    }
    
    var url_php = 'login/iniciar_sesion_post';

    
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
      console.log(res)

      if(res.cuenta == true){

        if(res.statuscuenta == true){

          if(res.logueado == true){

           window.location="equipos";
          }else if(res.logueado == false){
           $(".msgerror").show('slow');
            setTimeout(function() {
             $('.msgerror').hide('slow');
            }, 4000)
           $("#imgloaderlogin").html("");

           
          }

        }if(res.statuscuenta == false){           
           $(".msgstatuserror").show('slow');
           setTimeout(function() {
            $('.msgstatuserror').hide('slow');
           }, 4000)
            $("#imgloaderlogin").html(""); 
        }

      }else if(res.cuenta == false){

            $(".msgcuenta").show('slow');
           setTimeout(function() {
            $('.msgcuenta').hide('slow');
           }, 4000)
            $("#imgloaderlogin").html(""); 
      }


      /* if(res.logueado == true){
        
       }else if(res.logueado == false){
        $(".msgerror").show('slow');
        setTimeout(function() {
          $('.msgerror').hide('slow');
         }, 6000)
       } */
        
     /*  console.log(res); 
      if(res.error !== undefined){
            $("#msg_error").html(res.error).show('slow');
            setTimeout(function() {
                        $('#msg_error').hide('slow');
                    }, 6000)
            return false;
      } 
       if(res.redirect !== undefined){
           window.location = res.redirect;
       }*/
    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        //console.log('Final de la llamada ajax.');
    })
    return false;
});