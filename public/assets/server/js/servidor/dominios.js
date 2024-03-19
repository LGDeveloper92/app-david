window.onload = (function(){
try{
    $("#buscardominio").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            alldominios("");
           
        }else{

           alldominios(value);
        }
    }).keyup();

    
}catch(e){}



});


$("#buttonreload").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
   setTimeout(function(){                
                 alldominios("");
             }, 1000) 

})


function alldominios(buscar){
    var data_form = {
        buscardominio :buscar      
    }

   var url_php = 'dominios/getAlldominios';
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
                //$("#bodyTable").html('<img src="../assets/img/loading.gif"" /><a>Procesando<a>'); 
                
               // $('#reloadIcloud').html('<img src="../assets/img/loading.gif"" /><a>Procesando<a>')
               
                
                
                
            }else{
            $.each(res, function(index, value){

             
            
             
               

               $("#bodyTable").append("<tr>"
                                       + "<td style = 'padding: 0.7em!important'>"+i+"</td>"
                                       + "<td data-label='Descripción' style = 'padding: 0.7em!important'>" + value.domains + "</td>"
                                       + "<td data-label='Descripción' style = 'padding: 0.7em!important'>" + value.dirdomains + "</td>"
                                       +  "<td data-label='Acción' style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"
                                       +  "<font class='btn btn-danger btn-sm' style = 'cursor: pointer;' onclick='eliminardominio(\""+value.iddomains+"\",\""+value.domains+"\")'><span class='fa fa-trash' aria-hidden='true' style = 'color: white;'></span></font>"
                                       +   "</div></td>"); 
                
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


$("#buttonreload").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
   setTimeout(function(){                
                  alldominios("");
             }, 1000) 

})
 

$(document).on("submit", ".form-adddominio", function(event){

    event.preventDefault();

    $('#loaderadd').html('<center><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></center>')
    $("#dominio").removeClass('is-invalid'); 
   
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
        directory       : $("#rutaD").val(),
        subdomain       : 'subdomain.'+$("#dominio").val()
    }
    HTTP.post("/api_rest/crear_dominio", datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){

           save_domain($("#dominio").val(), $("#rutaD").val(), 'subdomain.'+$("#dominio").val())

          }else{

            Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error.<br>Dominio ya registrado o invalido'
                 }) 
            $('#loaderadd').html('')

          }
                
      }).catch(function(error){
        console.log(error);
      })

});



function eliminardominio(iddomains, dominio){
 
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

    let datos = {
        domain          : dominio,    
        ip_domain       : ip_cpanel,
        main_domain     : dominio_cpanel,
        cpanel_url      : ruta,
        cpanel_user     : user,
        cpanel_password : pass,
        directory       : dominio,
        subdomain       : 'subdomain.'+dominio
    } 

     HTTP.post("/api_rest/eliminar_dominio", datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){

           delete_domain(iddomains)

          }else{

            Toast.fire({
                type: 'error',
                title: '&nbsp; Error al eliminar el dominio.<br>'
              }) 

              alldominios("");

          }
                
      }).catch(function(error){
        console.log(error);
      })


}


function delete_domain(iddomains){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  var data_form = {
    iddomains  : iddomains   
  }
    
    var url_php = 'dominios/eliminardominio';
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
          title: '&nbsp; Dominio eliminado exitosamente.<br>'
        }) 

         alldominios("");
           
      }
      
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
    })
    return false;    

}

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

    var url_php = 'dominios/agregardominio';
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
        alldominios("");
        $('#loaderadd').html('')

      }


    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
    })
    return false; 


}

