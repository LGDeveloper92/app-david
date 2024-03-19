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
               <h1>Configurar</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                  <li class="breadcrumb-item active">Añadir</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title">Configuraciones de usuarios</h3>
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
                              <?php  if($sessionrol == "administrador"  || $sessionrol == "master"){ ?>
                              <li class="nav-item">
                                 <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">
                                   Listado
                                 </a>
                              </li>
                              <?php }?>

                              <li class="nav-item"> <a class="nav-link" id="custom-content-above-perfil-tab" data-toggle="pill" href="#custom-content-above-perfil" role="tab" aria-controls="custom-content-above-perfil" aria-selected="false">Perfil</a> </li>

                              <?php  if($sessionrol == "administrador"  || $sessionrol == "master"){ ?>
                              <li class="nav-item"> <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Agregar</a> </li>
                              <li class="nav-item"> <a class="nav-link" id="custom-content-above-credito-tab" data-toggle="pill" href="#custom-content-above-credito" role="tab" aria-controls="custom-content-above-credito" aria-selected="false">Creditos</a> </li>
                              <?php }?>

                           </ul>
                           <br>
                           <div class="tab-content" id="custom-content-above-tabContent">
                              <div class="tab-pane  <?php  if($sessionrol == "administrador"  || $sessionrol == "master"){ echo 'fade show active'; }else{ echo 'fade';}
                               ?>" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                                 <div class="card card-info">
                                    <div class="card-header"> </div>
                                    <div class="card-body">
                                       <?php  if($sessionrol == "administrador"  || $sessionrol == "master"){ ?>
                                       <div class="card-header">
                                          <!-- <h3 class="card-title">Lista de requerimientos</h3>-->
                                          <div class="card-tools">
                                             <div class="input-group input-group-sm">
                                                <input type="text" class="form-control" id="buscarusuario" placeholder="Buscar usuario">
                                                <div class="input-group-append">
                                                   <div class="btn btn-primary" style="background-color: #28a745!important;"> <i class="fas fa-search"></i> </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="mailbox-controls">
                                          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i> </button>
                                          <div class="btn-group">
                                             <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                          </div>
                                          <button type="button" class="btn btn-default btn-sm" id="buttonreload"><i class="fas fa-sync-alt"></i></button>
                                          <div class="float-right">
                                             <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card-body table-responsive p-0 tablausuarios" style="height: auto;">
                                          <table class="table table-sm table-hover tablaPrecios">
                                             <thead>
                                                <tr>
                                                   <th></th>
                                                   <th>Nombre</th>
                                                   <th>Usuario</th>
                                                   <th>Estado</th>
                                                   <th>Acción</th>
                                                </tr>
                                             </thead>
                                             <tbody id="bodyTable">
                                                <div id="reloadIcloud"></div>
                                             </tbody>
                                          </table>
                                       </div>
                                       <hr>
                                       <?php }?>
                                       
                                    </div>
                                 </div>
                              </div>




                               <div class="tab-pane   <?php  if($sessionrol == "administrador"  || $sessionrol == "master"){ echo 'fade'; }else{ echo 'fade show active';}
                               ?>" id="custom-content-above-perfil" role="tabpanel" aria-labelledby="custom-content-above-perfil-tab">
                                 <div class="card card-info">
                                    <div class="card-header"> </div>
                                    <div class="card-body">
                                       <form class="form-horizontal form-bordered form-updateusuario">

                                          <div class="form-group">
                                             <label>Usuario (Inicio de sesión):</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                <input type="text" class="form-control" placeholder="Username" id="email_upd" name="email_upd" value="<?php echo $datosuser['email'];?>" autocomplete="off" readonly  required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Nombre:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-info"></i></span> </div>
                                                <input type="text" class="form-control" placeholder="Usuario" id="nombre_upd" name="nombre_upd" autocomplete="false" value="<?php echo $datosuser['nombre'];?>" required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Pais:</label>
                                             <select class="form-control" name="pais_upd" id="pais_upd">
                                                <option value="null">Seleccione un pais</option>
                                                <?php foreach($pais as $paises) { ?>
                                                <option value="<?php echo $paises->nombre; ?>">
                                                   <?php echo $paises->nombre; ?>
                                                </option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label>Numero (Sin prefijo / +1):</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><span id = "spanprefijo_upd">+1</span></span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="99999999" id="numero_upd" name="numero_upd" > 
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <label>Correo para notificaciones:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-at"></i></span> </div>
                                                <input type="email" class="form-control" placeholder="correo@email.com" id="correonoti_upd" name="correonoti_upd" value="<?php echo $datosuser['correonoti'];?>" required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-4 col-form-label">
                                             <button type="button" class="btn btn-block btn-outline-info" id="" data-toggle="modal" onclick="actualizarpassword_perfil()" >Actualizar contraseña</button>
                                             </label>
                                          </div>
                                        
                                          <div class="form-group">
                                             <label class="col-md-4 col-form-label">
                                             <button type="submit" class="btn btn-block btn-outline-primary" id="">Actualizar datos</button>
                                             </label>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>



                              <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                                 <div class="card card-info">
                                    <div class="card-header"> </div>
                                    <div class="card-body">
                                       <form class="form-horizontal form-bordered form-addusuario">
                                          <div class="form-group">
                                             <label>Nombre:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-info"></i></span> </div>
                                                <input type="text" class="form-control" placeholder="Usuario" id="nombre" name="nombre" autocomplete="false" required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Pais:</label>
                                             <select class="form-control" name="pais" id="pais">
                                                <option value="null">Seleccione un pais</option>
                                                <?php foreach($pais as $paises) { ?>
                                                <option value="<?php echo $paises->nombre; ?>">
                                                   <?php echo $paises->nombre; ?>
                                                </option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label>Numero (Sin prefijo / +1):</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><span id = "spanprefijo">+1</span></span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="99999999" id="numero" name="numero"> 
                                             </div>
                                          </div>
                                          
                                          <div class="form-group">
                                             <label>Correo para notificaciones:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-at"></i></span> </div>
                                                <input type="email" class="form-control" placeholder="correo@email.com" id="correonoti" name="correonoti" required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Usuario (Inicio de sesión):</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                                                <input type="text" class="form-control" placeholder="Username" id="email" name="email" required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Contraseña:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-key"></i></span> </div>
                                                <input type="password" class="form-control" placeholder="***********" id="password" name="password" minlength="5" maxlength="15" required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Vencimiento:</label>
                                             <div class="input-group">

                                                <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="fechav" name="fechav" value="<?php echo date("Y-m-d"); ?>"  required>
                                                <div class="invalid-tooltip">El campo es requerido.</div>

                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-2 col-form-label">
                                             <button type="submit" class="btn btn-block btn-outline-primary" id="">Crear usuario</button>
                                             </label>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="custom-content-above-credito" role="tabpanel" aria-labelledby="custom-content-above-credito-tab">
                                 <div class="card card-info">
                                    <div class="card-header"> </div>
                                    <div class="card-body">
                                       <div class="row">


                                          
                                          <div class="col-md-12">
                                             <div class="card card-info">
                                                <div class="card-header"> <span>Saldo General</span> </div>
                                                <div class="card-body">
                                                   <form class="form-horizontal form-bordered form-saldo_general">
                                                      <div class="form-group">
                                                         <label>Usuarios:</label>
                                                         <select class="form-control" name="selecusuariosaldogeneral" id="selecusuariosaldogeneral">
                                                            <option value="selectuser">Seleccione un Usuario</option>
                                                            <?php  foreach ($usuarios as $user) { ?>
                                                            <option value="<?php echo $user->idusuario; ?>">
                                                               <?php echo $user->nombre . " (" . $user->email .")"; ?>
                                                            </option>
                                                            <?php } ?>
                                                         </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Saldo</label>
                                                        <div class="input-group">
                                                           <div class="input-group-prepend">
                                                              <span class="input-group-text"><i class="fa fa-usd"></i></span>
                                                           </div>
                                                           <input type="number" step="any" class="form-control" placeholder="0.25" id="saldo_general" min="0" name="saldo_general" value="" required>
                                                        </div>
                                                     </div> 
                                                      <div class="form-group">
                                                         <label class="col-md-6 col-form-label">
                                                         <button type="submit" class="btn btn-block btn-outline-primary" id="">Guardar</button>
                                                         </label>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>


                                          <div class="col-md-6">
                                             <div class="card card-info">
                                                <div class="card-header"> <span>Llamadas (Call - Passcode)</span> </div>
                                                <div class="card-body">
                                                   <form class="form-horizontal form-bordered form-credcall">
                                                      <div class="form-group">
                                                         <label>Usuarios:</label>
                                                         <select class="form-control" name="selecusuariocall" id="selecusuariocall">
                                                            <option value="selectuser">Seleccione un Usuario</option>
                                                            <?php  foreach ($usuarios as $user) { ?>
                                                            <option value="<?php echo $user->idusuario; ?>">
                                                               <?php echo $user->nombre . " (" . $user->email .")"; ?>
                                                            </option>
                                                            <?php } ?>
                                                         </select>
                                                      </div>
                                                      <div class="form-group">
                                                         <label>Cantidad Call:</label>
                                                         <div class="input-group">
                                                            <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-phone"></i></span> </div>
                                                            <input type="number" class="form-control" placeholder="0" id="cantidadcall" name="cantidadcall" onKeyPress="return soloNumeros(event)" required>
                                                            <div class="invalid-tooltip">El campo es requerido.</div>
                                                         </div>
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="col-md-6 col-form-label">
                                                         <button type="submit" class="btn btn-block btn-outline-primary" id="">Guardar</button>
                                                         </label>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="card card-info">
                                                <div class="card-header"> <span>SMS Sender</span> </div>
                                                <div class="card-body">
                                                   <form class="form-horizontal form-bordered form-credsms" novalidate>
                                                      <div class="form-group">
                                                         <label>Usuarios:</label>
                                                         <select class="form-control" name="selecusuariosms" id="selecusuariosms">
                                                            <option value="selectuser">Seleccione un Usuario</option>
                                                            <?php  foreach ($usuarios as $user) { ?>
                                                            <option value="<?php echo $user->idusuario; ?>">
                                                               <?php echo $user->nombre . " (" . $user->email .")"; ?>
                                                            </option>
                                                            <?php } ?>
                                                         </select>
                                                      </div>
                                                      <div class="form-group">
                                                         <label>Cantidad SMS:</label>
                                                         <div class="input-group">
                                                            <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-comments"></i></span> </div>
                                                            <input type="number" class="form-control" placeholder="0" id="cantidadsms" name="cantidadsms" onKeyPress="return soloNumeros(event)" required>
                                                            <div class="invalid-tooltip">El campo es requerido.</div>
                                                         </div>
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="col-md-6 col-form-label">
                                                         <button type="submit" class="btn btn-block btn-outline-primary" id="">Guardar</button>
                                                         </label>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>-->
                                       </div>
                                    </div>
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

      <div class="modal fade" id="modal_detalle_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Detalles de usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body_detalle_user">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div> 

      <div class="modal fade" id="modal_editar_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modificar contraseña</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body_editar_password">

               <div class="loader-block loader-block-editar_password"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>
               
                <div class="card-body">
                  <form class="form-horizontal form-bordered form-editar_password" style="display: none;">
                     <div class="form-group">
                        <label>Usuario (Inicio de sesión):</label>
                        <div class="input-group">
                           <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                           <input type="text" class="form-control" placeholder="Username" id="email_editar_password" name="email_editar_password" readonly required>
                           <div class="invalid-tooltip">El campo es requerido.</div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Contraseña:</label>
                        <div class="input-group">
                           <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-key">  </i></span> </div>
                           <input type="password" class="form-control" placeholder="***********" id="password_editar_password" name="password_editar_password" minlength="5" maxlength="15" required>
                           <div class="invalid-tooltip">El campo es requerido.</div>
                        </div>
                     </div>
                     <div class="form-group">
                       <label class="col-md-6 col-form-label">
                         <button type="submit" class="btn btn-block btn-outline-primary" id="">Actualizar contraseña</button>
                       </label>
                      </div>
                  </form> 
                </div>

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
       </div>

      <div class="modal fade" id="modal_editar_vencimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modificar vencimiento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body_editar_vencimiento">
              <div class="loader-block loader-block-editar_vencimiento"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>
               
                <div class="card-body">
                  <form class="form-horizontal form-bordered form-editar_vencimiento" style="display: none;">
                     <div class="form-group">
                        <label>Usuario (Inicio de sesión):</label>
                        <div class="input-group">
                           <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
                           <input type="text" class="form-control" placeholder="Username" id="email_editar_vencimiento" name="email_editar_vencimiento" readonly required>
                           <div class="invalid-tooltip">El campo es requerido.</div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Vencimiento:</label>
                        <div class="input-group">                         
                           <input type="date" min="<?php echo date("Y-m-d"); ?>" class="form-control" id="fechav_editar_vencimiento" name="fechav_editar_vencimiento" value=""  required>
                        </div>
                     </div>
                     <div class="form-group">
                       <label class="col-md-6 col-form-label">
                         <button type="submit" class="btn btn-block btn-outline-primary" id="">Actualizar fecha</button>
                       </label>
                      </div>
                  </form> 
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
      <strong>Copyright &copy; <?php echo date('Y');  ?> <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong> Todos los derechos reservados
      <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 2.0 </div>
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
<script src="<?php echo base_url();?>/public/assets/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src=".<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/usuarios.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/clipboard.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/header.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
     
     $("#pais_upd").val("<?=$datosuser['pais']?>")
     changepais() 
      
     setTimeout(function() {
       $(".theme-loader").fadeOut("slow");
     }, 500)
     $("#title").html($("#title").html() + " .::. Usuarios")
     $(".li-config").addClass('active')
     $(".li-usuarios").addClass('active')
     $(".nav-treeview-config").css('display', 'block')
   });
   $('select#pais').change(function() {
     var data_form = {
       pais: $("#pais").val()
     }
     $.ajax({
       url: "../configurar/paises/mostrarprefijo",
       method: "POST",
       data: data_form,
       dataType: 'json',
       beforeSend: function() {
         //$('#reloadIcloud').html('<img src="../public/assets/server/img/loading.gif" />');
       },
       success: function(response) {
         
         if(response['prefijo'] == null) {
           $("#spanprefijo").html("+1")
         } else {
           $("#spanprefijo").html(response['prefijo'])
           
         }
       }
     })
   });

   function changepais(){



      var data_form = {
       pais: $("#pais_upd").val()
     }
     $.ajax({
       url: "../configurar/paises/mostrarprefijo",
       method: "POST",
       data: data_form,
       dataType: 'json',
       beforeSend: function() {
         //$('#reloadIcloud').html('<img src="../public/assets/server/img/loading.gif" />');
       },
       success: function(response) {
         let num = "<?=$datosuser['numero']?>";
         let numero = num.replace(response['prefijo'],'')
         if(response['prefijo'] == null) {
           $("#spanprefijo_upd").html("+1")
         } else {
           $("#spanprefijo_upd").html(response['prefijo'])
           $("#numero_upd").val(numero)
         }
       }
     })

   }

   $('select#pais_upd').change(function() {
     changepais()
   });
 


   $('#selecusuariosaldogeneral').change(function() {
     var data_form = {
       idusuario: $("#selecusuariosaldogeneral").val()
     }
     if(data_form.idusuario == "selectuser") {
       $("#saldo_general").val("");
     } else if(data_form.idusuario != "selectuser") {
       $.ajax({
         url: "usuarios/getusuario",
         method: "POST",
         data: data_form,
         dataType: 'json',
         beforeSend: function() {},
         success: function(response) {
           $("#saldo_general").val(parseFloat(response['saldo_general']).toFixed(2));
         }
       })
     }
   });

   $('#selecusuariocall').change(function() {
     var data_form = {
       idusuario: $("#selecusuariocall").val()
     }
     if(data_form.idusuario == "selectuser") {
       $("#cantidadcall").val("");
     } else if(data_form.idusuario != "selectuser") {
       $.ajax({
         url: "usuarios/getusuario",
         method: "POST",
         data: data_form,
         dataType: 'json',
         beforeSend: function() {},
         success: function(response) {
           $("#cantidadcall").val(response['credcall']);
         }
       })
     }
   });
   $('#selecusuariosms').change(function() {
     var data_form = {
       idusuario: $("#selecusuariosms").val()
     }
     if(data_form.idusuario == "selectuser") {
       $("#cantidadsms").val("");
     } else if(data_form.idusuario != "selectuser") {
       $.ajax({
         url: "usuarios/getusuario",
         method: "POST",
         data: data_form,
         dataType: 'json',
         beforeSend: function() {},
         success: function(response) {
           $("#cantidadsms").val(response['credsms']);
         }
       })
     }
   });


   function actualizarpassword_perfil(){

      $(".form-editar_password").hide()
      $("#modal_editar_password").modal('show'); 
      $("#password_editar_password").val("")
      let iduser = "<?=$datosuser['idusuario']?>";
      var data_form = {
        idusuario :iduser      
      }
    
       var url_php = 'usuarios/getusuario';
       $.ajax({
           type:'POST',
           url: url_php,
           data: data_form,
           dataType: 'json',
           async: true,
           beforeSend: function() {
         
           },
       }).done(function ajaxDone(res){

         $(".loader-block-editar_password").hide()
         $(".form-editar_password").show()
         $("#email_editar_password").val(res['email'])


       })
   }
   

   
   function soloNumeros(e) {
     var key = window.event ? e.which : e.keyCode;
     if(key < 48 || key > 57) {
       e.preventDefault();
     }
   }
   
   
   
   
</script>
</body>
</html>
