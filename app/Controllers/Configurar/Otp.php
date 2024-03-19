<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Smsapi_model;

class Otp extends BaseController {
	 
    protected $server_model;
    protected $usuario_model; 
    protected $smsapi_model;
    protected $sesion; 
    protected $client;


    function __construct(){

      $this->server_model  = new Server_model();
      $this->usuario_model = new Usuario_model();
      $this->smsapi_model  = new Smsapi_model();

      $this->session = \Config\Services::session();

    }

	public function index(){  
	    $datos['server'] = $this->server_model->get_server();
      $datos['sessionrol'] = $this->session->get("rol");     
      $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
      $datos['idusuarioPost'] = $this->session->get("idusuario");
      echo view("inc/header",$datos);
      echo view("configurar/otp",$datos);
	}
}  
