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
               <h1>CHECK API</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">CHECK</a></li>
                  <li class="breadcrumb-item active">API</li>
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
                     <h3 class="card-title">Configuración</h3>
                  </div>
                  <div class="card-body" style="padding: 0.75rem!important;">
                      <form class="form-horizontal form-bordered form-apicheck">
                         <div class="form-group">
                           <label>Descripción:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "descripcion_api" name="descripcion_api" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>ID del servicio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "id_servicio" name="id_servicio" value="" required>
                           </div>
                        </div>                        
                        <div class="form-group">
                           <label>Descripción para el cliente:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "descripcion_cliente" name="descripcion_cliente" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>URL de solicitud:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-link"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "solicitud_url" name="solicitud_url" value="" required>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group">
                           <label>Parametros (GET/POST):</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-link"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "solicitud_parametros" name="solicitud_parametros" value="" required>

                           </div>
                           
                           <p class="privacy-policy-agreement">
                              POST : array("key" => "#key", "imei" => "#imei", "service" => "#service")
                              <br>
                              GET  : key=#key&imei=#imei&service=#service
                           </p> 
                        </div>
                        <hr> 
                        <div class="form-group">
                           <label>Tipo de solicitud :</label>
                           <select class="form-control" name="solicitud_tipo" id="solicitud_tipo">
                              <option value="get">GET</option>
                              <option value="post">POST</option>                                       
                           </select>                                         
                        </div> 

                        <div class="form-group">
                           <label>Api Key</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-code"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_apikey" name="solicitud_apikey" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Token</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-code"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_token" name="solicitud_token" value="">
                           </div>
                        </div> 

                        <div class="form-group">
                           <label>Costo por consulta</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-usd"></i></span>
                              </div>
                              <input type="number" step="any" class="form-control" placeholder="0.25" id="costo" min="0" name="costo" value="" required>
                           </div>
                        </div> 

                        <div class="form-group">
                           <label>Descripción del servicio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-link"></i></span>
                              </div>
                              <textarea class="form-control m-b-10" id="descripcion_servicio" name="descripcion_servicio" rows="2" placeholder="" value=""></textarea>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>

                        
                        <div class="form-group">
                           <label class="col-md-3 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary" >Guardar</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" data-toggle="modal" data-target="#modal-lista-servicios">Lista de servicios</button>
                           </label>
                           <!--<label class="col-md-3 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" onclick="view_listasender_smsapi()">Ver remitentes</button>
                           </label>-->
                        </div>

                      </form>  

                     <div class="modal md-effect-1" id="modal-lista-servicios">
                        <div class="modal-dialog modal-lg" role="document" tabindex="-1" role="dialog">
                           <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Lista de servicios</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body modal-body-lista-servicios" >


                               <div class="table-responsive">
                                 <table id="tbl_servicios_api" class="display table table-striped table-hover" style = 'width:100%!important'>
                                    <thead>
                                       <tr>
                                          <th>ID servicio</th>
                                          <th>Descripción API</th>
                                          <th>Descripción Ciente</th>
                                          <th>URL</th>
                                          <th>Parametros</th>
                                          <th>Tipo</th>
                                          <th>Token</th>
                                          <th>API key</th>
                                          <th>Costo</th>
                                          <th>Descripción</th>
                                          <th style="width: 10%">Acción</th>
                                       </tr>
                                    </thead>                                    
                                 </table>
                               </div>
                                
                              </div>
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="modal md-effect-1" id="modal-ver-servicio">
                        <div class="modal-dialog modal-lg" role="document" tabindex="-1" role="dialog">
                           <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Modificar servicio</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body modal-body-ver-servicio" >
                      
                      <form class="form-horizontal form-bordered form-apicheck-edit">
                       
                       <div class="form-group">
                           <label>ID del servicio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "id_servicio-edit" name="id_servicio-edit" value="" required>
                           </div>
                        </div>                           

                         <div class="form-group">
                           <label>Descripción:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "descripcion_api-edit" name="descripcion_api-edit" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Descripción para el cliente:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "descripcion_cliente-edit" name="descripcion_cliente-edit" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>URL de solicitud:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-link"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "solicitud_url-edit" name="solicitud_url-edit" value="" required>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group">
                           <label>Parametros (GET/POST):</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-link"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="" id = "solicitud_parametros-edit" name="solicitud_parametros-edit" value="" required>

                           </div>
                           
                           <p class="privacy-policy-agreement">
                              POST : array("key" => "#key", "imei" => "#imei", "service" => "#service")
                              <br>
                              GET  : key=#key&imei=#imei&service=#service
                           </p> 
                        </div>
                        <hr> 
                        <div class="form-group">
                           <label>Tipo de solicitud :</label>
                           <select class="form-control" name="solicitud_tipo-edit" id="solicitud_tipo-edit">
                              <option value="get">GET</option>
                              <option value="post">POST</option>                                       
                           </select>                                         
                        </div> 

                        <div class="form-group">
                           <label>Api Key</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-code"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_apikey-edit" name="solicitud_apikey-edit" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Token</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-code"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_token-edit" name="solicitud_token-edit" value="">
                           </div>
                        </div> 

                        <div class="form-group">
                           <label>Costo por consulta</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-usd"></i></span>
                              </div>
                              <input type="number" step="any" class="form-control" placeholder="0.25" id="costo-edit" min="0" name="costo-edit" value="" required>
                           </div>
                        </div> 

                        <div class="form-group">
                           <label>Descripción del servicio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-link"></i></span>
                              </div>
                              <textarea class="form-control m-b-10" id="descripcion_servicio-edit" name="descripcion_servicio-edit" rows="2" placeholder="" value=""></textarea>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>

                        
                        <div class="form-group">
                           <label class="col-md-3 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary" >Guardar</button>
                           </label>                          
                        </div>

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
   </section>
   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->
   <!-- Main Footer -->
   <footer class="main-footer">
      <strong>Copyright &copy; <?php echo date('Y');  ?> <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong>
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
<!-- Bootstrap -->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>/public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>/public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
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
<!-- PAGE SCRIPTS -->
<!--<script src="<?php //echo base_url();?>/public/assets/dist/js/pages/dashboard2.js"></script>-->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src=".<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/smstemplates.js"></script>
<script type="text/javascript">

  let id_checkapi;
   $(document).ready(function() {

      all_servicios_api()
   
      setTimeout(function(){
        $(".theme-loader").fadeOut("slow");           
      }, 500)
   
     $("#title").html($("#title").html() + " .::. CHECK API")
   
    $(".li-checkapi").addClass('active')
    $(".li-config").addClass('active')
    $(".nav-treeview-config").css('display','block')
   });

   $(document).on("submit", ".form-apicheck", function (event) {
   
     event.preventDefault();
   
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      });

      var data_form = {
         id_servicio          : $("#id_servicio").val(),
         descripcion_api      : $("#descripcion_api").val(),
         descripcion_cliente  : $("#descripcion_cliente").val(),
         solicitud_url        : $("#solicitud_url").val(),
         solicitud_parametros : $("#solicitud_parametros").val(),
         solicitud_tipo       : $("#solicitud_tipo").val(),
         solicitud_apikey     : $("#solicitud_apikey").val(),
         solicitud_token      : $("#solicitud_token").val(),
         costo                : $("#costo").val(),
         descripcion_servicio : $("#descripcion_servicio").val()
      }
   
      $.ajax({
         type: 'POST',
         url: 'checkapi/agregar_checkapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusAdd !== undefined){
            if(res.statusAdd == true){
   
               Toast.fire({
                  type: 'success',
                  title: 'Servicio agregado correctamente.'
               })
   
            }else{
               let msg = '';
               if(res['msg'] == 'API_EXISTE'){
                msg = 'El servicio que intentas registrar ya existe.'
               }
               Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema.<br>'+msg
               })
            }
            update_tabla_servicios_check()
          }  
   
      })
   
   })  


    function all_servicios_api(){
      $("#tbl_servicios_api").DataTable({
       processing: true,
             "responsive": true,
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/English.json"
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
              },
             ajax: {
                 type: "POST",
                 url: 'checkapi/all_servicios_api',
                 data: '',
                // dataFilter: function(reps) {
                  //  console.log(reps);
                // return reps;
                // }, 
             },
             order: [[10, 'desc']], 
             columns: [
                {"data" : "id_servicio"}, 
                {"data" : "descripcion_api"},
                {"data" : "descripcion_cliente"},
                {"data" : "solicitud_url"},
                {"data" : "solicitud_parametros"},
                {"data" : "solicitud_tipo"},
                {"data" : "solicitud_token"},
                {"data" : "solicitud_apikey"},
                {"data" : "costo"},
                {"data" : "descripcion_servicio"},
                {"data" : "id", render:function(data, type, row){

                   return '<div class="btn-group" style="inline-size: max-content;">' 
                                             + '<font class="btn btn-info btn-sm waves-effect md-trigger" onclick="view_servicio_api('+data+')" data-modal="modalview" style="cursor: pointer;"><span class="fa fa-edit" aria-hidden="true" style="color: white;"></span></font>'
                                             + '<font class="btn btn-danger btn-sm" style="cursor: pointer;" onclick="eliminar_servicio_api('+data+')"><span class="fas fa-trash-alt" aria-hidden="true"></span></font>'
                                            +'</div>'
                }}
             ]
     })
   }     

   function view_servicio_api(id){
     
     $("#modal-ver-servicio").modal('show');

      var data_form = {
         id : id
      }
   
      $.ajax({
         type: 'POST',
         url: 'checkapi/get_servicio_api',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
        
        $("#id_servicio-edit").val(res['id_servicio'])
        $("#descripcion_api-edit").val(res['descripcion_api'])
        $("#descripcion_cliente-edit").val(res['descripcion_cliente'])
        $("#solicitud_url-edit").val(res['solicitud_url'])
        $("#solicitud_parametros-edit").val(res['solicitud_parametros'])
        $("#solicitud_tipo-edit").val(res['solicitud_tipo'])
        $("#solicitud_apikey-edit").val(res['solicitud_apikey'])
        $("#solicitud_token-edit").val(res['solicitud_token'])
        $("#costo-edit").val(res['costo'])
        $("#descripcion_servicio-edit").val(res['descripcion_servicio'])
        id_checkapi = res['id'];

        
      })   


   }


  $(document).on("submit", ".form-apicheck-edit", function (event) {   
     event.preventDefault();

     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      });

      var data_form = {
         id                   : id_checkapi,
         id_servicio          : $("#id_servicio-edit").val(),
         descripcion_api      : $("#descripcion_api-edit").val(),
         descripcion_cliente  : $("#descripcion_cliente-edit").val(),
         solicitud_url        : $("#solicitud_url-edit").val(),
         solicitud_parametros : $("#solicitud_parametros-edit").val(),
         solicitud_tipo       : $("#solicitud_tipo-edit").val(),
         solicitud_apikey     : $("#solicitud_apikey-edit").val(),
         solicitud_token      : $("#solicitud_token-edit").val(),
         costo                : $("#costo-edit").val(),
         descripcion_servicio : $("#descripcion_servicio-edit").val()
      }
   
      $.ajax({
         type: 'POST',
         url: 'checkapi/editar_checkapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusAdd !== undefined){
            if(res.statusAdd == true){
   
               Toast.fire({
                  type: 'success',
                  title: 'Servicio modificado correctamente.'
               })
   
            }else{

               Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema.<br>'+msg
               })
            }
            update_tabla_servicios_check()
          }  
   
      })     


   
  })

  function update_tabla_servicios_check(){
    var table = $('#tbl_servicios_api').DataTable();
      table.ajax.reload();
    } 

function eliminar_servicio_api(id){


   update_tabla_servicios_check()

   //$("#list-sender_smsapi").hide()
   //$("#loader-modal-body-sender_smsapi").show() 
   
      const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      }); 
      
      var data_form = {
         id : id
      }  
   
      $.ajax({
         type: 'POST',
         url: 'checkapi/eliminar_checkapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusDelete == true){
   
            Toast.fire({
                  type: 'success',
                  title: 'El servicio se elimino correctamente.'
            })
   
          }else{
   
            Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema al tratar de eliminar.'
            })
   
          }
   
        update_tabla_servicios_check()
   
   
      })  
   
   
   
   }  
      

</script>
</body>
</html>
