/**********Automremove*************/
$(document).on("submit", ".form-setserver", function(event){

    event.preventDefault();

     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    

     var data_form = {
        sslserv                 : $("#sslserv").val(), 
        descripcionserver       : $("#descripcionserver").val(),
        dominioserver           : $("#dominioserver").val(),
        urlaccess               : $("#urlaccess").val(),
        token_access            : $("#token_access").val(),
        msg_notificacion        : $("#msg_notificacion").val(), 
        status_msg_notificacion : $("#status_msg_notificacion").val(),
        key_api_check           : $("#key_api_check").val()
    }


       
   var url_php = 'servidor/ingresarserver';
     $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){
   
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){

           
            Toast.fire({
              type: 'success',
              title: '&nbsp; Datos ingresados correctamente.'
            })   


         }else if(res.statusAdd == false){

              Toast.fire({
                   type: 'error',
                   title: '&nbsp; Error al ingresar los datos.'
                 }) 
             
         }            
            return false;
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