<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Cpanel_model;
use App\Models\configurar\Dominios_model;
use App\Models\configurar\Subdominio_model;
use App\Models\configurar\Usuario_model;

class Subdominios extends BaseController {

  protected $server_model;
  protected $cpanel_model;
  protected $dominios_model;
  protected $subdominio_model;
  protected $usuario_model; 
  protected $sesion; 

  function __construct(){ 

    $this->server_model     = new Server_model();
    $this->cpanel_model     = new Cpanel_model();
    $this->dominios_model   = new Dominios_model();
    $this->subdominio_model = new Subdominio_model();
    $this->usuario_model    = new Usuario_model();

    $this->session = \Config\Services::session(); 
  }


    public function index(){  
     
       $datos['server'] = $this->server_model->get_server($this->session->get("idusuario"));
       $datos['sessionrol'] = $this->session->get("rol");
       $datos['dominios'] = $this->dominios_model->get_dominios($this->session->get("idusuario"),"");
       $datos['subdominios'] = $this->subdominio_model->get_subdominios($this->session->get("idusuario"), "");
       $datos['idusuario'] = $this->session->get("idusuario");
       $datos['usuarios']   = $this->usuario_model->get_usuarios("");
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $datos['cpanel'] = $this->cpanel_model->get_cpanelapi();
       echo view('inc/header',$datos);   
       echo view('configurar/subdominios',$datos);
    
  }


     public function getAllsubdominios(){
      if($this->request->getPost()) {
       $buscarsubdominio = $this->request->getPost("buscarsubdominio");
       $response = $this->subdominio_model->get_subdominios($this->session->get("idusuario"), $buscarsubdominio);
       echo json_encode($response);
      }
     }


    public function getAllsubdominiosID(){
      if($this->request->getPost()) {
       $idusuario = $this->request->getPost("buscarsubdominio");
       $response = $this->subdominio_model->get_subdominios($idusuario, '');
       echo json_encode($response);
      }      
    } 







    public function seleccionarsubdominio(){

      if($this->request->getPost()) {

        $array_devolver=[];
        $idusuario = $this->session->get("idusuario");
        $response = $this->subdominio_model->seleccionarsubdominio($idusuario);
        echo json_encode($response);

      }


    }

  public function agregardominio(){

    if($this->request->getPost()) {
       //header("Content-Type: application/json");
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $dominio = $this->request->getPost("dominio");
       $rutaD = 'app_script';
       $subdominio = "subdomain.".$dominio;
       $acceso = "movilaccess";

 
         $datos = array("descripcion" => $dominio, "subdomains" => $dominio, "dirsubdomains" => $rutaD, "idusuario" => $idusuario,  "acceso" => $acceso, "iddomains" => 0);  

          if($this->subdominio_model->insertarsubdominio($datos)){
              $array_devolver['statusAdd'] = true;
           }else{
             $array_devolver['statusAdd'] = false;
           }

           echo json_encode($array_devolver);    
         
    
    }   

   } 

    public function agregarsubdominio(){

      if($this->request->getPost()) {

         $array_devolver=[];
  
         $idusuario = $this->session->get("idusuario");
         $domtemp = $this->request->getPost("domtemp");
         $descripcion = $this->request->getPost("descripcion");
         $subdomains = $this->request->getPost("descripcion") . "." .$domtemp;
         $rutaSubd = 'app_script';
        
         
          $domid = $this->dominios_model->get_dominio($domtemp);
          $iddomains = $domid['iddomains'];   
          $acceso = "movilaccess";   
         
          

          $datos = array("descripcion" => $descripcion, "subdomains" => $subdomains, "dirsubdomains" => $rutaSubd, "idusuario" => $idusuario, "acceso" => $acceso, "iddomains" => $iddomains);
           
          if($this->subdominio_model->insertarsubdominio($datos)){
                $array_devolver['statusAdd'] = true;
          }else{
               $array_devolver['statusAdd'] = false;
          }

          echo json_encode($array_devolver);    
         
      
      }   
  
     } 




  public function eliminarsubdominio(){

      if($this->request->getPost()){       
         $array_devolver=[];
 
         $idusuario = $this->session->get("idusuario");
         $idsubdomains = $this->request->getPost("idsubdomains");
         $subdomains = $this->request->getPost("subdomains");

         $datos = array("subdomains" => $subdomains);   

          if($this->subdominio_model->eliminarsubdominio($datos)){
            $array_devolver['statusdelete'] = true;
          }else{
            $array_devolver['statusdelete'] = false;
          }

          echo json_encode($array_devolver);    

         
       } 
            
 
 
    }
  public function eliminarsubdominioasignado(){

      if($this->request->getPost()){       
         $array_devolver=[];
 
         $idusuario = $this->session->get("idusuario");
         $idsubdomains = $this->request->getPost("idsubdomains");
         $asignado = $this->request->getPost("asignado");

         $datos = array("idsubdomains" => $idsubdomains, "asignado" => $asignado);   

          if($this->subdominio_model->eliminarsubdominioasignado($datos)){
            $array_devolver['statusdelete'] = true;
          }else{
            $array_devolver['statusdelete'] = false;
          }

          echo json_encode($array_devolver);    

         
       } 
            
 
 
    }


   public function asignarsubdominio(){

    $idusuario = $this->request->getPost("idusuario");
    $subdomains = $this->request->getPost("subdominio");
    
    if($this->subdominio_model->verificarsubdominio($idusuario, $subdomains) == 0){
      
      $response = $this->subdominio_model->seleccionarsubdominio_descripcion($subdomains);
      $descripcion   = $response['descripcion'];  
      $subdomains    = $response['subdomains'];
      $dirsubdomains = $response['dirsubdomains'];
      $asignado      = 1; 

      $datos = array("descripcion" => $descripcion, "subdomains" => $subdomains, "dirsubdomains" => $dirsubdomains, "idusuario" => $idusuario, "asignado" => $asignado);
           
      if($this->subdominio_model->insertarsubdominio_asignado($datos)){
          $array_devolver['status'] = true;
          $array_devolver['existe'] = false;
      }else{
          $array_devolver['status'] = false;
          $array_devolver['existe'] = false;
      }
    }else{
      $array_devolver['status'] = false;
      $array_devolver['existe'] = true;
    }


    echo json_encode($array_devolver);


   }  
}   