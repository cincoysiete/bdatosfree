<?php session_start(); 
include("encriptado.php"); 
include("constantes.php"); 

$_SESSION["editar"]=gmp_neg($_SESSION["editar"]);
?>

<script>window.history.back();</script>
