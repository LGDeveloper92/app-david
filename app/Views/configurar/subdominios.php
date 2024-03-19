<!-- Content Wrapper. Contains page content -->
<!--DESDE AQUI-->
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
               <h1 class="m-0 text-dark">Subdominios</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Sudominios</a></li>
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
                     <!--<h3 class="card-title">Lista de requerimientos</h3>-->
                     <div class="card-tools">
                        <div class="input-group input-group-sm">
                           <input type="text" class="form-control" id="buscarsubdominio" placeholder="Buscar">
                           <div class="input-group-append">
                              <div class="btn btn-primary" style="background-color: #28a745!important;"> <i class="fas fa-search"></i> </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="mailbox-controls">
                     <!-- Check all button -->
                     <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="far fa-square"></i>
                        <!-- /.btn-group -->
                     <button type="button" class="btn btn-default btn-sm" id="buttonreload"><i class="fas fa-sync-alt"></i></button>
                  </div>
                  <div class="card-body table-responsive p-0 tablasubdominios" style="height: auto;">
                     <table class="table table-sm table-hovers">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Descripción</th>
                              <th>Acción</th>
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
                     <button type="submit" class="btn btn-block btn-outline-primary waves-effect md-trigger" id="btndominio">Subdominio</button>
                     </label>
                     <label class="col-md-3 col-form-label">
                     <button type="submit" class="btn btn-block btn-outline-primary waves-effect md-trigger" id="btndominioadd">Dominio</button>
                     </label>
                     <label class="col-md-3 col-form-label">
                     <button type="button" class="btn btn-block btn-outline-primary waves-effect md-trigger" onclick="vernameserver()">Nameservers</button>                        
                     </label>
                     <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?> 
                     <label class="col-md-2 col-form-label">
                     <button type="submit" class="btn btn-block btn-outline-primary waves-effect md-trigger" onclick="asignardominio()">Asignar</button>
                     </label>
                     <?php } ?> 
                  </div>
               </div>
            </div>
            <hr>

            <?php  if($sessionrol == "administrador" || $sessionrol == "master"){  ?>

            <div class="col-md-12" id="divtablecol9">
               <div class="card card-primary card-outline">
                  <div class="card-header">
                     <h3 class="card-title">Lista de dominios asignados</h3>
                     <div class="card-tools">
                        <br>
                        <div class="input-group input-group-sm">
                           <select class="form-control" name="selectusuarioasignado" id="selectusuarioasignado">
                            <?php foreach($usuarios as $users) { ?>
                             <option value="<?php echo $users->idusuario; ?>">
                               <?php echo $users->nombre . "/" .$users->email; ?>
                             </option>
                            <?php } ?>
                           </select>
                        </div>
                     </div>
                     <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="mailbox-controls">
                     <!-- Check all button -->
                     <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="far fa-square"></i>
                        <!-- /.btn-group -->
                     <button type="button" class="btn btn-default btn-sm" id="buttonreload"><i class="fas fa-sync-alt"></i></button>
                  </div>
                  <div class="card-body table-responsive p-0 tablasubdominiosasignado" style="height: auto;">
                     <table class="table table-sm table-hovers">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Descripción</th>
                              <th>Acción</th>
                           </tr>
                        </thead>
                        <tbody id="bodyTableasignado">
                           <div id="reloadasignado"></div>
                        </tbody>
                     </table>
                  </div>                 
                </div>
            </div>  

            <?php } ?>   
            <div id="modaladddominio" class="md-modal md-effect-1">
               <div class="md-content">
                  <h3>Agregar subdominio</h3>
                  <div>
                     <form class="form-horizontal form-bordered form-addsubdominio">
                        <div class="form-group">
                           <label>Dominios:</label>
                           <select class="form-control" name="selectdominio" id="selectdominio">
                              <option value="selectd">Seleccione un dominio</option>
                              <?php foreach($dominios as $dom) { ?>
                              <option value="<?php echo $dom->domains ?>">
                                 <?php echo $dom->domains; ?>
                              </option>
                              <?php } ?>
                           </select>
                           <input type="text" name="domtemp" id="domtemp" style="display: none;"> 
                        </div>
                        <div class="form-group">
                           <label>Subdominio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-link"></i></span> </div>
                              <input type="text" class="form-control" placeholder="subdominio.com" id="subdominio" name="subdominio" required>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>
                        <div class="form-group" style="display: none;">
                           <label>Ruta:</label>
                           <div class="input-group">
                              <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-folder"></i></span> </div>
                              <input type="text" class="form-control" placeholder="/subdominio.dominio.com" id="rutaSubd" name="rutaSubd" disabled="" style="color:black!important;font-size: 15px!important;opacity: 8!important;"> 
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary">guardar</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                              <div id="loaderadd"></div>
                           </label>
                        </div>
                     </form>
                     <button type="button" class="btn btn-primary waves-effect md-close" id="btnmodelclosedominio">Cerrar</button>
                  </div>
               </div>
            </div>
            <div id="modaladddominio2" class="md-modal md-effect-1">
               <div class="md-content">
                  <h3>Agregar dominio</h3>
                  <div>
                     <form class="form-horizontal form-bordered form-adddominio">
                        <div class="form-group">
                           <label>Dominio:</label>
                           <div class="input-group">
                              <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-link"></i></span> </div>
                              <input type="text" class="form-control" placeholder="dominio.com" id="dominio" name="dominio" required>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>
                        <div class="form-group" style="display: none;">
                           <label>Ruta:</label>
                           <div class="input-group">
                              <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-folder"></i></span> </div>
                              <input type="text" class="form-control" placeholder="Usuario" id="rutaD" name="rutaD" disabled="" style="color:black!important;font-size: 15px!important;opacity: 8!important;"> 
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 col-form-label">
                           <button type="submit" class="btn btn-block btn-outline-primary">guardar</button>
                           </label>
                           <label class="col-md-3 col-form-label">
                              <div id="loaderadd2"></div>
                           </label>
                        </div>
                     </form>
                     <button type="button" class="btn btn-primary waves-effect md-close" id="btnmodelclosedominio2">Cerrar</button>
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
            <div class="modal md-effect-1" id="modal-aginardominios">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Asignar dominios</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-aginardominios">
                        <div id="loader-modal-body-aginardominios" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100">
                                 <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                              </svg>
                           </div>
                        </div>
                        <form class="form-horizontal form-bordered form-aginardominio" style="display: none;">
                           <div class="form-group">
                              <label>Usuarios:</label>
                              <select class="form-control" name="selectusuario" id="selectusuario">
                                 <?php foreach($usuarios as $users) { ?>
                                 <option value="<?php echo $users->idusuario; ?>">
                                    <?php echo $users->nombre . "/" .$users->email; ?>
                                 </option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>Dominios:</label>
                              <select class="form-control" name="selecsubdominio" id="selecsubdominio">
                                 <?php foreach($subdominios as $subs) { ?>
                                 <option value="<?php echo $subs->descripcion; ?>">
                                    <?php echo $subs->descripcion; ?>
                                 </option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-form-label">
                              <button type="submit" class="btn btn-block btn-outline-primary">Asignar</button>
                              </label>
                              <label class="col-md-3 col-form-label">
                                 <div id="loaderaddasignar" style="display: none;">
                                    <center>
                                       <div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div>
                                    </center>
                                 </div>
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
         <!-- /.row -->
      </div>
      <!--/. container-fluid -->
      <div class="md-overlay"></div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!---HASTA AQUI-->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- Main Footer -->
<footer class="main-footer">
   <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong> Todos los derechos reservados
   <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 2.0 </div>
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
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/subdominios.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</script>
<script>
   let user = "<?php echo $cpanel['usercpanelapi']?>";
   let pass = "<?php echo $cpanel['passcpanelapi']?>";
   let ruta = "<?php echo $cpanel['rutacpanelapi']?>";
   let dominio_cpanel  = "<?php echo $cpanel['dominio_cpanel']?>";
   let ip_cpanel = "<?php echo $cpanel['ip_cpanel']?>";
   $(document).ready(function() {

   alldomains_asginados()
   setTimeout(function() {
    $(".theme-loader").fadeOut("slow");
   }, 500)
   $("#title").html($("#title").html() + " .::. Subdominios")
   $(".li-subdominios").addClass('active')
   $(".li-config").addClass('active')
   $(".nav-treeview-config").css('display', 'block')
   });
   $(function() {
   //Enable check and uncheck all functionality
   $('.checkbox-toggle').click(function() {
    var clicks = $(this).data('clicks')
    if(clicks) {
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
   $("#btndominio").on('click', function() {
   $("#modaladddominio").addClass("md-show");
   $(".md-show").css("visibility", "visible");
   $(".md-overlay").css('opacity', '1')
   $(".md-overlay").css('visibility', 'visible')
   })
   $("#btndominioadd").on('click', function() {
   $("#modaladddominio2").addClass("md-show");
   $(".md-show").css("visibility", "visible");
   $(".md-overlay").css('opacity', '1')
   $(".md-overlay").css('visibility', 'visible')
   })
   $("#btnmodelclosedominio").on('click', function() {
   $(".md-overlay").css('opacity', '0');
   $(".md-overlay").css('visibility', 'hidden');
   $("#modaladddominio").removeClass("md-show");
   $(".md-show").css("visibility", "hidden");
   $(".md-modal").css("visibility", "hidden");
   $("#bodymodal").html("");
   })
   $("#btnmodelclosedominio2").on('click', function() {
   $(".md-overlay").css('opacity', '0');
   $(".md-overlay").css('visibility', 'hidden');
   $("#modaladddominio2").removeClass("md-show");
   $(".md-show").css("visibility", "hidden");
   $(".md-modal").css("visibility", "hidden");
   $("#bodymodal").html("");
   })
   $("#btnasosubdominio").on('click', function() {
   $("#modalasocsubd").addClass("md-show");
   $(".md-show").css("visibility", "visible");
   $(".md-overlay").css('opacity', '1')
   $(".md-overlay").css('visibility', 'visible')
   })
   $("#btnacosubdominio").on('click', function() {
   $("#modalacosubd").addClass("md-show");
   $(".md-show").css("visibility", "visible");
   $(".md-overlay").css('opacity', '1')
   $(".md-overlay").css('visibility', 'visible')
   })
   $("#btnacceso").on('click', function() {
   $("#modalasociar").addClass("md-show");
   $(".md-show").css("visibility", "visible");
   $(".md-overlay").css('opacity', '1')
   $(".md-overlay").css('visibility', 'visible')
   })
   $("#btncloseasocsubd").on('click', function() {
   $(".md-overlay").css('opacity', '0');
   $(".md-overlay").css('visibility', 'hidden');
   $("#modalasocsubd").removeClass("md-show");
   $(".md-show").css("visibility", "hidden");
   $(".md-modal").css("visibility", "hidden");
   $("#bodymodal").html("");
   })
   $("#btncloseacosubd").on('click', function() {
   $(".md-overlay").css('opacity', '0');
   $(".md-overlay").css('visibility', 'hidden');
   $("#modalacosubd").removeClass("md-show");
   $(".md-show").css("visibility", "hidden");
   $(".md-modal").css("visibility", "hidden");
   $("#bodymodal").html("");
   })
   $("#btnaccesoclose").on('click', function() {
   $(".md-overlay").css('opacity', '0');
   $(".md-overlay").css('visibility', 'hidden');
   $("#modalasociar").removeClass("md-show");
   $(".md-show").css("visibility", "hidden");
   $(".md-modal").css("visibility", "hidden");
   $("#bodymodal").html("");
   })
   $(".md-overlay").on('click', function() {
   $(".md-overlay").css('opacity', '0')
   $(".md-overlay").css('visibility', 'hidden')
   $("#modaladddominio").removeClass("md-show");
   $("#modaladddominio2").removeClass("md-show");
   $("#modalasocsubd").removeClass("md-show");
   $("#modalacosubd").removeClass("md-show");
   $("#modalasociar").removeClass("md-show");
   $(".md-show").css("visibility", "hidden");
   $(".md-modal").css("visibility", "hidden");
   $("#bodymodal").html("");
   })
   $("#dominio").on('keyup', function() {
   $("#rutaD").val("/" + $("#dominio").val());
   }).keyup();
   $("#selectdominio").change(function() {
   $('#domtemp').val($(this).val());
   if($('#selectdominio').val() == "selectd") {
    $("#domtemp").val("");
   }
   });
   try {
   $("#subdominio").on('keyup', function() {
    if($("#selectdominio").val() == "0"){
      $("#rutaSubd").val("/" + $("#subdominio").val());
    }else{
      $("#rutaSubd").val("/" + $("#subdominio").val() + "." + $("#domtemp").val());
    }
    
   }).keyup();
   } catch(e) {}
   
   
   
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
   
   function asignardominio(){
   
    $("#modal-aginardominios").modal('show');
    $("#loader-modal-body-aginardominios").hide();
    $(".form-aginardominio").show();
   
   
    
   
   } 
   
   $(document).on("submit", ".form-aginardominio", function(event) {
    event.preventDefault();
   
    $("#loaderaddasignar").show()
    const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000
    });
   
    var data_form = {
     idusuario    : $("#selectusuario").val(),
     subdominio   : $("#selecsubdominio").val()
    }
   
   
     $.ajax({
       type: 'POST',
       url: '/configurar/subdominios/asignarsubdominio',
       data: data_form,
       dataType: 'json',
       async: true,
     }).done(function ajaxDone(res) {
   
       $("#loaderaddasignar").hide()
       alldomains_asginados()
   
       if(res.existe == true) {
         Toast.fire({
          type: 'error',
          title: '&nbsp; El usuario ya tiene el dominio asignado.'
         })
       }else{
   
        if(res.status == true){
          Toast.fire({
            type: 'error',
            title: '&nbsp; El dominio se asignó correctamente.'
          })
        }else{      
          Toast.fire({
            type: 'error',
            title: '&nbsp; Error al intentar asignar el dominio.'
          })
        }
   
   
       }
   
     }).fail(function ajaxError(e) {
       console.log(e);
     }).always(function ajaxSiempre() {
       // console.log('Final de la llamada ajax.');
     })
     return false;
   })



   $("#selectusuarioasignado").on('change', function(){

       $('#bodyTableasignado').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
       alldomains_asginados()

   })


 function alldomains_asginados(){

      var data_form = {
        buscarsubdominio : $("#selectusuarioasignado").val()  
      } 

      var url_php = 'subdominios/getAllsubdominiosID'; 
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
         $('#reloadasignado').html('');
         $("#bodyTableasignado").html('');
         let i = 1;
         if(res == ""){
                $("#bodyTableasignado").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>'); 
               
         }else{

            $.each(res, function(index, value){

              let btn = "";  

              if(value.asignado == 1){
               btn = "<td><font class='btn btn-sm' style = 'cursor: pointer;' onclick='eliminarsubdominioasignado("+value.idsubdomains+","+value.asignado+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font></td>";
               
              }else{
                 btn = "<td><font class='btn btn-sm' style = 'cursor: pointer;'><span class='fa fa-dot-circle-o' aria-hidden='true' style = 'color: #808080fa;font-size: 20px;'></span></font></td>";
              }
              
              $("#bodyTableasignado").append("<tr>"                                       
                                       + "<td>"+i+"</td>"
                                       + "<td data-label='Descripción'>" + value.subdomains + "</td>"
                                       + btn
                                       + "</div></td></tr>"); 
                
                i++;
             });


         }


      })   



 }  


function eliminarsubdominioasignado(idsubdomains,asignado){
   const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
   });

    var data_form = {
      idsubdomains : idsubdomains,
      asignado     : asignado
    }  

      var url_php = 'subdominios/eliminarsubdominioasignado';
      $.ajax({
          type:'POST',
          url: url_php,
          data: data_form,
          dataType: 'json',
          async: true,
      }).done(function ajaxDone(res){   
        
         alldomains_asginados()
  
         if(res.statusdelete == true){
              $('#bodyTableasignado').html('<td colspan="4" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
             
              Toast.fire({
                type: 'success',
                title: '&nbsp; Subdominio o dominio eliminado exitosamente.<br>'
              }) 

              allsubdominios(""); 
              reloadsubdom()
             
          }else{

            Toast.fire({
                type: 'error',
                title: '&nbsp; Error al eliminar el dominio o subdominio.<br>'
              }) 
          }
        
      }).fail(function ajaxError(e){
          console.log(e);
      }).always(function ajaxSiempre(){
         // console.log('Final de la llamada ajax.');
      })
      return false;  


} 



   
   
   
   
   
</script>
</body>
</html>