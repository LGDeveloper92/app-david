<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Cpanel_model;
use App\Models\configurar\Api_model;
use App\Models\configurar\Usuario_model;

class Servidor extends BaseController {

  protected $server_model;
  protected $cpanel_model;
  protected $api_model;
  protected $usuario_model; 
  protected $sesion; 

  function __construct(){

    $this->server_model   = new Server_model();
    $this->cpanel_model   = new Cpanel_model();
    $this->api_model      = new Api_model();
    $this->usuario_model  = new Usuario_model();

    $this->session = \Config\Services::session();

  }


   public function index(){
     
     $datos['server'] = $this->server_model->get_server();
     $datos['apicpanel'] = $this->cpanel_model->get_cpanelapi();
     $datos['apibottelegram'] = $this->api_model->get_bottelegram($this->session->get("idusuario"));
     $datos['apitwilio'] = $this->api_model->get_apitwilio();
     $datos['sessionrol'] = $this->session->get("rol");     
     $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
     $datos['idusuarioPost'] = $this->session->get("idusuario");


     echo view("inc/header",$datos);
     echo view("configurar/servidor",$datos);


   }




    public function ingresarserver(){

    if($this->request->getPost()) {

       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $sslserv =$this->request->getPost("sslserv");
       $descripcionserver       = $this->request->getPost("descripcionserver");       
       $dominioserver           = $this->request->getPost("dominioserver");
       $urlaccess               = $this->request->getPost("urlaccess");
       $token_access            = $this->request->getPost("token_access");
       $msg_notificacion        = $this->request->getPost("msg_notificacion");
       $status_msg_notificacion = $this->request->getPost("status_msg_notificacion");
       $key_api_check           = $this->request->getPost("key_api_check");
       $idserver = 1;
      

       $datos = array("idserver" => $idserver,"sslserv" => $sslserv, "descripcionserver" => $descripcionserver, "dominioserver" => $dominioserver, "urlaccess" => $urlaccess, "token_access" => $token_access, "msg_notificacion" => $msg_notificacion, 'status_msg_notificacion' => $status_msg_notificacion,"key_api_check" => $key_api_check);

          if($this->server_model->getColunmserver()!=0){             
                
             if($this->server_model->update_server($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }
         
            }else{

              if($this->server_model->set_server($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }      
             
            }

    
     
     echo json_encode($array_devolver);     

    }   

   }


   public function ingresarcpanelapi(){
       
      if($this->request->getPost()) {
       //header("Content-Type: application/json");
       $array_devolver=[];      
          
          $idusuario = $this->session->get("idusuario");
          $rutacpanelapi  = $this->request->getPost("rutacpanelapi");
          $usercpanelapi  = $this->request->getPost("usercpanelapi");
          $passcpanelapi  = $this->request->getPost("passcpanelapi");
          $ip_cpanel      = $this->request->getPost("ip_cpanel");
          $dominio_cpanel = $this->request->getPost("dominio_cpanel");
          $nameserver1    = $this->request->getPost("nameserver1");
          $nameserver2    = $this->request->getPost("nameserver2");
          $nameserver3    = $this->request->getPost("nameserver3");
          $nameserver4    = $this->request->getPost("nameserver4");
          $idcpanelapi = 1;

         

            $datos = array("rutacpanelapi" => $rutacpanelapi, "usercpanelapi" => $usercpanelapi, "passcpanelapi" => $passcpanelapi, "idcpanelapi" => $idcpanelapi, "ip_cpanel" => $ip_cpanel, "dominio_cpanel" => $dominio_cpanel, "nameserver1" => $nameserver1, "nameserver2" => $nameserver2, "nameserver3" => $nameserver3, "nameserver4" => $nameserver4);

            if($this->cpanel_model->getColunmcpanelapi()!=0){

              if($this->cpanel_model->update_cpanelapi($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }
         
            }else{

              if($this->cpanel_model->set_cpanelapi($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }  
            }

          


       echo json_encode($array_devolver);  
        
      }
  
  }



   public function ingresarbottelegram(){
       
      if($this->request->getPost()) {
      //header("Content-Type: application/json");
       $array_devolver=[];      
          
          $idusuario = $this->session->get("idusuario");
          $chatid =$this->request->getPost("chatid");
          $tokenbot =$this->request->getPost("tokenbot");

         

           $datos = array("chatid" => $chatid, "tokenbot" => $tokenbot, "idusuario" => $idusuario);

            if($this->api_model->getColunmbottelegram($idusuario)!=0){

              if($this->api_model->update_bottelegram($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }
         
            }else{

              if($this->api_model->set_bottelegram($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }         

            }

            


       echo json_encode($array_devolver);  
        
      }
  
  }



  public function ingresarcallcenter(){
       
      if($this->request->getPost()) {
       //header("Content-Type: application/json");
       $array_devolver=[];      
          
          $idusuario        = $this->session->get("idusuario");
          $accountsidtwilio = $this->request->getPost("accountsidtwilio");
          $authtokentwilio  = $this->request->getPost("tokenauthtwilio");
          $numerotwilio     = $this->request->getPost("numerotwilio");
          $costo            = $this->request->getPost("costo");

        //  $apicall = $this->api_model->getColunmapinexmo();
          $idapicallcenter = 1;



            $datos = array("accountsidtwilio" => $accountsidtwilio, "authtokentwilio" => $authtokentwilio, "numerotwilio" => $numerotwilio, "idapicallcenter" => $idapicallcenter, "costo" => $costo);

            if($this->api_model->getColunmatwilio()!=0){

              if($this->api_model->update_apitwilio($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }
         
         
            }else{

             if($this->api_model->set_apitwilio($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }          

            }   


       echo json_encode($array_devolver);  
        
      }
  
  }


 public function get_cpanelapi(){

       $response = $this->cpanel_model->get_cpanelapi();
       echo json_encode($response);
     
 }








 }  

