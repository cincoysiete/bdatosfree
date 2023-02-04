<?php 
session_start(); 
include("encriptado.php");
include("variables.php");
include("constantes.php");


$_SESSION["editar"]=-1;      // NO TE PERMITE MODIFICAR REGISTROS
if ($imgtabla=="si"){$_SESSION["verimagenes"]=1;} else {$_SESSION["verimagenes"]=-1;}

$ar=fopen("admin.ubi","r") or die();
  $linea=fgets($ar);
  $kaka=explode(";",$linea);
fclose($ar);

$_SESSION["gusuario"]=trim($kaka[0]);
$_SESSION["gclave"]=trim($kaka[1]);
$_SESSION["gusuario1"]=$_POST["gusuario"];
$_SESSION["gclave1"]=$_POST["gpassword"];

if ($_SESSION["gusuario"]==$_SESSION["gusuario1"] and $_SESSION["gclave"]==$encriptar($_SESSION["gclave1"])) {header('Location: abre.php');} else {header('Location: index.php');}

?>
