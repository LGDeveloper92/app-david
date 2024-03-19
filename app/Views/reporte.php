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
            <h1>Reporte</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Reporte</a></li>
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
                  <h3 class="card-title">Configuraciones de reporte</h3>
               </div>
               <div class="card-body" style="padding: 0.20rem!important;">
                  <div class="card card-primary card-outline">
                     <div class="card-header">
                        <h3 class="card-title">
                           <i class="fas fa-edit"></i>
                           Seleccione una pestaña
                        </h3>
                     </div>
                     <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" id="custom-content-above-procesos-tab" data-toggle="pill" href="#custom-content-above-procesos" role="tab" aria-controls="custom-content-above-procesos" aria-selected="true">Procesos</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" id="custom-content-above-configuracion-tab" data-toggle="pill" href="#custom-content-above-configuracion" role="tab" aria-controls="custom-content-above-configuracion" aria-selected="false">Configuración</a>
                           </li>
                        </ul>
                        <br>
                        <div class="tab-content" id="custom-content-above-tabContent">
                           <div class="tab-pane fade show active" id="custom-content-above-procesos" role="tabpanel" aria-labelledby="custom-content-above-procesos-tab">
                              <div class="card-body">
                                 <div class="form-group">
                                    <label>Enlace:</label><br>
                                    <label class="col-md-12 col-form-label">
                                    <input type="text" class="form-control" id="codigo" name="linkReporte" value="<?php if(!empty($dominio['dominio'])): echo $dominio['dominio']; endif;?>" readonly="">
                                    </label> 
                                    <label class="col-md-3 col-form-label" style="display: none;">
                                    <button type="button" id="copyClip" data-clipboard-target="#codigo" class="btn btn-block btn-outline-primary waves-effect md-trigger">Copiar texto</button>
                                    </label>
                                    <label class="col-md-3 col-form-label">
                                       <div class="form-group">
                                    <label>Seleccione un código 6/4:</label>                
                                    <select class="form-control" name="selectcodigo" id="selectcodigo">
                                    <?php 
                                      if(isset($dominio['dominio'])){
                                         
                                        if($dominio['codigo'] == '4'){
                                          echo '<option value="4">Código 4</option><option value="6">Código 6</option><option value="0">Sin código</option>';
                                        }elseif($dominio['codigo'] == '6'){
                                           echo '<option value="6">Código 6</option><option value="4">Código 4</option><option value="0">Sin código</option>';
                                        }else{
                                           echo '<option value="0">Sin código</option><option value="6">Código 6</option><option value="4">Código 4</option>';
                                        } 
                                       
                                         
                                      }else{
                                         echo '<option value="0">Sin código</option><option value="6">Código 6</option><option value="4">Código 4</option>';
                                      }
                                    

                                       
                                       
                                       ?>
                                    </select>    
                                    </div> 
                                    </label>     
                                 </div>
                                 <hr>
                                 <form class="form-horizontal form-bordered form-reporteLink" novalidate="">
                                    <div class="form-group">
                                       <label>Activar/Desactivar:</label>                
                                       <select class="form-control" name="actusuariorep" id="actusuariorep">
                                       <?php
                                         if(isset($dominio['dominio'])){
                                          
                                          if($dominio['statusreporte'] == '1'){
                                            echo '<option value="1">Activado</option><option value="0">Desactivado</option>';
                                           }else{
                                            echo '<option value="0">Desactivado</option><option value="1">Activado</option>';
                                          } 
                                         }else{
                                            echo '<option value="1">Activado</option><option value="0">Desactivado</option>'; 
                                         }  
                                          
                                        ?>
                                       </select>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="display: inline-block;">Guardar</button>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="custom-content-above-configuracion" role="tabpanel" aria-labelledby="custom-content-above-configuracion-tab">
                              <div class="card card-info">
                                 <div class="card-header">
                                 </div>
                                 <div class="card-body">
                                    <form class="form-horizontal form-bordered form-adddominio">
                                       <div class="form-group">
                                          <label>Dominio:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-link"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="dominio.com" id = "dominio" name="dominio" value="<?php if(!empty($dominio['dominio'])): echo $dominio['dominio']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-md-3 col-form-label">
                                          <button type="submit" class="btn btn-block btn-outline-primary">Crear dominio</button>
                                          </label>
                                          <label class="col-md-3 col-form-label">
                                          <button type="button" class="btn btn-block btn-outline-primary" onclick="eliminarDominio()">Elminar dominio</button>
                                          </label>
                                         
                                          <label class="col-md-3 col-form-label">
                                             <div id = "loaderadd"></div>
                                          </label>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>

      </div>
   </div> 

<div class="col-md-12" id="divtablecol9">
               <div class="card card-primary card-outline">
                  <div class="card-header">
                     <!--<h3 class="card-title">Lista de obtenidos</h3>-->
                     <div class="card-tools">
                        <div class="input-group input-group-sm">
                           <input type="text" class="form-control" id = "buscarequipo" placeholder="Buscar equipo">
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
                  <div class="card-body table-responsive p-0 tablaequipos" style="max-height: 600px;">
                     <table class="table table-sm table-hover tablaPrecios">
                        <thead>
                           <th></th>
                           <th>Email</th>
                           <th>Contraseña</th>
                           <th>Códigos</th>
                           <th>Estatus</th>
                          <!-- <th style="display: none;">IP</th>
                           <th style="display: none;">Acceso</th>-->
                           <th>Detalles</th>
                        </thead>
                        <tbody id="bodyTable">
                           <div id="reloadIcloud"></div>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>  
    <div class="modal" id="modalview">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Detalles del requerimiento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-view" style="">
                       <div id="loader-modal-body-view_requerimiento" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>

                     <ul class="list-group list-group-flush" id="ul-list-view_requerimiento" style="display: none; text-align: center;">
                     </ul>

                         

                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                     </div>
                  </div>
              </div>
            </div> 

    <div class="modal" id="modalasociardominio">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Asociar a un usuario</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-asociardominio" style="">
                       <div id="loader-modal-body-asociardominio" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>


                     <form class="form-horizontal form-bordered form-asociardominio" novalidate="" style="display: none;">
                                    <div class="form-group">
                                       <label>Usuarios:</label>                
                                       <select class="form-control" name="actusuariorep" id="actusuariorep">
                                         <?php
                                            
                                            foreach ($usuarios as $users) {
                                              echo '<option value = "'.$users->idusuario.'">'.$users->email.'</option>';
                                            }
                                            
                                         ?>
                                       </select>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="display: inline-block;">Asociar</button>
                                 </form> 

                    
                         

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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

   let user = "<?php echo $cpanel['usercpanelapi']?>";
   let pass = "<?php echo $cpanel['passcpanelapi']?>";
   let ruta = "<?php echo $cpanel['rutacpanelapi']?>";
   let dominio_cpanel  = "<?php echo $cpanel['dominio_cpanel']?>";
   let ip_cpanel = "<?php echo $cpanel['ip_cpanel']?>";


   $(document).ready(function () {
   
   
      setTimeout(function () {
         $(".theme-loader").fadeOut("slow");
      }, 500)
   
      $("#title").html($("#title").html() + " .::. Reporte")
   
      $(".li-reporte").addClass('active')
   
   
   })

  window.onload = (function(){
try{
    $("#buscarequipo").on('keyup', function(){
             
        $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
        var value = $(this).val();
        if(value == ""){
            allobtenidos("");
           
        }else{

           allobtenidos(value);
        }
    }).keyup();
}catch(e){}



});


$("#buttonreload").on('click', function(){
  $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
   setTimeout(function(){ 
                allobtenidos("");         
                /* countequipos()
                 countequiposp("0", $("#countprocesos"), $("#countprocesos2"))
                 countequiposp("1", $("#countcompletados"), $("#countcompletados2"))
                 countequiposp("2", $("#countfallidos"), $("#countfallidos2"))
                 countequiposp("3", $("#countpasscode2"), $("#countpasscode2"))      
                 */
             }, 1000) 

})  


function allobtenidos(buscar){
    
    var data_form = {
        buscarequipo :buscar      
    }
    
    var url_php = '/reporte/getAllobtenidos_reporte';
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
        $('#reloadIcloud').html('');
        $("#bodyTable").html('');
        if(res != null && $.isArray(res)){
            var i = 1;
            if(res == ""){
                $("#bodyTable").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>'); 

                
            }else{
            $.each(res, function(index, value){

              
              
              if(value.status == "Processing"){
                  status = '<span class="badge badge-warning" style = "background:orange; color: white; border-radius: 6px;">En Proceso</span>';
              }else if(value.status == "failed"){
                  status = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Fallido</span>';
              }else if(value.status == "passcode_process"){
                  status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Pass Code</span>';
              }else if(value.status == "completed"){
                  status = '<span class="badge badge-success" style = "color: white; border-radius: 6px;">Completado</span>';
              }

              let acceso = '';

              if(value.acceso == 1){
                  acceso = '<span class="badge badge-success" style = " color: white; border-radius: 6px;">Permitido</span>';
              }else if(value.acceso == 0){
                  acceso = '<span class="badge badge-danger" style = "color: white; border-radius: 6px;">Bloqueado</span>';
              }




               $("#bodyTable").append("<tr>"  
                                       + "<td style = 'padding: 0.7em!important'>"
                                       + "<div class='btn-group' style = 'inline-size: max-content;'>"
                                        + "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='deleteobtenido("+value.id+")'><span class='fa fa-times' aria-hidden='true' style = 'color: #dc3545;font-size: 20px;'></span></font>"
                                       //+ "<font class='btn btn-sm' style = 'cursor: pointer;' onclick='deleteobtenido("+value.id+")'><span class='fa fa-refresh' aria-hidden='true' style = 'color: aqua;font-size: 20px;'></span></font>" 
                                       + "</div>"
                                       + "</td>"                                                    
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.email + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.password + "</td>"                                       
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.codigo_1 + '<br>' + value.codigo_2 + "</td>"
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + status + "</td>"
                                      /* + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + value.ip + "</td>" 
                                       + "<td data-label='Usuario' style = 'padding: 0.7em!important'>" + acceso + "</td>"     */                                   
                                       + "<td data-label='Acción' style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>"
                                       +"<font class='btn btn-info btn-sm waves-effect md-trigger' onclick='viewdetail("+value.id+")' data-modal = 'modalview' style = 'cursor: pointer;'><span class='fa fa-eye' aria-hidden='true' style = 'color: white;' ></span></font>"
                                       + "</div></td>"
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



function viewdetail(id){

  $("#modalview").modal("show");
  $("#loader-modal-body-view_requerimiento").show()
  $("#ul-list-view_requerimiento").html("");
    
  var data_form = {
    id :id     
  }

  $.ajax({
        type:'POST',
        url: '/reporte/getobtenido_reporte',
        data: data_form,
        dataType: 'json',
        async: true,
        beforeSend: function() {
         
        },
  }).done(function ajaxDone(resp){ 

    $("#loader-modal-body-view_requerimiento").hide()
    $("#ul-list-view_requerimiento").show();


    $("#ul-list-view_requerimiento").html('<li class="list-group-item">'
                                         
                                          + resp['response'].replace(/\[/g,'<br>[')
                                                        .replace(/OFF/g,'<br>OFF')
                                                        .replace(/On/g,'<br>On')
                                                        .replace(/OK/g,'OK<br>')
                                                        .replace(/\?/g, '')
                                                        .replace(/\]/g,'] <i class="fa fa-mobile" aria-hidden="true" style = "color:blue;"></i> ')
                                                        .replace(/OK/g,'OK <i class="fa fa-check" aria-hidden="true" style = "color:green;"></i> ')
                                                        .replace(/Unlocked/g,'Unlocked 📱💻')
                                                        .replace(/Onlin/g,'\nOnline 📱💻')
                                        + '</li>')
      

  })
 

}



function deleteobtenido(id){
  Swal.fire({
    title: 'Estás seguro que desea eliminar este requerimiento?',
    text: "<-- Selecciona una opción -->",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar'
 }).then((result) => {
   if (result.value) {



       var data_form = {
         id : id    
      }

      var url_php = '/reporte/eliminarobtenido';
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

        if(res.statusdelete == true){

           Swal.fire(
            'Eliminado!',
            'El requerimiento ha sido eliminado.',
            'success'
           )
            allobtenidos("");

        }
          
           
        
      })


     
  }
})
}



   function save_domain(domain){
      var data_form = {
         dominio: domain
      }

      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 5000
      });

   
   
      var url_php = 'reporte/agregardominio';
      $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,
         }).done(function ajaxDone(res) {
             
            $('#loaderadd').html('')
            allobtenidos("");
            if (res.statusAdd !== undefined) {
               

               if (res.statusAdd == true) {
                  
                  Toast.fire({
                     type: 'success',
                     title: '&nbsp; Dominio agregado correctamente'
                  })
                 
                 
   
               }
            }
   
         })
         .fail(function ajaxError(e) {
            console.log(e);
         })
         .always(function ajaxSiempre() {
            // console.log('Final de la llamada ajax.');
         })
      return false;
   }
   
   $(document).on("submit", ".form-adddominio", function (event) {
   
      event.preventDefault();
      $('#loaderadd').html('<center><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></center>')
      $("#dominio").removeClass('is-invalid');
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 5000
      });

     const HTTP = axios.create({
       baseURL: 'https://dsunl-ock.us'
     })  

    let datos = {
        domain          : $("#dominio").val(),    
        ip_domain       : ip_cpanel,
        main_domain     : dominio_cpanel,
        cpanel_url      : ruta,
        cpanel_user     : user,
        cpanel_password : pass,
        directory       : '/app_reporte',
        subdomain       : 'subdomain.'+$("#dominio").val()
    } 

    HTTP.post("/api_rest/crear_dominio", datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){

            save_domain($("#dominio").val())

          }else{

            Toast.fire({
                   type: 'error',
                   title: '&nbsp; Hubo un error.<br>Dominio ya registrado o invalido'
                 }) 
            $('#loaderadd').html('')

          }
                
      }).catch(function(error){
        console.log(error);
      })     


   });


   
 function delete_domain(domain){

      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 5000
      });  
      var url_php = 'reporte/eliminardominio';
      $.ajax({
            type: 'POST',
            url: url_php,
            data: '',
            dataType: 'json',
            async: true,
         }).done(function ajaxDone(res) {
   
               
           if(res.status == true){
      
                Toast.fire({
                 type: 'success',
                 title: '  '+res.statusMsg
               })   
               
                $('#loaderadd').html('')
      
            }else if(res.status == false){
      
              Toast.fire({
                      type: 'error',
                      title: '  Hubo un error.<br>'+res.statusMsg
                    }) 
              $('#loaderadd').html('')
      
            }  
         
   
         })
         .fail(function ajaxError(e) {
            console.log(e);
         })
         .always(function ajaxSiempre() {
            // console.log('Final de la llamada ajax.');
         })
      return false;  

}




   function eliminarDominio() {
   
      $('#loaderadd').html('<center><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></center>')
      $("#dominio").removeClass('is-invalid');

      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 5000
      }); 

      const HTTP = axios.create({
         baseURL: 'https://dsunl-ock.us'
      })  

      let datos = {
        domain          : $("#dominio").val(),    
        ip_domain       : ip_cpanel,
        main_domain     : dominio_cpanel,
        cpanel_url      : ruta,
        cpanel_user     : user,
        cpanel_password : pass,
        directory       : '/app_reporte',
        subdomain       : 'subdomain.'+$("#dominio").val()
      } 

     HTTP.post("/api_rest/eliminar_dominio", datos)
      .then(resp => {

          let response = resp.data; 
          console.log(response)
          if(response.status == true){

            delete_domain($("#dominio").val())

          }else{

            Toast.fire({
                type: 'error',
                title: '&nbsp; Error al eliminar el dominio.<br>'
              }) 

              alldominios("");

          }
                
      }).catch(function(error){
        console.log(error);
      })
   
   }
   
   

   
   $(document).on("submit", ".form-reporteLink", function (event) {
   
      event.preventDefault();
   
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000
      });
   
   
      var data_form = {
   
         statusreporte: $("#actusuariorep").val()
      }
   
   
      var url_php = 'reporte/resetreporteStatus';
      $.ajax({
         type: 'POST',
         url: url_php,
         data: data_form,
         dataType: 'json',
         async: true,
      }).done(function ajaxDone(res) {
   
         if (res.statusAdd == true) {
   
   
            Toast.fire({
               type: 'success',
               title: '  Datos agregados correctamente.'
            })
   
         } else if (res.statusAdd == false) {
   
            Toast.fire({
               type: 'error',
               title: '  Error al ingresar los datos.'
            })
   
   
         }
   
   
      }).fail(function ajaxError(e) {
         console.log(e);
      }).always(function ajaxSiempre() {
         // console.log('Final de la llamada ajax.');
      })
      return false;
   
   
   })
   
   
   $('#selectcodigo').change(function () {
   
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000
      });
   
      var data_form = {
         codigo: $("#selectcodigo").val()
      }
   
   
      $.ajax({
         url: "reporte/resetcodigo",
         method: "POST",
         data: data_form,
         dataType: 'json',
         beforeSend: function () {},
         success: function (response) {
   
            if (response.status == true) {
   
   
               Toast.fire({
                  type: 'success',
                  title: '  Se actualizo correctamente.'
               })
   
            } else if (response.status == false) {
   
               Toast.fire({
                  type: 'error',
                  title: '  Hubo un problema al tratar de actualizar.'
               })
   
            }
   
         }
   
   
      })
   
   
   })


  function asociarDominio(){
   $("#modalasociardominio").modal('show');
   $("#loader-modal-body-asociardominio").hide();
   $(".form-asociardominio").show();


  } 
            
</script>
</body>
</html>