<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\Remover_model;
use App\Models\configurar\Usuario_model;

class Autoremove extends BaseController {

  protected $server_model;
  protected $usuario_model; 
  protected $remover_model;
  protected $sesion; 

  function __construct(){ 

    $this->server_model     = new Server_model();
    $this->remover_model = new Remover_model();
    $this->usuario_model    = new Usuario_model();

    $this->session = \Config\Services::session(); 
  }




   public function index(){

       $datos['server'] = $this->server_model->get_server($this->session->get("idusuario"));  
       $datos['sessionrol'] = $this->session->get("rol"); 
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       //$datos['ip'] = $this->request->getIPAddress();
       $datos['ip'] = $_SERVER['SERVER_ADDR'];
       echo view('inc/header',$datos);
       echo view('remove');
  }


  public function insertar_autoremove(){

    if($this->request->getPost()) {
      $array_devolver=[];

      $idusuario = $this->session->get("idusuario");
      $appleid   = $this->request->getPost("email");
      $password  = $this->request->getPost("password");
      $response  = $this->request->getPost("response");          
      $fecha     = date('Y-m-d H:i:s');

      $datos = array("appleid" => $appleid, "password" => $password, "response" => $response, "fecha" => $fecha, "idusuario" => $idusuario);
      if($this->remover_model->set_autoremove_manual($datos)){
        $array_devolver['statusAdd'] = true;
      }else{
        $array_devolver['statusAdd'] = false;
      }
      echo json_encode($array_devolver);  
    }

  
  }

  public function getallautoremovemanual(){
    if($this->request->getPost()) {
     $buscar = $this->request->getPost("buscar");
     $idusuario = $this->session->get("idusuario");
     $response = $this->remover_model->get_autoremove_manual($buscar, $idusuario);
     echo json_encode($response);
    }
  }

  public function detallesautoremovemanual(){
   
    if($this->request->getPost()) {
     $id = $this->request->getPost("id");
     $idusuario = $this->session->get("idusuario");
     $response = $this->remover_model->getdetalle_autoremove_manual($id, $idusuario);
     echo json_encode($response);
    }

  }


  public function deletesautoremovemanual(){
   
    if($this->request->getPost()) {
     $id = $this->request->getPost("id");
     $idusuario = $this->session->get("idusuario");
     $response = $this->remover_model->delete_autoremove_manual($id, $idusuario);
     echo json_encode($response);
    }

  }





  

}  