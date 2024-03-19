/************SMS TEMPLATES**********/

window.onload = (function(){
try{
    $("#buscartemplate").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            allSMSTemplates("");
           
        }else{

           allSMSTemplates(value);
        }
    }).keyup();
}catch(e){}});


function allSMSTemplates(buscar){
    
    var data_form = {
        buscartemplate : buscar      
    }
    
    var url_php = 'smsplantillas/getAllSMSTemplates';
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
                $("#bodyTable").html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>'); 
                //$("#bodyTable").html('<img src="../public/assets/img/loading.gif"" /><a>Procesando<a>'); 
                
               // $('#reloadIcloud').html('<img src="../public/assets/img/loading.gif"" /><a>Procesando<a>')
               
                
                
                
            }else{
            $.each(res, function(index, value){

               $("#bodyTable").append("<tr><td>" + i 
                                       + "</td><td>" + value.titulosms 
                                       + "</td><td>" 
                                       + value.descripsms + "</td>"
                                       + "<td> <div class='btn-group'>"
                                       + "<font class='btn btn-warning btn-sm editsms' style = 'cursor: pointer;'  data-toggle='modal' data-target='#modalsmstemplates'><span class='fas fa-edit' aria-hidden='true' style = 'font-size: 18px;' ></span></font>"
                                       + "<font class='btn btn-danger btn-sm' style = 'cursor: pointer;' onclick='deleteSMSTemplate("+value.idtempsms+")'><span class='fas fa-trash-alt' aria-hidden='true' style = 'font-size: 18px;'></span></font>"                   
                                       + "</div>" 
                                       + "<input type='text' name='' id='idtempsms' value='"+value.idtempsms+"' style='display:none;'>"                                                                             
                                       + "<input type='text' name='' id='tdtitulosms' value='"+value.titulosms+"' style='display:none;'>"
                                       + "<input type='text' name='' id='tddescripsms' value='"+value.descripsms+"' style='display:none;'>"
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


$(document).on("submit", ".form-smstemplate", function(event){

    event.preventDefault();


    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
     var data_form = {
        titulo : $("#titulo").val(),
        descripcion : $("#descripcion").val()      
    }

    //var url_php = 'equipo/setEquipo';
    var url_php = 'smsplantillas/setSMSTemplates';
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
             $("#descripcion").removeClass('is-invalid');
             $("#buscartemplate").val("");
             $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>') 
             

             setTimeout(function(){                
                 allSMSTemplates("");
             }, 1000)
            

            
             $(".form-smstemplate")[0].reset();          


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
                if($("#descripcion").val() == ""){
                    $("#descripcion").addClass('is-invalid');                   
                }else{
                    $("#descripcion").removeClass('is-invalid'); 
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

$(document).on("mousedown touchstart", "font.editsms", function() {
    
    var tdtitulosms = "";
    var tddescripsms = "";
    var idtempsms = "";
   
    $(this).parents("tr").find("td  input#idtempsms").each(function(){
      idtempsms+=$(this).val();
    }); 
    $(this).parents("tr").find("td  input#tdtitulosms").each(function(){
      tdtitulosms+=$(this).val();
    });  
     $(this).parents("tr").find("td  input#tddescripsms").each(function(){
      tddescripsms+=$(this).val();      
    });  
    $("#idtempsms").val(idtempsms);
    $("#tituloM").val(tdtitulosms);
    $("#descripcionM").val(tddescripsms);

})

$(document).on("submit", ".form-editsmstemplate", function(event){

    event.preventDefault();
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


    var data_form = {
        tdtitulosms : $("#tituloM").val(),
        tddescripsms : $("#descripcionM").val(),
        idtempsms : $("#idtempsms").val()  
    }

    
    var url_php = 'smsplantillas/updateSMSTemplates';
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
           

            
             setTimeout(function(){                         
                 allSMSTemplates("");
                 $('#modalsmstemplates').modal('hide'); 
             }, 1000) 



            
           
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

function deleteSMSTemplate(idsmstemp){

     var data_form = {
        idsmstemp : idsmstemp      
    }
    
    var url_php = 'smsplantillas/deleteSMSTemplates';
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
                 allSMSTemplates("");
             }, 1000) 
           
        }else if(res.statusdelete == false){
            

             setTimeout(function(){                
                 allSMSTemplates("");
             }, 1000) 
        }

      


      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
       // console.log('Final de la llamada ajax.');
    })
    return false;  


    
}

