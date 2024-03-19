<?php 
 namespace App\Models;
 use CodeIgniter\Model;


 Class Model_prueba extends Model {

   function __construct(){
      parent::Model();
   }
    
   public function conect_db(){
     $db = \Config\Database::connect('default');
   	 return $db;
   }

   public function select_one(){
   	  
   	  $idtempsms = 4;
   	  $query = $this->db->query("SELECT * FROM tblsmstemplates WHERE idtempsms = $idtempsms");
         return $query->getResult();
   }



 }







