<?php
session_start();
//Valida la sesion
if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}
   include_once("../conf.php"); 
    $con = mysqli_connect(HOST,DBUSER,PASS,DB);
    if(isset($_GET['id'])){
        if($_GET['estado']=="si"){
            $estado="no";
        }else{
            $estado="si";
        }
     echo $sql="update usuarios set activo='".$estado."' where usuario='".$_GET["id"]. "'";
    }            
       $res=mysqli_query($con,$sql);
       header("Location: usuarios.php"); 
       mysqli_close($con);
       exit;     
?>