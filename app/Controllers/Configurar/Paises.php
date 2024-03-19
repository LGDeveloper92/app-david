<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Paises_model;

class Paises extends BaseController {

  protected $paises_model;
  protected $sesion; 

  function __construct(){
   
    $this->paises_model     = new Paises_model();

    $this->session = \Config\Services::session(); 

  }

   public function mostrarpaises(){


     $response = $this->paises_model->get_paises();
     echo json_encode($response);


   } 

   public function mostrarprefijo(){
   	   if($this->request->getPost()) {
         $pais = $this->request->getPost("pais");
         $response = $this->paises_model->get_prefijo($pais);
         echo json_encode($response);
      }
   }





}   