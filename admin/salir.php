<?php
session_start();
//unset destruye la variable
unset($_SESSION["usuario"]);
    session_destroy();
    header("Location: index.php");
    exit;

?>