<?php
 namespace App\Models\configurar;
 use CodeIgniter\Model;

class Plantillasemail_model extends Model {
    protected $db;

    public function __construct(){
       $this->db = \Config\Database::connect('default');
    }





    public function get_emailtemplates($descripcion){

     if($descripcion == ""){       
       $qry = "SELECT * FROM tblplantillasemail ORDER BY id DESC";
       $sql = $this->db->conn_id->prepare($qry);
       $sql->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
     }else{
       $qry = "SELECT * FROM tblplantillasemail WHERE descripcion = :descripcion ORDER BY id DESC";
       $sql = $this->db->conn_id->prepare($qry); 
       $sql->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);     
       

     }
      
     
      $sql->execute();
      $resultado = $sql->fetchAll(PDO::FETCH_OBJ);    
      return $resultado;
    } 


     public function get_emailtemplateID($id){

     
       $qry = "SELECT * FROM tblplantillasemail WHERE id = :id";
       $sql = $this->db->conn_id->prepare($qry);
       $sql->bindParam(':id', $id, PDO::PARAM_STR);     
       $sql->execute();
       $resultado = $sql->fetch(PDO::FETCH_ASSOC);    
       return $resultado;
    }       

     public function getColunmSMSTemplates($idusuario){
     
      $qry = "SELECT * FROM tblsmstemplates WHERE idusuario = :idusuario";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
      $sql->execute();
      $num_rows = $sql->fetchColumn();
      return $num_rows;

    } 



     public function set_EmailTemplates($datos){
     
      $qry = "INSERT INTO tblplantillasemail (descripcion, ruta, status) VALUES (:descripcion, :ruta, :status);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
      $sql->bindParam(':ruta', $datos['ruta'], PDO::PARAM_STR);
      $sql->bindParam(':status', $datos['status'], PDO::PARAM_INT);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }

    public function update_SMSTemplates($datos){

      $qry = "UPDATE tblsmstemplates SET titulosms = :titulosms, descripsms = :descripsms WHERE idusuario = :idusuario AND idtempsms = :idtempsms";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':titulosms', $datos['tdtitulosms'], PDO::PARAM_STR);
      $sql->bindParam(':descripsms', $datos['tddescripsms'], PDO::PARAM_STR);
      $sql->bindParam(':idusuario', $datos['idusuario'], PDO::PARAM_INT);
      $sql->bindParam(':idtempsms', $datos['idtempsms'], PDO::PARAM_INT);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    } 


     public function delete_EMAILTemplates($id){

      $qry = "DELETE FROM  tblplantillasemail  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);

      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    } 


    /*********OPCIONES PARA ASUNTOS/REMITENTES***************/

    public function get_asuntoemail(){

       $qry = "SELECT * FROM tblasuntoemail";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);     
       return $resultado;
    }   

    public function get_senderemail(){

       $qry = "SELECT * FROM tblsenderemail";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
    }        



    public function set_asuntoemail($descripcion){
     
      $qry = "INSERT INTO tblasuntoemail (descripcion) VALUES (:descripcion);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }

    public function deleteasuntoemail($id){

      $qry = "DELETE FROM tblasuntoemail  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
            
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    } 

     public function set_senderemail($descripcion){
     
      $qry = "INSERT INTO tblsenderemail (descripcion) VALUES (:descripcion);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }


 public function deleteremitenteemail($id){

      $qry = "DELETE FROM tblsenderemail  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
            
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    } 


 /**************CREDITO PARA CREDENCIALES/SERVER*******************/   

  public function set_servidoremail($descripcion,$urlserver,$status){
     
      $qry = "INSERT INTO tblservidoremail (descripcion, urlserver, status) VALUES (:descripcion, :urlserver, :status);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
      $sql->bindParam(':urlserver', $urlserver, PDO::PARAM_STR);
      $sql->bindParam(':status', $status, PDO::PARAM_INT);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }

    public function get_servidoremail(){

       $qry = "SELECT * FROM tblservidoremail";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 

   public function get_servidoremailStatus(){

       $qry = "SELECT * FROM tblservidoremail WHERE status != 0";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 


    public function get_servidoremailID($id){

       $qry = "SELECT * FROM tblservidoremail WHERE id = :id";
       $sql = $this->db->conn_id->prepare($qry);
       $sql->bindParam(':id', $id, PDO::PARAM_INT);   
       $sql->execute();
       $resultado = $sql->fetch(PDO::FETCH_ASSOC);     
       return $resultado;
   } 


  

  public function update_servidoremailID($id, $newStatus){

    $qry = "UPDATE tblservidoremail SET status = :status WHERE id = :id";
    $sql = $this->db->conn_id->prepare($qry);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':status', $newStatus, PDO::PARAM_STR);
    if($sql->execute()){
        return true;
      }else{
        return false;
      } 
   }  


   public function deleteservidoremail($id){

      $qry = "DELETE FROM tblservidoremail  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
            
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    } 

   ////////////////////////////////////////////////////////////////////


   public function set_emailsender($email,$password,$status){
     
      $qry = "INSERT INTO tblemailsender (email, password, status) VALUES (:email, :password, :status);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':email', $email, PDO::PARAM_STR);
      $sql->bindParam(':password', $password, PDO::PARAM_STR);
      $sql->bindParam(':status', $status, PDO::PARAM_INT);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }

    public function get_emailsender(){

       $qry = "SELECT * FROM tblemailsender";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 


   public function deleteemailsender($id){

      $qry = "DELETE FROM tblemailsender  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
            
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    }   


  public function get_emailsenderID($id){
       $qry = "SELECT * FROM tblemailsender WHERE id = :id";
        $sql = $this->db->conn_id->prepare($qry);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }    

  public function update_emailsenderID($id, $newStatus){

    $qry = "UPDATE tblemailsender SET status = :status WHERE id = :id";
    $sql = $this->db->conn_id->prepare($qry);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':status', $newStatus, PDO::PARAM_STR);
    if($sql->execute()){
        return true;
      }else{
        return false;
      } 
   }  
   



  /*******CONFIGURACION SMTP*************/
  
   public function set_configsmtp($descripcionsmtp, $hostsmtp,$puertosmtp,$usuariosmtp,$passwordsmtp, $status){
     
      $qry = "INSERT INTO tblconfigsmtp (descripcionserver, servidor, puerto, usuario, password, status) VALUES (:descripcionserver, :servidor, :puerto, :usuario, :password, :status);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':descripcionserver', $descripcionsmtp, PDO::PARAM_STR);
      $sql->bindParam(':servidor', $hostsmtp, PDO::PARAM_STR);
      $sql->bindParam(':puerto', $puertosmtp, PDO::PARAM_STR);
      $sql->bindParam(':usuario', $usuariosmtp, PDO::PARAM_STR);
      $sql->bindParam(':password', $passwordsmtp, PDO::PARAM_STR);
      $sql->bindParam(':status',$status, PDO::PARAM_INT);
      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }

    public function get_configsmtp(){

       $qry = "SELECT * FROM tblconfigsmtp";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 

   public function get_configsmtpStatus(){

       $qry = "SELECT * FROM tblconfigsmtp WHERE status != 0";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 


   public function deleteconfigsmtp($id){

      $qry = "DELETE FROM tblconfigsmtp  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
            
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    }


 public function get_configsmtpID($id){
       $qry = "SELECT * FROM tblconfigsmtp WHERE id = :id";
        $sql = $this->db->conn_id->prepare($qry);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }    

  public function update_configsmtpID($id, $newStatus){

    $qry = "UPDATE tblconfigsmtp SET status = :status WHERE id = :id";
    $sql = $this->db->conn_id->prepare($qry);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':status', $newStatus, PDO::PARAM_STR);
    if($sql->execute()){
        return true;
      }else{
        return false;
      } 
   }  


/*******CONFIGURACION DOMINIOEMAIL*************/
                  
   public function set_domainsemail($descripcion, $ruta, $status){
      
      $qry = "INSERT INTO tbldomainsemail (descripcion, ruta, status) VALUES (:descripcion, :ruta, :status);";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
      $sql->bindParam(':ruta', $ruta, PDO::PARAM_STR);
      $sql->bindParam(':status', $status, PDO::PARAM_STR);      
      if($sql->execute()){
        return true;
      }else{
        return false;
      }
      

    }

    public function get_domainsemail(){

       $qry = "SELECT * FROM tbldomainsemail";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 

   public function get_domainsemailStatus(){

       $qry = "SELECT * FROM tbldomainsemail WHERE status != 0";
       $sql = $this->db->conn_id->prepare($qry);   
       $sql->execute();
       $resultado = $sql->fetchAll(PDO::FETCH_OBJ);      
       return $resultado;
   } 


   public function deletedomainsemail($id){

      $qry = "DELETE FROM tbldomainsemail  WHERE id = :id";
      $sql = $this->db->conn_id->prepare($qry);
      $sql->bindParam(':id', $id, PDO::PARAM_INT);
            
      if($sql->execute()){
        return true;
      }else{
        return false;
      }

    }


 public function get_domainsemailID($id){
       $qry = "SELECT * FROM tbldomainsemail WHERE id = :id";
        $sql = $this->db->conn_id->prepare($qry);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }    

  public function update_domainsemail($id, $newStatus){

    $qry = "UPDATE tbldomainsemail SET status = :status WHERE id = :id";
    $sql = $this->db->conn_id->prepare($qry);
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':status', $newStatus, PDO::PARAM_STR);
    if($sql->execute()){
        return true;
      }else{
        return false;
      } 
   }      



 }