<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Api_model;
use App\Models\configurar\Checkapi_model;

class Checkapi extends BaseController {
	  protected $server_model;
    protected $usuario_model;
    protected $api_model;
    protected $checkapi_model;
    protected $sesion; 
    protected $client;


    function __construct(){

      $this->server_model   = new Server_model();
      $this->usuario_model  = new Usuario_model();
      $this->api_model      = new Api_model();
      $this->checkapi_model = new Checkapi_model();

      $this->session = \Config\Services::session();
      $this->client  = \Config\Services::curlrequest();

    }

	public function index(){  
	  $datos['server'] = $this->server_model->get_server();
      $datos['sessionrol']          = $this->session->get("rol");     
      $datos['datosuser']           = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
      $datos['idusuarioPost']       = $this->session->get("idusuario");      
      echo view("inc/header",$datos);
      echo view("configurar/checkapi",$datos);
	}

  public function agregar_checkapi(){

    if($this->request->getPost()) {
        $array_devolver=[]; 
        $idusuario            = $this->session->get("idusuario"); 
        $id_servicio          = $this->request->getPost("id_servicio");
        $descripcion_api      = $this->request->getPost("descripcion_api");
        $descripcion_cliente  = $this->request->getPost("descripcion_cliente"); 
        $solicitud_url        = $this->request->getPost("solicitud_url"); 
        $solicitud_parametros = $this->request->getPost("solicitud_parametros"); 
        $solicitud_tipo       = $this->request->getPost("solicitud_tipo"); 
        $solicitud_apikey     = $this->request->getPost("solicitud_apikey"); 
        $solicitud_token      = $this->request->getPost("solicitud_token"); 
        $costo                = $this->request->getPost("costo");
        $descripcion_servicio = $this->request->getPost("descripcion_servicio");

        $datos = array('id_servicio' => $id_servicio, 'descripcion_api' => $descripcion_api, 'descripcion_cliente' => $descripcion_cliente, 'solicitud_url' => $solicitud_url,'solicitud_parametros' => $solicitud_parametros, 'solicitud_tipo' => $solicitud_tipo, 'solicitud_apikey' => $solicitud_apikey, 'solicitud_token' => $solicitud_token, 'costo' => $costo, 'descripcion_servicio' => $descripcion_servicio);

        if($this->checkapi_model->verificar_checkapi($descripcion_api)){
              $array_devolver['statusAdd'] = false;
              $array_devolver['msg'] = 'API_EXISTE';
        }else{
              
               if($this->checkapi_model->save_checkapi($datos)){
               $array_devolver['statusAdd'] = true;
               $array_devolver['msg'] = 'API_REGISTRADA';
               }else{
               $array_devolver['statusAdd'] = false;
               $array_devolver['msg'] = 'API_NO_REGISTRADA';
               }
        } 
        
        echo json_encode($array_devolver);  
    }
  }

 public function all_servicios_api(){
      
    $response = $this->checkapi_model->get_all_servicios_api();
    echo json_encode(array('data' => $response));
    
}

public function get_servicio_api(){
    if($this->request->getPost()) {
      $id = $this->request->getPost("id");
      $response = $this->checkapi_model->get_servicio_api($id);
      echo json_encode($response);
    }
}


public function editar_checkapi(){

      if($this->request->getPost()) {
        $array_devolver=[]; 

        $idusuario            = $this->session->get("idusuario"); 
        $id_servicio          = $this->request->getPost("id_servicio");
        $id                   = $this->request->getPost("id");              
        $descripcion_api      = $this->request->getPost("descripcion_api");
        $descripcion_cliente  = $this->request->getPost("descripcion_cliente"); 
        $solicitud_url        = $this->request->getPost("solicitud_url"); 
        $solicitud_parametros = $this->request->getPost("solicitud_parametros"); 
        $solicitud_tipo       = $this->request->getPost("solicitud_tipo"); 
        $solicitud_apikey     = $this->request->getPost("solicitud_apikey"); 
        $solicitud_token      = $this->request->getPost("solicitud_token"); 
        $costo                = $this->request->getPost("costo");
        $descripcion_servicio = $this->request->getPost("descripcion_servicio");

        $datos = array('id_servicio' => $id_servicio, 'id' => $id, 'descripcion_api' => $descripcion_api, 'descripcion_cliente' => $descripcion_cliente, 'solicitud_url' => $solicitud_url,'solicitud_parametros' => $solicitud_parametros, 'solicitud_tipo' => $solicitud_tipo, 'solicitud_apikey' => $solicitud_apikey, 'solicitud_token' => $solicitud_token, 'costo' => $costo, 'descripcion_servicio' => $descripcion_servicio);

        
              
        if($this->checkapi_model->update_checkapi($datos)){
            $array_devolver['statusAdd'] = true;
        }else{
            $array_devolver['statusAdd'] = false;
        }

              
         

           /**/

            echo json_encode($array_devolver);  
    }

  }


  public function eliminar_checkapi(){
   
    if($this->request->getPost()){
      $array_devolver=[]; 
        $id = $this->request->getPost("id");
        if($this->checkapi_model->eliminar_checkapi($id)){
          $array_devolver['statusDelete'] = true;
        }else{
          $array_devolver['statusDelete'] = false;
        }
         echo json_encode($array_devolver);  
    }


  }





}  