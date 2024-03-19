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
               <li class="breadcrumb-item"><a href="#">Servidor</a></li>
               <li class="breadcrumb-item active">Configurar</li>
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
                  <h3 class="card-title">Configuraciones de Servidor</h3>
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
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <li class="nav-item">
                              <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Servidor</a>
                           </li>
                           <?php }?>
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <li class="nav-item">
                              <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Cpanel</a>
                           </li>
                           <?php }?>
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <li class="nav-item">
                              <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Twilio</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link " id="custom-content-above-callcenter-tab" data-toggle="pill" href="#custom-content-above-callcenter" role="tab" aria-controls="custom-content-above-callcenter" aria-selected="false">Call - Center (Audios)</a>
                           </li>
                           <?php }?>
                           <li class="nav-item">
                              <a class="nav-link <?php if($sessionrol == "usuario"){  echo 'active'; }?>" id="custom-content-above-telegram-tab" data-toggle="pill" href="#custom-content-above-telegram" role="tab" aria-controls="custom-content-above-telegram" aria-selected="false">Telegram</a>
                           </li>                        
                        </ul>
                        <br>
                        <div class="tab-content" id="custom-content-above-tabContent">
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                              <div class="card card-info">
                                 <div class="card-header">
                                 </div>
                                 <div class="card-body">
                                    <form class="form-horizontal form-bordered form-setserver">
                                       <div class="form-group">
                                          <label>Descripción:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="Nombre del server" id = "descripcionserver" name="descripcionserver" value="<?php if(!empty($server['descripcionserver'])): echo $server['descripcionserver']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <div class="form-group" style="display: none;">
                                          <label>Estado SSL:</label>
                                          <select class="form-control" name="sslserv" id="sslserv">
                                             <?php if($server['statussl'] == "ssl"){ ?>
                                             <option value="ssl">Activado</option>
                                             <option value="nossl">Desactivado</option>
                                             <?php }elseif($server['statussl'] == "nossl"){ ?>
                                             <option value="nossl">Desactivado</option>
                                             <option value="ssl">Activado</option>
                                             <?php }else{ ?>
                                             <option value="ssl">Activado</option>
                                             <option value="nossl">Desactivado</option>
                                             <?php } ?>
                                          </select>
                                          <!-- /.input group -->
                                       </div>
                                       <div class="form-group">
                                          <label>Dominio:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="https//dominio.com" id = "dominioserver" name="dominioserver" value="<?php if(!empty($server['dominio'])): echo $server['dominio']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>URL access:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="https//urlaccess.com" id = "urlaccess" name="urlaccess" value="<?php if(!empty($server['urlaccess'])): echo $server['urlaccess']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Token access:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "token_access" name="token_access" value="<?php if(!empty($server['token_access'])): echo $server['token_access']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div> 
                                       
                                       <div class="form-group">
                                          <label>KEY API CHECK:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="xxx-xxx-xxx-xxx" id = "key_api_check" name="key_api_check" value="<?php if(!empty($server['key_api_check'])): echo $server['key_api_check']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div> 

                                       <div class="form-group">
                                          <label>Noticación de soporte:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                             </div>
                                             <textarea class="form-control m-b-10" id="msg_notificacion" name="msg_notificacion" rows="2" placeholder="" value="<?php if(!empty($server['msg_notificacion'])): echo $server['msg_notificacion']; endif;?>" ><?php if(!empty($server['msg_notificacion'])): echo $server['msg_notificacion']; endif;?></textarea>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>    

                                       <div class="form-group">
                                          <label>Estado de notificaciones:</label>
                                          <select class="form-control" name="status_msg_notificacion" id="status_msg_notificacion">
                                             <?php if($server['status_msg_notificacion'] == 1){ ?>
                                             <option value="1">Activado</option>
                                             <option value="0">Desactivado</option>
                                             <?php }elseif($server['status_msg_notificacion'] == 0){ ?>
                                             <option value="0">Desactivado</option>
                                             <option value="1">Activado</option>
                                             <?php } ?>
                                          </select>
                                          <!-- /.input group -->
                                       </div>                                                                                                                     
                                       <div class="form-group">
                                          <label class="col-md-2 col-form-label">
                                          <button type="submit" class="btn btn-block btn-outline-primary" id="">Guardar</button>
                                          </label>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <?php }?>
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                              <div class="card card-info">
                                 <div class="card-header">
                                 </div>
                                 <div class="card-body">
                                    <form class="form-horizontal form-bordered form-apicpanel">
                                       <div class="form-group">
                                          <label>URL Hosting (CPanel):</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="https://hostingcpanel.com:2083" id = "rutacpanelapi" name="rutacpanelapi" value="<?php if(!empty($apicpanel['rutacpanelapi'])): echo $apicpanel['rutacpanelapi']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>IP Hosting (CPanel):</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-server"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="0.0.0.0" id = "ip_cpanel" name="ip_cpanel" value="<?php if(!empty($apicpanel['ip_cpanel'])): echo $apicpanel['ip_cpanel']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>  
                                       <div class="form-group">
                                          <label>Dominio principal sin https (CPanel):</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-server"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="domain.com" id = "dominio_cpanel" name="dominio_cpanel" value="<?php if(!empty($apicpanel['dominio_cpanel'])): echo $apicpanel['dominio_cpanel']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>                                                                             
                                       <div class="form-group">
                                          <label>Usuario:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                             </div>
                                             <input type="text" class="form-control" placeholder="Usuario CPanel" id = "usercpanelapi" name="usercpanelapi" value="<?php if(!empty($apicpanel['usercpanelapi'])): echo $apicpanel['usercpanelapi']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label>Contraseña:</label>
                                          <div class="input-group">
                                             <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                             </div>
                                             <input type="password" class="form-control" placeholder="Contraseña CPanel" id = "passcpanelapi" name="passcpanelapi" value="<?php if(!empty($apicpanel['passcpanelapi'])): echo $apicpanel['passcpanelapi']; endif;?>" required>
                                             <div class="invalid-tooltip">El campo es requerido.</div>
                                          </div>
                                       </div>
                                       <hr>
                                             <div class="row">
                                                <div class="form-group col-md-6">
                                                   <label>NAMESERVER 1: </label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="url.nameserver1.com" id = "nameserver1" name="nameserver1" value="<?php if(!empty($apicpanel['nameserver1'])): echo $apicpanel['nameserver1']; endif;?>">
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label>NAMESERVER 2: </label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="url.nameserver2.com" id = "nameserver2" name="nameserver2" value="<?php if(!empty($apicpanel['nameserver2'])): echo $apicpanel['nameserver2']; endif;?>">
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                               </div> 
                                              <div class="row">  
                                                <div class="form-group col-md-6">
                                                   <label>NAMESERVER 3: </label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="url.nameserver3.com" id = "nameserver3" name="nameserver3" value="<?php if(!empty($apicpanel['nameserver3'])): echo $apicpanel['nameserver3']; endif;?>">
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label>NAMESERVER 4: </label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="url.nameserver3.com" id = "nameserver4" name="nameserver4" value="<?php if(!empty($apicpanel['nameserver4'])): echo $apicpanel['nameserver4']; endif;?>">
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div> 
                                               </div>                                                
                                            







                                       <div class="form-group">
                                          <label class="col-md-2 col-form-label">
                                          <button type="submit" class="btn btn-block btn-outline-primary" id="" >Guardar</button>
                                          </label>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <?php }?> 
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="card card-info">
                                       <div class="card-header">
                                          <span>Call - Center</span>
                                       </div>
                                       <div class="card-body">
                                          <form class="form-horizontal form-bordered form-formcall">                                            
                                             <div class="row twilio">
                                                <div class="form-group col-md-6">
                                                   <label>ACCOUNT SID: </label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="A**************" id = "accountsidtwilio" name="accountsidtwilio" value="<?php if(!empty($apitwilio['accountsidtwilio'])): echo $apitwilio['accountsidtwilio']; endif;?>" required>
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label>AUTH TOKEN:</label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="c**************" id = "tokenauthtwilio" name="tokenauthtwilio" value="<?php if(!empty($apitwilio['authtokentwilio'])): echo $apitwilio['authtokentwilio']; endif;?>" required>
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label>Numero (Remitente):</label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                      </div>
                                                      <input type="text" class="form-control" placeholder="+1800000000000" id = "numerotwilio" name="numerotwilio" value="<?php if(!empty($apitwilio['numerotwilio'])): echo $apitwilio['numerotwilio']; endif;?>" required>
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   <label>Costo (Por llamada):</label>
                                                   <div class="input-group">
                                                      <div class="input-group-prepend">
                                                         <span class="input-group-text"><i class="fa fa-usd"></i></span>
                                                      </div>

                                                      <input type="number" step="any" class="form-control" placeholder="0.1" id = "costo" name="costo"  min="0" value="<?php if(!empty($apitwilio['costo'])): echo round($apitwilio['costo'], 2); endif;?>" required>
                                                      <div class="invalid-tooltip">El campo es requerido.   </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-md-4 col-form-label">
                                                <button type="submit" class="btn btn-block btn-outline-primary" id="">Guardar</button>
                                                </label>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>                               
                                 
                              </div>
                           </div>
                           <?php }?>   
                           <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>
                           <div class="tab-pane fade" id="custom-content-above-callcenter" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
                              <?php }elseif($sessionrol == "usuario"){  ?>  
                              <div class="tab-pane fade show active" id="custom-content-above-callcenter" role="tabpanel" aria-labelledby="custom-content-above-settings-tab">
                                 <?php }  ?>  
                                 <?php  if($sessionrol == "administrador" || $sessionrol == "master"){ ?>  
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="card card-info">
                                          <div class="card-header">
                                             <h3 class="card-title"></h3>
                                          </div>
                                          <div class="card-body" style="padding: 0.75rem !important;">
                                             <form class="form-horizontal form-bordered form-audiocall" method="post">
                                                <div class="form-group row">
                                                   <label class="col-md-2 col-form-label">Titulo</label>
                                                   <div class="col-md-8">
                                                      <div class="input-group">
                                                         <div class="input-group-prepend" style="width: 100%;">
                                                            <span class="input-group-text"><i class="fa fa-text-height"></i></span>
                                                            <input type="text" class="form-control"  id="titulo" name = "titulo" placeholder="Dispositivo ubicado" required>
                                                         </div>
                                                         <div class="invalid-tooltip">El campo es requerido.</div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-2 col-form-label">Ruta</label>
                                                   <div class="col-md-8">
                                                      <div class="invalid-tooltip">El campo es requerido.</div>
                                                      <textarea class="form-control m-b-10" id="rutaaudio" name = "rutaaudio" rows="2" placeholder="Ruta de audio (https://www.miaudio.com/audio.mp3)" required></textarea>
                                                      <br>
                                                   </div>
                                                   <BR>
                                                </div>
                                                <div class="form-group row">
                                                   <label class="col-md-2 col-form-label">
                                                   <button type="submit" class="btn btn-block btn-outline-primary">Guardar</button>
                                                   </label>
                                                </div>
                                             </form>
                                             <hr>
                                             <form class="form-horizontal form-bordered form-buscaraudiocall" method="post" style="padding-left: 0px!important;">
                                                <div class="form-group row">
                                                   <div class="col-md-6" style="border-left: 0px!important; /*padding-left: 0px!important;*/">
                                                      <div class="row">
                                                         <div class="col-sm-9">
                                                            <div class="input-group input-group-sm">
                                                               <input type="text" class="form-control" id = "buscaraudiocall" placeholder="Titulo/Ruta">
                                                               <div class="input-group-append">
                                                                  <div class="btn btn-primary" style="background-color: #28a745!important;">
                                                                     <i class="fas fa-search"></i>
                                                                  </div>
                                                               </div>
                                                               <button type="button" class="btn btn-default btn-sm" id="buttonreloadcall"><i class="fas fa-sync-alt"></i></button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </form>
                                             <br>
                                             <div class="table-responsive" style="overflow: auto; height: 400px;">
                                                <table class="table table-bordered m-b-0" id="table">
                                                   <thead>
                                                      <tr>
                                                         <th data-field="id" data-sortable="true">#</th>
                                                         <th><span>Titulo</span></th>
                                                         <th><span>Ruta</span></th>
                                                         <th><span>Acción</span></th>
                                                      </tr>
                                                   </thead>
                                                   <tbody id="bodyTable">
                                                      <div id="reloadIcloud"></div>
                                                   </tbody>
                                                </table>
                                             </div>
                                             <div class="md-modal md-effect-1" id = "modalupdateaudio">
                                                <div class="md-content">
                                                   <h3 style="opacity: 1!important; color: white;">Actualizar audio</h3>
                                                   <div id = "bodymodal">
                                                      <form class="form-horizontal form-bordered form-editaudio" method="post">
                                                         <div class="form-group row">
                                                            <label class="col-md-2 col-form-label">Titulo</label>
                                                            <div class="col-md-8">
                                                               <div class="input-group">
                                                                  <div class="input-group-prepend" style="width: 100%;">
                                                                     <span class="input-group-text"><i class="fas fa-link"></i></span>
                                                                     <input type="text" class="form-control" id="idaudiocallcenter" style="display: none;" />
                                                                     <input type="text" class="form-control"  id="tituloM" name = "tituloM" placeholder="Dispositivo ubicado" required>
                                                                  </div>
                                                                  <div class="invalid-tooltip">El campo es requerido.</div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="form-group row">
                                                            <label class="col-md-2 col-form-label">Ruta</label>
                                                            <div class="col-md-8">
                                                               <div class="invalid-tooltip">El campo es requerido.</div>
                                                               <textarea class="form-control m-b-10" id="rutaaudioM" rows="2" placeholder="Ruta de audio (https://www.miaudio.com/audio.mp3)" required></textarea z>
                                                            </div>
                                                         </div>
                                                         <div class="form-group row">
                                                            <label class="col-md-2 col-form-label"></label>
                                                            <label class="col-md-4 col-form-label">
                                                            <button type="submit" class="btn btn-block btn-outline-primary">Guardar</button>
                                                            </label>
                                                         </div>
                                                      </form>
                                                   </div>
                                                   <div id = "footermodal">
                                                      <button type="button" class="btn btn-primary waves-effect md-close" id = "btnmodelcloseuploadaudio">Cerrar</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- /.card-body -->
                                       </div>
                                       <!-- /.card -->
                                    </div>
                                    <div class="md-overlay"></div>
                                 </div>
                              </div>
                              <?php }  ?>  
                              <div class="tab-pane fade <?php if($sessionrol == "usuario"){  echo 'show active'; }?>" id="custom-content-above-telegram" role="tabpanel" aria-labelledby="custom-content-above-telegram-tab">
                                 <div class="card card-info">
                                    <div class="card-header">
                                       Bot Telegram
                                    </div>
                                    <div class="card-body">
                                       <form class="form-horizontal form-bordered form-bottelegram">
                                          <div class="form-group">
                                             <label>Chat ID:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="4554XXXX" id = "chatid" name="chatid" value="<?php if(!empty($apibottelegram['chatid'])): echo $apibottelegram['chatid']; endif;?>" required>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Token:</label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="54014584:AAXXX" id = "tokenbot" name="tokenbot" value="<?php if(!empty($apibottelegram['tokenbot'])): echo $apibottelegram['tokenbot']; endif;?>" required>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-4 col-form-label">
                                             <button type="submit" class="btn btn-block btn-outline-primary" id="" >Guardar</button>
                                             </label>
                                          </div>
                                       </form>
                                       <br>
                                       <h2><a href="https://www.youtube.com/watch?v=i3-qjBE_xKQ" target="_bank">Crear Bot Telegram y token</a> :: <a href="https://telegram.me/myidbot" target="_bank">Obtener Chat ID</a></h2>
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
</section>
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
<script src="<?php echo base_url();?>/public/assets/server/js/modal.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/classie.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/modalEffects.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src=".<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/apis.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/cpanelapi.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/configserver.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/servidor/callcenter.js"></script>
<script type="text/javascript">
   $(document).ready(function() { 
       setTimeout(function(){
        $(".theme-loader").fadeOut("slow");           
       }, 500)
      
      $("#title").html($("#title").html() + " .::. Servidor")
   
      $(".li-servidor").addClass('active')
      $(".li-config").addClass('active')
      $(".nav-treeview-config").css('display','block')
   
      


   

    })  
   
   
   
   
   
   
   
   
    $("#btnmodelcloseuploadaudio").on('click', function(){
       $(".md-overlay").css('opacity','0');
       $(".md-overlay").css('visibility','hidden');
       $("#modalupdateaudio").removeClass("md-show");
       $(".md-show").css("visibility","hidden");
       $(".md-modal").css("visibility","hidden");
   
   
    })
    $(".md-overlay").on('click', function(){
       $(".md-overlay").css('opacity','0')
       $(".md-overlay").css('visibility','hidden')
       $("#modalupdateaudio").removeClass("md-show");
       $(".md-show").css("visibility","hidden");
       $(".md-modal").css("visibility","hidden");
   })
   
   
   
   
  $(document).on("submit", ".form-updsubdominiosquery", function(event){
   
   event.preventDefault();
   
   const Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 3000
   });
   
   
   
    Swal.fire({
       title: 'Estás seguro que deseas realizar esta acción?',
       text: "Esta acción causara cambios en tu base de datos, si esta seguro presiona Si, sino presiona No.",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Si',
       cancelButtonText: 'No'
    }).then((result) => {
   
    if(result.value) {
   
        var data_form = {
           domnuev   : $("#domnuev").val(),
           domviej   : $("#domviej").val()
         } 
   
        var url_php = '../ejecutarquery/executeQuery'; 
        $.ajax({
            type:'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,
            beforeSend: function() {
                 $('#reloadIcloud').html('<img src="../public/assets/server/img/loading.gif" />');
             },
        }).done(function ajaxDone(res){
           $('#reloadIcloud').html(""); 
   
           if(res.query == true){
   
              Toast.fire({
                type: 'success',
                title: '&nbsp; Actualización realizada correctamente.'
              })
   
           }else if(res.query == false){
   
              Toast.fire({
                type: 'error',
                title: '&nbsp; Ocurrio un error, contacta a tu administrador.'
              })
             
           }else{
              
              Toast.fire({
                type: 'error',
                title: '&nbsp; Ocurrio un error 404, contacta a tu administrador.'
              })
           }
         
    
        }).fail(function ajaxError(e){
            console.log(e);
        }).always(function ajaxSiempre(){
            console.log('Final de la llamada ajax.');
        })
        
   
   
   
    }else{
   
    }
   })
   
   
   
   
   })
   
   
   
   
   
   
   $(document).on("submit", ".form-updsubdominiosqueryacort", function(event){
   
   event.preventDefault();
   
   const Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 3000
   });
   
   
   
   Swal.fire({
    title: 'Estás seguro que deseas realizar esta acción?',
    text: "Esta acción causara cambios en tu base de datos, si esta seguro presiona Si, sino presiona No.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
   }).then((result) => {
   
    if(result.value) {
   
        var data_form = {
           domnuev   : $("#domnuevacort").val(),
           domviej   : $("#domviejacort").val()
         } 
   
        
   
        var url_php = '../ejecutarquery/executeQueryAcortador'; 
        $.ajax({
            type:'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,
            beforeSend: function() {
                 $('#reloadIcloud2').html('<img src="../public/assets/server/img/loading.gif" />');
             },
        }).done(function ajaxDone(res){
           $('#reloadIcloud2').html(""); 
   
           if(res.query == true){
   
              Toast.fire({
                type: 'success',
                title: '&nbsp; Actualización realizada correctamente.'
              })
   
           }else if(res.query == false){
   
              Toast.fire({
                type: 'error',
                title: '&nbsp; Ocurrio un error, contacta a tu administrador.'
              })
             
           }else{
              
              Toast.fire({
                type: 'error',
                title: '&nbsp; Ocurrio un error 404, contacta a tu administrador.'
              })
           }
         
    
        }).fail(function ajaxError(e){
            console.log(e);
        }).always(function ajaxSiempre(){
            console.log('Final de la llamada ajax.');
        })
        
   
   
   
    }else{
   
    }
   })
   
   
   
   
   })
   
   
   

   
   
   
   
   
   
   
</script>
</body>
</html>
