/**********Automremove*************/
$(document).on("submit", ".form-apicpanel", function(event){

    event.preventDefault();
    
     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

     var data_form = {
        rutacpanelapi  : $("#rutacpanelapi").val(),
        usercpanelapi  : $("#usercpanelapi").val(),
        passcpanelapi  : $("#passcpanelapi").val(),
        ip_cpanel      : $("#ip_cpanel").val(),
        dominio_cpanel : $("#dominio_cpanel").val(),
        nameserver1    : $("#nameserver1").val(), 
        nameserver2    : $("#nameserver2").val(), 
        nameserver3    : $("#nameserver3").val(), 
        nameserver4    : $("#nameserver4").val() 
    }

    var url_php = 'servidor/ingresarcpanelapi';
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
       $(".msgserverror").show('slow');
     }else{
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){

             Toast.fire({
              type: 'success',
              title: '&nbsp; Datos ingresados correctamente'
            })   

            $(".apicpanelsucess").show('slow');
             $("#usercpanelapi").removeClass('is-invalid'); 
             $("#passcpanelapi").removeClass('is-invalid'); 
             $("#rutacpanelapi").removeClass('is-invalid');
                  


         }else if(res.statusAdd == false){

            
              Toast.fire({
                   type: 'error',
                   title: '&nbsp; Error al ingresar los datos.'
                 }) 
             

              if(res.formError == true){
                if($("#usercpanelapi").val() == ""){
                   $("#usercpanelapi").addClass('is-invalid'); 
                }else{
                   $("#usercpanelapi").removeClass('is-invalid'); 
                } 
                if($("#passcpanelapi").val() == ""){
                    $("#passcpanelapi").addClass('is-invalid');                   
                }else{
                    $("#passcpanelapi").removeClass('is-invalid'); 
                }

                if($("#rutacpanelapi").val() == ""){
                    $("#rutacpanelapi").addClass('is-invalid');                   
                }else{
                    $("#rutacpanelapi").removeClass('is-invalid'); 
                }

                
              }else{
                $(".apicpanelwarning").show('slow'); 
                setTimeout(function(){
                 $('.apicpanelwarning').hide('slow');
                 //$("html, body").animate({scrollTop:"0px"});
                }, 6000)
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