<?php 
 namespace App\Models;
 use CodeIgniter\Model;

 class Ipblocker_model extends Model {
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

    public function set_ipblocker($datos){

      $query =  $this->db->table('tbl_ip_blocked');
      $data = [
       'ip_adress '       => $datos['ip_adress'],
       'pais'             => $datos['pais'],
       'ciudad'           => $datos['ciudad'],
       'status_ip'        => $datos['status_ip'],
       'tipo_status'      => $datos['tipo_status'],
       'cantidad_visitas' => $datos['cantidad_visitas'],
       'url_dominio'      => $datos['url_dominio'],
       'fecha_ip'         => $datos['fecha_ip'],
       'idusuario'        => $datos['idusuario']
       ];

       return $query->insert($data);
    } 

   public function update_ipblocker($datos){
     $query =  $this->db->table('tbl_ip_blocked');
     $data = [
       'pais'             => $datos['pais'],
       'ciudad'           => $datos['ciudad'],
       'status_ip'        => $datos['status_ip'],
       'tipo_status'      => $datos['tipo_status'],
       'cantidad_visitas' => $datos['cantidad_visitas'],
       'url_dominio'      => $datos['url_dominio'],
       'fecha_ip'         => $datos['fecha_ip'],
       'idusuario'        => $datos['idusuario']
     ];
      $query->set($data);    
      $query->where('idusuario', $datos['idusuario']);
      $query->where('ip_adress', $datos['ip_adress']);
      return $query->update();
  }  
 
 
  public function get_ipblocker($ip_adress, $idusuario){

    $query = $this->db->query("SELECT * FROM tbl_ip_blocked WHERE ip_adress = '$ip_adress' AND idusuario = $idusuario ");
    return $query->getRowArray();
  } 

  public function get_all_ipblocker($idusuario){
        
      $query = $this->db->query("SELECT * FROM tbl_ip_blocked WHERE  idusuario = $idusuario ORDER BY id DESC ");
      return $query->getResult();
  }  
 public function delete_IP($id, $idusuario){

      $query =  $this->db->table('tbl_ip_blocked');
      $query->where('id', $id);
      $query->where('idusuario', $idusuario);
      return $query->delete(); 
} 

public function update_status($datos){

     $query =  $this->db->table('tbl_ip_blocked');
     $data = [
       'status_ip' => $datos['status_ip']
     ];
      $query->set($data);    
      $query->where('id', $datos['id']);
      $query->where('idusuario', $datos['idusuario']);
      return $query->update();

} 

public function update_status_api($datos){

     $query =  $this->db->table('tbl_ip_blocked');
     $data = [
       'status_ip' => $datos['status_ip']
     ];
      $query->set($data);    
      $query->where('ip_adress', $datos['ip_adress']);
      $query->where('idusuario', $datos['idusuario']);
      return $query->update();

}   



    


}