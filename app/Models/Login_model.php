<?php 
 namespace App\Models;
 use CodeIgniter\Model;


 Class Login_model extends Model {

    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

   public function iniciarsesion($email){

      $query = $this->db->query("SELECT * FROM tbluser WHERE email = '$email'");
      return $query->getRowArray();
       
       $qry = "SELECT * FROM tbluser                  
                 WHERE  email  = :email"; 
       $sql = $this->db->conn_id->prepare($qry);
       $sql->bindParam(':email', $user,PDO::PARAM_STR);
         //$sql->bindParam(':pw',$pass,PDO::PARAM_STR);
     
       $sql->execute();
       $resultado = $sql->fetch(PDO::FETCH_ASSOC);
       return $resultado;
   }


    



 }







