<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\Remover_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Checkapi_model;

class Check extends BaseController {

  protected $server_model;
  protected $usuario_model; 
  protected $remover_model;  
  protected $checkapi_model;
  protected $sesion; 

  function __construct(){ 

    $this->server_model   = new Server_model();
    $this->remover_model  = new Remover_model();
    $this->usuario_model  = new Usuario_model();
    $this->checkapi_model = new Checkapi_model();

    $this->session = \Config\Services::session(); 
  }




   public function index(){

       $datos['server'] = $this->server_model->get_server($this->session->get("idusuario"));  
       $datos['sessionrol'] = $this->session->get("rol"); 
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
       $datos['idusuarioPost'] = $this->session->get("idusuario");
       $datos['servicios_api_check'] = $this->checkapi_model->get_all_servicios_api();
       //$datos['ip'] = $this->request->getIPAddress();
       $datos['ip'] = $_SERVER['SERVER_ADDR'];
       echo view('inc/header',$datos);
       echo view('check');
       


  }
  
  
  public function apicheck(){

     $curl = \Config\Services::curlrequest();
     $id = $this->request->getPost("service");
     $imei = $this->request->getPost("imei");

     $fecha = date("Y-m-d H:i:s");

     $usuario = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
     $credsms = $usuario['credsms'];
     $saldo_general = $usuario['saldo_general'];

     $response = $this->checkapi_model->get_servicio_api($id);

     $id_servicio          = $response['id_servicio']; 
     $descripcion_api      = $response['descripcion_api'];
     $descripcion_cliente  = $response['descripcion_cliente'];
     $solicitud_url        = $response['solicitud_url'];
     $solicitud_parametros = $response['solicitud_parametros'];
     $solicitud_tipo       = $response['solicitud_tipo']; 
     $solicitud_apikey     = $response['solicitud_apikey'];
     $solicitud_token      = $response['solicitud_token'];
     $costo                = $response['costo'];

     //$array_devolver['result'] =  $id_servicio." - " .$descripcion_api." - " .$descripcion_cliente." - " .$solicitud_url." - " .$solicitud_parametros." - " .$solicitud_tipo." - " .$solicitud_apikey." - " .$solicitud_token." - " .$costo; 

     $p1 = str_replace('#key', $solicitud_apikey, $solicitud_parametros); 
     $p2 = str_replace('#imei', $imei, $p1); 
     $parametros = str_replace('#service', $id_servicio, $p2); 
     /*$p4 = str_replace('#sender', $descripcion_sender, $p3); 
     $p5 = str_replace('#valor', $valor_sender, $p4); */
     if($saldo_general <= 0){
        $array_devolver['creditos'] = $saldo_general;
        $array_devolver['result'] = '<span style = "color:red;">Créditos insuficientes para realizar la operación.</span>';       

     }elseif($saldo_general > 0){

           if($solicitud_tipo == 'get'){        
            try{
             $response_api =  $curl->request('get',$solicitud_url.'?'.$parametros, [ 'headers' => ['Accept' => 'application/json']]);
            }catch (\Exception $e){
               return 'failed_server';
            } 

           }elseif($solicitud_tipo == 'post'){
             $cadena=$parametros;
             $busqueda=array(
              'array(',
              '=>',
              ')'
            );
            $reemplazo=array(
              '{',
              ':',
              '}',
            );

           $strJson=str_replace($busqueda,$reemplazo, $cadena);
           $arregloDatos=json_decode($strJson, true);

            try{
             $response_api =  $curl->request('post',$solicitud_url, [
              'form_params' => $arregloDatos, 'headers' => ['Accept' => 'application/json']
               ]);
            }catch (\Exception $e){
               return $e->getMessage();
            } 

          }

          if(strip_tags($response_api->getBody()) == 'Error B01: Low Balance!'){
            $array_devolver['creditos'] = $saldo_general;
            $array_devolver['result'] = "<span style = 'color:red;'>Hubo un problema.<br>Consulte a su administrador.</span>";
            $array_devolver['result_html'] = $response_api->getBody();
            $this->guardar_consultar_check($imei, $fecha, $response_api->getBody(), $this->session->get("idusuario"));
          }else{             
            $datos_user = array('idusuario' => $this->session->get("idusuario"), 'saldo_general' => $saldo_general - $costo);
            $this->usuario_model->updateSaldoGeneral($datos_user);
            $array_devolver['creditos'] = $saldo_general - $costo;
            $array_devolver['result'] = strip_tags($response_api->getBody());
            $array_devolver['result_html'] = $response_api->getBody();
            $this->guardar_consultar_check($imei, $fecha, $response_api->getBody(), $this->session->get("idusuario"));
          }
          
          
      }

      echo json_encode($array_devolver);  
  }


  public function guardar_consultar_check($imei_nroserial, $fecha, $response, $idusuario){
    
     $datos = array("imei_nroserial" => $imei_nroserial, "fecha" => $fecha, "response" => $response, "idusuario" => $idusuario);
     $this->checkapi_model->guardar_consultar_check($datos);

  }


  public function insertar_check(){

    if($this->request->getPost()) {
      $array_devolver=[];

      $idusuario = $this->session->get("idusuario");
      $appleid   = $this->request->getPost("email");
      $password  = $this->request->getPost("password");
      $response  = $this->request->getPost("response");          
      $fecha     = date('Y-m-d H:i:s');

      $datos = array("appleid" => $appleid, "password" => $password, "response" => $response, "fecha" => $fecha, "idusuario" => $idusuario);
      if($this->remover_model->set_autoremove_manual($datos)){
        $array_devolver['statusAdd'] = true;
      }else{
        $array_devolver['statusAdd'] = false;
      }
      echo json_encode($array_devolver);  
    }

  
  }

public function get_all_check(){
  
  $response = $this->checkapi_model->get_consultar_check($this->session->get("idusuario"));
  echo json_encode(array('data' => $response));

}

public function eliminar_check(){
   if($this->request->getPost()){
      $array_devolver=[]; 
        $id_check = $this->request->getPost("id_check");
        if($this->checkapi_model->eliminar_check($id_check)){
          $array_devolver['statusDelete'] = true;
        }else{
          $array_devolver['statusDelete'] = false;
        }
         echo json_encode($array_devolver);  
    }
}




  

}  