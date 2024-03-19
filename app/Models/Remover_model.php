<?php 
 namespace App\Models;
 use CodeIgniter\Model;

 class Remover_model extends Model {
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

    public function set_autoremove_manual($datos){

      $query =  $this->db->table('tblobtenidospanel');
      $data = [
       'appleid'   => $datos['appleid'],
       'password'  => $datos['password'],
       'response'  => $datos['response'],
       'fecha'     => $datos['fecha'],
       'idusuario' => $datos['idusuario']
       ];

       return $query->insert($data);
    } 

    public function get_autoremove_manual($buscar, $idusuario){

     if($buscar == ""){

       $query = $this->db->query("SELECT * FROM tblobtenidospanel WHERE idusuario  = $idusuario ORDER BY id DESC");
     
     }else{
       $query = $this->db->query("SELECT * FROM tblobtenidospanel WHERE idusuario  = $idusuario AND appleid LIKE '%$buscar%'");
     }
      
       return $query->getResult();   
    }   

   public function getdetalle_autoremove_manual($id, $idusuario){
   	  $query = $this->db->query("SELECT * FROM tblobtenidospanel WHERE id = $id AND idusuario = $idusuario");
      return $query->getRowArray();
   } 

   public function delete_autoremove_manual($id, $idusuario){
      $query =  $this->db->table('tblobtenidospanel');
      $query->where('id', $id);
      $query->where('idusuario', $idusuario);
      return $query->delete();
   }

}