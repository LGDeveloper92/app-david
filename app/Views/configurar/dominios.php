<!-- Content Wrapper. Contains page content --><!--DESDE AQUI-->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
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
               <h1 class="m-0 text-dark">Dominios</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Dominios</a></li>
                  <!--<li class="breadcrumb-item active">Ingresados</li>-->
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
         <div class="row">
            <div class="col-md-12" id="divtablecol9">
               <div class="card card-primary card-outline">
                  <div class="card-header">                    
                     <div class="card-tools">
                        <div class="input-group input-group-sm">
                           <input type="text" class="form-control" id = "buscardominio" placeholder="Buscar">
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
                     <button type="button" class="btn btn-default btn-sm" id="buttonreload"><i class="fas fa-sync-alt"></i></button>
                  </div>
                  <div class="card-body table-responsive p-0 tabladominios" style="height: auto;">
                     <table class="table table-sm table-hovers">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Descripción</th>
                              <th>Ruta</th>
                              <th >Acción</th>
                           </tr>
                        </thead>
                        <tbody id="bodyTable">
                           <div id="reloadIcloud"></div>
                        </tbody>
                     </table>
                  </div>

                  <hr>
                  <div class="form-group">
                     <label class="col-md-3 col-form-label">
                        <button type="submit" class="btn btn-block btn-outline-primary waves-effect md-trigger" id = "btnmodeldominio">Agregar Dominio</button>                        
                     </label>
                     <label class="col-md-3 col-form-label">
                        <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" onclick="vernameserver()">Ver nameservers</button>                        
                     </label>
                  </div>
                  
               </div>
               <!-- /.card -->
            </div>
            <div id="modaladddominio" class="md-modal md-effect-1" >
               <div class="md-content">
                  <h3>Agregar dominio</h3>
                  <div>
                     <!-- <p>This is a modal window. You can do the following things with it:</p>-->
                     <form class="form-horizontal form-bordered form-adddominio">
                        <div class="form-group">
                           <label>Dominio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-link"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="dominio.com" id = "dominio" name="dominio" required>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Ruta:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-folder"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Usuario" id = "rutaD" name="rutaD" disabled="" style="color:black!important;font-size: 15px!important;opacity: 8!important;"  required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary">guardar</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                              <div id = "loaderadd"></div>
                           </label>
                        </div>
                     </form>
                     <button type="button" class="btn btn-primary waves-effect md-close" id = "btnmodelclosedominio">Cerrar</button>
                  </div>
               </div>
            </div>
              <div class="modal md-effect-1" id="modal-namservers">
                <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h4 class="modal-title">Lista de nameservers</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>
                      <!-- Modal body -->
                      <div class="modal-body modal-body-nameservers" style="text-align: center;">
                          <div id="loader-modal-body-nameservers" >
                            <div class="loader-block">
                                <svg id="loader2" viewBox="0 0 100 100">
                                  <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                                </svg>
                            </div>
                          </div>
                          <div class="card" style="display: none;" id="list-nameservers">                            
                            <ul class="list-group list-group-flush" id="ul-list-nameservers">
                              <li class="list-group-item" id="nameserver1"><span></span></li>
                              <li class="list-group-item" id="nameserver2"><span></span></li>
                              <li class="list-group-item" id="nameserver3"><span></span></li>
                              <li class="list-group-item" id="nameserver4"><span></span></li>
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
         <!-- /.row -->
      </div>
      <!--/. container-fluid -->
      <div class="md-overlay"></div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper --><!---HASTA AQUI-->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- Main Footer -->
<footer class="main-footer">
   <strong>Copyright &copy; 2021 <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong>
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
<!-- PAGE SCRIPTS -->
<script src="<?php //echo base_url();?>/public/assets/dist/js/pages/dashboard2.js"></script>
<!--<script src="<?php //echo base_url();?>assets/server/js/modal.js"></script>-->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src=".<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/dominios.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</script>
<script>

   let user = "<?php echo $cpanel['usercpanelapi']?>";
   let pass = "<?php echo $cpanel['passcpanelapi']?>";
   let ruta = "<?php echo $cpanel['rutacpanelapi']?>";
   let dominio_cpanel  = "<?php echo $cpanel['dominio_cpanel']?>";
   let ip_cpanel = "<?php echo $cpanel['ip_cpanel']?>";
   $(document).ready(function() {
   
      setTimeout(function(){
        $(".theme-loader").fadeOut("slow");           
      }, 500)
   
     $("#title").html($("#title").html() + " .::. Dominios")
   
    $(".li-dominios").addClass('active')
    $(".li-config").addClass('active')
    $(".nav-treeview-config").css('display','block')
   });
   
   
   
   
   $(function () {
     //Enable check and uncheck all functionality
     $('.checkbox-toggle').click(function () {
       var clicks = $(this).data('clicks')
       if (clicks) {
         //Uncheck all checkboxes
         $('.tabladominios input[type=\'checkbox\']').prop('checked', false)
         $('.checkbox-toggle i').removeClass('fa-check-square').addClass('fa-square')
        
       } else {
         //Check all checkboxes
         $('.tabladominios input[type=\'checkbox\']').prop('checked', true)
         $('.checkbox-toggle i').removeClass('fa-square').addClass('fa-check-square')
        
       }
       $(this).data('clicks', !clicks)
      })
     })
   
   
   $("#btnmodeldominio").on('click', function(){
     
      $("#modaladddominio").addClass("md-show");
      $(".md-show").css("visibility","visible");
      $(".md-overlay").css('opacity','1')
      $(".md-overlay").css('visibility','visible')
   
   })
   
   $("#btnmodelclosedominio").on('click', function(){
      $(".md-overlay").css('opacity','0');
      $(".md-overlay").css('visibility','hidden');
      $("#modaladddominio").removeClass("md-show");
      $(".md-show").css("visibility","hidden");
      $(".md-modal").css("visibility","hidden");
      $("#bodymodal").html(""); 
   })
   
   $(".md-overlay").on('click', function(){
     $(".md-overlay").css('opacity','0')
     $(".md-overlay").css('visibility','hidden')
     $("#modaladddominio").removeClass("md-show");
     $(".md-show").css("visibility","hidden");
     $(".md-modal").css("visibility","hidden");
     $("#bodymodal").html(""); 
   })
   
   $("#dominio").on('keyup', function(){
         $("#rutaD").val("/"+$("#dominio").val());                 
    }).keyup();


  function  vernameserver(){
     $("#modal-namservers").modal('show');
     
      $.ajax({
        type: 'POST',
        url: '/configurar/servidor/get_cpanelapi',
        data: '',
        dataType: 'json',
        async: true,
     }).done(function ajaxDone(resp) {

       $("#loader-modal-body-nameservers").hide()
       $("#list-nameservers").show()
      
        $("#nameserver1").html(resp['nameserver1'])
        $("#nameserver2").html(resp['nameserver2'])
        $("#nameserver3").html(resp['nameserver3'])
        $("#nameserver4").html(resp['nameserver4'])
   
       
   
   
      
   
    })
  }

   
   
   
   /* window.onload = (function(){
           try{
               $("#dominio").on('keyup', function(){
                 $("#rutaD").val("/"+$("#dominio").val());                 
               }).keyup();
           }catch(e){}
         
    });*/
   
   
   
     /*  opacity: 1;
     visibility: visible;
   */
   
</script>
</body>
</html>
