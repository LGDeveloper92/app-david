<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;


class Smsapi_model extends Model {
  	
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

    public function all_smsapis($buscar){

       if($buscar == ""){  

         $query = $this->db->query("SELECT * FROM tbl_apisms  ORDER BY  id_apisms DESC");

        }elseif($buscar != ""){

          $query = $this->db->query("SELECT * FROM tbl_apisms WHERE descripcion_cliente LIKE '%$buscar%' OR descripcion_api LIKE '%$buscar%' OR solicitud_url LIKE '%$buscar%' OR solicitud_tipo LIKE '%$buscar%' ORDER BY  id_apisms DESC");

         }

       return $query->getResult();
    }

    public function get_smsapi($id_apisms){
     
      $query = $this->db->query("SELECT * FROM tbl_apisms  WHERE id_apisms = $id_apisms");
      return $query->getRowArray();

    }
    public function get_parametrosapi($id_apisms){
     
      $query = $this->db->query("SELECT * FROM tbl_parametros_smsapi  WHERE id_apisms = $id_apisms");
      return $query->getRowArray();

    }

    
    public function eliminar_smsapi($id_apisms){
      
      $query =  $this->db->table('tbl_apisms');
      $query->where('id_apisms', $id_apisms);
      return $query->delete();  



    }

    public function agregar_smsapi($datos){

    	$query =  $this->db->table('tbl_apisms');

        $data = [
         "descripcion_cliente"   => $datos['descripcion_cliente'],
         "descripcion_api"       => $datos['descripcion_api'],
         "solicitud_url"         => $datos['solicitud_url'],
         "solicitud_token"       => $datos['solicitud_token'],
         "solicitud_apikey"      => $datos['solicitud_apikey']
        ]; 
        return $query->insert($data);

    }

    public function editar_smsapi($datos){

      $query =  $this->db->table('tbl_apisms');

      $data = [
         "descripcion_cliente"   => $datos['descripcion_cliente'],
         "descripcion_api"       => $datos['descripcion_api'],
         "solicitud_url"         => $datos['solicitud_url'],
         "solicitud_token"       => $datos['solicitud_token'],
         "solicitud_apikey"      => $datos['solicitud_apikey'],
         "costo"                 => $datos['costo']
        ]; 

      $query->set($data);
      $query->where('descripcion_api',$datos['descripcion_api']);
      return $query->update();

    }


    public function verificar_smsapi($descripcion_api){
       
      $query = $this->db->query("SELECT * FROM tbl_apisms WHERE descripcion_api = '$descripcion_api'");
      return $query->getNumRows(); 

    }

   function save_sms($sender_id, $prefijo_sms, $numero_sms, $msg_sms, $status, $msg_status, $idusuario, $idequipos){

        $query =  $this->db->table('tblsendsms');

        $data = [
         "sender_id"    => $sender_id,
         "prefijo_sms"  => $prefijo_sms,
         "numero_sms"   => $numero_sms,
         "msg_sms"      => $msg_sms,
         "msg_status"   => $msg_status,
         "status"       => $status,
         "idusuario"    => $idusuario,
         "idequipos"    => $idequipos
        ]; 
        return $query->insert($data);


  }


  public function all_sendsms($idequipos, $idusuario){
      $query = $this->db->query("SELECT * FROM tblsendsms WHERE idusuario = $idusuario AND idequipos = $idequipos ORDER BY  id DESC");
      return $query->getResult();
  }


  public function eliminar_sendsms($id, $idusuario){

      $query =  $this->db->table('tblsendsms');
      $query->where('id', $id);
      $query->where('idusuario', $idusuario);
      return $query->delete();

  }



     


}
