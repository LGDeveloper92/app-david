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
               <h1>Chequear dispositivo</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Chequear dispositivo</a></li>
                  <!--<li class="breadcrumb-item active">iCloud</li>-->
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
                     <h3 class="card-title">Check</h3>
                  </div>
                  <div class="card-body">
                     <center>
                        <form method="POST" class = "form-horizontal form-bordered form-check">
                           <p><input type="text" style="padding: 15px 10px 10px; font-family: 'Source Sans Pro',arial,sans-serif; border: 1px solid #cecece; color: black;box-sizing: border-box; width: 50%; max-width: 500px;" id = "imei_nroserial" name="imei_nroserial" autocomplete="off" maxlength="50" placeholder="Escribe aquí IMEI o SN"></p>
                           <select type = "select" name="servic_id" id="servic_id" style="padding: 15px 10px 10px; font-family: 'Source Sans Pro',arial,sans-serif; border: 1px solid #cecece; color: black;box-sizing: border-box; width: 50%; max-width: 500px;">
                           <?php foreach ($servicios_api_check as $api_check) {
                              $costo = 0;
                              if($api_check->costo ==  0){
                                 $costo = 'FREE';
                              }else{
                                $costo = $api_check->costo;
                              }
                              echo '<option value ="'.$api_check->id.'">'.$costo.' - '.$api_check->descripcion_cliente.'</option>';
                              }?>
                           </select>
                           <div class="form-group">
                              <label class="col-md-12 col-form-label">
                                 <div style="display: inline-block;">
                                    <button type="submit" class="btn btn-block btn-outline-primary">Check</button>
                                 </div>
                                 <div style="display: inline-block;">
                                    <span id = "reloadIcloud"></span>                       
                                 </div>
                              </label>
                           </div>
                        </form>
                     </center>
                     <hr>
                     <center>
                     <div class="col-md-12 col-lg-6 text-left alert alert-success fade show alert_descripcion" style="display: none;" >
                             <!--<h4 class="alert-heading">Well done!</h4>
                              <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                              <hr>
                              <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>-->
                      </div>
                     </center> 
                     <hr>
               
                     <div class="col-sm-6">
                        <h2>Historial de consultas</h2>
                     </div>
                     <hr>
                     <div class="table-responsive">
                        <table id="tbl_ipblocker" class="display table table-striped table-hover" style = 'width:100%!important'>
                           <thead>
                              <tr>
                                 <th>IMEI/NRO SERIAL</th>
                                 <th>FECHA</th>
                                 <th>RESULTADO</th>
                                 <th style="width: 10%">ACCIÓN</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  
                  </div>
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
      <div class="modal" id="modalcheck">
         <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Detalles de la consulta</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body modalbodycheck" style="text-align: center;">
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal" id="viewAutoremove">
         <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Detalles del autoremove</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body modal-body-autoremove" style="text-align: center;">
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
               </div>
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
      <strong>Copyright &copy; <?php  echo date('Y'); ?> <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong>
      Todos los derechos reservados
      <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 2.0
      </div>
   </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/axios.min.js"></script>
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
<script src="<?php echo base_url();?>/public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
   let base_url = location.href;
   let urlaccess = "<?=$server['urlaccess']?>";
   let token_access = "<?=$server['token_access']?>";
   let ip = "<?=$ip?>";
   
   
   $(document).ready(function () {

     change_option_check($("#servic_id").val())
     get_all_check()
   
      setTimeout(function () {
         $(".theme-loader").fadeOut("slow");
      }, 500)
   
      $("#title").html($("#title").html() + " .::. Check")
   
      $(".li-check").addClass('active')
   
     // allremoverPanel("");


      $("#servic_id").on('change', function() {

        change_option_check($("#servic_id").val())


      })
   
   })

   function change_option_check(id){


      $(".alert_descripcion").html('')

      var data_form = {
      id: id
      }
   
      var url_php = 'configurar/checkapi/get_servicio_api';
      $.ajax({
         type: 'POST',
         url: url_php,
         data: data_form,
         dataType: 'json',
         async: true
      }).done(function ajaxDone(resp) {

         if(resp['descripcion_servicio'] == ''){
            $(".alert_descripcion").hide()
         }else{
            $(".alert_descripcion").show()
            $(".alert_descripcion").html(resp['descripcion_servicio']) 
         }
            
         
         
         
   
      })

   }


   function get_all_check(){

      $("#tbl_ipblocker").DataTable({
       processing: true,
             "responsive": true,
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/English.json"
                //"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
              },
             ajax: {
                 type: "POST",
                 url: 'check/get_all_check',
                 data: '',
                // dataFilter: function(reps) {
                  //  console.log(reps);
                // return reps;
                // }, 
             },
             order: [[3, 'desc']], 
             columns: [
                {"data" : "imei_nroserial"}, 
                {"data" : "fecha"},
                {"data" : "response"},
                {"data" : "id_check", render:function(data, type, row){

                   return '<div class="btn-group" style="inline-size: max-content;">'                                             
                                             + '<font class="btn btn-danger btn-sm" style="cursor: pointer;" onclick="eliminar_check('+data+')"><span class="fas fa-trash-alt" aria-hidden="true"></span></font>'
                                            +'</div>'
                }}
             ]
     })
   }   

   function update_tabla_all_check(){
    var table = $('#tbl_ipblocker').DataTable();
      table.ajax.reload();
    } 
   
   
   
   
   
   $(document).on("submit", ".form-check", function (event) {
   
      event.preventDefault();
   
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000
      });
      
     if ($("#imei_nroserial").val() != "" &&  $("#servic_id").val() != "") {
   
        $('.modalbodycheck').html('<div class="loader-block"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>')
   
         $("#modalcheck").modal('show');
         
        var data_form = {
         service: $("#servic_id").val(),
         imei: $("#imei_nroserial").val()
        }
   
        var url_php = 'check/apicheck';
        $.ajax({
          type: 'POST',
          url: url_php,
          data: data_form,
          dataType: 'json',
          async: true
        }).done(function ajaxDone(resp) {
            
            $('.modalbodycheck').html("");
            $('.modalbodycheck').html('<center>' + resp['result_html'] + '</center>');
            $("#saldo_total").html(parseFloat(resp['creditos']).toFixed(2));
            update_tabla_all_check()
   
        })
         
         
      }
   
   
   });
   
   

function eliminar_check(id_check){


   update_tabla_all_check()

   //$("#list-sender_smsapi").hide()
   //$("#loader-modal-body-sender_smsapi").show() 
   
      const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
      }); 
      
      var data_form = {
         id_check : id_check
      }  
   
      $.ajax({
         type: 'POST',
         url: 'check/eliminar_check',
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
   
        update_tabla_all_check()
   
   
      })  
   
   
   
   }     
   
      
      
      
            
      
         
</script>
</body>
</html>