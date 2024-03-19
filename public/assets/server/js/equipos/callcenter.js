function callcenter(idequipos){
	
	  $("#modalcallceter").modal('show');
	  $("#loader-modal-body-callcenter").hide();
    $(".form-callcenter").show()

    $('#audios').prop('selectedIndex',0);
    //$("#prefijo_sms").val("")
    //$("#numero_sms").val("")
   
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
     $("#prefijo_call").val(resp['pais'])
     $("#numero_call").val(resp['numero'])

   })   

}

$("#audios").on('change', function(){
  view_audios($("#audios").val())
})


function view_audios(rutaaudio){
 
  $("#inputplay").val(rutaaudio);
  $("#divaudio").html("<br><center><audio src='"+rutaaudio+"' controls id = 'audioplay1' style = 'background-color: aqua;border-radius: 9px;width: 190px;'>Tu navegador no soporta el elemento <code>audio</code>.</audio></center>");
 

}

$(document).on('submit', '.form-callcenter', function(event){

   event.preventDefault();

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4500
    });

    $(".form-callcenter").hide()
    $("#proceso_llamada").show()

    let html = "";
    html = '<div class="loader animation-start">'
         + '<span class="circle delay-1 size-2"></span>'
         + '<span class="circle delay-2 size-4"></span>'
         + '<span class="circle delay-3 size-6"></span>'
         + '<span class="circle delay-4 size-7"></span>'
         + '<span class="circle delay-5 size-7"></span>'
         + '<span class="circle delay-6 size-6"></span>'
         + '<span class="circle delay-7 size-4"></span>'
         + '<span class="circle delay-8 size-2"></span>'         
         + '</div>'
         + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
         + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">C</div>'
         + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
         + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">n</div>'
         + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">e</div>'
         + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">c</div>'
         + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">t</div>'
         + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
         + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">n</div>'
         + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">d</div>'
         + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
         + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
         + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
         + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
         + '</div>';

    $("#proceso_llamada").html(html) 


    let datos = {
      audio   : $("#audios").val(),
      prefijo : $("#prefijo_call").val(),
      numero  : $("#numero_call").val()
    }

    const HTTP = axios.create({
        baseURL: dominio
    })

    HTTP.post("/api_rest/callcenter", datos)
        .then(resp => {

         let respuesta = resp.data;

            if(respuesta['status'] == 'success' && respuesta['code'] == 200){


                  const timeValue = setInterval((interval) => {
                  console.log(callcenter_process(respuesta['sid']))
                  sid = respuesta['sid'];
                  if(callcenter_process(respuesta['sid']) == "ringing"){
                   //$("#cancelar_llamada").removeAttr("disabled");
                    html = '';
                    html = '<br><center><img src="../public/assets/server/img/ringing.gif" style = "width:150px; height:150px;"/></center>'
                           + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">M</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">r</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">c</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">n</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">d</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '</div>';
                     $("#proceso_llamada").html(html)        
                    }else if(callcenter_process(respuesta['sid']) == "answered" || callcenter_process(respuesta['sid']) == "in-progress"){
                     html = '';
                     html = '<center><img src="../public/assets/server/img/answered.gif" style = "width:250px; height:200px;"/></center>'
                           + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">C</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">n</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">t</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">e</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">s</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">t</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">d</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '</div>';
                     $("#proceso_llamada").html(html)  
                    }else if(callcenter_process(respuesta['sid']) == "completed"){
                   //$("#cancelar_llamada").attr("disabled");
                     html = '';
                     html = '<br><center><img src="../public/assets/server/img/completed.gif" style = "width:150px; height:150px;"/></center>'
                           + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">C</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">m</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">p</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">l</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">e</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">t</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">d</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '</div>';
                     $("#proceso_llamada").html(html) 
                      updatecreditos_call();
                     clearInterval(timeValue);
                     setTimeout(function(){
                        location.reload()
                      }, 2000)
                    }else if(callcenter_process(respuesta['sid']) == "canceled" ){
                    // $("#cancelar_llamada").attr("disabled");
                      html = '';
                       html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>'
                           + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">C</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">n</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">c</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">e</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">l</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">d</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '</div>';
                   $("#proceso_llamada").html(html)  
                   clearInterval(timeValue); 
                 }else if(callcenter_process(respuesta['sid']) == "no-answer"){

                  //$("#cancelar_llamada").attr("disabled");

                   html = '';
                   html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>'
                           + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">N</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o&nbsp;&nbsp;</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">C</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">n</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">t</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">e</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">s</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">t</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">o</div>'
                           + '</div>';
                   $("#proceso_llamada").html(html)  
                   clearInterval(timeValue); 

                 }else if(callcenter_process(respuesta['sid']) == "failed"){
                  // $("#cancelar_llamada").attr("disabled");

                   html = '';
                   html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>'
                           + '<div class="preloader3 loader-block" style = "width:  155px;height: 16px;">'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">F</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">l</div>'
                           + '<div class="circ4 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">l</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">i</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">d</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">a</div>'
                           + '<div class="circ1 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ2 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '<div class="circ3 loader-primary" style = "background-color: #448aff00; font-size: 20px; color: gray;">.</div>'
                           + '</div>';
                   $("#proceso_llamada").html(html)  

                   clearInterval(timeValue); 
                 }
          
               }, 3000);





              
             
              //console.log(callcenter_process(respuesta['sid']));

            }else if(respuesta['status'] == 'failed' && respuesta['code'] == 500){
              html = "";
              $("#proceso_llamada").hide()
              $(".form-callcenter").show()              

             Toast.fire({
                  type: 'error',
                  title: respuesta['msg_status']
              })
            }else if(respuesta['status'] == 'failed_server' && respuesta['code'] == 301){

              html = "";
              $("#proceso_llamada").hide()
              $(".form-callcenter").show()

             Toast.fire({
                  type: 'error',
                  title: respuesta['msg_status']
              })
            }else{
              html = "";
              $("#proceso_llamada").hide()
              $(".form-callcenter").show()
              Toast.fire({
                  type: 'error',
                  title: respuesta['msg_status']
              })
            }
        })
})

function callcenter_process(sid){
    
    let  response;
    
    let datos = {
      sid   : sid
    }


    var url_php = '/api_rest/callcenter_process'; 
    $.ajax({
        type:'POST',
        url: url_php,
        data: datos,
        dataType: 'json',
        async: false, 
    }).done(function ajaxDone(res){

       response  = res.statuscall;
       if(response == "completed" || response == "answered"){
          $("#saldo_total").html(parseFloat(res['creditos']).toFixed(2));
       }     
       

    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })

    return response;

}

function updatecreditos_call(){
   
    $.ajax({
        type:'POST',
        url: '/api_rest/updatecreditos_call',
        data: '',
        dataType: 'json',
        async: true, 
    }).done(function ajaxDone(resp){

      $("#saldo_total").html(parseFloat(respuesta['creditos']).toFixed(2));

    })

}

$("#cancelar_llamada").on('click', function(){

    let datos = {
      sid : sid
    }

     $.ajax({
        type:'POST',
        url: '/api_rest/callcenter_colgar',
        data: datos,
        dataType: 'json',
        async: true, 
    }).done(function ajaxDone(resp){

     
       $("#loader-modal-body-callcenter").hide();
       $(".form-callcenter").show()
       $('#audios').prop('selectedIndex',0);
       $("#proceso_llamada").html("")  

    })

})

$("#cerrar_ventana").on('click', function(){

   if(sid != ''){

    let datos = {
      sid : sid
    }

     $.ajax({
        type:'POST',
        url: '/api_rest/callcenter_colgar',
        data: datos,
        dataType: 'json',
        async: true, 
    }).done(function ajaxDone(resp){

     
       $("#loader-modal-body-callcenter").hide();
       $(".form-callcenter").show()
       $('#audios').prop('selectedIndex',0);
       $("#proceso_llamada").html("")  
       sid = '';

    })

   }else{
       $("#modalcallceter").modal('hide');
       $("#loader-modal-body-callcenter").hide();
       $(".form-callcenter").show()
       $('#audios').prop('selectedIndex',0);
       $("#proceso_llamada").html("")  
   }
    

})



