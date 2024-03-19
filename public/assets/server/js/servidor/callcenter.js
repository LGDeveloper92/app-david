/**********Automremove*************/
$(document).on("submit", ".form-callcenter", function(event){

    event.preventDefault();
    
     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

     var data_form = {
        appid : $("#appid").val(),
        keypath : $("#keypath").val()      
    }

    

    var url_php = 'servidor/ingresarcallcenter';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){

    if(res.servConfig == false){
       
     }else{
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){

             Toast.fire({
              type: 'success',
              title: '&nbsp; Datos ingresados correctamente'
            })   

           
             $("#appid").removeClass('is-invalid'); 
             $("#keypath").removeClass('is-invalid'); 
                 
            
                 


         }else if(res.statusAdd == false){

            
              Toast.fire({
                   type: 'error',
                   title: '&nbsp; Error al ingresar los datos.'
                 }) 
             

              if(res.formError == true){
                if($("#appid").val() == ""){
                   $("#appid").addClass('is-invalid'); 
                }else{
                   $("#appid").removeClass('is-invalid'); 
                } 
                if($("#keypath").val() == ""){
                    $("#keypath").addClass('is-invalid');                   
                }else{
                    $("#keypath").removeClass('is-invalid'); 
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


window.onload = (function(){
try{
    $("#buscaraudiocall").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            allCallcenter("");
           
        }else{

           allCallcenter(value);
        }
    }).keyup();
}catch(e){}});




function allCallcenter(buscar){
    
    var data_form = {
        buscaraudiocall : buscar      
    }
    
    var url_php = 'audioscall/getAllaudiocall';
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
                $("#bodyTable").html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>'); 
                //$("#bodyTable").html('<img src="../assets/img/loading.gif"" /><a>Procesando<a>'); 
                
               // $('#reloadIcloud').html('<img src="../assets/img/loading.gif"" /><a>Procesando<a>')
               
                
                
                
            }else{
            $.each(res, function(index, value){

               $("#bodyTable").append("<tr><td>" + i 
                                       + "</td><td>" + value.titulo 
                                       + "</td><td>" 
                                       + value.rutaaudio + "</td>"
                                       + "<td> <div class='btn-group'>"
                                       + "<font class='btn btn-warning btn-sm btneditcall' style = 'cursor: pointer;' data-modal = 'modalupdateaudio' onclick = 'modalupdaudio()'><span class='fas fa-edit' aria-hidden='true' style = 'font-size: 18px;' ></span></font>"
                                       + "<font class='btn btn-danger btn-sm' style = 'cursor: pointer;' onclick='deleteCallCenter("+value.idaudiocallcenter+")'><span class='fas fa-trash-alt' aria-hidden='true' style = 'font-size: 18px;'></span></font>"                   
                                       + "</div>" 
                                       + "<input type='text' name='' id='idaudiocallcenter' value='"+value.idaudiocallcenter+"' style='display:none;'>"                                                                             
                                       + "<input type='text' name='' id='tdtitulo' value='"+value.titulo+"' style='display:none;'>"
                                       + "<input type='text' name='' id='tdrutaaudio' value='"+value.rutaaudio+"' style='display:none;'>"
                                       + "</td></tr>");
               i++;
            });
            } 
        }   


      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;  



}


$(document).on("submit", ".form-audiocall", function(event){

    event.preventDefault();


    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
     var data_form = {
        titulo : $("#titulo").val(),
        rutaaudio : $("#rutaaudio").val()      
    }


    
    var url_php = 'audioscall/setaudiocall';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){

    if(res.servConfig == false){
       Toast.fire({
        type: 'warning',
        title: '&nbsp; Debe configurar el servidor..'
      })
     }else{
      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){
            Toast.fire({
              type: 'success',
              title: '&nbsp; Datos ingresados correctamente'
            })
             $("#titulo").removeClass('is-invalid'); 
             $("#rutaaudio").removeClass('is-invalid');
             $("#buscaraudiocall").val("");
             $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>') 
             

             setTimeout(function(){                
                 allCallcenter("");
             }, 1000)
            

            
             $(".form-audiocall")[0].reset();          


         }else if(res.statusAdd == false){

            Toast.fire({
               type: 'error',
               title: '&nbsp; Error al ingresar los datos.'
             })
             

              if(res.formError == true){
                if($("#titulo").val() == ""){
                   $("#titulo").addClass('is-invalid'); 
                }else{
                   $("#titulo").removeClass('is-invalid'); 
                } 
                if($("#rutaaudio").val() == ""){
                    $("#rutaaudio").addClass('is-invalid');                   
                }else{
                    $("#rutaaudio").removeClass('is-invalid'); 
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


$("#buttonreloadcall").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../assets/server/img/loading.gif" /></div></td>')
   setTimeout(function(){                
     allCallcenter("");
   }, 1000) 

})


function modalupdaudio(){
  
  $("#modalupdateaudio").addClass("md-show");
  $(".md-show").css("visibility","visible");
  $(".md-overlay").css('opacity','1')
  $(".md-overlay").css('visibility','visible')
}



$(document).on("mousedown touchstart", "font.btneditcall", function() {
    
    var tdtitulo = "";
    var tdrutaaudio = "";
    var idaudiocallcenter = "";
   
    $(this).parents("tr").find("td  input#idaudiocallcenter").each(function(){
      idaudiocallcenter+=$(this).val();
    }); 
    $(this).parents("tr").find("td  input#tdtitulo").each(function(){
      tdtitulo+=$(this).val();
    });  
     $(this).parents("tr").find("td  input#tdrutaaudio").each(function(){
      tdrutaaudio+=$(this).val();      
    });  
    $("#idaudiocallcenter").val(idaudiocallcenter);
    $("#tituloM").val(tdtitulo);
    $("#rutaaudioM").val(tdrutaaudio);

})




$(document).on("submit", ".form-editaudio", function(event){

    event.preventDefault();
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


    var data_form = {
        tdtituloM : $("#tituloM").val(),
        tdrutaaudioM : $("#rutaaudioM").val(),
        idaudiocallcenter : $("#idaudiocallcenter").val()  
    }
    
    var url_php = 'audioscall/updateaudiocall';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    }).done(function ajaxDone(res){
        

        if(res.statusupdate2 == true){
            $("#tituloM").removeClass('is-invalid'); 
            $("#descripcionM").removeClass('is-invalid');
            $("#idtempsmsM").val("");
            $("#tituloM").val("");
            $("#descripcionM").val("");
            Toast.fire({
              type: 'success',
              title: '&nbsp; Datos actualizados correctamente.'
            })
            $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
           
            allCallcenter("");
            
             



            
           
        }else if(res.statusupdate2== false){

             Toast.fire({
               type: 'error',
               title: '&nbsp; Error al ingresar los datos.'
             })

             if(res.formError2 == true){
                if($("#tituloM").val() == ""){
                   $("#tituloM").addClass('is-invalid'); 
                }else{
                   $("#tituloM").removeClass('is-invalid'); 
                } 
                if($("#descripcionM").val() == ""){
                    $("#descripcionM").addClass('is-invalid');                   
                }else{
                    $("#descripcionM").removeClass('is-invalid'); 
                }
              }else{
                
              }             

      }

      


      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;  
   

});



function deleteCallCenter(idaudiocallcenter){

     var data_form = {
        idaudiocallcenter : idaudiocallcenter      
    }
    
    var url_php = 'audioscall/deleteaudiocall';
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    }).done(function ajaxDone(res){
        //console.log(res);

        if(res.statusdelete == true){
            $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
           
             setTimeout(function(){                
                 allCallcenter("");
             }, 1000) 
           
        }else if(res.statusdelete == false){
            

             setTimeout(function(){                
                 allCallcenter("");
             }, 1000) 
        }

      


      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;  


    
}
