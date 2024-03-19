<?php 
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Equipos_model;
use App\Models\configurar\Api_model;

class Api_rest_telegram extends ResourceController{
    
    protected $equipos_model;
    protected $api_model;
    protected $format    = 'json';

    function __construct(){

      $this->equipos_model = new Equipos_model();
      $this->api_model = new Api_model();
    }
 
    public function index(){
        return $this->genericResponse($this->respTelegram(1), 'Aqui', 200);
    }

 

   
}