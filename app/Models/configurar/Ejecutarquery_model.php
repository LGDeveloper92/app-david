<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ejecutarquery_model extends CI_Model {
  	public function __construct()	{
       $this->load->database('pdo');
    } 


    public function updateShortUrls($domviej, $domnuev){

    	$qry = "UPDATE short_urls SET long_url = REPLACE(long_url,'".$domviej."','".$domnuev."')";
        $sql = $this->db->conn_id->prepare($qry);   
        if($sql->execute()){
          return true;
        }else{
          return false;
        }

    }

    public function updatetblequiposLinkg($domviej, $domnuev){

        $qry = "UPDATE tblequipos SET urllinkg = REPLACE(urllinkg,'".$domviej."','".$domnuev."')";
        $sql = $this->db->conn_id->prepare($qry);   
        if($sql->execute()){
          return true;
        }else{
          return false;
        }
    	
    }


     public function updatetblequiposLinkshort($domviej, $domnuev){

        $qry = "UPDATE tblequipos SET urllinkshort = REPLACE(urllinkshort,'".$domviej."','".$domnuev."')";
        $sql = $this->db->conn_id->prepare($qry);   
        if($sql->execute()){
          return true;
        }else{
          return false;
        }
    	
    }



    public function updatetblequiposAcortador($domviej, $domnuev){

        $qry = "UPDATE tblequipos SET acortador = REPLACE(acortador,'".$domviej."','".$domnuev."')";
        $sql = $this->db->conn_id->prepare($qry);   
        if($sql->execute()){
          return true;
        }else{
          return false;
        }
      
    }




    





    
}    