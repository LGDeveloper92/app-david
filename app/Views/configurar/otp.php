<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>OTP</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">OTP</a></li>
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
                                 <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Bulk SMS" id = "descripcion_api" name="descripcion_api" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Descripción para el cliente:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Long Code" id = "descripcion_cliente" name="descripcion_cliente" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>URL de solicitud:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="https://apisms.com/v1/sendsms.php" id = "solicitud_url" name="solicitud_url" value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Tipo de solicitud:</label>
                           <select class="form-control" name="solicitud_tipo" id="solicitud_tipo">
                              <option value="get">GET</option>
                              <option value="post">POST</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Api Key</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_apikey" name="solicitud_apikey" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Token</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "solicitud_token" name="solicitud_token" value="">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-2 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary" id="">Guardar</button>
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
                                    <th>Tipo</th>
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
                               <div class="modal-body modal-body-editar_smsapi" style="text-align: center;">
                                   <div id="loader-modal-body-editar_smsapi" >
                                     <div class="loader-block">
                                        <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                                     </div>
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
   
     $("#title").html($("#title").html() + " .::. OTP")
   
    $(".li-otp").addClass('active')
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

               $("#bodyTable").append("<tr>"
                                    + "<td style = 'padding: 0.7em!important'>"
                                       + "<div class='btn-group' style = 'inline-size: max-content;'>"
                                       + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='deletesmsapi("+value.id_apisms+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"                                        
                                       + "</div>"
                                       + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.descripcion_api + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.descripcion_cliente + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.solicitud_url + "</td>"
                                       + "<td style = 'padding: 0.7em!important'>" + value.solicitud_tipo + "</td>"
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
                  title: 'Hubo un problema para eliminar la API'+msg
            })

          }

          allsmsapis("");


      })
   }
   

   function editar_smsapi(id_apisms){

      $("#modal-editar_smsapi").modal('show')



   }


   $(document).on("submit", ".form-smsapi", function (event) {
   
     event.preventDefault();
   
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      });
   
      var data_form = {
         descripcion_api     : $("#descripcion_api").val(),
         descripcion_cliente : $("#descripcion_cliente").val(),
         solicitud_url       : $("#solicitud_url").val(),
         solicitud_tipo      : $("#solicitud_tipo").val(),
         solicitud_token     : $("#solicitud_token").val(),
         solicitud_apikey    : $("#solicitud_apikey").val()
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
   
   
   
   
   
   
   
   
   
   
   
   
   
   
</script>
</body>
</html>
