<?php session_start(); 
include("constantes.php"); 
include("encriptado.php"); 
// include("cincoysiete.css"); 


$kaka=explode(".",$_GET["mtk"]);
copy($kaka[0].".php","variables.php");

header("location: tabla.php");

?>
