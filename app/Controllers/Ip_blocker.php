<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\Ipblocker_model;

class Ip_blocker extends BaseController {

  protected $server_model;
  protected $usuario_model;

  protected $ipblocker_model;

  function __construct(){

   	$this->server_model  = new Server_model();
    $this->usuario_model = new Usuario_model();

    $this->session = \Config\Services::session();
    $this->ipblocker_model  = new Ipblocker_model();
   
   }


	public function index(){ 

  
    $datos['idusuarioPost'] = $this->session->get("idusuario");
    $datos['server'] = $this->server_model->get_server();
    $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get('idusuario'));
    $datos['usuarios']   = $this->usuario_model->get_usuarios("");
    $datos['sessionrol'] = $this->session->get("rol"); 


    echo view('inc/header', $datos);
    echo view('ip_blocker', $datos);
		
	}


  public function getAll_ipblocker(){
       $idusuario = $this->session->get("idusuario");
       $response = $this->ipblocker_model->get_all_ipblocker($idusuario);
       echo json_encode(array('data' => $response));
    
  }
 
  public function eliminar_ipblocker(){
      $idusuario = $this->session->get("idusuario");
     if($this->ipblocker_model->delete_IP($this->request->getPost("id"), $idusuario)){
          $array_devolver['status'] = true;
          $array_devolver['statusMsg'] = 'IP eliminado correctamente';
      }else{
        $array_devolver['status'] = false;
        $array_devolver['statusMsg'] = 'Hubo un problema al eliminar la IP';
      }

      echo json_encode($array_devolver);    
  }


  public function add_ipblocker(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $ip_adress        = $this->request->getPost("ip_adress");
       $pais             = $this->request->getPost("pais");
       $ciudad           = $this->request->getPost("ciudad");
       $status_ip        = 0;
       $tipo_status      = 'manual';
       $url_dominio      = 'manual';
       $fecha_ip         = date("Y-m-d H:i:s");

       $datos = array('ip_adress' => $ip_adress, 'pais' => $pais, 'ciudad' => $ciudad, 'status_ip' => $status_ip, 'tipo_status' => $tipo_status, 'cantidad_visitas' => 0, 'url_dominio' => $url_dominio, 'fecha_ip' => $fecha_ip, 'idusuario'=>$idusuario);

      
       if($this->ipblocker_model->get_ipblocker($ip_adress, $idusuario)){        
         
          $array_devolver['status'] = false;
        
       }else{
     
           $this->ipblocker_model->set_ipblocker($datos);
           $array_devolver['status'] = true;
       
        
        }


       echo json_encode($array_devolver);  
        


    }


  }

  function update_status(){

    if($this->request->getPost()) {
       
       $idusuario = $this->session->get("idusuario");
       $id = $this->request->getPost("id");
       $status_ip = $this->request->getPost("status_ip");

       $datos = array('id' => $id, 'status_ip' => $status_ip, 'idusuario'=>$idusuario);
       $response = $this->ipblocker_model->update_status($datos);

       echo json_encode($response);  
        


    }


  }





}  