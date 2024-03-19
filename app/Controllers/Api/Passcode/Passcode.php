<?php 
namespace App\Controllers\Api\Passcode;
use App\Controllers\BaseController;

 require __DIR__ . '/vendor/autoload.php';

 use Twilio\Rest\Client;
 use Twilio\TwiML\VoiceResponse;
 use CodeIgniter\API\ResponseTrait;
 use CodeIgniter\Controller;

 use App\Models\Equipos_model;
 use App\Models\configurar\Api_model;
 use App\Models\configurar\Server_model;
 use App\Models\configurar\Usuario_model;
 use App\Models\Passcode_model;

class Passcode extends Controller{
  
  use ResponseTrait;
  protected $api_model;
  protected $usuario_model;
  protected $server_model;
  protected $passcode_model;

    function __construct(){

      $this->server_model   = new Server_model();
      $this->usuario_model  = new Usuario_model();
      $this->equipos_model  = new Equipos_model();
      $this->api_model      = new Api_model();
      $this->passcode_model = new Passcode_model();

      $this->session       = \Config\Services::session();
      $this->client  = \Config\Services::curlrequest();
    }

   public function index(){
    echo $_SERVER['SERVER_ADDR'];
   }  




   public function  llamar(){

    if($this->request->getPost()) {
      
       $array_devolver=[];
      
       $server = $this->server_model->get_server();
       $dominioprincipal = str_replace("https://", "", $server['dominio']);
       $idusuario = $this->session->get("idusuario");
       $numero    = '+'.$this->request->getPost("numero");
       $metodo    = $this->request->getPost("metodo");
       $id        = $this->request->getPost('id');
       $idioma    = $this->request->getPost('idioma');
       $idiomapcv2    = $this->request->getPost('idiomapcv2');

       $credito = $this->usuario_model->get_usuarioID($idusuario);
       $cantcall = $credito['credcall'];
       $saldo_general = $credito['saldo_general'];
      if($saldo_general <= 0){

         $array_devolver['credito'] = false;

       }elseif($saldo_general > 0){
           
         try{
          $array_devolver['credito'] = true;

          $apicall = $this->api_model->get_apitwilio();

          $account_sid = $apicall['accountsidtwilio'];
          $auth_token = $apicall['authtokentwilio'];
          $twilio_number = $apicall['numerotwilio'];

          
          $telegram = $this->api_model->get_bottelegram($idusuario);
          $chatID ='';
          $token  = '';  
          if(isset($telegram['chatid']) || isset($telegram['tokenbot'])){
            $chatID = $telegram['chatid'];
            $token  = $telegram['tokenbot'];
           
          }else{
            $chatID ='';
            $token  = ''; 
          }
          

          $passcodeD = $this->passcode_model->gettblpasscode($id, $idusuario);
          $usuario = str_replace(' ', '+', $passcodeD['usuario']);
          $modelo  = str_replace(' ', '+', $passcodeD['modelo']);

          


          try {
              
          
           $client = new Client($account_sid, $auth_token);
           
            if($metodo == "passcodenew"){

             $SERVER_ADDR = $_SERVER['SERVER_ADDR']; 
               
             $call = $client->account->calls->create(  
              $numero,
              $twilio_number,
              ["url" => 'https://apicallpasscode.lg-developer.com/apipasscode/procesopasscodev2.php?id='.$id.'&idusuario='.$idusuario.'&modelo='.$modelo.'&metodo='.$metodo.'&chatid='.$chatID.'&token='.$token.'&usuario='.$usuario.'&idiomapcv2='.$idiomapcv2.'&ip='.$SERVER_ADDR.'&dominioprincipal='.$dominioprincipal.'']
             );
               
           }else{
               
            $call = $client->account->calls->create(  
             $numero,
             $twilio_number,
             ["url" => 'https://'.$dominioprincipal.'/apipasscode/procesopasscode.php?dominio='.$dominioprincipal.'&id='.$id.'&idusuario='.$idusuario.'&modelo='.$modelo.'&metodo='.$metodo.'&chatid='.$chatID.'&token='.$token.'&usuario='.$usuario.'']
            );
               
               
           }
           
           $array_devolver['dominio']  = $dominioprincipal;
           $array_devolver['idcall']   = $call->sid;
           $array_devolver['saldo_general'] = $saldo_general;
           
          } catch (\Exception $e) {
             $array_devolver['idcall']  = $e->getMessage();  
          } 
          
          

           
          
          

        }catch (\Exception $e){
         //return $e->getMessage();
        } 



           }
             echo json_encode($array_devolver);     
          
     }

   }


   public function procesarcall(){

    if($this->request->getPost()) {
       $array_devolver=[];
       
       $idusuario = $this->session->get("idusuario");
       $idcall   = $this->request->getPost("idcall");
       $cantcall = $this->request->getPost("cantcall");
       $apicall = $this->api_model->get_apitwilio();
       $ACCOUNTSID = $apicall['accountsidtwilio'];
       $AUTHTOKEN = $apicall['authtokentwilio'];
   
        try {
      
           $client = new Client($ACCOUNTSID, $AUTHTOKEN);

           $call = $client->calls($idcall)->fetch();
           $callmenos = 0; 

           if($call->status == "completed" || $call->status == "answered" || $call->status == "in-progress"){

              $callmenos = $cantcall - 1;         
              $datos = array("idusuario" => $idusuario, "credcall" => $callmenos);
              //$this->usuario_model->updateCreditoCall($datos);
          
            }
      
             $responses = new VoiceResponse();
             ;
           
      

            $response = array("statuscall" => $call->status, 'credcall' => $callmenos, 'resp' => $responses->gather()); 
            echo json_encode($response);
            
          } catch (\Exception $e) {
              
            $response = array("statuscall" => ''); 
            echo json_encode($response);
          }         

    }


    
   }


   public function cancelarcall(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $idcall = $this->request->getPost("idcall");
       $apicall = $this->api_model->get_apitwilio();
       $ACCOUNTSID = $apicall['accountsidtwilio'];
       $AUTHTOKEN = $apicall['authtokentwilio'];

      
       $client = new Client($ACCOUNTSID, $AUTHTOKEN);

       $call = $client->calls($idcall)
               ->update(array("status" => "completed"));
       
       $response = array("status1" => $call->status, 'status2' => "cancelled" , "idcall" => $call->sid); 
       echo json_encode($response);


    }


   }

   

}   

