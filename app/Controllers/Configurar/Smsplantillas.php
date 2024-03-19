<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Plantillas_model;
use App\Models\configurar\Usuario_model;

class Smsplantillas extends BaseController {

  protected $server_model;
  protected $plantillas_model;
  protected $usuario_model; 
  protected $sesion; 

  function __construct(){ 

    $this->server_model     = new Server_model();
    $this->plantillas_model = new Plantillas_model();
    $this->usuario_model    = new Usuario_model();

    $this->session = \Config\Services::session(); 
  }



   public function index(){
     
    $datos['server'] = $this->server_model->get_server($this->session->get("idusuario"));
    $datos['sessionrol'] = $this->session->get("rol");
    $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
    $datos['idusuarioPost'] = $this->session->get("idusuario");
    echo view("inc/header",$datos);
    echo view("configurar/smsplantillas");

   }


    public function setSMSTemplates(){
       
      if($this->request->getPost()) {

       $array_devolver=[];      
          
          $idusuario = $this->session->get("idusuario");
          $titulo = $this->request->getPost("titulo");
          $descripcion = $this->request->getPost("descripcion");

            $datos = array("titulo" => $titulo, "descripcion" => $descripcion);          

           
              if($this->plantillas_model->set_SMSTemplates($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              } 

       echo json_encode($array_devolver);  
        
      }
  
  }

   public function getAllSMSTemplates(){
    if($this->request->getPost()) {
     $buscartemplate = $this->request->getPost("buscartemplate");
     $response = $this->plantillas_model->get_smstemplates($buscartemplate);
     echo json_encode($response);
    }
  }

  public function deleteSMSTemplates(){
    //if($this->request->getPost()){
        //header("Content-Type: application/json");
        $array_devolver=[];

       
        $idtempsms = $this->request->getPost("idsmstemp");



        $datos = array("idtempsms" => $idtempsms);   

        
        if($this->plantillas_model->delete_SMSTemplates($datos)){
           $array_devolver['statusdelete'] = true;
        }else{
           $array_devolver['statusdelete'] = false;
        }

        echo json_encode($array_devolver);  
     //} 
  }


  public function updateSMSTemplates(){
    if($this->request->getPost()){
         //header("Content-Type: application/json");
        $array_devolver=[];

        $idusuario = $this->session->get("idusuario");
        $idtempsms = $this->request->getPost("idtempsms");
        $tdtitulosms = $this->request->getPost("tdtitulosms");
        $tddescripsms = $this->request->getPost("tddescripsms");
       

           $datos = array("idtempsms" => $idtempsms, "tdtitulosms" => $tdtitulosms  ,"tddescripsms" => $tddescripsms  );   

        
           if($this->plantillas_model->update_SMSTemplates($datos)){
            $array_devolver['statusupdate2'] = true;
           }else{
              $array_devolver['statusupdate2'] = false;
           }

        

        echo json_encode($array_devolver);  
     } 
  }

  





 }  

