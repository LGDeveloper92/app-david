
window.onload = (function(){
try{
    $("#buscarusuario").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            allusuarios("");
           
        }else{

           allusuarios(value);
        }
    }).keyup();
}catch(e){}



});

function allusuarios(buscar){
    
    var data_form = {
        buscarusuario :buscar      
    }
    
    var url_php = 'usuarios/getAllusuarios';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         //('#reloadIcloud').html('<img src="../public/assets/img/loading.gif" /><a>Procesando<a>');
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

                   var btnstatus = "";
                   var status = "";
                   var btnelim = "";

                  if(value.status == "0"){
                    btnstatus = "btn-danger";
                    status = "fa fa-times";
                  }else if(value.status == "1"){
                    btnstatus = "btn-success";
                    status = "fa fa-check";
                  }
                  
                  let btn_status = '';

                  if(value.rol == 'master'){
                   btn_status = "<font class='btn "+btnstatus+" btn-sm' style = 'cursor: pointer;'  disabled><span class='"+status+"' aria-hidden='true' style = 'color: white;'></span></font>";
                   btnelim = "";
                  }else{
                   btn_status = "<font class='btn "+btnstatus+" btn-sm' style = 'cursor: pointer;' onclick='actualizarStatus("+value.idusuario+")'><span class='"+status+"' aria-hidden='true' style = 'color: white;'></span></font>";
                   
                   btnelim ="<div class='btn-group' style = 'inline-size: max-content;'>"
                            + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='eliminarusuario("+value.idusuario+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"
                            + "</div>";
                  }

                  
                   btndel = "<td data-label='Acción' style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"
                          +"<font class='btn btn-info btn-sm waves-effect md-trigger' onclick='viewdetail("+value.idusuario+")' data-modal = 'modalview' style = 'cursor: pointer;'><span class='fa fa-eye' aria-hidden='true' style = 'color: white;' ></span></font>"                          
                          +"<font class='btn btn-success btn-sm' style = 'cursor: pointer;' onclick='view_password("+value.idusuario+")'><span class='fa fa-key' aria-hidden='true' style = 'color: white;'></span></font>"
                          +"<font class='btn btn-warning btn-sm' style = 'cursor: pointer;' onclick='view_date("+value.idusuario+")'><span class='fa fa-calendar' aria-hidden='true' style = 'color: white;'></span></font>"
                          + btn_status
                          + "</div></td>";

               
                  let status_user = '';
                  if(value.status == '0'){

                    status_user = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Desactivado</span>';
                  
                  }else if(value.status == '1'){
                    
                    status_user = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Activo</span>';

                  }


                   $("#bodyTable").append("<tr>"
                                       + "<td style = 'padding: 0.7em!important'>"
                                       + btnelim
                                       + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + mayuscula(value.nombre.toLowerCase()) + "</td>"
                                       + "<td data-label='Nombre iPhone' style = 'padding: 0.7em!important'>" + value.email + "</td>"
                                       + "<td data-label='Model' style = 'padding: 0.7em!important'>" + status_user + "</td>"
                                       +  btndel
                                       + "</tr>"); 
                  i++;
                })

            }
        }

      
      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;  
}

$(document).on("submit", ".form-addusuario", function(event){

    event.preventDefault();

     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    var numerotlf = "";

    if($("#numero").val() == ""){
      numerotlf = "";
    }else if($("#numero").val() != ""){
      numerotlf = $("#spanprefijo").html() + $("#numero").val();
    }
      
    

     var data_form = {
        nombre     : $("#nombre").val(),
        numero     : numerotlf,
        pais       : $("#pais").val(),
        email      : $("#email").val(),
        password   : $("#password").val(),
        fechav     : $("#fechav").val(),
        correonoti : $("#correonoti").val()
    }
       
   var url_php = 'usuarios/ingresarusuario';
     $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){
      console.log(res); 

   
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){

          allusuarios("")
          //reloadcreduser();

           
            Toast.fire({
              type: 'success',
              title: '&nbsp; Usuario creado correctamente'
            })                    
            
             $(".form-addusuario")[0].reset();     


         }else if(res.statusAdd == false){

              Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error al crear al usuario.'
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


$(document).on("submit", ".form-updateusuario", function(event){

    event.preventDefault();

     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    var numerotlf = "";

    if($("#numero_upd").val() == ""){
      numerotlf = "";
    }else if($("#numero_upd").val() != ""){
      numerotlf = $("#spanprefijo_upd").html() + $("#numero_upd").val();
    }
      
    

     var data_form = {
        nombre     : $("#nombre_upd").val(),
        numero     : numerotlf,
        pais       : $("#pais_upd").val(),
        email      : $("#email_upd").val(),
        correonoti : $("#correonoti_upd").val()
    }
       
   var url_php = 'usuarios/updateperfil';
     $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){
      console.log(res); 

   
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){

          allusuarios("")
          //reloadcreduser();

           
            Toast.fire({
              type: 'success',
              title: '&nbsp; Tu perfil se actualizo correctamente.'
            })                    
            
             $(".form-addusuario")[0].reset();     


         }else if(res.statusAdd == false){

              Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error al tratar de actualizar.'
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






$("#buttonreload").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
   allusuarios("");

})


function viewdetail(iduser){

  $("#modal_detalle_user").modal('show');  
  $('.modal-body_detalle_user').html('<div class="loader-block"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>')

   var data_form = {
        idusuario :iduser      
    }
    
    var url_php = 'usuarios/getusuario';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         
        },
    }).done(function ajaxDone(res){

      $('.modal-body_detalle_user').html("");
      var html = "";
      var status = "";


      
     if(res.status == "1"){
        status = '<span class="badge badge-success" id = "listspan1"  class="list-group-item" style = "cursor:pointer; border-radius: 5px 5px 0px 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;Habilitado</span>';
     }else if(res.status == "0"){
        status = '<span class="badge badge-warning" id = "listspan1"  class="list-group-item" style = "cursor:pointer; border-radius: 5px 5px 0px 0px;"><i class="fa fa-times"></i>&nbsp;&nbsp;Deshabilitado</span>';
     }  


      html = '<div class="list-group">'
           + '<span id = "listspan1"  class="list-group-item" style = "cursor:pointer; border-radius : 0px;"><i class="fa fa-info"></i>&nbsp;&nbsp;<span>Nombre :</span> <span>'+ mayuscula(res.nombre.toLowerCase())+'</span></span>'
           + '<span id = "listspan2"  class="list-group-item" style = "cursor:pointer;"><i class="fas fa-user"></i>&nbsp;&nbsp;<span>Usuario :</span> <span>'+res.email+'</span></span>'
           + '<span id = "listspan2"  class="list-group-item" style = "cursor:pointer;"><i class="fa fa-at"></i>&nbsp;&nbsp;<span>Correo :</span> <span>'+res.correonoti+'</span></span>'
           + '<span id = "listspan3"  class="list-group-item" style = "cursor:pointer;"><i class="fa fa-mobile"></i>&nbsp;&nbsp;<span>Telefono :</span> <span>'+res.numero+'</span></span>'
           + '<span id = "listspan4"  class="list-group-item" style = "cursor:pointer;"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<span>Pais :</span> <span>'+res.pais+'</span></span>'
           + '<span id = "listspan7"  class="list-group-item" style = "cursor:pointer;"><i class="fa fa-calendar-o" style ="color:green;"></i>&nbsp;&nbsp;<span>Ingreso :</span> <span>'+res.fechai+'</span></span>'
           + '<span id = "listspan9"  class="list-group-item" style = "cursor:pointer;  border-radius : 0px;"><i class="fa fa-clock-o" style ="color:red;"></i>&nbsp;<span>Vencimiento :</span> <span>'+res.fechav+'</span>'
           + '</div>';
      $(".modal-body_detalle_user").html(html);       



    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');*/
    })
    return false; 

 //$("#bodymodal").html("El texto se coloca en esta sección")

}

function view_password(iduser){
  $(".form-editar_password").hide()
  $("#modal_editar_password").modal('show'); 
  $("#password_editar_password").val("")

  var data_form = {
    idusuario :iduser      
  }
    
  var url_php = 'usuarios/getusuario';
  $.ajax({
      type:'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function() {
         
      },
  }).done(function ajaxDone(res){

    $(".loader-block-editar_password").hide()
    $(".form-editar_password").show()
    $("#email_editar_password").val(res['email'])


  })

}

function view_date(iduser){
 
  $(".form-editar_vencimiento").hide()
  $("#modal_editar_vencimiento").modal('show'); 
  var data_form = {
    idusuario :iduser      
  }
    
  var url_php = 'usuarios/getusuario';
  $.ajax({
      type:'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function() {
         
      },
  }).done(function ajaxDone(res){

    $(".loader-block-editar_vencimiento").hide()
    $(".form-editar_vencimiento").show()
    $("#email_editar_vencimiento").val(res['email'])
    $("#fechav_editar_vencimiento").val(res['fechav']);


  })


}

$(document).on("submit", ".form-editar_password", function(event){
    
  event.preventDefault();

  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  var data_form = {
    email     : $("#email_editar_password").val(),
    password  : $("#password_editar_password").val()    
  }
    
  var url_php = 'usuarios/update_password_user';
  $.ajax({
      type:'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function() {
         
      },
  }).done(function ajaxDone(res){

    if(res['statusAdd'] == true){

      Toast.fire({
        type: 'success',
        title: '&nbsp; La contraseña se actualizado correctamente.'
      })  

    }else{

      Toast.fire({
        type: 'error',
        title: '&nbsp; Hubo un error al actualizar contraseña.'
      }) 


    }
  })

})

$(document).on("submit", ".form-editar_vencimiento", function(event){
    
  event.preventDefault();

  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  var data_form = {
    email  : $("#email_editar_vencimiento").val(),
    fechav : $("#fechav_editar_vencimiento").val()    
  }
    
  var url_php = 'usuarios/update_vencimiento_user';
  $.ajax({
      type:'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function() {
         
      },
  }).done(function ajaxDone(res){

    if(res['statusAdd'] == true){

      Toast.fire({
        type: 'success',
        title: '&nbsp; La fecha de vencimiento se actualizo.'
      })  

    }else{

      Toast.fire({
        type: 'error',
        title: '&nbsp; Hubo un error al actualizar la fecha.'
      }) 


    }
  })

})



function mayuscula(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}


function reloadcreduser(){

  $("#selecusuariosms").html("");
  $("#selecusuariocall").html("");
  $("#selecusuariorep").html("");
  
    
    var url_php = 'usuarios/getAllusuarios';
    $.ajax({
        type:'POST',
        url: url_php,
        data: '',
        dataType: 'json',
        async: true,
        beforeSend: function() {
         
        },
    }).done(function ajaxDone(res){

      if(res != null && $.isArray(res)){
        
          $.each(res, function(index, value){

            $("#selecusuariosms").append("<option value = "+value.idusuario+">"+value.nombre + "(" + value.email + ")" +"</option>");
            $("#selecusuariocall").append("<option value = "+value.idusuario+">"+value.email + "(" + value.email + ")" +"</option>");
            $("#selecusuariorep").append("<option value = "+value.idusuario+">"+value.email + "(" + value.email + ")" +"</option>");


                  
          })

       }



    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');*/
    })
    return false; 


}

$(document).on("submit", ".form-saldo_general", function(event){

   event.preventDefault();

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    

    var data_form = {

        selecusuariosaldogeneral : $("#selecusuariosaldogeneral").val(),
        saldo_general : $("#saldo_general").val()
    }

    if(data_form.selecusuariosaldogeneral == "selectuser"){

      Toast.fire({
               type: 'error',
               title: '&nbsp; Debe seleccionar una opción valida.'
             })

    }else if(data_form.saldo_general < 0){


      Toast.fire({
               type: 'error',
               title: '&nbsp; La cantidad debe ser igual ó mayor a 0.'
             })
    }else{

      var url_php = 'usuarios/creditos_general';
      $.ajax({
          type:'POST',
          url: url_php,
          data: data_form,
          dataType: 'json',
          async: true,
      }).done(function ajaxDone(res){

        console.log(res)
        
       if(res.statusAdd == true){

         Toast.fire({
              type: 'success',
              title: '&nbsp; Creditos asignados correctamente.'
            })

         
           $("#saldo_total").html(parseFloat($("#saldo_general").val()).toFixed(2))  

        }else if(res.statusAdd == false){

          Toast.fire({
               type: 'error',
               title: '&nbsp; Error al asignar creditos.'
             })
        }

      }).fail(function ajaxError(e){
      }).always(function ajaxSiempre(){
          // console.log('Final de la llamada ajax.');
      })
       return false;



    }
    
})




$(document).on("submit", ".form-credcall", function(event){

   event.preventDefault();

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    

    var data_form = {

        selecusuariocall : $("#selecusuariocall").val(),
        cantidadcall : $("#cantidadcall").val()
    }

    if(data_form.selecusuariocall == "selectuser"){

      Toast.fire({
               type: 'error',
               title: '&nbsp; Debe seleccionar una opción valida.'
             })

    }else if(data_form.cantidadcall < 0){


      Toast.fire({
               type: 'error',
               title: '&nbsp; La cantidad debe ser igual ó mayor a 0.'
             })
    }else{

      var url_php = 'usuarios/creditosCall';
      $.ajax({
          type:'POST',
          url: url_php,
          data: data_form,
          dataType: 'json',
          async: true,
      }).done(function ajaxDone(res){

        console.log(res)
        
       if(res.statusAdd == true){

         Toast.fire({
              type: 'success',
              title: '&nbsp; Creditos asignados correctamente.'
            })

        }else if(res.statusAdd == false){

          Toast.fire({
               type: 'error',
               title: '&nbsp; Error al asignar creditos.'
             })
        }

      }).fail(function ajaxError(e){
      }).always(function ajaxSiempre(){
          // console.log('Final de la llamada ajax.');
      })
       return false;



    }
    
})




$(document).on("submit", ".form-credsms", function(event){

   event.preventDefault();

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    

    var data_form = {

        selecusuariosms: $("#selecusuariosms").val(),
        cantidadsms : $("#cantidadsms").val()
    }

    if(data_form.selecusuariosms == "selectuser"){

      Toast.fire({
               type: 'error',
               title: '&nbsp; Debe seleccionar una opción valida.'
             })

    }else if(data_form.cantidadsms < 0){


      Toast.fire({
               type: 'error',
               title: '&nbsp; La cantidad debe ser igual ó mayor a 0.'
             })
    }else{

      var url_php = 'usuarios/creditosSMS';
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
              title: '&nbsp; Creditos asignados correctamente.'
            })

        }else if(res.statusAdd == false){

          Toast.fire({
               type: 'error',
               title: '&nbsp; Error al asignar creditos.'
             })

        }

      }).fail(function ajaxError(e){
      }).always(function ajaxSiempre(){
          // console.log('Final de la llamada ajax.');
      })
       return false;



    }

})









function actualizarStatus(idusuario){
   
     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000

    });
   

   var data_form = {
        idusuario :idusuario      
    }
    
    var url_php = 'usuarios/updateStatus';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         
        },
    }).done(function ajaxDone(res){

      if(res.statusUpd == true){

         Toast.fire({
              type: 'success',
              title: '&nbsp; Usuario actualizado correctamente'
         })


          allusuarios("")



      }else if(res.statusUpd == false){

        Toast.fire({
                   type: 'error',
                   title: '&nbsp; Usuario no actualizado.'
                 }) 
             

      }

    }).fail(function ajaxError(e){
      
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;  
}


function eliminarusuario(idusuario){
  Swal.fire({
    title: 'Estás seguro que desea eliminar este usuario?',
    text: "<-- Selecciona una opción -->",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar todos los datos'
 }).then((result) => {
   if (result.value) {

       var data_form = {
         idusuario : idusuario     
      }

      var url_php = '/configurar/usuarios/eliminarusuario';
      $.ajax({
         type:'POST',
         url: url_php,
         data: data_form,
         dataType: 'json',
         async: true,
         beforeSend: function() {
          //('#reloadIcloud').html('<img src="../public/assets/img/loading.gif" /><a>Procesando<a>');
         },
      }).done(function ajaxDone(resp){

        console.log(resp)

        if(resp.status == true){

           Swal.fire(
            'Eliminado!',
            'Usuario eliminado con exito.',
            'success'
           )

           
          allusuarios("");

        }
          
           
        
      })


     
  }
})
}
