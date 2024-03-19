<?php

namespace App\Controllers;
//use App\Libraries\Ejemplolibreria;
use App\Models\Login_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Server_model;

class Login extends BaseController{ 
     protected $usuario_model;
     protected $server_model;
     protected $login_model;
     protected $sesion;

	 public function __construct(){
        $this->usuario_model = new Usuario_model();
        $this->server_model  = new Server_model();
        $this->login_model  = new Login_model();
        $this->session = \Config\Services::session();
     }

  public function index(){ 
  	
  	if($this->session->logueado) {
      return redirect()->route('equipos/ingresados');
      // echo 'Esta iniciado sesion';
      // $this->session->destroy();
          		
    }

    if(!$this->session->logueado) {
    	 $this->iniciar_sesion();
     }

  }

   public function iniciar_sesion() {
      $datos['server'] = $this->server_model->get_server();
      echo view('login', $datos);   
     
    } 

    public function iniciar_sesion_post(){
      if($this->request->getPost()){
    	$array_devolver=[];
      	$user = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
       // $user = 'master@server.com';
       // $pass = '7954102AyD$$a';
        $verifuser   = $this->usuario_model->verifUser($user); 
        $fechaActual = date("Y-m-d H:i:s");

         if($verifuser){
         	$array_devolver['cuenta'] = true;          
            $fechav = $verifuser['fechav'];
            if($fechaActual < $fechav || $fechaActual == $fechav){ 
                
                 $status = $verifuser['status'];
                 if($status!= "0"){

                 	$array_devolver['statuscuenta'] = true; 
                 	$hash = $verifuser['pw'];
                 	if(password_verify($pass,$hash)){
                     
                         $usuario_data = [
                                          'user'      => $verifuser['nombre'],
                                          'idusuario' => $verifuser['idusuario'],
                                          'email'     => $verifuser['email'],
                                          'U'         => $verifuser['email'],
                                          'rol'       =>$verifuser['rol'],
                                          'logueado'  => true
                                        ];
                         $this->session->set($usuario_data);               
                         $array_devolver['logueado'] = true;
                         $array_devolver['statuslogin'] = $this->session->set($usuario_data);
                 	
                    }else{
                 		
                 	  $array_devolver['logueado'] = false;	
                 	}

                 }else{

                 	$array_devolver['statuscuenta'] = false;
                 }

            }elseif($fechaActual > $fechav){ 

              $array_devolver['statuscuenta'] = false;

           }
         }else{
         	$array_devolver['cuenta'] = false; 
         }

         echo json_encode($array_devolver);
      }else{
          $this->iniciar_sesion();
      }   



  }

  public function cerrar_sesion() {

      $usuario_data = [                        
                        'logueado'  => false
                      ];
      
      $this->session->set($usuario_data);    
      return redirect()->route('login');
  } 

   
}
