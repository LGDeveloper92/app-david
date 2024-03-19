<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;


class Checkapi_model extends Model {
  	
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }


   function save_checkapi($datos){

        $query =  $this->db->table('tblapicheck');

        $data = [
         "id_servicio" => $datos['id_servicio'], 
         "descripcion_api" => $datos['descripcion_api'],
         "descripcion_cliente" => $datos['descripcion_cliente'],
         "solicitud_url" => $datos['solicitud_url'],
         "solicitud_parametros" => $datos['solicitud_parametros'],
         "solicitud_tipo" => $datos['solicitud_tipo'],
         "solicitud_apikey" => $datos['solicitud_apikey'],
         "solicitud_token" => $datos['solicitud_token'],
         "costo" => $datos['costo'],
         "descripcion_servicio" => $datos['descripcion_servicio']
        ]; 
        return $query->insert($data);
  }

  public function verificar_checkapi($descripcion_api){
       
      $query = $this->db->query("SELECT * FROM tblapicheck WHERE descripcion_api = '$descripcion_api'");
      return $query->getNumRows(); 

  }

  public function get_all_servicios_api(){
        
      $query = $this->db->query("SELECT * FROM tblapicheck ORDER BY id DESC ");
      return $query->getResult();
  }

 public function get_servicio_api($id){

    $query = $this->db->query("SELECT * FROM tblapicheck  WHERE id = $id");
    return $query->getRowArray();
 }   

public function update_checkapi($datos){

  $query =  $this->db->table('tblapicheck');

  $data = [
         "id_servicio" => $datos['id_servicio'], 
         "descripcion_api" => $datos['descripcion_api'],
         "descripcion_cliente" => $datos['descripcion_cliente'],
         "solicitud_url" => $datos['solicitud_url'],
         "solicitud_parametros" => $datos['solicitud_parametros'],
         "solicitud_tipo" => $datos['solicitud_tipo'],
         "solicitud_apikey" => $datos['solicitud_apikey'],
         "solicitud_token" => $datos['solicitud_token'],
         "costo" => $datos['costo'],
         "descripcion_servicio" => $datos['descripcion_servicio']
        ]; 

  $query->set($data);
  $query->where('id',$datos['id']);
  return $query->update();

}


public function eliminar_checkapi($id){

  $query =  $this->db->table('tblapicheck');
  $query->where('id', $id);
  return $query->delete();


}

/**********************CONSULTAS CHECK*****************************************/

public function guardar_consultar_check($datos){
  $query =  $this->db->table('tblcheck');

  $data = [
    "imei_nroserial" => $datos['imei_nroserial'], 
    "fecha" => $datos['fecha'],
    "response" => $datos['response'],
    "idusuario" => $datos['idusuario']
  ]; 
  return $query->insert($data);  
}  

public function get_consultar_check($idusuario){
        
    $query = $this->db->query("SELECT * FROM tblcheck WHERE idusuario = '$idusuario' ORDER BY id_check DESC ");
    return $query->getResult();
}


public function eliminar_check($id_check){

  $query =  $this->db->table('tblcheck');
  $query->where('id_check', $id_check);
  return $query->delete();


}


}
