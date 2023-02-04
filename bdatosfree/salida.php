<?php 
// session_start(); 
$_SESSION["gusuario"]="1";
$_SESSION["gclave"]="2";
$_SESSION["gusuario1"]="3";
$_SESSION["gclave1"]="4";
session_destroy(); 
header("Location: index.php");
?>
