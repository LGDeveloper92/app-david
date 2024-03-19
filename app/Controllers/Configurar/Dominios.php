<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Cpanel_model;
use App\Models\configurar\Dominios_model;
use App\Models\configurar\Usuario_model;

use CodeIgniter\API\ResponseTrait;

class Dominios extends BaseController {

  protected $server_model;
  protected $cpanel_model;
  protected $dominios_model;
  protected $usuario_model; 
  protected $sesion; 

  function __construct(){

    $this->server_model    = new Server_model();
    $this->cpanel_model    = new Cpanel_model();
    $this->dominios_model  = new Dominios_model();
    $this->usuario_model   = new Usuario_model();
    
    $this->client  = \Config\Services::curlrequest();
    $this->session = \Config\Services::session();
   
   }


  public function index(){  
     
       $datos['server'] = $this->server_model->get_server($this->session->get("idusuario"));
       $datos['sessionrol'] = $this->session->get("rol");
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $datos['cpanel'] = $this->cpanel_model->get_cpanelapi();
       echo view('inc/header',$datos);   
       echo view('configurar/dominios',$datos);
    
  }


  public function getAlldominios(){
      if($this->request->getPost()) {
       $buscardominio = $this->request->getPost("buscardominio");
       $response = $this->dominios_model->get_dominios($this->session->get("idusuario"), $buscardominio);
       echo json_encode($response);
      }
    }


  public function agregardominio(){

    if($this->request->getPost()) {
       //header("Content-Type: application/json");
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $dominio = $this->request->getPost("dominio");
       $rutaD = $this->request->getPost("rutaD");
       $subdominio = $this->request->getPost("subdominio");


        $datos = array("dominio" => $dominio, "rutaD" => $rutaD, "subdominio" => $subdominio, "idusuario" => $idusuario);

        if($this->dominios_model->insertardominio($datos)){
          $array_devolver['statusAdd'] = true;
        }else{
          $array_devolver['statusAdd'] = false;
        }

        echo json_encode($array_devolver);  

    }   

   } 


   public function eliminardominio(){

     if($this->request->getPost()){       
        $array_devolver=[];

        $idusuario = $this->session->get("idusuario");
        $iddomains = $this->request->getPost("iddomains");

    

          $datos = array("idusuario" => $idusuario, "iddomains" => $iddomains);   

          if($this->dominios_model->eliminardominio($datos)){
              $array_devolver['statusdelete'] = true;
           }else{
             $array_devolver['statusdelete'] = false;
           }

           echo json_encode($array_devolver);    
         
       
      } 
           


   } 








    
  
}