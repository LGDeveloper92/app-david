<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1">-->
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title id = "title"><?php  echo $server['descripcionserver']; ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/server/css/component.css"> 
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/server/css/loader.css">  
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <link  rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"
    />

  <link rel="icon" href="<?php echo base_url();?>/public/assets/server/img/Aguiila(Solo).png" sizes="40x40">
  <!-- Google Font: Source Sans Pro -->
  <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->

  <style type="text/css">

   .md-modal{
    border: 3px solid aquamarine;
   } 

   
   a.nav-link.active {
    background: #007bff5c!important;
   }


   .md-modal.md-effect-1.md-show .md-content h3{
    background-color: #28a745!important;
   }
    



    nav.main-header.navbar.navbar-expand.navbar-white.navbar-light {
      background-color: #000000ab!important;
    }


  
   [class*=sidebar-dark-] {
      background-image: url(..//public/assets/server/img/mifondo.png)!important;
      background-position: center!important;
      background-size: 100% 100%!important;
      background-repeat: no-repeat!important;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
      color: white;
    }

    [class*=sidebar-dark-] .sidebar a {
      color:  white;
    }

    .sidebar.os-host.os-theme-light.os-host-resize-disabled.os-host-scrollbar-horizontal-hidden.os-host-scrollbar-vertical-hidden.os-host-transition {
       background-color: #00000052!important;
    }

    .layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]) {
      background-color: #007bff52!important;
    }

    .user-panel.mt-3.pb-3.mb-3.d-flex {
       background-color: #000000d9!important;

    }

    

    #listspan1:hover, #listspan2:hover, #listspan3:hover, #listspan4:hover, #listspan5:hover, #listspan6:hover, #listspan7:hover, #listspan8:hover, #listspan9:hover, #listspan10:hover {

      background: #28a745!important;
      opacity: 0.7!important
      color: white!important;

    }


    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
       -webkit-appearance: none; 
       margin: 0; 
    }

    input[type=number] { -moz-appearance:textfield; }


    div#bodymodal span#listspan1:hover, div#bodymodal span#listspan2:hover, div#bodymodal span#listspan3:hover, div#bodymodal span#listspan4:hover, div#bodymodal span#listspan5:hover, div#bodymodal span#listspan6:hover, div#bodymodal span#listspan7:hover, div#bodymodal span#listspan8:hover, div#bodymodal span#listspan9:hover, div#bodymodal span#listspan10:hover, div#bodymodal span#listspan11:hover, div#bodymodal span#listspan12:hover {

      color: white!important;
    }

   div#modalview {
    /*border: solid rgba(8, 8, 8, 0.21);
    border-radius: 5px;*/
}

   .form-updequipos::-webkit-scrollbar, .form-updusuario::-webkit-scrollbar, .form-emailsender::-webkit-scrollbar,  .form-emailsender2::-webkit-scrollbar, body::-webkit-scrollbar, .table-responsive::-webkit-scrollbar {
    -webkit-appearance: none;
  }

  .form-updequipos::-webkit-scrollbar:vertical, .form-updusuario::-webkit-scrollbar:vertical, .form-emailsender::-webkit-scrollbar:vertical, .form-emailsender2::-webkit-scrollbar:vertical,  body::-webkit-scrollbar:vertical, .table-responsive::-webkit-scrollbar:vertical {
    width:10px;
  }

  .form-updequipos::-webkit-scrollbar-button:increment, .form-updusuario::-webkit-scrollbar-button:increment,  .form-emailsender::-webkit-scrollbar-button:increment,   .form-emailsender2::-webkit-scrollbar-button:increment, .form-updequipos::-webkit-scrollbar-button, body::-webkit-scrollbar-button:increment, body::-webkit-scrollbar-button, .table-responsive::-webkit-scrollbar-button:increment, .table-responsive::-webkit-scrollbar-button {
    display: none;
  } 

  .form-updequipos::-webkit-scrollbar:horizontal, .form-updusuario::-webkit-scrollbar:horizontal,  .form-emailsender::-webkit-scrollbar:horizontal,   .form-emailsender2::-webkit-scrollbar:horizontal, body::-webkit-scrollbar:horizontal, .table-responsive::-webkit-scrollbar:horizontal  {
    height: 10px;
  }

  .form-updequipos::-webkit-scrollbar-thumb, .form-updusuario::-webkit-scrollbar-thumb, .form-emailsender::-webkit-scrollbar-thumb,  .form-emailsender2::-webkit-scrollbar-thumb, body::-webkit-scrollbar-thumb, .table-responsive::-webkit-scrollbar-thumb  {
    background-color: #7979799c;
    border-radius: 20px;
    border: 2px solid #f1f2f3;
  }

  .form-updequipos::-webkit-scrollbar-track, .form-updusuario::-webkit-scrollbar-track, .form-emailsender::-webkit-scrollbar-track, .form-emailsender2::-webkit-scrollbar-track, body::-webkit-scrollbar-track, .table-responsive::-webkit-scrollbar-track {
    border-radius: 10px;  
  }

  .card-info:not(.card-outline)>.card-header {
    background-color: #3c8dbc!important;
  }

  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    background-color : #28a745bf!important;
    color: white;
   }
    

   div.input-group-append .btn .btn-primary {
     background-color: #28a745bf!important;
   }

           div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }


.fileContainer {
    overflow: hidden;
    position: relative;
}

.fileContainer [type=file] {
    cursor: pointer;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 50%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}

.fileContainer {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    /* padding-bottom: 80%; */
    border-style: solid;
    border-color: #f0f2f700;
    background-image: url(..//public/assets/email/img/subir2.gif);
    background-position: center;
    background-size: 163px;
    background-repeat: no-repeat;
}

.fileContainer [type=file] {
    cursor: pointer;
}

#bodymodalemailsender{
  height: 500px;
  overflow: auto;
}

@media only screen and (max-device-width: 736px){

  #bodymodalemailsender{
   height: 370px;
   overflow: auto;
  }

}



 .leaflet-control-container {
    display: block;
  }


div#modalsmsinfo {
    z-index: 10000!important;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">




 
 
  <div class="theme-loader" style="height: 100%;width: 100%;background: #fff;position: fixed;z-index: 999999;top: 0;left: 0;">
        <div class="loader-track" style="left: 50%;top: 50%;position: absolute;display: block;width: 200px;height: 200px; margin: -97px 0 0 -99px;">
            <div class="preloader-wrapper" style="display: inline-block;position: relative;width: 200px;height: 200px;">

               <img src="<?php echo base_url();?>/public/assets/server/img/MacOS.gif" style = "width: 300px; height: 300px;position: absolute; width: 100%;height: 100%;">
            </div>
        </div>
    </div>






<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #007bffc2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" >
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color: white;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!--<a href="index3.html" class="nav-link">Home</a>-->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!--<a href="#" class="nav-link">Contact</a>-->
      </li>

    </ul>

  


    <form class="form-inline ml-3">
     <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

   

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-credit-card" style="font-size: 20px;color: #f4f6f9;"></i>
          <span class="badge badge-info navbar-badge" id="saldo_total" style="font-size: 16px!important; right: -10px!important; top: -4px!important; font-weight: 600!important; color: #f4f6f9; background: orange;"><?php echo round($datosuser['saldo_general'], 2); ?></span>
        </a>
        
      </li>

    <!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments" style="font-size: 20px;color: #f4f6f9;"></i>
          <span class="badge badge-info navbar-badge" id="cantidadsmsicon" style="font-size: 16px!important; right: -10px!important; top: -4px!important; font-weight: 600!important; color: #f4f6f9; background: orange;"><?php //echo $datosuser['credsms']; ?></span>
        </a>
        
      </li>
    


      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-phone" style="font-size: 20px;color: #f4f6f9;"></i>
          <span class="badge badge-primary navbar-badge" id="cantidadcallicon" style="font-size: 16px!important; right: -10px!important;  top:-4px!important; font-weight: 600!important;    color: #f4f6f9;"><?php //echo $datosuser['credcall']; ?></span>
        </a>
        
      </li>-->

       <li class="nav-item dropdown" style="display: none;">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-usd" style="font-size: 20px;color: #17a2b8;"></i>
          <span class="badge badge-warning navbar-badge" id="creditoicon" style="font-size: 16px!important; right: -39px!important;;  top:-4px!important; font-weight: 600!important;    color: white;"></span>
        </a>        
      </li>
     
    </ul>


    </form>


    <ul class="navbar-nav ml-auto" style="">
      <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-apple" style="font-size: 25px;color: white;"></i>     
        </a>
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link">
      <img src="<?php echo base_url();?>/public/assets/server/img/Aguiila(Solo).png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php  echo $server['descripcionserver']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="background-color: #00000047!important;">
        <div class="image">
          <img src="<?php echo base_url();?>/public/assets/server/img/iconuser2.gif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["user"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active" style="background-color: #17a2b8!important;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard-->
                <!--<i class="right fas fa-angle-left"></i>-->
             <!-- </p>
            </a>
          </li>
         <br>-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link li-equipos">
              <i class="fa fa-television"></i>
              <p>
                Equipos
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview nav-treeview-equipos">
              <li class="nav-item">
                <a href="<?php echo base_url();?>/equipos/ingresados" class="nav-link li-ingresados">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Procesando</p>
                </a>
              </li>             
              <li class="nav-item">
                <a href="<?php echo base_url();?>/equipos/agregar" class="nav-link li-agregar">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>             
             </ul>
          </li>
          
        
          
         <li class="nav-item">
            <a href="<?php echo base_url() ?>/reporte" class="nav-link li-reporte">
              <i class="fa fa-apple"></i>
              <p>
                Reporte
              </p>
            </a>
          </li>  
          
        


          <li class="nav-item has-treeview" style="display: none;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Check
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Imei Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Number</p>
                </a>
              </li>
            </ul>
          </li>


          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link li-config">
              <i class="fa fa-cogs fa-spin"></i>
              <p>
                Configuraciones
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">5</span>
              </p>
            </a>
            <ul class="nav nav-treeview nav-treeview-config">
              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/servidor" class="nav-link li-servidor">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Servidor</p>
                </a>
              </li>
             <?php  //if($sessionrol == "administrador"  || $sessionrol == "master"){ ?> 
              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/usuarios" class="nav-link li-usuarios">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <?php //}?> 
             
            <?php  if($sessionrol == "master"){ ?>

              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/smsapi" class="nav-link li-smsapi">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>SMS API</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/checkapi" class="nav-link li-checkapi">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>API CHECK</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/smsplantillas" class="nav-link li-plantillassms">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Plantillas SMS</p>
                </a>
              </li>

            
              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/smtp_config" class="nav-link li-smtp">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Configuración SMTP</p>
                </a>
              </li> 
             <?php }?>   
              
              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/dominios" class="nav-link li-dominios">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Dominios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>/configurar/subdominios" class="nav-link li-subdominios">
                  <i class="fa fa-chevron-right nav-icon"></i>
                  <p>Subdominios</p>
                </a>
              </li> 

             
                          
            </ul>
          </li>  


          <li class="nav-item">
            <a href="<?php echo base_url() ?>/autoremove" class="nav-link li-removeri">
              <i class="fa fa-apple"></i>
              <p>
                Autoremove manual
              </p>
            </a>
          </li>  
         
          <li class="nav-item">
            <a href="<?php echo base_url() ?>/check" class="nav-link li-check">
              <i class="fa fa-check"></i>
              <p>
                Check
              </p>
            </a>
          </li> 
        
          
          
          <li class="nav-item">
            <a href="<?php echo base_url() ?>/codigoacceso" class="nav-link li-codigoacceso">
              <i class="fa fa-unlock-alt"></i>
              <p>
                Código de acceso
              </p>
            </a>
          </li>
          
        
          <li class="nav-item">
            <a href="<?php echo base_url() ?>/ip_blocker" class="nav-link li-ip_blocker">
              <i class="fa fa-ban"></i>
              <p>
                Bloqueador IP (Reporte)
              </p>
            </a>
           </li>   
           
       
      
             
          <li class="nav-item">
            <a href="<?php echo base_url() ?>/login/cerrar_sesion" class="nav-link">
              <i class="fa fa-power-off"></i>
              <p>
                Salir
              </p>
            </a>
          </li>  
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
