function smssender(idequipos){
	
	  $("#modalsmssender").modal('show');
	  $("#loader-modal-body-smssender").show();
    $(".form-smssender").hide()


    $("#msg_sms").val("");
    $("#prefijo_sms").val("")
    $("#numero_sms").val("")
    urlacortada_temp = ""
    link_short_temp  = ""
    link_long_temp   = ""
    modelo_temp      = ""
    niphone_temp     = ""
    idequipos_sms    = ""
    $(".form-smssender")[0].reset();

    let datos = {
    	idequipos : idequipos
    }
   
   $.ajax({
      type: 'POST',
      url: '/equipos/getingresado',
      data: datos,
      dataType: 'json',
      async: true
   }).done(function ajaxDone(resp) {

   	 $("#loader-modal-body-smssender").hide();
     $(".form-smssender").show()

     //console.log(resp)
     $("#prefijo_sms").val(resp['pais'])
     $("#numero_sms").val(resp['numero'])
     urlacortada_temp = resp['urlacortada']
     link_short_temp  = resp['link_short']
     link_long_temp   = resp['link_long']
     modelo_temp      = resp['modelo']
     niphone_temp     = resp['niphone']
     $("#idequipos_sms").val(idequipos)

     

   })

 

}

$(document).on('submit', '.form-smssender', function(event){
   

    event.preventDefault();

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4500
    }); 

    $(".alert-success_sms").hide()
    $(".alert-danger_sms").hide()

    $("#loader-modal-body-smssender").show();
    $(".form-smssender").hide()
	  const HTTP = axios.create({
        baseURL: dominio
    })

    let datos = {
    	id_apisms   : $("#id_apisms_sender").val(),
    	sender_id   : $("#sender_id").val(),
    	prefijo_sms : $("#prefijo_sms").val(),
    	numero_sms  : $("#numero_sms").val(),
    	msg_sms     : $("#msg_sms").val(),
      idequipos   : $("#idequipos_sms").val()
    }

   

    HTTP.post("/api_rest/enviar_sms", datos)
         .then(resp => {

           // $('.modal-body-remove').html("");

            let respuesta = resp.data;
            $("#loader-modal-body-smssender").hide();
            $(".form-smssender").show()
            if(respuesta['status'] == 'success' && respuesta['code'] == 200){
              
              Toast.fire({
                  type: 'success',
                  title: respuesta['msg_status']
              })

              $("#saldo_total").html(parseFloat(respuesta['creditos']).toFixed(2));

            }else if(respuesta['status'] == 'failed' && respuesta['code'] == 500){

             Toast.fire({
                  type: 'error',
                  title: respuesta['msg_status']
              })
            }else if(respuesta['status'] == 'failed_server' && respuesta['code'] == 301){

             Toast.fire({
                  type: 'error',
                  title: respuesta['msg_status']
              })
            }else{
              Toast.fire({
                  type: 'error',
                  title: respuesta['msg_status']
              })
            }
            
            
           

           

         })


})

$("#plantilla_sms").on('change', function(){

	console.log('aqui' + " - " + urlacortada_temp + " - " + link_short_temp + " - " + link_long_temp + " - " + modelo_temp + " -" +niphone_temp)
    
    let urlacortada_op = '';
    if(urlacortada_temp == 'acortada'){
      urlacortada_op = 'https://'+link_short_temp;
    }else{
      urlacortada_op = 'https://'+link_long_temp;	
    }
    let plantilla_sms = $("#msg_sms").val($("#plantilla_sms").val().replace(/{{model}}/g,modelo_temp)
                                                                   .replace(/{{device}}/g,niphone_temp)
                                                                   .replace(/{{time}}/g,date_temp)
                                                                   .replace(/{{link}}/g,urlacortada_op));


})
