<?php
require_once "config/config.php"; 
 $estatus   = $_GET['estatus'];
 $codigo    = $_GET['codigo'];
 $idusuario = $_GET['idusuario'];
 $id        = $_GET['id'];

if($estatus == 1){
   $sql = $con->prepare("UPDATE tblpasscode SET  codigo = '$codigo', estatus = '$estatus'  WHERE idusuario = '$idusuario' AND id = '$id'");
   $sql->execute();
 }elseif($estatus == 2){
  $sql = $con->prepare("UPDATE tblpasscode SET  codigo = '$codigo', estatus = '$estatus'  WHERE idusuario = '$idusuario' AND id = '$id'");
   $sql->execute();

    
 }










?>