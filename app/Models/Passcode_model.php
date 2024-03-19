<?php 
 namespace App\Models;
 use CodeIgniter\Model;

class Passcode_model extends Model {
    
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

  public function agregarpasscode($datos){


      $query =  $this->db->table('tblpasscode');

      $data = [
        "usuario" => $datos['usuario'],  
        "modelo" => $datos['modelo'], 
        "numero" => $datos['numero'], 
        "idusuario" => $datos['idusuario'], 
        "idequipos" => $datos['idequipos'], 
        "prefijo" => $datos['prefijo']
      ]; 
      return $query->insert($data);

    }

    public function actualizarpasscode($id, $idusuario, $codigo, $estatus){

     $qry = "UPDATE tblpasscode SET codigo = :codigo, estatus = :estatus WHERE idusuario = :idusuario AND id = :id";
      $sql = $this->db->conn_d->prepare($qry);    
      $sql->bindParam(':estatus', $estatus, PDO::INT);
      $sql->bindParam(':codigo', $codigo, PDO::PARAM_STR);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
      $sql->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    }

    public function gettblpasscode($id, $idusuario){

        $query = $this->db->query("SELECT * FROM tblpasscode WHERE idusuario = $idusuario AND id = $id");
        return $query->getRowArray();

    }

    public function lista($buscar, $idusuario){

      if($buscar == ""){
        
        $query = $this->db->query("SELECT * FROM tblpasscode WHERE idusuario = $idusuario ORDER BY id DESC");

      }elseif($buscar != ""){

        $query = $this->db->query("SELECT * FROM tblpasscode WHERE idusuario = $idusuario AND (usuario LIKE '%$buscar%' OR  modelo LIKE '%$buscar%') ORDER BY id DESC");

      }

       return $query->getResult();

    } 


   public function eliminareProceso($idusuario, $id){

      $query =  $this->db->table('tblpasscode');
      $query->where('idusuario', $idusuario);
      $query->where('id', $id);
      return $query->delete(); 


   } 

   
 
}


