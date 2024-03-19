<?php 
 namespace App\Models\configurar;
 use CodeIgniter\Model;


 Class Usuario_model extends Model {

    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }

     public function get_usuarios($buscar){  

       if($buscar == ""){

         $query = $this->db->query("SELECT `idusuario`, `nombre`, `email`, `numero`, `pais`, `status`, `rol`, `fechai`, `fechav`, `correonoti`, `saldo_general`   FROM tbluser WHERE email != '' ORDER BY rol,idusuario DESC");
     
       }else{
         $query = $this->db->query("SELECT `idusuario`, `nombre`, `email`, `numero`, `pais`, `status`, `rol`, `fechai`, `fechav`, `correonoti`, `saldo_general`   FROM tbluser WHERE email != ''  AND (nombre LIKE '%$buscar%' OR email LIKE '%$buscar%' OR pais LIKE '%$buscar%')  ORDER BY idusuario DESC");
       }
      
       return $query->getResult();

    }  

    public function verifUser($email){

      $query = $this->db->query("SELECT * FROM tbluser WHERE email = '$email'");
      return $query->getRowArray();

    }  


    public function usuariosall(){
     $query = $this->db->query("SELECT * FROM tblsmstemplates");
     return $query->getResult();
    }

    public function get_usuarioID($idusuario){
       $query = $this->db->query("SELECT `idusuario`, `nombre`, `email`, `numero`, `pais`, `status`, `rol`, `fechai`, `fechav`, credsms, credcall, `correonoti`, `saldo_general`  FROM tbluser WHERE idusuario = $idusuario");
       return $query->getRowArray();
    }

    public function setusuarios($datos){  

      $query =  $this->db->table('tbluser');
      $data = [
         'nombre' => $datos['nombre'],
         'pw'     => $datos['pw'],
         'email'  => $datos['email'],
         'numero' => $datos['numero'],
         'pais'   => $datos['pais'],
         'status' => $datos['status'],
         'rol'    => $datos['rol'],
         'fechai' => $datos['fechai'],
         'fechav' => $datos['fechav'],
         'correonoti' => $datos['correonoti']

      ];      
     
      return $query->insert($data);


    }


    public function update_password_user($datos){
      
       $query =  $this->db->table('tbluser');
       $data = [
         'email' => $datos['email'],
         'pw'     => $datos['pw']
       ];

      $query->set($data);
      $query->where('email',$datos['email']);
      return $query->update();

    }

    public function update_vencimiento_user($datos){
      $query =  $this->db->table('tbluser');
       $data = [
         'email'  => $datos['email'],
         'fechav' => $datos['fechav']
       ];

      $query->set($data);
      $query->where('email',$datos['email']);
      return $query->update();
    }  

    public function updateStatus($idusuario, $newStatus){

       $query =  $this->db->table('tbluser');
       $data = [
         'status' => $newStatus,
         'idusuario' => $idusuario
       ];

       $query->set($data);
       $query->where('idusuario',$idusuario);
       return $query->update();

   }


    public function updateperfil($datos){

       $query =  $this->db->table('tbluser');
       $data = [
         'nombre'     => $datos['nombre'],
         'numero'     => $datos['numero'],
         'pais'       => $datos['pais'],
         'correonoti' => $datos['correonoti']
       ];

       $query->set($data);
       $query->where('idusuario',$datos['idusuario']);
       return $query->update();

   }

  public function updateCreditoSMS($datos){

      $query =  $this->db->table('tbluser');
      $data = [
         'credsms' => $datos['credsms']
       ];

      $query->set($data);
      $query->where('idusuario',$datos['idusuario']);
      return $query->update();

   }
  public function updateSaldoGeneral($datos){

      $query =  $this->db->table('tbluser');
      $data = [
         'saldo_general' => $datos['saldo_general']
       ];

      $query->set($data);
      $query->where('idusuario',$datos['idusuario']);
      return $query->update();

   }







  public function updateCreditoCall($datos){

      $query =  $this->db->table('tbluser');
      $data = [
         'credcall' => $datos['credcall']
       ];

      $query->set($data);
      $query->where('idusuario',$datos['idusuario']);
      return $query->update();
   }


   public function eliminarusuario($idusuario){

      $query =  $this->db->table('tbluser');
      $query->where('idusuario', $idusuario);
      return $query->delete();  

    }

    
  



 }


