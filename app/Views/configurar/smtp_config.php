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
               <h1>SMTP</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">SMTP</a></li>
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
                     <form class="form-horizontal form-bordered form-smtpconfig">
                        <div class="form-group">
                           <label>Descripción:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-info"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="SMTP 1" id = "smtp_descripcion" name="smtp_descripcion" value="<?php if(!empty($smtp['smtp_descripcion'])): echo $smtp['smtp_descripcion']; endif;?>" required>
                           </div>
                        </div>
                         <div class="form-group">
                           <label>Servidor :</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-atlas"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="mail.domain.com" id = "smtp_host" name="smtp_host" value="<?php if(!empty($smtp['smtp_host'])): echo $smtp['smtp_host']; endif;?>" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Puerto :</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-ellipsis-h"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="587" id = "smtp_puerto" name="smtp_puerto" value="<?php if(!empty($smtp['smtp_puerto'])): echo $smtp['smtp_puerto']; endif;?>" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Usuario :</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="user@email.com" id = "smtp_username" name="smtp_username" value="<?php if(!empty($smtp['smtp_username'])): echo $smtp['smtp_username']; endif;?>" required>
                           </div>
                        </div>
                       
                        <div class="form-group">
                           <label>Contraseña</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-key"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="12345" id = "smtp_password" name="smtp_password" value="<?php if(!empty($smtp['smtp_password'])): echo $smtp['smtp_password']; endif;?>" required>
                           </div>
                        </div>                        
                        <div class="form-group">
                           <label class="col-md-3 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary" >Guardar</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" data-toggle="modal" data-target="#modal-sender_smsapi" style="display: none;">Agregar Remitentes</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger"  style="display: none;" onclick="view_listasender_smsapi()">Ver remitentes</button>
                           </label>
                        </div>
                     </form>

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
   
     $("#title").html($("#title").html() + " .::. SMTP")
   
    $(".li-smtp").addClass('active')
    $(".li-config").addClass('active')
    $(".nav-treeview-config").css('display','block')
   });


/**********Automremove*************/
$(document).on("submit", ".form-smtpconfig", function(event){

    event.preventDefault();

     const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    

     var data_form = {
        smtp_descripcion : $("#smtp_descripcion").val(), 
        smtp_host        : $("#smtp_host").val(),
        smtp_puerto      : $("#smtp_puerto").val(),
        smtp_username    : $("#smtp_username").val(),
        smtp_password    : $("#smtp_password").val()
    }


       
   var url_php = 'smtp_config/agregar_datos';
     $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
     .done(function ajaxDone(res){
      console.log(res); 

      if(res.statusAdd !== undefined){        
        if(res.statusAdd == true){

           
            Toast.fire({
              type: 'success',
              title: '&nbsp; Datos SMTP ingresados correctamente'
            })

         }else if(res.statusAdd == false){

              Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error al ingresar los datos.'
                 }) 
            
             
         }            
            return false;
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
   

   
   
   
   
   
   
   
</script>
</body>
</html>
