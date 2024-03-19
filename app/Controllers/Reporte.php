<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

use App\Models\configurar\Server_model;
use App\Models\configurar\Usuario_model;
use App\Models\configurar\Cpanel_model;
use App\Models\Reporte_model;

class Reporte extends BaseController {

  protected $server_model;
  protected $usuario_model;
  protected $cpanel_model;
  protected $reporte_model;

  function __construct(){

   	$this->server_model  = new Server_model();
    $this->usuario_model = new Usuario_model();
    $this->cpanel_model  = new Cpanel_model();
    $this->reporte_model = new Reporte_model();

    $this->session = \Config\Services::session();
   
   }


	public function index(){  

    $datos['idusuarioPost'] = $this->session->get("idusuario");
    $datos['server'] = $this->server_model->get_server();
    $datos['datosuser']  = $this->usuario_model->get_usuarioID($this->session->get('idusuario'));
    $datos['usuarios']   = $this->usuario_model->get_usuarios("");
    $datos['sessionrol'] = $this->session->get("rol"); 
    $datos['dominio'] = $this->reporte_model->get_dominio($this->session->get("idusuario"));
    $datos['cpanel'] = $this->cpanel_model->get_cpanelapi();
    echo view('inc/header', $datos);
    echo view('reporte', $datos);
		
	}




 public function agregardominio(){

   if($this->request->getPost()) {
     
      $array_devolver=[];
      $idusuario   = $this->session->get("idusuario");
      $dominio     = $this->request->getPost("dominio");
      $descripcion = $this->request->getPost("dominio");
      $directorio  = "/app_reporte";
      $subdominio  = "subdomain.".$dominio;



      if($this->reporte_model->verificardominio_user($idusuario) == 0){

          $datos = array("dominio" => $dominio, "descripcion" => $dominio, "directorio" => $directorio, "subdominio" => $subdominio, "idusuario" => $idusuario);

             if($this->reporte_model->insertardominio($datos)){
                 $array_devolver['statusAdd'] = true;
                 $array_devolver['statusMsg'] = 'Dominios agregado correctamente';
              }else{
                $array_devolver['statusAdd'] = false;
                $array_devolver['statusMsg'] = 'Dominio ya registrado o invalido';
              }

              echo json_encode($array_devolver);    
         
         


      }else{

        $array_devolver['statusAdd'] = false;
        $array_devolver['statusMsg'] = 'Este usuario ya tiene asignado un dominio.';
        echo json_encode($array_devolver);    


      }

    


   }

 } 


 public function eliminardominio(){

      if($this->reporte_model->eliminareDominio($this->session->get("idusuario"))){
          $array_devolver['status'] = true;
          $array_devolver['statusMsg'] = 'Dominios eliminado correctamente';
      }else{
        $array_devolver['status'] = false;
        $array_devolver['statusMsg'] = 'Hubo un problema al eliminar el domionio';
      }

      echo json_encode($array_devolver);    
         
          

 }

  public function getreporte(){
      
      if($this->request->getPost()) {
       $idusuario = $this->request->getPost("idusuario");
       $response = $this->reporte_model->reporte($idusuario);
       echo json_encode($response);
      }
    } 




  public function resetreporteStatus(){

    if($this->request->getPost()) {
       $array_devolver=[];

       $idusuario = $this->session->get("idusuario");
       $statusreporte   = $this->request->getPost("statusreporte");

    

      
          $datos = array("idusuario" => $idusuario, "statusreporte" => $statusreporte);


         if($this->reporte_model->updateReporteLink($datos)){
         
             $array_devolver['statusAdd'] = true;
             $array_devolver['formError'] = false;

         }else{

            $array_devolver['statusAdd'] = false;

         }  

     

       echo json_encode($array_devolver);  
        


    }


  }



 public function resetcodigo(){
   if($this->request->getPost()) {
       $array_devolver=[];

        $idusuario = $this->session->get("idusuario");
        $codigo    = $this->request->getPost("codigo");   
        
        $datos = array("idusuario" => $idusuario, "codigo" => $codigo);

        if($this->reporte_model->resetcodigouser($idusuario, $codigo)){         
             $array_devolver['status'] = true;
        }else{
            $array_devolver['status'] = false;
        }  

     

       echo json_encode($array_devolver);  
        


    }
  
 }


  public function getAllobtenidos_reporte(){
      if($this->request->getPost()) {
       $buscarequipo = $this->request->getPost("buscarequipo");
       $response = $this->reporte_model->get_obtenidos_reporte($this->session->get("idusuario"), $buscarequipo);
       echo json_encode($response);
      }
  }

  public function getobtenido_reporte(){
      
      if($this->request->getPost()) {
       $id = $this->request->getPost("id");
       $response = $this->reporte_model->get_obtenidoID_reporte($this->session->get("idusuario"), $id);
       echo json_encode($response);
      }
  }

  public function eliminarobtenido(){

      if($this->request->getPost()) {
       $array_devolver=[];
       
       $idusuario = $this->session->get("idusuario");
       $id = $this->request->getPost("id");
     
       if($this->reporte_model->eliminareObtenido_reporte($idusuario, $id)){
        
          $array_devolver['statusdelete'] = true;

       }else{
         $array_devolver['statusdelete'] = false;
       }   
         echo json_encode($array_devolver);  
        
    }   

  }



}  