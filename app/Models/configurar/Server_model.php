<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;


 Class Server_model extends Model {

    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }



   public function getColunmserver(){
     
      $query = $this->db->query("SELECT * FROM tblserver WHERE idserver = 1");
      return $query->getNumRows();

    }   

    public function get_server(){    
      
      $query = $this->db->query("SELECT * FROM tblserver WHERE idserver = 1");
      return $query->getRowArray();

    } 

    public function set_server($datos){

      $query =  $this->db->table('tblserver');
      $data = [
         'idserver' => $datos['idserver'],
         'statussl'  => $datos['sslserv'],
         'descripcionserver'  => $datos['descripcionserver'],
         'dominio' => $datos['dominioserver'],
         'urlaccess' => $datos['urlaccess'],
         'token_access' => $datos['token_access'],
         'msg_notificacion' => $datos['msg_notificacion'],
         'status_msg_notificacion' => $datos['status_msg_notificacion'],
         'key_api_check' => $datos['key_api_check']
      ];      
     
      return $query->insert($data);
      

   }

    public function update_server($datos){

     $query =  $this->db->table('tblserver');
     $data = [
        'statussl' => $datos['sslserv'],
        'descripcionserver'  => $datos['descripcionserver'],
        'dominio'  => $datos['dominioserver'],
        'urlaccess' => $datos['urlaccess'],
        'token_access' => $datos['token_access'],
         'msg_notificacion' => $datos['msg_notificacion'],
         'status_msg_notificacion' => $datos['status_msg_notificacion'],
         'key_api_check' => $datos['key_api_check']
      ];
     $query->set($data);
     $query->where('idserver', 1);    

     return $query->update();


    }      


  



 }







