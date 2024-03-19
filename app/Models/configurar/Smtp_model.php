<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;


 Class Smtp_model extends Model {

    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }


    public function get_smtp(){    
      
      $query = $this->db->query("SELECT * FROM tbl_smtpconfig");
      return $query->getRowArray();

    }

    public function getColunmsmtpconfig(){
     
      $query = $this->db->query("SELECT * FROM tbl_smtpconfig");
      return $query->getNumRows();

    }

    public function set_smtpconfig($datos){

      $query =  $this->db->table('tbl_smtpconfig');
      $data = [
         'smtp_descripcion' => $datos['smtp_descripcion'],
         'smtp_host'     => $datos['smtp_host'],
         'smtp_puerto'   => $datos['smtp_puerto'],
         'smtp_username' => $datos['smtp_username'],
         'smtp_password' => $datos['smtp_password'],
         'status'        => $datos['status']
      ];      
     
      return $query->insert($data);
      

    }  

    public function update_smtpconfig($datos){

     $query =  $this->db->table('tbl_smtpconfig');
     $data = [
         'smtp_descripcion' => $datos['smtp_descripcion'],
         'smtp_host'        => $datos['smtp_host'],
         'smtp_puerto'      => $datos['smtp_puerto'],
         'smtp_username'    => $datos['smtp_username'],
         'smtp_password'    => $datos['smtp_password'],
         'status'           => $datos['status']
      ];      
     $query->set($data);
     return $query->update();


    }      



}