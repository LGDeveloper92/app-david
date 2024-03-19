<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;

class Callcenter_model extends Model {
    protected $db;  

      
    public function __construct(){
      $this->db = \Config\Database::connect('default');
    }
       






    public function get_audiocall($buscar){

     if($buscar == ""){

       $query = $this->db->query("SELECT * FROM audiocallcenter ORDER BY idaudiocallcenter DESC");
     
     }else{
       $query = $this->db->query("SELECT * FROM audiocallcenter WHERE titulo LIKE '%$buscar%' OR rutaaudio LIKE '%$buscar%'");
     }
      
       return $query->getResult(); 
    
    }   


    public function select_apicallcenter($idusuario){
     
      $query = $this->db->query("SELECT * FROM audiocallcenter");
      return $query->getRowArray();

    }  

     public function getColunmaudiocall($idusuario){

      $query = $this->db->query("SELECT * FROM audiocallcenter");
      return $query->getNumRows();

    } 



     public function set_audiocall($datos){

      $query =  $this->db->table('audiocallcenter');
      $data = [
         'titulo' => $datos['titulo'],
         'rutaaudio' => $datos['rutaaudio']
      ];      
     
      return $query->insert($data);

    }

    public function update_audiocall($datos){

      $query =  $this->db->table('audiocallcenter');
      $data = [
       'titulo' => $datos['tdtituloM'],
       'rutaaudio' => $datos['tdrutaaudioM'],
       'idaudiocallcenter' => $datos['idaudiocallcenter']
       ];
      $query->set($data);
      $query->where('idaudiocallcenter',$datos['idaudiocallcenter']);
      return $query->update();
    } 


     public function delete_audiocall($datos){

      $query =  $this->db->table('audiocallcenter');
      $query->where('idaudiocallcenter', $datos['idaudiocallcenter']);
      return $query->delete();

    } 




 }