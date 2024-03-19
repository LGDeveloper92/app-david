<?php
 namespace App\Models\configurar;
 use CodeIgniter\Model;

class Cpanel_model extends Model {

    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }


 public function set_cpanelapi($datos){

      $query =  $this->db->table('tblcpanelapi');
      $data = [
         'idcpanelapi'    => $datos['idcpanelapi'],
         'rutacpanelapi'  => $datos['rutacpanelapi'],
         'usercpanelapi'  => $datos['usercpanelapi'],
         'passcpanelapi'  => $datos['passcpanelapi'],
         'ip_cpanel'      => $datos['ip_cpanel'],
         'dominio_cpanel' => $datos['dominio_cpanel'],
         'nameserver1'    => $datos['nameserver1'],
         'nameserver2'    => $datos['nameserver2'],
         'nameserver3'    => $datos['nameserver3'],
         'nameserver4'    => $datos['nameserver4']
      ];      
     
      return $query->insert($data);
     
      

   }

  public function getColunmcpanelapi(){

     $query = $this->db->query("SELECT * FROM tblcpanelapi");
     return $query->getNumRows();

  }   

  public function get_cpanelapi(){
      $query = $this->db->query("SELECT * FROM tblcpanelapi");
      return $query->getRowArray();
    }  

    public function update_cpanelapi($datos){


      $query =  $this->db->table('tblcpanelapi');
      $data = [
       'rutacpanelapi'  => $datos['rutacpanelapi'],
       'usercpanelapi'  => $datos['usercpanelapi'],
       'passcpanelapi'  => $datos['passcpanelapi'],
       'ip_cpanel'      => $datos['ip_cpanel'],
       'dominio_cpanel' => $datos['dominio_cpanel'],
       'nameserver1'    => $datos['nameserver1'],
       'nameserver2'    => $datos['nameserver2'],
       'nameserver3'    => $datos['nameserver3'],
       'nameserver4'    => $datos['nameserver4']
       ];
      $query->set($data);
      return $query->update();

    }      
}

    