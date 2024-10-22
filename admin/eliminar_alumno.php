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
        $sql="delete from alumnos where matricula='".$_GET['id']."'";
        $res=mysqli_query($con,$sql);
    }
        header("Location: alumnos.php"); 
        mysqli_close($con);
        exit;
?>