<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" href="<?php echo base_url();?>/public/assets/server/img/Aguiila(Solo).png" sizes="40x40">
      <title id = "title"><?php echo $server['descripcionserver'];?> .::. Login</title>
      <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/login/css/bootstrap.min.css">
      <!--<link rel="stylesheet" href="<?php  //echo base_url('/public/assets/fonts/ionicons.min.css')?>">-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
      <!-- <link rel="stylesheet" href="<?php  //echo base_url('/public/assets/fonts/ionicons.min.css')?>">-->
      <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/login/css/Login-Form-Clean.css">
      <style type="text/css">
         body{
         background-image: url("<?php echo base_url();?>/public/assets/server/img/mifondo.png");
         width: 100%;
         height: 100vh;
         background-repeat: no-repeat;
         background-position: center center;
        
         background-attachment: fixed;
         }

           @media only screen and (max-width: 735px) {
             body{

               background-image: url("<?php echo base_url();?>/public/assets/server/img/mifondo.png");
               width:100%;
         height: 100vh;
         background-repeat: no-repeat;
         background-position: center center;
         background-size: cover;
         background-attachment: fixed; 

                       
             }

             .login-clean {
               margin-top: -80px!important;
             }
           }

       
      </style>
      <script type="text/javascript">
         document.oncontextmenu = function(){return false;}
      </script>
   </head>
   <body id = "body" style="">
      <div class="theme-loader" style="height: 100%;width: 100%;background: #fff;position: fixed;z-index: 999999;top: 0;left: 0;" >
         <div class="loader-track" style="left: 50%;top: 50%;position: absolute;display: block;width: 200px;height: 200px; margin: -97px 0 0 -99px;">
            <div class="preloader-wrapper" style="display: inline-block;position: relative;width: 200px;height: 200px;">
               <img src="<?php echo base_url();?>/public/assets/server/img/MacOS.gif" style = "width: 300px; height: 300px;position: absolute; width: 100%;height: 100%;">
            </div>
         </div>
      </div>
      <div class="login-clean" style=" height: 100vh; margin-top: 0px;">
         <form method="post" class="form-signin"  id = "sesion" style="max-width: 455px;"  method="POST" novalidate>
            <!--<div class="col-md-8" >-->
            <div class="form-group">
               <center>
                  <img src="<?php echo base_url();?>/public/assets/server/img/Logotipo2.png" alt="..." class="img-fluid rounded-circle" style = "width: 280px; height:180px; "> 
                  <h4 class="card-title textFont" style="color: white; font-family: system-ui!important"><?php echo $server['descripcionserver'];?></h4>
                  <h5 class="card-title textFont" style="color: white; font-family: system-ui!important">LA COMPETENCIA MAS FUERTE ES UNO MISMO.</h5>
               </center>
            </div>
            <div id="msg_error" class="alert alert-danger msgerror textFont" role="alert" style="display: none; color: red;" ><i class="material-icons" style=" position: absolute;padding:0px;pointer-events: none; color: #red;">clear</i>&nbsp;  <span style="margin-left: 20px;">Please verify your username and / or password..<span></div>
            <div id="msg_error" class="alert alert-danger msgstatuserror" role="alert" style="display: none; color: red;"><i class="material-icons" style=" position: absolute;padding:0px;pointer-events: none; color: #red;">error_outline</i>&nbsp; <span style="margin-left: 20px;">Your user is suspended, contact an administrator.<span></div>
            <div id="msg_error" class="alert alert-danger msgcuenta textFont" role="alert" style="display: none; color: red;"><i class="material-icons" style=" position: absolute;padding:0px;pointer-events: none; color: #red;">help_outline</i>&nbsp; <span style="margin-left: 20px;">There is no associated account for this user..<span></div>

            

            <!--<h5><label>Inicio de sesión</label></h5>-->
            <!--</div>-->
            <!-- <hr>
               <hr>-->
            <div class="form-group">
               <div class="inner-addon left-addon">
                  <i class="material-icons" style=" position: absolute;padding:8px;pointer-events: none; color: #46b8da;">person</i>            
                  <input class="form-control" type="text" name="user"  id= "user" placeholder="Email" style="padding: 1.375rem 2.75rem!important; font-size: 17px;">
               </div>
            </div>
            <div class="form-group">
               <div class="inner-addon left-addon">
                  <i class="material-icons" style=" position: absolute;padding:8px;pointer-events: none; color: #46b8da;">vpn_key</i> 
                  <input class="form-control" type="password" name="password" id= "password" placeholder="Password" style="padding: 1.375rem 2.75rem!important; font-size: 17px;" >
               </div>
            </div>
            <div class="form-group">
               <button class="btn btn-info btn-block" style="font-size: 17px; color: white;" type="submit">Login</button>
            </div>
            <center>
               <div style = "color: gray;font-size: 15px;" id = "imgloaderlogin"></div>
            </center>
            <hr>
            <span class="forgot" style="color: white; font-size: 17px; font-family: system-ui!important" id = "title2">Copyright &copy; <?php  echo date('Y'); ?> &mdash; <?php echo $server['descripcionserver'];?> <br></span>
            <br>
            <div id="loader"></div>
         </form>
      </div>
      <script src="<?php echo base_url();?>/public/assets/login/js/jquery.min.js"></script>
      <script src="<?php echo base_url();?>/public/assets/login/js/bootstrap.min.js"></script>
      <script>
         $(document).ready(function() {
             setTimeout(function(){
         $(".theme-loader").fadeOut("slow");           
         }, 500)
           // $('#body').fadeIn(1200);
         }); 

        $(document).on("submit", ".form-signin", function(event){
    
    event.preventDefault();

    $("#imgloaderlogin").html('<img src="public/assets/server/img/loading.gif" />')



    event.preventDefault();
    

   var $form = $(this);
   
   var data_form = {
        email: $("#user").val(),
        password: $("#password").val() 
    }
    
    var url_php = 'login/iniciar_sesion_post';

    
    $.ajax({
        type:'POST',
        url: url_php,
        data: data_form,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(res){
      console.log(res)

      if(res.cuenta == true){

        if(res.statuscuenta == true){

          if(res.logueado == true){

           window.location="equipos";
          }else if(res.logueado == false){
           $(".msgerror").show('slow');
            setTimeout(function() {
             $('.msgerror').hide('slow');
            }, 4000)
           $("#imgloaderlogin").html("");

           
          }

        }if(res.statuscuenta == false){           
           $(".msgstatuserror").show('slow');
           setTimeout(function() {
            $('.msgstatuserror').hide('slow');
           }, 4000)
            $("#imgloaderlogin").html(""); 
        }

      }else if(res.cuenta == false){

            $(".msgcuenta").show('slow');
           setTimeout(function() {
            $('.msgcuenta').hide('slow');
           }, 4000)
            $("#imgloaderlogin").html(""); 
      }

    })
    .fail(function ajaxError(e){
        console.log(e);
    })
    .always(function ajaxSiempre(){
        //console.log('Final de la llamada ajax.');
    })
    return false;
}); 


         
         
      </script>
   </body>
</html>