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
               <h1>SMS API</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">SMS</a></li>
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
                     <form class="form-horizontal form-bordered form-smsapi">
                        <div class="form-group">
                           <label>Descripción:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Bulk SMS" id = "descripcion_api" name="descripcion_api" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Descripción para el cliente:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Long Code" id = "descripcion_cliente" name="descripcion_cliente" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>URL de solicitud:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-link"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="https://apisms.com/v1/sendsms.php" id = "solicitud_url" name="solicitud_url" value="" required>
                           </div>
                        </div>

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
                           <label class="col-md-3 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary" >Guardar</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" data-toggle="modal" data-target="#modal-sender_smsapi">Agregar Remitentes</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" onclick="view_listasender_smsapi()">Ver remitentes</button>
                           </label>
                        </div>
                     </form>
                     <div class="col-md-12" id="divtablecol9">
                        <div class="card card-primary card-outline">
                           <div class="card-header">
                              <!--<h3 class="card-title">Lista de obtenidos</h3>-->
                              <div class="card-tools">
                                 <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" id = "buscarsmsapi" placeholder="Buscar una API">
                                    <div class="input-group-append">
                                       <div class="btn btn-primary" style="background-color: #28a745!important;">
                                          <i class="fas fa-search"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="mailbox-controls">
                              <!-- Check all button -->
                              <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                              </button>
                              <div class="btn-group">
                                 <button type="button" class="btn btn-default btn-sm btndelete" ><i class="far fa-trash-alt"></i></button>
                                 <!--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>-->
                              </div>
                              <!-- /.btn-group -->
                              <button type="button" class="btn btn-default btn-sm" id="buttonreload"><i class="fas fa-sync-alt"></i></button>
                              <div class="float-right">
                                 1-50/200
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                 </div>
                              </div>
                           </div>
                           <div class="card-body table-responsive p-0 tblsmsapi" style="max-height: 600px;">
                              <table class="table table-sm table-hover">
                                 <thead>
                                    <th></th>
                                    <th>Descripción</th>
                                    <th>Descripción Cliente</th>
                                    <th>Solitud URL</th>
                                    <th>Api Key</th>
                                    <th>Token</th>
                                    <th>Acción</th>
                                 </thead>
                                 <tbody id="bodyTable">
                                    <div id="reloadsmsapi"></div>
                                 </tbody>
                              </table>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <div class="modal md-effect-1" id="modal-editar_smsapi">
                        <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                           <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Modifique su API SMS</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body modal-body-editar_smsapi" >
                                 <div id="loader-modal-body-editar_smsapi" >
                                    <div class="loader-block">
                                       <svg id="loader2" viewBox="0 0 100 100">
                                          <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                                       </svg>
                                    </div>
                                 </div>

                                 <form class="form-horizontal form-bordered form-smsapi_edit" style="display: none;">
                                    <div class="form-group">
                                       <label>Descripción:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-info"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Bulk SMS" id = "descripcion_api_edit" name="descripcion_api_edit" value="" re readonly required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Descripción para el cliente:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Long Code" id = "descripcion_cliente_edit" name="descripcion_cliente_edit" value="" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>URL de solicitud:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-link"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="https://apisms.com/v1/sendsms.php" id = "solicitud_url_edit" name="solicitud_url_edit" value="" required>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <label>Api Key</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-code"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_apikey_edit" name="solicitud_apikey_edit" value="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Token</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-code"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_token_edit" name="solicitud_token_edit" value="">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Costo por mensaje</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-usd"></i></span>
                                          </div>
                                          <input type="number" step="any" class="form-control" placeholder="0.25" id="costo" min="0" name="costo" value="" required>
                                       </div>
                                    </div> 

                                    <div class="form-group">
                                       <label class="col-md-3 col-form-label">
                                       <button type="submit" class="btn btn-block btn-outline-primary" >Actualizar</button>
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
                     <div class="modal md-effect-1" id="modal-sender_smsapi">
                        <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                           <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Agregue sus remitentes</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body modal-body-sender_smsapi">
                                 <form class="form-horizontal form-bordered form-sender_smsapi">

                                    <div class="form-group">
                                      <label>Seleccione una API :</label>
                                      <select class="form-control" name="apisms_remitentes" id="apisms_remitentes">

                                       <?php foreach ($get_apissms as $apisms_get) {
                                              echo '<option value ="'.$apisms_get->id_apisms.'">'.$apisms_get->descripcion_api.'</option>';
                                       } ?>
                                           
                                      </select>                                         
                                    </div>
                                    <div class="form-group">
                                       <label>Descripción para el cliente:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-info"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Sender ID AppIe" id = "descripcion_cliente_remitentes" name="descripcion_cliente_remitentes" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Descripción:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-info"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="AppIe" id = "descripcion" name="descripcion" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Valor:</label>
                                       <div class="input-group">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="AppIe" id = "valor" name="valor" value="" required>
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
                     <div class="modal md-effect-1" id="modal-listasender_smsapi">
                        <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                           <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                 <h4 class="modal-title">Lista de remitentes</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body modal-body-sender_smsapi" style="text-align: center;">
                                 <div id="loader-modal-body-sender_smsapi" >
                                    <div class="loader-block">
                                       <svg id="loader2" viewBox="0 0 100 100">
                                          <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                                       </svg>
                                    </div>
                                 </div>
                                 <div class="card" style="display: none;" id="list-sender_smsapi">
                                    <!--<img src="img/10.png" class="card-img-top" style="max-height: 130px;">-->
                                    <!--<div class="card-body">
                                       <h5 class="card-title"><strong>Plan Premium</strong></h5>
                                       <p class="card-text pt-1">Desarrollo de paginas web.</p>
                                       </div>-->
                                    <ul class="list-group list-group-flush" id="ul-list-sender_smsapi">
                                    </ul>
                                 </div>
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
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/smstemplates.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
   
      setTimeout(function(){
        $(".theme-loader").fadeOut("slow");           
      }, 500)
   
     $("#title").html($("#title").html() + " .::. SMS API")
   
    $(".li-smsapi").addClass('active')
    $(".li-config").addClass('active')
    $(".nav-treeview-config").css('display','block')
   });
   
   window.onload = (function(){
       try{
           $("#buscarsmsapi").on('keyup', function(){
             
               $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
               var value = $(this).val();
               if(value == ""){
                   allsmsapis("");
           
               }else{
   
                  allsmsapis(value);
               }
           }).keyup();
       }catch(e){}
   
    });
   
   
   
   function allsmsapis(buscar){
      var data_form = {
        buscarequipo :buscar      
      } 
   
   
      $.ajax({
        type:'POST',
        url: 'smsapi/all_smsapis',
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         //('#reloadIcloud').html('<img src="../assets/img/loading.gif" /><a>Procesando<a>');
        },
      }).done(function ajaxDone(resp){
        $('#reloadsmsapi').html('');
        $("#bodyTable").html('');
        if(resp != null && $.isArray(resp)){
         var i = 1;
   
         if(resp == ""){
   
           $("#bodyTable").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes APIS registradas</div></td>'); 
   
         }else{
   
            $.each(resp, function(index, value){
   
                btns = "<td data-label='Acción' style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"
                          +"<font class='btn btn-info btn-sm waves-effect md-trigger' onclick='editar_smsapi("+value.id_apisms+")' data-modal = 'modalview' style = 'cursor: pointer;'><span class='fa fa-edit' aria-hidden='true' style = 'color: white;' ></span></font>"
                          + "</div></td>";

                 let usa_prefijo_sms = '';
                 if(value.usa_prefijo == 1){
                   usa_prefijo_sms = 'Es requerido';
                 }else{
                   usa_prefijo_sms = 'No se requiere';
                 }         
   
               $("#bodyTable").append("<tr>"
                                    + "<td style = 'padding: 0.7em!important'>"
                                       + "<div class='btn-group' style = 'inline-size: max-content;'>"
                                       + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='deletesmsapi("+value.id_apisms+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"                                        
                                       + "</div>"
                                       + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.descripcion_api + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.descripcion_cliente + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.solicitud_url + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.solicitud_apikey+ "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.solicitud_token + "</td>" 
                                       +  btns
                                       + "</tr>");  
   
               i++;
            })
   
   
   
         }
   
   
        }
         
   
      }).fail(function ajaxError(e){
        console.log(e);
      }).always(function ajaxSiempre(){
   
      })
    return false;  
   }
   
   function deletesmsapi(id_apisms){
      allsmsapis("");
      const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      }); 
      
      var data_form = {
         id_apisms : id_apisms
      }  
   
      $.ajax({
         type: 'POST',
         url: 'smsapi/eliminar_smsapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusDelete == true){
   
            Toast.fire({
                  type: 'success',
                  title: 'La API se elimino correctamente.'
            })
   
          }else{
   
            Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema para eliminar la API.'
            })
   
          }
   
          allsmsapis("");
   
   
      })
   }
   
   
   function editar_smsapi(id_apisms){
       
      $("#modal-editar_smsapi").modal('show')
      

      var data_form = {
         id_apisms : id_apisms
      }
   
      $.ajax({
         type: 'POST',
         url: 'smsapi/get_smsapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(resp) {

         $("#loader-modal-body-editar_smsapi").hide();
         $(".form-smsapi_edit").show();

         $("#descripcion_api_edit").val(resp['descripcion_api'])
         $("#descripcion_cliente_edit").val(resp['descripcion_cliente'])
         $("#solicitud_url_edit").val(resp['solicitud_url'])
         $("#solicitud_token_edit").val(resp['solicitud_token'])
         $("#solicitud_apikey_edit").val(resp['solicitud_apikey'])
         $("#costo").val(parseFloat(resp['costo']).toFixed(2))



         

      })   


   
   
   
   }
   
   $(document).on("submit", ".form-smsapi_edit", function (event) {
   
     event.preventDefault();
     $(".form-smsapi_edit").hide()
     $("#loader-modal-body-editar_smsapi").show()
    
   
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      });
   
      var data_form = {
         descripcion_api       : $("#descripcion_api_edit").val(),
         descripcion_cliente   : $("#descripcion_cliente_edit").val(),
         solicitud_url         : $("#solicitud_url_edit").val(),
         solicitud_token       : $("#solicitud_token_edit").val(),
         solicitud_apikey      : $("#solicitud_apikey_edit").val(),
         costo                 : $("#costo").val()
      }
   
      $.ajax({
         type: 'POST',
         url: 'smsapi/editar_smsapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {

          $(".form-smsapi_edit").show()
          $("#loader-modal-body-editar_smsapi").hide()
   
          if(res.statusAdd !== undefined){
            if(res.statusAdd == true){
   
               Toast.fire({
                  type: 'success',
                  title: 'La API se actualizo correctamente.'
               })
   
            }else{
               
               
               Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema al tratar de actualizar.'
               })
            }
            allsmsapis("");
          }  
   
      })
   
   })  
   


   $(document).on("submit", ".form-smsapi", function (event) {
   
     event.preventDefault();
   
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      });
   
      var data_form = {
         descripcion_api       : $("#descripcion_api").val(),
         descripcion_cliente   : $("#descripcion_cliente").val(),
         solicitud_url         : $("#solicitud_url").val(),
         solicitud_token       : $("#solicitud_token").val(),
         solicitud_apikey      : $("#solicitud_apikey").val()
      }
   
      $.ajax({
         type: 'POST',
         url: 'smsapi/agregar_smsapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusAdd !== undefined){
            if(res.statusAdd == true){
   
               Toast.fire({
                  type: 'success',
                  title: 'La API se registro correctamente.'
               })
   
            }else{
               let msg = '';
               if(res['msg'] == 'API_EXISTE'){
                msg = 'La API que intentas regidtrar, ya existe.'
               }
               Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema.<br>'+msg
               })
            }
            allsmsapis("");
          }  
   
      })
   
   })  
   
   
   
   $(document).on("submit", ".form-sender_smsapi", function (event) {
   
     event.preventDefault();
   
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      });
   
      var data_form = {
         descripcion         : $("#descripcion").val(),
         valor               : $("#valor").val(),
         descripcion_cliente : $("#descripcion_cliente_remitentes").val(),
         id_apisms           : $("#apisms_remitentes").val()
      }
   
      $.ajax({
         type: 'POST',
         url: 'smsapi/agregar_senderid',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusAdd !== undefined){
            if(res.statusAdd == true){
   
               Toast.fire({
                  type: 'success',
                  title: 'El remitente se registro correctamente.'
               })
   
            }else{
              
               Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema al tratar de registrar el remitente.'
               })
            }
            view_listasender_smsapi();
          }  
   
      })
   
   })   
   
   
   function view_listasender_smsapi(){
    
   
   
    $("#modal-listasender_smsapi").modal('show')
    $.ajax({
        type: 'POST',
        url: 'smsapi/lista_senderid',
        data: '',
        dataType: 'json',
        async: true,
    }).done(function ajaxDone(resp) {
       $("#ul-list-sender_smsapi").html("")
       $("#loader-modal-body-sender_smsapi").hide()
       $("#list-sender_smsapi").show()
       if(resp != null && $.isArray(resp)){
        let i = 0;
   
        if(resp == ""){
   
           $("#ul-list-sender_smsapi").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes remitentes registrados</div></td>'); 
   
         }else{
   
          $.each(resp, function(index, value){
   
           $("#ul-list-sender_smsapi").append('<li class="list-group-item">'
                                             + '<div class="btn-group" style = "inline-size: max-content; float: left;"><font class="btn btn-sm" style = "cursor: pointer;" onclick="deletesender_smsapi('+value.idsender+')"><span class="fa fa-times" aria-hidden="true" style = "color: #dc3545;font-size: 20px;"></span></font></div>'
                                              + '<span>' +value.descripcion_cliente  + " - " + value.descripcion + " - " + value.valor +'</span>' 
                                              +'</li>'
                                              )
   
            i++;
          })
   
   
         }
   
   
       }
   
    })
    
   
   
   }  
   
   
   function deletesender_smsapi(idsender){

   $("#list-sender_smsapi").hide()
   $("#loader-modal-body-sender_smsapi").show() 
   
      const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      }); 
      
      var data_form = {
         idsender : idsender
      }  
   
      $.ajax({
         type: 'POST',
         url: 'smsapi/eliminar_sender_smsapi',
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
          if(res.statusDelete == true){
   
            Toast.fire({
                  type: 'success',
                  title: 'El remitente se elimino correctamente.'
            })
   
          }else{
   
            Toast.fire({
                  type: 'error',
                  title: 'Hubo un problema al tratar de eliminar.'
            })
   
          }
   
        view_listasender_smsapi();
   
   
      })  
   
   
   
   }  
   
   
   
   
   
   
   
   
</script>
</body>
</html>
