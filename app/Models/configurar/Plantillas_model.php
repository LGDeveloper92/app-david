<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;

 class Plantillas_model extends Model {
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

    public function get_smstemplates($buscar){

     if($buscar == ""){

       $query = $this->db->query("SELECT * FROM tblsmstemplates ORDER BY idtempsms DESC");
     
     }else{
       $query = $this->db->query("SELECT * FROM tblsmstemplates WHERE titulosms LIKE '%$buscar%' OR descripsms LIKE '%$buscar%'");
     }
      
       return $query->getResult();   
    }  

    public function getplantillaid($idtempsms){

       $query = $this->db->query("SELECT * FROM tblsmstemplates WHERE idtempsms = $idtempsms");
       return $query->getRowArray();

    }  

     public function getColunmSMSTemplates($idusuario){

      $query = $this->db->query("SELECT * FROM tblsmstemplates");
      return $query->getNumRows();
    } 



     public function set_SMSTemplates($datos){

      $query =  $this->db->table('tblsmstemplates');
      $data = [
       'titulosms'  => $datos['titulo'],
       'descripsms' => $datos['descripcion']
       ];


       return $query->insert($data);
      

    }

    public function update_SMSTemplates($datos){


      $query =  $this->db->table('tblsmstemplates');
      $data = [
       'titulosms'  => $datos['tdtitulosms'],
       'descripsms' => $datos['tddescripsms']
       ];

      $query->set($data);
      $query->where('idtempsms',$datos['idtempsms']);
      return $query->update();

    } 


    public function delete_SMSTemplates($datos){

      $query =  $this->db->table('tblsmstemplates');
      $query->where('idtempsms', $datos['idtempsms']);
      return $query->delete();  

    } 




 }