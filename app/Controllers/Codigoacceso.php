<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\Equipos_model;
use App\Models\configurar\Paises_model;
use App\Models\configurar\Plantillas_model;
use App\Models\configurar\Api_model;
use App\Models\configurar\Smsapi_model;
use App\Models\Passcode_model;

class Codigoacceso extends BaseController {

  protected $server_model;
  protected $usuario_model;
  protected $equipos_model;
  protected $paises_model;
  protected $plantillas_model;
  protected $api_model;
  protected $smsapi_model;
  protected $passcode_model;

  protected $sesion; 

  function __construct(){ 

    $this->server_model      = new Server_model();
    $this->usuario_model     = new Usuario_model();
    $this->equipos_model     = new Equipos_model();
    $this->paises_model      = new Paises_model();
    $this->plantillas_model  = new Plantillas_model();
    $this->api_model         = new Api_model();
    $this->smsapi_model           = new Smsapi_model();    
    $this->passcode_model    = new Passcode_model();

    $this->session = \Config\Services::session(); 
  }



   public function index(){

       $datos['server'] = $this->server_model->get_server($this->session->get("idusuario"));  
       $datos['sessionrol'] = $this->session->get("rol"); 
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $datos['ip'] = $_SERVER['SERVER_ADDR'];

       $datos['procesos'] = $this->equipos_model->get_ingresados($this->session->get("idusuario"), '');
       $datos['pais'] = $this->paises_model->get_paises();
       $datos['plantillas'] = $this->plantillas_model->get_smstemplates("");
       $datos['senders'] = $this->api_model->get_senders();
       $datos['smsapi']        = $this->smsapi_model->all_smsapis("");
       
       echo view('inc/header',$datos);
       echo view('codigoacceso');
  } 


   public function agregarProceso(){
       
   if($this->request->getPost()) {
      $array_devolver=[]; 

      $idusuario = $this->session->get("idusuario");
      $usuario   = $this->request->getPost("usuario");
      $modelo    = $this->request->getPost("modelo");
      $numero    = $this->request->getPost("numero");  
      $prefijo   = $this->request->getPost("prefijo");  
          
      if($this->request->getPost("idequipos") == ''){
          $idequipos = 0;
      }else{
          $idequipos = $this->request->getPost("idequipos");
      }

      $datos = array("usuario" => $usuario, "modelo" => $modelo, "numero" => $numero, "idusuario" => $idusuario, "idequipos" => $idequipos, "prefijo" => $prefijo);


      if($this->passcode_model->agregarpasscode($datos)){
          $array_devolver['status'] = true;
      }else{
          $array_devolver['status'] = false;
      }
       
       
       echo json_encode($array_devolver);  
        
      }
  
  } 

  public function listado(){

    if($this->request->getPost()) {
       $buscar = $this->request->getPost("buscar");
       $response = $this->passcode_model->lista($buscar, $this->session->get("idusuario"));
       echo json_encode($response);
    }

  }

public function getpasscode(){

   if($this->request->getPost()) {
       $id = $this->request->getPost("id");
       $idusuario = $this->session->get("idusuario");
       $response = $this->passcode_model->gettblpasscode($id, $idusuario);
       echo json_encode($response);
    }


}  

 public function eliminarProceso(){


  if($this->request->getPost()) {
    
       $array_devolver=[];
       
       $idusuario = $this->session->get("idusuario");
       $id = $this->request->getPost("id");

       if($this->passcode_model->eliminareProceso($idusuario, $id)){
         
          $array_devolver['status'] = true;

       }else{
         $array_devolver['status'] = false;
       }   
         echo json_encode($array_devolver);  
        
    }  


}   
 




}