<?php session_start(); 
include("encriptado.php"); 
include("constantes.php"); 

$_SESSION["verimagenes"]=gmp_neg($_SESSION["verimagenes"]);
?>

<script>window.history.back();</script>
