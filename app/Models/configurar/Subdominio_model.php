<?php
 namespace App\Models\configurar;
 use CodeIgniter\Model;

class Subdominio_model extends Model {
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }
    
   
   public function get_subdominios($idusuario,$buscar){

      if($buscar == ""){

         $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario ORDER BY idsubdomains DESC");
     
       }else{
         $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario  AND (subdomains LIKE '%$buscar%' OR dirsubdomains LIKE '%$buscar%') ORDER BY idsubdomains DESC");
       }
      
       return $query->getResult();   
     


    }

    public function verificarsubdominio($idusuario, $subdomains){

      $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario AND subdomains = '$subdomains'");
      return $query->getNumRows(); 
    }  


    public function seleccionarsubdominio_descripcion($subdomains){

      $query = $this->db->query("SELECT * FROM tblsubdomains WHERE subdomains = '$subdomains'");
      return $query->getRowArray();
    } 


    public function seleccionarsubdominio($idusuario){

      $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario");
      return $query->getResult();
    } 

    public function subdomains($idusuario,$tipo){

      $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario AND tipo = '$tipo'");
      return $query->getResult();
  
    } 

    

     public function subdomain($idusuario,$tipo){

      $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario AND tipo = '$tipo'");
      return $query->getRowArray();
     
    
    } 




    public function get_subdominiosid($idsubdomains){

      $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idsubdomains = $idsubdomains");
      return $query->getRowArray();
    }  


    public function get_subdominiossubdomain($idusuario,$subdomains){

        $query = $this->db->query("SELECT * FROM tblsubdomains WHERE idusuario = $idusuario AND subdomains = '$subdomains'");
        return $query->getRowArray();
    } 

    

    public function insertarsubdominio_asignado($datos){

      $query =  $this->db->table('tblsubdomains');
      $data = [
         'descripcion'   => $datos['descripcion'],
         'subdomains'    => $datos['subdomains'],
         'dirsubdomains' => $datos['dirsubdomains'],
         'idusuario'     => $datos['idusuario'],
         'asignado'      => $datos['asignado']
      ];      
     
      return $query->insert($data);
 
   }  

    public function insertarsubdominio($datos){

      $query =  $this->db->table('tblsubdomains');
      $data = [
         'descripcion'   => $datos['descripcion'],
         'subdomains'    => $datos['subdomains'],
         'dirsubdomains' => $datos['dirsubdomains'],
         'idusuario'     => $datos['idusuario'],
         'iddomains'     => $datos['iddomains'],
         'acceso'        => $datos['acceso']
      ];      
     
      return $query->insert($data);
 
   }  

   public function eliminarsubdominio($datos){

     $query =  $this->db->table('tblsubdomains');
     $query->where('subdomains', $datos['subdomains']);
     return $query->delete();

 } 

  public function eliminarsubdominioasignado($datos){

     $query =  $this->db->table('tblsubdomains');
     $query->where('idsubdomains', $datos['idsubdomains']);
     $query->where('asignado', $datos['asignado']);
     return $query->delete();

 } 









      
 
}
