<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Smtp_model;

class Smtp_config extends BaseController {
	  protected $server_model;
    protected $usuario_model;
    protected $smtp_model;
    protected $sesion; 
    protected $client;


    function __construct(){

      $this->server_model  = new Server_model();
      $this->usuario_model = new Usuario_model();
      $this->smtp_model    = new Smtp_model();

      $this->session = \Config\Services::session();
      $this->client  = \Config\Services::curlrequest();

    }

	public function index(){  
	  
    $datos['server'] = $this->server_model->get_server();
    $datos['sessionrol'] = $this->session->get("rol");     
    $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
    $datos['idusuarioPost'] = $this->session->get("idusuario");
    $datos['smtp'] = $this->smtp_model->get_smtp();
    echo view("inc/header",$datos);
    echo view("configurar/smtp_config",$datos);
    
	}

  public function agregar_datos(){

    if($this->request->getPost()) {

       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $smtp_descripcion = $this->request->getPost("smtp_descripcion");       
       $smtp_host        = $this->request->getPost("smtp_host");
       $smtp_puerto      = $this->request->getPost("smtp_puerto");
       $smtp_username    = $this->request->getPost("smtp_username");
       $smtp_password    = $this->request->getPost("smtp_password");
       $status = 1;
      

       $datos = array("smtp_descripcion" => $smtp_descripcion, "smtp_host" => $smtp_host, "smtp_puerto" => $smtp_puerto, "smtp_username" => $smtp_username, "smtp_password" => $smtp_password, "status" => $status);

          if($this->smtp_model->getColunmsmtpconfig()!=0){             
                
             if($this->smtp_model->update_smtpconfig($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }
         
            }else{

              if($this->smtp_model->set_smtpconfig($datos)){
                $array_devolver['statusAdd'] = true;
              }else{
               $array_devolver['statusAdd'] = false;
              }      
             
            }
     
      echo json_encode($array_devolver);     

    }   
  }

  public function get_datos(){

    
  }

  public function actualizar_datos(){



  }

}
