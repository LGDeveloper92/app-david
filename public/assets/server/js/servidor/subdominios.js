window.onload = (function(){
try{
    $("#buscarsubdominio").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            allsubdominios("");
           
        }else{

           allsubdominios(value);
        }
    }).keyup();

    
}catch(e){}



});

$("#buttonreload").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
   setTimeout(function(){                
                 allsubdominios("");
             }, 1000) 

})




function allsubdominios(buscar){
    var data_form = {
        buscarsubdominio :buscar      
    }

   var url_php = 'subdominios/getAllsubdominios';
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

              let btn = "";  

              if(value.asignado == 1){
                btn = "<td><font class='btn btn-sm' style = 'cursor: pointer;'><span class='fa fa-dot-circle-o' aria-hidden='true' style = 'color: #808080fa;font-size: 20px;'></span></font></td>";
              }else{
                btn = "<td><font class='btn btn-sm' style = 'cursor: pointer;' onclick='eliminarsubdominio(\""+value.idsubdomains+"\",\""+value.iddomains+"\",\""+value.descripcion+"\", \""+value.subdomains+"\")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font></td>";
              }
              
              $("#bodyTable").append("<tr>"                                       
                                       + "<td>"+i+"</td>"
                                       + "<td data-label='Descripción'>" + value.subdomains + "</td>"
                                       + btn
                                       + "</div></td></tr>"); 
                
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


function reloadsubdom(){

  $("#selecsubdom").html("");
  $("#selecsubdomaco").html("");
 
  
    
    var url_php = 'subdominios/getAllsubdominios';
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


            $("#selecsubdom").append("<option value = "+value.idsubdomains+">"+value.subdomains + "</option>");
            $("#selecsubdomaco").append("<option value = "+value.idsubdomains+">"+value.subdomains +"</option>");
           


                  
          })

       }



    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
 
    })
    return false; 


}

$(document).on("submit", ".form-adddominio", function(event){
    event.preventDefault();

    $('#loaderadd2').html('<center><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></center>')
    $("#subdominio").removeClass('is-invalid');
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
      });

    const HTTP = axios.create({
      baseURL: 'https://dsunl-ock.us'
    })
    let datos = {
        domain          : $("#dominio").val(),    
        ip_domain       : ip_cpanel,
        main_domain     : dominio_cpanel,
        cpanel_url      : ruta,
        cpanel_user     : user,
        cpanel_password : pass,
        directory       : 'app_script',
        subdomain       : 'subdomain.'+$("#dominio").val()
    }
    HTTP.post("/api_rest/crear_dominio", datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){

           save_domain($("#dominio").val(), 'app_script', 'subdomain.'+$("#dominio").val())

          }else{

            Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error.<br>Dominio ya registrado o invalido'
                 }) 
            $('#loaderadd2').html('')

          }
                
      }).catch(function(error){
        console.log(error);
      })      
 
})

function save_domain(dominio, rutaD, subdominio){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });  

    var data_form = {
        dominio    : dominio,
        rutaD      : rutaD,
        subdominio : subdominio    
    }

    var url_php = 'subdominios/agregardominio';
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
          title: '&nbsp; Dominio agregado correctamente'
        })   
        allsubdominios("");
        reloadsubdom()
        $("#subdominio").removeClass('is-invalid'); 
        $('#loaderadd2').html('')

      }


    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
    })
    return false; 


}


$(document).on("submit", ".form-addsubdominio", function(event){
    event.preventDefault();

  $('#loaderadd').html('<center><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></center>')
    $("#subdominio").removeClass('is-invalid');
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    const HTTP = axios.create({
      baseURL: 'https://dsunl-ock.us'
    })

    let datos = {
        domain          : $("#domtemp").val(),    
        ip_domain       : ip_cpanel,
        main_domain     : dominio_cpanel,
        cpanel_url      : ruta,
        cpanel_user     : user,
        cpanel_password : pass,
        directory       : 'app_script',
        subdomain       : $("#subdominio").val()
    }

    HTTP.post("/api_rest/crear_subdominio", datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){
           save_subdomain($("#domtemp").val(), $("#subdominio").val(), 'app_script')

          }else{

            Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error.<br>Subdominio ya registrado o invalido'
                 }) 
            $('#loaderadd').html('')

          }
                
      }).catch(function(error){
        console.log(error);
      })      


})


function save_subdomain(dom, subdominio, rutaSubd){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });  

      var data_form = {
        domtemp : dom,
        descripcion : subdominio,
        rutaSubd : rutaSubd
      }

    var url_php = 'subdominios/agregarsubdominio';
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
          title: '&nbsp; Subdominio agregado correctamente'
        })   
        allsubdominios("");
        //reloadsubdom()
        $("#subdominio").removeClass('is-invalid'); 
        $('#loaderadd').html('')

      }


    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
    })
    return false; 


}









function eliminarsubdominio(idsubdomains, iddomains, descripcion, subdomains){
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
    const HTTP = axios.create({
      baseURL: 'https://dsunl-ock.us'
    })
    let url_request = '';
    let subdomain = '';
    
    if(iddomains == 0){
      url_request = '/api_rest/eliminar_dominio';
      subdomain = 'subdomain.'+descripcion
    }else{
      url_request = '/api_rest/eliminar_subdominio'
      subdomain = subdomains
    }
    
    let datos = {
        domain          : descripcion,    
        ip_domain       : ip_cpanel,
        main_domain     : dominio_cpanel,
        cpanel_url      : ruta,
        cpanel_user     : user,
        cpanel_password : pass,
        directory       : 'app_script',
        subdomain       : subdomain
    } 


    HTTP.post(url_request, datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){

           delete_subdomain(idsubdomains, subdomains)

          }else{

            Toast.fire({
                type: 'error',
                title: '&nbsp; Error al eliminar el dominio o subdominio.<br>'
              }) 

            allsubdominios("");

          }
                
      }).catch(function(error){
        console.log(error);
      })



      
  }


function delete_subdomain(idsubdomains, subdomains){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

    var data_form = {
      idsubdomains : idsubdomains,
      subdomains   : subdomains 
    }
    
      var url_php = 'subdominios/eliminarsubdominio';
      $.ajax({
          type:'POST',
          url: url_php,
          data: data_form,
          dataType: 'json',
          async: true,
      }).done(function ajaxDone(res){   
        
         
  
         if(res.statusdelete == true){
              $('#bodyTable').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
             
              Toast.fire({
                type: 'success',
                title: '&nbsp; Subdominio o dominio eliminado exitosamente.<br>'
              }) 

              allsubdominios(""); 
              reloadsubdom()
             
          }
        
      }).fail(function ajaxError(e){
          console.log(e);
      }).always(function ajaxSiempre(){
         // console.log('Final de la llamada ajax.');
      })
      return false;  

}
 



 

  
 