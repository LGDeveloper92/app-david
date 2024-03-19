<?php 
namespace App\Controllers\Configurar;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Smsapi_model;
use App\Models\configurar\Api_model;

class Smsapi extends BaseController {
	  protected $server_model;
    protected $usuario_model; 
    protected $smsapi_model;
    protected $api_model;
    protected $sesion; 
    protected $client;


    function __construct(){

      $this->server_model  = new Server_model();
      $this->usuario_model = new Usuario_model();
      $this->smsapi_model  = new Smsapi_model();
      $this->api_model     = new Api_model();

      $this->session = \Config\Services::session();
      $this->client  = \Config\Services::curlrequest();

    }

	public function index(){  
	  $datos['server'] = $this->server_model->get_server();
      $datos['sessionrol']    = $this->session->get("rol");     
      $datos['datosuser']     = $this->usuario_model->get_usuarioID($this->session->get("idusuario"));
      $datos['idusuarioPost'] = $this->session->get("idusuario");
      $datos['get_apissms']   = $this->smsapi_model->all_smsapis("");
      echo view("inc/header",$datos);
      echo view("configurar/smsapi",$datos);
	}

	public function all_smsapis(){
      if($this->request->getPost()) {
        $buscar = $this->request->getPost("buscar");
        $response = $this->smsapi_model->all_smsapis($buscar);
        echo json_encode($response);
      }

	}
  
  public function get_smsapi(){
    if($this->request->getPost()) {
      $id_apisms = $this->request->getPost("id_apisms");
      $response = $this->smsapi_model->get_smsapi($id_apisms);
      echo json_encode($response);
    }
  }


	public function eliminar_smsapi(){
	  if($this->request->getPost()){
	  	$array_devolver=[]; 
        $id_apisms = $this->request->getPost("id_apisms");
        if($this->smsapi_model->eliminar_smsapi($id_apisms)){
          $array_devolver['statusDelete'] = true;
        }else{
          $array_devolver['statusDelete'] = false;
        }
         echo json_encode($array_devolver);  
	  }
	}


  public function editar_smsapi(){

      if($this->request->getPost()) {
        $array_devolver=[]; 
        $idusuario              = $this->session->get("idusuario");               
        $descripcion_api        = $this->request->getPost("descripcion_api");
        $descripcion_cliente    = $this->request->getPost("descripcion_cliente");
        $solicitud_url          = $this->request->getPost("solicitud_url");
        $solicitud_token        = $this->request->getPost("solicitud_token");
        $solicitud_apikey       = $this->request->getPost("solicitud_apikey");
        $costo                  = $this->request->getPost("costo");

        $datos = array('descripcion_cliente' => $descripcion_cliente, 'descripcion_api' => $descripcion_api, 'solicitud_url' => $solicitud_url, 'solicitud_token' => $solicitud_token, 'solicitud_apikey' => $solicitud_apikey, "costo" => $costo);

        
              
        if($this->smsapi_model->editar_smsapi($datos)){
            $array_devolver['statusAdd'] = true;
        }else{
            $array_devolver['statusAdd'] = false;
        }

              
         

           /**/

            echo json_encode($array_devolver);  
    }

  }


	public function agregar_smsapi(){

	    if($this->request->getPost()) {
	    	$array_devolver=[]; 
	    	$idusuario           = $this->session->get("idusuario");               
            $descripcion_api       = $this->request->getPost("descripcion_api");
            $descripcion_cliente   = $this->request->getPost("descripcion_cliente");
            $solicitud_url         = $this->request->getPost("solicitud_url");
            $solicitud_token       = $this->request->getPost("solicitud_token");
            $solicitud_apikey      = $this->request->getPost("solicitud_apikey");

            $datos = array('descripcion_cliente' => $descripcion_cliente, 'descripcion_api' => $descripcion_api, 'solicitud_url' => $solicitud_url, 'solicitud_token' => $solicitud_token, 'solicitud_apikey' => $solicitud_apikey, );

           if($this->smsapi_model->verificar_smsapi($descripcion_api)){
    	      	$array_devolver['statusAdd'] = false;
    	      	$array_devolver['msg'] = 'API_EXISTE';
    	    }else{
              
               if($this->smsapi_model->agregar_smsapi($datos)){
            	 $array_devolver['statusAdd'] = true;
            	 $array_devolver['msg'] = 'API_REGISTRADA';
               }else{
            	 $array_devolver['statusAdd'] = false;
            	 $array_devolver['msg'] = 'API_NO_REGISTRADA';
               }

    	        
    	    } 

           /**/

            echo json_encode($array_devolver);  
		}

	}


  public function agregar_senderid(){

      if($this->request->getPost()) {
        $array_devolver=[]; 
        $idusuario           = $this->session->get("idusuario");               
        $descripcion         = $this->request->getPost("descripcion");
        $valor               = $this->request->getPost("valor");
        $descripcion_cliente = $this->request->getPost("descripcion_cliente");  
        $id_apisms           = $this->request->getPost("id_apisms");  
        
              
        if($this->api_model->set_sender($descripcion, $valor, $descripcion_cliente, $id_apisms)){
          $array_devolver['statusAdd'] = true;
        }else{
          $array_devolver['statusAdd'] = false;
        }

         echo json_encode($array_devolver);  
    }

  }

  public function lista_senderid(){
    $response = $this->api_model->get_senders();
    echo json_encode($response);
  }


  public function getsendersid(){

    if($this->request->getPost()){     
      $id_apisms = $this->request->getPost("id_apisms"); 
      $response = $this->api_model->get_sendersid_apisms($id_apisms);
      echo json_encode($response); 
    }

  }

  public function eliminar_sender_smsapi(){
   
    if($this->request->getPost()){
      $array_devolver=[]; 
        $idsender = $this->request->getPost("idsender");
        if($this->api_model->eliminarsender($idsender)){
          $array_devolver['statusDelete'] = true;
        }else{
          $array_devolver['statusDelete'] = false;
        }
         echo json_encode($array_devolver);  
    }

  }





	public function sendsms(){

        $curl = \Config\Services::curlrequest();
        
        

        $api_key   = "ZRiEwyV3bz";
        $api_token = "9RCOvegiVV";       
        $sender_id = 'usa';
        $api_id = '18';

		$posts_data = $curl->request('get', 'https://senders-global.com/api/envioApi/?envioApi&api_key='.$api_key.'&api_token='.$api_token.'&sender_id='.$sender_id.'&api_id='.$api_id.'&number=584249998552&msj=Hola', [
			'headers' => [
				'Accept' => 'application/json'
			]/*,
			'form_params' => [
                'ext_number' => '58',
                'number'  => '4249998552',
                'message' => 'Hola',
                'apikey'  => 'P17E-3ZIV-SKNR-BR8J-XZ1F',
                'option'  => 'SendSMS',
                'select_sender' => 'Verify'
            ],*/
		]);

		echo "<pre>";
		print_r($posts_data);

	 /*$response =  $this->client->request('post','https://www.sms-raptorserver.com/API/', [
        'form_params' => [
                'ext_number' => '58',
                'number'  => '4249998552',
                'message' => 'Hola',
                'apikey'  => 'P17E-3ZIV-SKNR-BR8J-XZ1F',
                'option'  => 'SendSMS',
                'select_sender' => 'Apple'
        ],
         'headers' => [
                'Accept'     => 'application/json'
        ]
        ]);
      echo "<pre>";
	  print_r($response);*/
	}
}