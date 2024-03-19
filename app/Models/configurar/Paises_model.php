<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;

class Paises_model extends Model {
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }




    public function get_paises(){
       $query = $this->db->query("SELECT * FROM paises ORDER BY nombre ASC");
       return $query->getResult();      
    } 


    public function get_prefijo($pais){

       $query = $this->db->query("SELECT prefijo FROM paises WHERE nombre = '$pais'");
       return $query->getRowArray();
      
    } 

}    
