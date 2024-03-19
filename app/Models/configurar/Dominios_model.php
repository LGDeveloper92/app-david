<?php  
 namespace App\Models\configurar;
 use CodeIgniter\Model;


class Dominios_model extends Model {

    protected $db;
    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }


public function get_dominios($idusuario,$buscar){

       if($buscar == ""){

         $query = $this->db->query("SELECT * FROM tbldomains WHERE idusuario = $idusuario ORDER BY iddomains DESC");
     
       }else{
         $query = $this->db->query("SELECT * FROM tbldomains WHERE idusuario = $idusuario  AND (domains LIKE '%$buscar%' OR dirdomains LIKE '%$buscar%') ORDER BY iddomains DESC");
       }
      
       return $query->getResult();      
    }
  
  public function get_dominio($domains){

      $query = $this->db->query("SELECT * FROM tbldomains WHERE domains = '$domains'");
      return $query->getRowArray();
  }  

  public function get_dominiosid($iddomains){

      $query = $this->db->query("SELECT * FROM tbldomains WHERE iddomains = $iddomains");
      return $query->getRowArray();
  }  

  public function insertardominio($datos){

      $query =  $this->db->table('tbldomains');
      $data = [
         'domains'    => $datos['dominio'],
         'dirdomains' => $datos['rutaD'],
         'suddomains' => $datos['subdominio'],
         'idusuario'  => $datos['idusuario']
      ];      
     
      return $query->insert($data);

  }  


   public function eliminardominio($datos){

      $query =  $this->db->table('tbldomains');
      $query->where('iddomains', $datos['iddomains']);
      $query->where('idusuario', $datos['idusuario']);
      return $query->delete();
      
  }  



}    
