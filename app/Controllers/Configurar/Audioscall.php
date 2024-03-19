<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Callcenter_model;

class Audioscall extends BaseController {

  protected $server_model;
  protected $callcenter_model; 

  function __construct(){
    
    $this->server_model     = new Server_model();
    $this->callcenter_model = new Callcenter_model();
    $this->session = \Config\Services::session();
 
   }

    public function setaudiocall(){
       
      if($this->request->getPost()) {
       //header("Content-Type: application/json");
       $array_devolver=[];      
          
          $idusuario = $this->session->get("idusuario");
          $titulo = $this->request->getPost("titulo");
          $rutaaudio = $this->request->getPost("rutaaudio");

          $datos = array("titulo" => $titulo, "rutaaudio" => $rutaaudio);  

          if($this->callcenter_model->set_audiocall($datos)){
            $array_devolver['statusAdd'] = true;
          }else{
            $array_devolver['statusAdd'] = false;
          }  
       echo json_encode($array_devolver);  
        
      }
  
  }

   public function getAllaudiocall(){
    if($this->request->getPost()) {
     $buscaraudiocall = $this->request->getPost("buscaraudiocall");
     $response = $this->callcenter_model->get_audiocall($buscaraudiocall);
     echo json_encode($response);
    }
  }

  

  public function updateaudiocall(){
    if($this->request->getPost()){
        $array_devolver=[];

        $idusuario = $this->session->get("idusuario");
        $idaudiocallcenter = $this->request->getPost("idaudiocallcenter");
        $tdtituloM = $this->request->getPost("tdtituloM");
        $tdrutaaudioM = $this->request->getPost("tdrutaaudioM");

        $datos = array("idaudiocallcenter" => $idaudiocallcenter, "tdtituloM" => $tdtituloM  ,"tdrutaaudioM" => $tdrutaaudioM);   

        
        if($this->callcenter_model->update_audiocall($datos)){
        $array_devolver['statusupdate2'] = true;
        }else{
          $array_devolver['statusupdate2'] = false;
        }


        echo json_encode($array_devolver);  
     } 
  }


  public function deleteaudiocall(){

        $array_devolver=[];

        $idusuario = $this->session->get("idusuario");
        $idaudiocallcenter = $this->request->getPost("idaudiocallcenter");

        $datos = array("idaudiocallcenter" => $idaudiocallcenter);   

        
        if($this->callcenter_model->delete_audiocall($datos)){
           $array_devolver['statusdelete'] = true;
        }else{
           $array_devolver['statusdelete'] = false;
        }

        echo json_encode($array_devolver);  
  }


  





 }  

