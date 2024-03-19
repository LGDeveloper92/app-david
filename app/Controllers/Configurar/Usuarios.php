<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Plantillas_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Paises_model;

class Usuarios extends BaseController {

  protected $server_model;
  protected $plantillas_model;
  protected $usuario_model; 
  protected $paises_model;

  protected $sesion; 


 function __construct(){ 

    $this->server_model     = new Server_model();
    $this->plantillas_model = new Plantillas_model();
    $this->usuario_model    = new Usuario_model();
    $this->paises_model     = new Paises_model();

    $this->session = \Config\Services::session(); 

  }


    public function index(){
     
     $datos['server']        = $this->server_model->get_server($this->session->get("idusuario"));
     $datos['pais']          = $this->paises_model->get_paises();
     $datos['sessionrol']    = $this->session->get("rol");
     $datos['usuarios']      = $this->usuario_model->get_usuarios("");
     //$datos['usuariosdom']   = $this->usuario_model->get_usuariosDominios();    
     $datos['datosuser']     = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
     $datos['idusuarioPost'] = $this->session->get("idusuario");
     echo view("inc/header",$datos);
     echo view("configurar/usuarios",$datos);

   }



   public function getAllusuarios(){
      if($this->request->getPost()){
       $buscarusuario = $this->request->getPost("buscarusuario");
       $response = $this->usuario_model->get_usuarios($buscarusuario);
       echo json_encode($response);
      }
  }

  public function getusuario(){
      
      if($this->request->getPost()) {
       $idusuario = $this->request->getPost("idusuario");
       $response = $this->usuario_model->get_usuarioID($idusuario);
       echo json_encode($response);
      }
  } 
   
  
  public function ingresarusuario(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");

       $nombre     = $this->request->getPost("nombre");
       $numero     = $this->request->getPost("numero");
       $pais       = $this->request->getPost("pais");
       $rol        = 'usuario';
       $email      = $this->request->getPost("email");
       $password   = password_hash($this->request->getPost("password"), PASSWORD_DEFAULT);
       $fechai     = date("Y-m-d");
       $fechav     = $this->request->getPost("fechav");
       $status     = 1;
       $correonoti = $this->request->getPost("correonoti");     


         $datos = array("nombre" => $nombre, "numero" => $numero, "pais" => $pais, "status" => $status, "rol" => $rol, "email" => $email, "pw" => $password, "fechai" => $fechai ,"fechav" => $fechav, "correonoti" => $correonoti);


         if($this->usuario_model->setusuarios($datos)){
             $array_devolver['statusAdd'] = true;
         }else{
             $array_devolver['statusAdd'] = false;
         }   


       echo json_encode($array_devolver);  
        


    }

   }


   public function update_password_user(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $email     = $this->request->getPost('email');
       $password  = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

       $datos = array("email" => $email, "pw" => $password);

       if($this->usuario_model->update_password_user($datos)){
          $array_devolver['statusAdd'] = true;
       }else{
          $array_devolver['statusAdd'] = false;
       } 

       

       echo json_encode($array_devolver);  

    }   

   }

   public function update_vencimiento_user(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $email  = $this->request->getPost('email');
       $fechav = $this->request->getPost('fechav');

       $datos = array("email" => $email, "fechav" => $fechav);

       if($this->usuario_model->update_vencimiento_user($datos)){
          $array_devolver['statusAdd'] = true;
       }else{
          $array_devolver['statusAdd'] = false;
       } 

       

       echo json_encode($array_devolver);  

    }   

   }


  public function updateStatus(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $idusuario = $this->request->getPost("idusuario");
       $response  = $this->usuario_model->get_usuarioID($idusuario);
       $status    = $response['status'];

       if($status == "1"){
         $newStatus = "0";
       }elseif($status == "0"){
         $newStatus = "1";
       }
       


         if($this->usuario_model->updateStatus($idusuario, $newStatus)){
             $array_devolver['statusUpd'] = true;
         }else{
            $array_devolver['statusUpd'] = false;
         }  

     

       echo json_encode($array_devolver);  
        


    }
  }

  public function updateperfil(){
    if($this->request->getPost()) {    
       $idusuario  = $this->session->get("idusuario");
       $nombre     = $this->request->getPost("nombre");
       $numero     = $this->request->getPost("numero");
       $pais       = $this->request->getPost("pais");
       $email      = $this->request->getPost("email");
       $correonoti = $this->request->getPost("correonoti");     


         $datos = array("nombre" => $nombre, "numero" => $numero, "pais" => $pais, "idusuario" => $idusuario, "correonoti" => $correonoti);


         if($this->usuario_model->updateperfil($datos)){
             $array_devolver['statusAdd'] = true;
         }else{
             $array_devolver['statusAdd'] = false;
         }   


       echo json_encode($array_devolver);  

     }
  }



public function creditosCall(){


     if($this->request->getPost()){    
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $selecusuariocall = $this->request->getPost("selecusuariocall");
       $cantidadcall     = $this->request->getPost("cantidadcall");

        $datos = array("idusuario" => $selecusuariocall, "credcall" => $cantidadcall);

         if($this->usuario_model->updateCreditoCall($datos)){
             $array_devolver['statusAdd'] = true;
         }else{
            $array_devolver['statusAdd'] = false;
         } 

       echo json_encode($array_devolver);         


    }

  }

public function creditos_general(){

      if($this->request->getPost()){    
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $selecusuariosaldogeneral = $this->request->getPost("selecusuariosaldogeneral");
       $saldo_general     = $this->request->getPost("saldo_general");

        $datos = array("idusuario" => $selecusuariosaldogeneral, "saldo_general" => $saldo_general);

         if($this->usuario_model->updateSaldoGeneral($datos)){
             $array_devolver['statusAdd'] = true;
         }else{
            $array_devolver['statusAdd'] = false;
         } 

       echo json_encode($array_devolver);         


    }
 
}  

 public function creditosSMS(){


    if($this->request->getPost()) {
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $selecusuariosms = $this->request->getPost("selecusuariosms");
       $cantidadsms     = $this->request->getPost("cantidadsms");
     

          $datos = array("idusuario" => $selecusuariosms, "credsms" => $cantidadsms);

         if($this->usuario_model->updateCreditoSMS($datos)){
             $array_devolver['statusAdd'] = true;
         }else{
            $array_devolver['statusAdd'] = false;
         } 


       echo json_encode($array_devolver);  
        


    }



  }


public function eliminarusuario(){


     if($this->request->getPost()){    
       $array_devolver=[];

       $idusuario = $this->request->getPost("idusuario");
       

         if($this->usuario_model->eliminarusuario($idusuario)){
             $array_devolver['status'] = true;
         }else{
            $array_devolver['status'] = false;
         } 

       echo json_encode($array_devolver);  
        


    }



  }  






}