<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;


class Api_model extends Model {
  	
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }



    
    public function set_bottelegram($datos){

      $query =  $this->db->table('tbltelegram');
      $data = [
         'tokenbot'  => str_replace(' ', '',$datos['tokenbot']),
         'chatid'    => str_replace(' ', '',$datos['chatid']),
         'idusuario' => $datos['idusuario']
      ];      
     
      return $query->insert($data);
    }

     public function update_bottelegram($datos){

      $query =  $this->db->table('tbltelegram');
      $data = [
          'tokenbot'  => str_replace(' ', '',$datos['tokenbot']),
         'chatid'    => str_replace(' ', '',$datos['chatid'])
      ]; 
      $query->set($data);
      $query->where('idusuario',$datos['idusuario']);
      return $query->update();

    } 

    public function getColunmbottelegram($idusuario){

      $query = $this->db->query("SELECT * FROM tbltelegram WHERE idusuario = $idusuario");
      return $query->getNumRows();

    } 


     public function get_bottelegram($idusuario){

      $query = $this->db->query("SELECT * FROM tbltelegram WHERE idusuario = $idusuario");
      return $query->getRowArray();

    } 



    /**************************** API TWILIO*************************************/ 

    public function set_apitwilio($datos){

      $query =  $this->db->table('apicallcenter');
      $data = [
         'idapicallcenter'  => $datos['idapicallcenter'],
         'accountsidtwilio' => $datos['accountsidtwilio'],
         'authtokentwilio'  => $datos['authtokentwilio'],
         'numerotwilio'     => $datos['numerotwilio']
      ];      
     
      return $query->insert($data);
      

    }

     public function update_apitwilio($datos){

      $query =  $this->db->table('apicallcenter');
      $data = [
       'accountsidtwilio' => $datos['accountsidtwilio'],
       'authtokentwilio'  => $datos['authtokentwilio'],
       'numerotwilio'     => $datos['numerotwilio'],
       'costo'            => $datos['costo']
       ];
      $query->set($data);
      $query->where('idapicallcenter',$datos['idapicallcenter']);
      return $query->update();

    } 

    public function getColunmatwilio(){

     $query = $this->db->query("SELECT * FROM apicallcenter");
     return $query->getNumRows(); 

    } 


     public function get_apitwilio(){

      $query = $this->db->query("SELECT * FROM apicallcenter");
      return $query->getRowArray();

    }


    public function set_sender($descsender, $valor, $descripcion_cliente, $id_apisms){

      $query =  $this->db->table('tblsender');
      $data = [
         'descripcion'  => $descsender,
         'valor'        => $valor,
         'descripcion_cliente' => $descripcion_cliente,
         'id_apisms'  => $id_apisms      
      ];      
     
      return $query->insert($data);
    
     

    }  

   public function get_senders(){

       $query = $this->db->query("SELECT * FROM tblsender ORDER BY idsender DESC");
       return $query->getResult();  
   }
   
   public function get_sendersid_apisms($id_apisms){

       $query = $this->db->query("SELECT * FROM tblsender WHERE id_apisms = $id_apisms ORDER BY idsender DESC");
       return $query->getResult();  
   }

   public function get_senderid($id_apisms, $sender_id){

       $query = $this->db->query("SELECT * FROM tblsender WHERE id_apisms = $id_apisms AND idsender = $sender_id");
       return $query->getRowArray();
   }   


   public function eliminarsender($idsender){

      $query =  $this->db->table('tblsender');
      $query->where('idsender', $idsender);
      return $query->delete();

    }
    



 
}


