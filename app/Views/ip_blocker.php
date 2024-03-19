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
               <h1>Bloqueador de IP</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Bloqueador de IP</a></li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card-body">
         <div class="form-button-action">
            <div class="btn-group" style="inline-size: max-content;"><font class="btn btn-success btn-sm waves-effect md-trigger" onclick="addip()"  style="cursor: pointer;"><span class="fa fa-plus-square" aria-hidden="true" style="color: white;"></span></font><font class="btn btn-info btn-sm" style="cursor: pointer;" onclick="update_requeriments_in_process()"><span class="fas fa-sync-alt" aria-hidden="true"></span></font></div>
         </div>
         <br>
         <div class="table-responsive">
            <table id="tbl_ipblocker" class="display table table-striped table-hover" style = 'width:100%!important'>
               <thead>
                  <tr>
                     <th>Direcci贸n IP</th>
                     <th>Pais</th>
                     <th>ciudad</th>
                     <th>Estatus IP</th>
                     <th>Fecha</th>
                     <th>Detalles</th>
                     <th style="width: 10%">Acci贸n</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>Direcci贸n IP</th>
                     <th>Pais</th>
                     <th>ciudad</th>
                     <th>Estatus IP</th>
                     <th>Fecha</th>
                     <th>Detalles</th>
                     <th style="width: 10%">Acci贸n</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </section>
   <div class="modal" id="modalaaddip">
      <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title">Agregar IP</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body modal-body-asociardominio" style="">
               <div id="loader-modal-body-asociardominio" >
                  <div class="loader-block">
                     <svg id="loader2" viewBox="0 0 100 100">
                        <circle id="circle-loader2" cx="50" cy="50" r="45"></circle>
                     </svg>
                  </div>
               </div>
               <form class="form-horizontal form-bordered form-addip" novalidate="" style="display: none;">
                  <div class="form-group">
                     <label>IP:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="192.0.0.0" id = "ip_adress" name="ip_adress" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Pais:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-globe"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Estados Unidos" id = "pais" name="pais" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Ciudad:</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-map"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Miami" id = "ciudad" name="ciudad" required>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-success" style="display: inline-block;">Agregar</button>
                  <label class="col-md-3 col-form-label">
                     <div id = "loaderadd"></div>
                  </label>
               </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
               <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
      </div>
   </div>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
   $(document).ready(function () {
     all_ip_blocker()
   
      setTimeout(function () {
         $(".theme-loader").fadeOut("slow");
      }, 500)
   
      $("#title").html($("#title").html() + " .::. Bloqueador de IP")
   
      $(".li-ip_blocker").addClass('active')
   
   
   })
   
   
   function all_ip_blocker(){
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
                 url: '/ip_blocker/getAll_ipblocker',
                 data: '',
                // dataFilter: function(reps) {
                  //  console.log(reps);
                // return reps;
                // }, 
             },
             order: [[6, 'desc']], 
             columns: [ 
                {"data" : "ip_adress", render:function(data, type, row){
   
                	return '<span style = "color:green;">'+data+'</span>'+'<br>'+ '<span style = "color:blue;">'+row.url_dominio+'</span>';
   
                }
               },
               {"data" : "pais"},
               {"data" : "ciudad"},
               {"data" : "status_ip",
                    render:function(data, type, row){
   
                          var status = '';
   
                          if(data == 0){
   
                            status = '<i class="fa fa-map-marker" aria-hidden="true" style = "color:red;"></i>&nbsp; <span class="badge badge-danger">IP Bloqueada </span>';
                          
                          }else if(data == 1){
   
                            status = '<i class="fa fa-map-marker" aria-hidden="true" style = "color:green;"></i>&nbsp; <span class="badge badge-success">IP Desbloqueada</span>';
   
                          }
   
                          
                           return status;
                    }
                },
               {"data" : "fecha_ip"}, 
               {"data" : "tipo_status",
                    render:function(data, type, row){
   
                   
   
                        let response = '';
   
                        if(row.tipo_status == 'manual'){
   
                        	response = '<p >La IP <span class="badge badge-success">'+row.ip_adress+'</span> se agrego manualmente.</p>'    
   
                        }else{
                        	if(row.cantidad_visitas >= 5 && row.tipo_status == 'visita'){
                              response = '<p style = "color:red;">La IP <span class="badge badge-success">'+row.ip_adress+'</span> ha visitado la pagina '+row.cantidad_visitas+' veces.</p>'       
                    	   }else{
                    		 if(row.cantidad_visitas == 1  && row.tipo_status == 'visita'){
                             response = '<p>La IP <span class="badge badge-success">'+row.ip_adress+'</span> ha visitado la pagina '+row.cantidad_visitas+' vez.</p>'    
                    		
                    		 }else if(row.cantidad_visitas > 1  && row.tipo_status == 'visita'){
                               response = '<p>La IP <span class="badge badge-success">'+row.ip_adress+'</span> ha visitado la pagina '+row.cantidad_visitas+' veces.</p>' 
                    		 }else{
                    		 response = '<p>La IP <span class="badge badge-success">'+row.ip_adress+'</span> ha visitado la pagina '+row.cantidad_visitas+' veces y el proceso se completo correctamente.</p>'    	
                    		 }
                          
                    	   }
   
                        }
                    	
                                        
                                          
   
   
    
                          return response; 
                       
                    }
                },
               {"data" : "id",
                    render:function(data, type, row){
   
                    	let btn_status = '';
   
                    	if(row.status_ip == 1){
                          btn_status = '<font class="btn btn-info btn-sm waves-effect md-trigger" onclick="actualizar_ip('+data+','+row.status_ip+')" data-modal="modalview" style="cursor: pointer;"><span class="fa fa-toggle-on" aria-hidden="true" style="color: white;"></span></font>'      
                    	}else if(row.status_ip == 0){
                          btn_status = '<font class="btn btn-warning btn-sm waves-effect md-trigger" onclick="actualizar_ip('+data+','+row.status_ip+')" data-modal="modalview" style="cursor: pointer;"><span class="fa fa-toggle-off" aria-hidden="true" style="color: white;"></span></font>'
                    	}
   
                             let response = '<div class="form-button-action">'
                                          
                                          + '<div class="btn-group" style="inline-size: max-content;">'
                                             + btn_status
                                             + '<font class="btn btn-danger btn-sm" style="cursor: pointer;" onclick="eliminar_ip('+data+')"><span class="fas fa-trash-alt" aria-hidden="true"></span></font>'                                             
                                            +'</div>'                       
                                          
   
   
    
                          return response; 
                       
                    }
                },
             ]
     })
   }
   
   
    function eliminar_ip(id){
   
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
         url: "/ip_blocker/eliminar_ipblocker",
         method: "POST",
         data: data_form,
         dataType: 'json',
         beforeSend: function () {},
         success: function (response) {
   
            if(response.status == true) {
   
   
               Toast.fire({
                  type: 'success',
                  title: response.statusMsg
               })
   
            }else if(response.status == false) {
   
               Toast.fire({
                  type: 'error',
                  title: response.statusMsg
               })
   
            }
   
            update_requeriments_in_process()
   
         }
   
   
      })   	
   
    } 
   
   
   
        function update_requeriments_in_process(){
           var table = $('#tbl_ipblocker').DataTable();
           table.ajax.reload();
       } 
   
   function addip(){
   $("#modalaaddip").modal('show');
   $("#loader-modal-body-asociardominio").hide();
   $(".form-addip").show();
   
   
   } 
   
   
   $(document).on("submit", ".form-addip", function (event) {
      
      var data_form = {
         ip_adress : $("#ip_adress").val(),
         pais      : $("#pais").val(),
         ciudad    : $("#ciudad").val()
      }
   
     $('#loaderadd').html('<center><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></center>')
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 5000
      });
   
   
   
      var url_php = '/ip_blocker/add_ipblocker';
      $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,
         }).done(function ajaxDone(res) {
             
            //$('#loaderadd').html('')
               
   
               if(res.status == true) {
                  
                  Toast.fire({
                     type: 'success',
                     title: '&nbsp; IP agregada con exito.'
                  })
               }else{
   
               	  Toast.fire({
                     type: 'error',
                     title: '&nbsp; IP invalida o existente.'
                  })
   
               }
             update_requeriments_in_process()
             $('#loaderadd').html("")  
           
   
         })
         .fail(function ajaxError(e) {
            console.log(e);
         })
         .always(function ajaxSiempre() {
            // console.log('Final de la llamada ajax.');
         })
      return false;
   
   })
   
   
 function actualizar_ip(id,status_ip){

     let status = '';     
      
      if(status_ip == 1){   
        status = 0;   
      }else{   
       status = 1;
      }

      var data_form = {
        id   : id,
        status_ip : status
      }

      var url_php = '/ip_blocker/update_status';
      $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,
         }).done(function ajaxDone(res) {
             
           
           update_requeriments_in_process()
   
         })
         .fail(function ajaxError(e) {
            console.log(e);
         })
         .always(function ajaxSiempre() {
            // console.log('Final de la llamada ajax.');
         })
      return false;      

 } 
   
   
            
</script>
</body>
</html>